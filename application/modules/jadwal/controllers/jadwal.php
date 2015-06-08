<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal');
	}

	public function index($offset = 0)
	{
		$this->load->library('table');	

		$sql = 'select id_dosen from dosen';
		$jumlah_penguji   = 3;
		$jam_mulai        = "07:00";
		$waktu_istirahat  = "00:05"; // 5 menit
		$waktu_ujian      = "00:45"; // 45 menit
		$batas = floor(($this->m_jadwal->query($sql)->num_rows()) / $jumlah_penguji);
		// $perpage     	  = ($batas * 5);

		//load library pagination
		$this->load->library('pagination');

		//untuk konfigurasi pagination

		$mahasiswa = $this->m_jadwal->getAll();

		$no = 0 + $offset;

		$template_table = array(
			'table_open' => '<table class="table table-bordered">',
		);
		$heading = array(
			'No', 'Nama Mahasiswa', 'Pembimbing', 'Penguji', 'Judul', 'Waktu', 'Ruang'
		);

		$this->table->set_template($template_table);
		$this->table->set_heading($heading);
		$r = 0;
		$id = 'id_mhs';
		$jam_selesai = '';
		foreach ($mahasiswa->result() as $rec) {
			$no++;
			$r++;
			if (($no-1) % $batas == 0) {
				if ($no == $offset+1) {
					$this->table->add_row(
						['data' => 'Hari', 'colspan' => 7, 'style' => 'vertical-align:middle;text-align:center']
					);
				} elseif ($no != 1) {
					$jam_mulai = $this->jam($jam_mulai,$waktu_istirahat);
					$this->table->add_row(
						['data' => 'istirahat', 'colspan' => 7, 'style' => 'vertical-align:middle;text-align:center']
					);
				}
				$r = 1;
			} 
			if (($no-1) % $batas == 0) {
				$jam_selesai = $this->jam($jam_mulai,$waktu_ujian);
				$this->table->add_row(
					["data" => $no, "style"=>"min-width:30px"],
					["data" => $rec->m_nama, "style"=>"min-width:200px"],
					["data" => $rec->d_nama, "style"=>"min-width:200px"],
					["data" => $rec->d_nama, "style"=>"min-width:200px"],
					$rec->judul,
					['data' => '<div style="width:100px">'. $jam_mulai .' - '. $jam_selesai .'</div>', 'rowspan' => $batas, 'class' => 'verticalText'],
					['data' => 'R-'.$r, 'style' => 'text-align:center']
				);	
				$jam_mulai = $jam_selesai;
				continue;
			}
			$this->table->add_row(
				["data" => $no, "style"=>"min-width:30px"],
				["data" => $rec->m_nama, "style"=>"min-width:200px"],
				["data" => $rec->d_nama, "style"=>"min-width:200px"],
				["data" => $rec->d_nama, "style"=>"min-width:200px"],
				$rec->judul,
				['data' => 'R-'.$r, 'style' => 'text-align:center']
			);	
			
		}

		$query = $this->m_jadwal->getDosen()->result();
		
		$this->session->set_userdata( 'jam', $jam_mulai );
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
			$this->m_jadwal->insert($data);
			$this->index();
		}
	}

	function jam($time,$rentang)
	{
		$time      = strtotime(date('Y-m-d').' '.$time.':00');
		$rentang   = strtotime(date('Y-m-d').' '.$rentang.':00');

		$begin_day = strtotime(date('Y-m-d').' 00:00:00');

		$hasil     = date('H:i', ($time + ($rentang - $begin_day)));

		return $hasil;
	}

	function edit($id)
	{
		$query = $this->m_jadwal->getById($id);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			echo json_encode([
				'stat'     => true,
				'id_mhs'   => $row->id_mhs,
				'nama'     => $row->nama,
				'judul'    => $row->judul,
				'id_dosen' => $row->id_dosen,
			]);
		} else {
			echo json_encode(['stat' => false]);
		}
	}

	function edit_proses()
	{
		$id = $this->input->post('id');
		$query = $this->m_jadwal->getById($id);
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
				$this->m_jadwal->update($data, $id);
				echo "<script>alert('ahha')</script>";
				$this->index();
			}
		}
	}

	function hapus($id){
		$page  = $this->input->post('page');
		$query = $this->m_jadwal->getById($id);
		if ($query->num_rows() > 0) {
			$del = $this->m_jadwal->delete($id);
			if ($del) {
				echo json_encode(['stat' => true]);
			}
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/modules/mahasiswa/controllers/mahasiswa.php */