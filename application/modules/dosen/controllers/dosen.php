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

		$mahasiswa = $this->m_dos->getAll(array('perpage' => $perpage, 'offset' => $offset));

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
			'No', 'Nama Dosen'
		);

		$this->table->set_template($template_table);
		$this->table->set_heading($heading);

		$id = 'id_dosen';

		foreach ($mahasiswa->result() as $rec) {
			$no++;
			$action = '<div class="aksi" id="aksi">
							<a href="Javascript:;" class="edit" onClick="edit(' . $rec->$id . ')">edit</a>&nbsp
							<a href="Javascript:;" onClick="hapus(' . $rec->$id . ',' . (($page*$perpage)-$perpage) . ',' . $page . ')">hapus</a>
						</div>';
			$this->table->add_row(
				array("data" => $no, "style"=>"min-width:30px"),
				array("data" => $rec->nama . $action, "style"=>"min-width:500px")
			);

		}
		$data['table']       = $this->table->generate();
		$this->load->view('data', $data);
	}

	public function tambah_proses()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required|xss_clean');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'), 
			);
			$this->m_dos->insert($data);
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
			$this->form_validation->set_rules('nama', 'Nama Dosen', 'trim|required|xss_clean');
			if ($this->form_validation->run() == false) {
				$this->index();
			} else {
				$data = array(
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