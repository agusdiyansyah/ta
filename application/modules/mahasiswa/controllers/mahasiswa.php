<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_mhs');
	}

	public function index($offset = 0)
	{
		$this->load->library('table');	

		$perpage     = 20;

		//load library pagination
		$this->load->library('pagination');

		//untuk konfigurasi pagination

		$mahasiswa = $this->m_mhs->getAll(array('perpage' => $perpage, 'offset' => $offset));

		// pagination
		$count = $this->m_mhs->getAll()->num_rows();
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
			'No', 'Nama Mahasiswa', 'Pembimbing', 'Judul'
		);

		$this->table->set_template($template_table);
		$this->table->set_heading($heading);

		$id = 'id_mhs';

		foreach ($mahasiswa->result() as $rec) {
			$no++;
			$action = '<div class="aksi" id="aksi">
							<a href="Javascript:;" class="edit" onClick="edit(' . $rec->id_mhs . ')">edit</a>&nbsp
							<a href="Javascript:;" onClick="hapus(' . $rec->id_mhs . ',' . (($page*$perpage)-$perpage) . ',' . $page . ')">hapus</a>
						</div>';
			$this->table->add_row(
				array("data" => $no, "style"=>"min-width:30px"),
				array("data" => $rec->m_nama . $action, "style"=>"min-width:180px"),
				array("data" => $rec->d_nama, "style"=>"min-width:180px"),
				$rec->judul
			);

		}
		$query = $this->m_mhs->getDosen()->result();
		$data['opt'][] = '';
		foreach ($query as $key) {
			$data['opt'][$key->id_dosen] = $key->nama;
		}
		$data['table']       = $this->table->generate();
		$this->load->view('data', $data);
	}

	public function tambah_proses()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required|xss_clean');
		$this->form_validation->set_rules('dosen', 'Dosen Pembimbing', 'trim|required|xss_clean');
		$this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'trim|required|xss_clean');
		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'), 
				'judul' => $this->input->post('judul'), 
				'id_dosen' => $this->input->post('dosen'), 
			);
			$this->m_mhs->insert($data);
			$this->index();
		}
	}

	function edit($id)
	{
		$query = $this->m_mhs->getById($id);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			echo json_encode(array(
				'stat'     => true,
				'id_mhs'   => $row->id_mhs,
				'nama'     => $row->nama,
				'judul'    => $row->judul,
				'id_dosen' => $row->id_dosen,
			));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

	function edit_proses()
	{
		$id = $this->input->post('id');
		$query = $this->m_mhs->getById($id);
		if ($query->num_rows() > 0) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dosen', 'Dosen Pembimbing', 'trim|required|xss_clean');
			$this->form_validation->set_rules('judul', 'Judul Tugas Akhir', 'trim|required|xss_clean');
			if ($this->form_validation->run() == false) {
				$this->index();
			} else {
				$data = array(
					'nama' => $this->input->post('nama'), 
					'judul' => $this->input->post('judul'), 
					'id_dosen' => $this->input->post('dosen'), 
				);
				$this->m_mhs->update($data, $id);
				$this->index();
			}
		}
	}

	function hapus($id){
		$page  = $this->input->post('page');
		$query = $this->m_mhs->getById($id);
		if ($query->num_rows() > 0) {
			$del = $this->m_mhs->delete($id);
			if ($del) {
				echo json_encode(array('stat' => true));
			}
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/modules/mahasiswa/controllers/mahasiswa.php */