<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dos');
	}

	public function index($offset = 0)
	{
		$this->load->library('table');	

		$perpage     = 10;

		//load library pagination
		$this->load->library('pagination');

		//untuk konfigurasi pagination

		$dosen = $this->m_dos->getAll(array('perpage' => $perpage, 'offset' => $offset));

		// pagination
		$count = $this->m_dos->getAll()->num_rows();
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
			'No', 'Nama Dosen', array('data' => '<i class="fa fa-users"></i>', 'class'=>'text-center')
		);

		$this->table->set_template($template_table);
		$this->table->set_heading($heading);

		$id = 'id_dosen';

		/**
		JUMLAH MAHASISWA BIMBINGAN TIAP DOSEN
		*/
		$this->load->model('mahasiswa/m_mhs');
		$query = $this->m_mhs->getAll();
		
		foreach ($query->result() as $res) {
			$arr = ((empty($sum[$res->id_dosen])) ? [] : $sum[$res->id_dosen]);
			$sum[$res->id_dosen] = array_merge(array($res->id_dosen), $arr);
		}

		foreach ($dosen->result() as $rec) {
			$no++;
			$action =  '<div class="aksi" id="aksi">
							<a href="Javascript:;" class="edit" onClick="edit(' . $rec->$id . ')">edit</a>&nbsp
							<a href="Javascript:;" onClick="hapus(' . $rec->$id . ',' . (($page*$perpage)-$perpage) . ',' . $page . ')">hapus</a>
						</div>';
			$this->table->add_row(
				array("data" => $no, "style"=>"min-width:30px"),
				array("data" => $rec->nama . $action, "style"=>"min-width:500px"),
				array("data" => ((empty($sum[$rec->id_dosen])) ? 0 : count($sum[$rec->$id])), "style"=>"min-width:50px;text-align:center")
			);

		}
		$data['table']       = $this->table->generate();
		$this->load->view('data', $data);
	}

	public function tambah_proses()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nip', 'Nip Dosen', 'trim|required|xss_clean');
		$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required|xss_clean');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$nip  = str_replace(" ", "", $this->input->post('nip'));
			$nama = $this->input->post('nama');
			$ecp  = md5($nama);
			$ecp  = str_split($ecp, 5);
			$pw   = $ecp[0];
			unset($ecp);
			
			$data = array(
				'nip' => $this->input->post('nip'), 
				'nama' => $this->input->post('nama'), 
			);
			$id = $this->m_dos->insert($data);

			$user = array(
				'rel_id' 		=> $id,
				'u_name' 		=> $nip, 
				'u_pass' 		=> $pw,
				'u_nicename' 	=> $this->input->post('nama'),
				'u_level' 		=> '2'
			);
			$this->load->model('user/m_user');
			$this->m_user->insert($user);
			$this->index();
		}
	}

	function edit($id)
	{
		$query = $this->m_dos->getById($id);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			echo json_encode(array(
				'stat'     => true,
				'nip' 	   => $row->nip,
				'id_dosen' => $row->id_dosen,
				'nama'     => $row->nama,
			));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

	function edit_proses()
	{
		$id = $this->input->post('id');
		$query = $this->m_dos->getById($id);
		if ($query->num_rows() > 0) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nip', 'Nip Dosen', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required|xss_clean');
			if ($this->form_validation->run() == false) {
				$this->index();
			} else {
				$data = array(
					'nip' => $this->input->post('nip'), 
					'nama' => $this->input->post('nama'), 
				);
				$this->m_dos->update($data, $id);
				$this->index();
			}
		}
	}

	function hapus($id){
		$page  = $this->input->post('page');
		$query = $this->m_dos->getById($id);
		if ($query->num_rows() > 0) {
			$del = $this->m_dos->delete($id);
			if ($del) {
				echo json_encode(array('stat' => true));
			}
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/modules/mahasiswa/controllers/mahasiswa.php */