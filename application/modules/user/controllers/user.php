<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index($offset = 0)
	{
		$this->load->library('table');	

		$perpage     = 20;

		//load library pagination
		$this->load->library('pagination');

		//untuk konfigurasi pagination

		$sql  = $this->m_user->getAll(array('perpage' => $perpage, 'offset' => $offset));

		// pagination
		$count = $this->m_user->getAll()->num_rows();
		$total_page = ceil($count/$perpage);
		$paging = '<ul class="pagination">';
		$page = ($this->input->post('page') == "") ? "1" : $this->input->post('page');
		for ($i = 1; $i <= $total_page; $i++) { 
			$akt = (($page == $i) ? $akt = 'class="active"' : "");

			$paging .= '<li ' . $akt . '><a onClick="page(' . (($i*$perpage)-$perpage) . ',' . $i . ')">' . $i . '</a></li>';
		}
		$paging .= '</ul>';
		$data['pagination'] = $paging;

		$no = 0 + $offset;

		$template_table = array(
			'table_open' => '<table class="table table-hover">',
		);
		$heading = array(
			'No', 'User Nicename', 'User Level'
		);

		$level = array(
			'1' => '<b><i>Administartor</i></b>', 
			'2' => 'Dosen', 
			'3' => '<i>Mahasiswa</i>', 
		);

		$this->table->set_template($template_table);
		$this->table->set_heading($heading);

		$id = 'uid';

		foreach ($sql->result() as $rec) {

			$no++;
			$action = '<div class="aksi" id="aksi">
							<a href="Javascript:;" class="edit" onClick="edit(' . $rec->$id . ')">edit</a>&nbsp
							<a href="Javascript:;" onClick="hapus(' . $rec->$id . ',' . (($page*$perpage)-$perpage) . ',' . $page . ')">hapus</a>
						</div>';
			$this->table->add_row(
				array("data" => $no, "style"=>"min-width:30px"),
				array("data" => $rec->u_nicename . $action, "style"=>"min-width:190px"),
				array("data" => $level[$rec->u_level], "style"=>"min-width:100px")
			);

		}
		
		$data['table']       = $this->table->generate();
		$this->load->view('data', $data);
	}

	public function cari()
	{
		$this->session->set_flashdata('find', $this->input->post('kunci'));
		$this->index();
	}

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}

	public function grant($a)
	{
		$level = explode(" ", $a);
		$grant = false;
		foreach ($level as $a) {
			if ($a == $this->session->userdata('u_level')) {
				$grant = true;
				return true;
			}
		}
		if (!$grant) {
			$this->session->sess_destroy();
			redirect('','refresh');
			return false;
		}
	}

}

/* End of file user.php */
/* Location: ./application/modules/user/controllers/user.php */