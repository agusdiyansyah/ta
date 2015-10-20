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
		if ($this->grant('1')) {
			$this->load->library('table');	

			$perpage     = 20;

			//load library pagination
			$this->load->library('pagination');

			//untuk konfigurasi pagination

			$sql  = $this->m_user->getAll(array('perpage' => $perpage, 'offset' => $offset));

			$jml_admin = $this->m_user->getcount();

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

			$reg = array(
				'0' => '<span class="label label-warning">not registered</span>',
				'1' => '',
			);

			$id = 'uid';

			foreach ($sql->result() as $rec) {

				$no++;
				$del = '';
				if ($rec->u_level == 1 && $jml_admin > 1) {
					$del = '<a href="Javascript:;" class="del" data-uid="'. $rec->uid .'">hapus</a>';
				}
				$action = '	<div class="aksi" id="aksi">
								<a href="Javascript:;" class="edit" data-uid="'. $rec->uid .'">edit</a>&nbsp
								'.$del.'
							</div>';
				$this->table->add_row(
					array("data" => $no, "style"=>"min-width:30px"),
					array("data" => (($rec->u_reg == 0) ? '<b><i>'.$rec->u_nicename.'</i></b>' : $rec->u_nicename) . '&nbsp' . $reg[$rec->u_reg] . $action, "style"=>"min-width:190px"),
					array("data" => $level[$rec->u_level], "style"=>"min-width:100px")
				);

			}
			
			$data['table']       = $this->table->generate();
			$this->load->view('data', $data);
		}
	}

	public function del($id)
	{
		$del = $this->m_user->delete($id);
		if ($del) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
		
	}

	public function form()
	{
		$this->load->view('form');
	}

	public function insert()
	{
		$data = array(
			'u_name' => $this->input->post('u_name'), 
			'u_pass' => md5($this->input->post('u_pass')),
			'u_nicename' => $this->input->post('name'),
			'rel_id' => 0,
			'u_level' => '1',
			'u_reg' => '1',
		);
		$in = $this->m_user->insert($data);
		if ($in) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
		
	}

	public function cari()
	{
		if ($this->grant('1')) {
			$this->session->set_flashdata('find', $this->input->post('kunci'));
			$this->index();
		}
	}

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}

	public function grant($a, $del = true)
	{
		$level = explode(" ", $a);
		$grant = false;
		foreach ($level as $a) {
			if ($a == $this->session->userdata('u_level')) {
				$grant = true;
				return true;
			}
		}
		if ($grant == false) {
			if ($del) {
				$this->session->sess_destroy();
				redirect('app','refresh');
			}
			return false;
		}
	}

	public function detil($uid)
	{
		$data = $this->m_user->profile($uid)->row();
		$this->load->view('detil', $data);
	}

	public function update()
	{
		$u_pass = $this->input->post('u_pass');
		$u_name = $this->input->post('u_name');
		$name   = $this->input->post('name');
		$uid    = $this->input->post('uid');
		$data = array(
			'u_pass' => md5($u_pass),
			'u_name' => $u_name,
			'u_nicename' => $name,
			'u_reg' => 1,
		);
		$up = $this->m_user->update($uid, $data);

		if ($up) {
			$this->session->sess_destroy();
			echo json_encode(array('stat' => true));
		} else {
			$this->session->set_flashdata('class', 'danger');
			$this->session->set_flashdata('msg', 'Anda gagal terregistrasi');
			echo json_encode(array('stat' => false));
		}
	}

	/*function download($url)
	{
		$id = $this->clean_url->getId($url);
		$this->load->helper('download');
		$query = $this->m_upload->getById($id);
		if ($query->num_rows() > 0) {
			$record = $query->row();
			$url = base_url()."inventory/file/doc/".$record->file;
			$ext = pathinfo($record->file, PATHINFO_EXTENSION);
			$data = file_get_contents("inventory/file/doc/".$record->file);
			force_download($record->nama.".".$ext, $data, TRUE);
		}
		else {
			echo "<h1>DATA TIDAK ADA</h1>";
		}
	}*/

}

/* End of file user.php */
/* Location: ./application/modules/user/controllers/user.php */