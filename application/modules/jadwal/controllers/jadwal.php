<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		// included library
			$this->load->library('table');	

		/**
		CONFIG
		*/
			// select field
			$sql 				= 'select id_dosen from dosen';

			// setingan jadwal
			$title_table		= "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. <br><hr>";
			$jumlah_penguji   	= 3;
			$tanggal_mulai		= "2015-08-15";
			$awal             	= "07:00";
			$batas_ujian	  	= "11:00";
			$kondisi          	= "<";
			$waktu_istirahat  	= "00:05"; // 5 menit
			$waktu_ujian      	= "00:45"; // 45 menit
			$batas            	= floor(($this->m_jadwal->query($sql)->num_rows()) / $jumlah_penguji);

			// setingan table
			$template_table		= array('table_open' => ' <table class="table table-bordered">');
			$heading 			= array('No', 'Nama Mahasiswa', 'Pembimbing', 'Penguji', 'Judul', 'Waktu', 'Ruang');

			// get data
			$mahasiswa 			= $this->m_jadwal->getAll();

		/**
		END OF CONFIG
		*/

		// cari dosen penguji

		// 

		// apply setingan table
		$this->table->set_template($template_table);
		$this->table->set_heading($heading);
		$this->table->set_caption($title_table);

		$id 			= 'id_mhs';
		$jam_selesai 	= '';
		$jam_mulai 		= $awal;
		$r 				= 0;
		$no 			= 0;
		$break 			= 0;
		$pindah_hari 	= (($kondisi == ">") 
								? $batas_ujian 
								: $this->jam($batas_ujian, $waktu_ujian, "-"));

		/**
		CARI PENGUJI LOK 
		PENING PALAK DIBUAT NYE
		*/
		$res = $mahasiswa->result();
		$this->load->model('dosen/m_dos');
		$query = $this->m_dos->getAll();
		$a = 1;
		// buat array dosen
		foreach ($query->result() as $key) {
			$dos[$key->id_dosen] = $key->nama;
		}
		$urut = 0;
		$a = 0;
		$uji = array();
		$data_dosen = $dos;
		foreach ($res as $rec) {
			$a++;
			unset($data_dosen[$rec->id_dosen]);
			if ($a == $batas) {
				$a = 0;
				$uji[$urut] = array();
				foreach ($data_dosen as $key => $value) {
					array_push($uji[$urut], $value);
				}
				$urut++;
				$data_dosen = $dos;
			}
		}

		$dos = array();
		$mhs = array();
		$table = "<table class='table table-bordered'>
					<thead>
						<tr>
							<th style='width:50px'>No</th>
							<th style='width:200px'>Nama Mahasiswa</th>
							<th style='width:200px'>Pembimbing</th>
							<th style='width:200px'>Penguji</th>
							<th style='width:300px'>Judul</th>
							<th style='width:100px'>Waktu</th>
							<th style='width:50px'>Ruang</th>
						</tr>
					</thead>";
		$no = 0;
		$hari = 1;
		$batas_ujian = (($kondisi == '<') ? $this->jam($batas_ujian, $waktu_ujian, '-') : $batas_ujian);
		$u = 0;
		$acak = 1;
		while ((count($mhs)) != (count($res))) {
			$a = 0;
			$b = 0;
			if ($acak = 1) {
				shuffle($uji[$u]);
			}
			$table .= "<tbody>";
			$jam_selesai = $this->jam($jam_mulai, $waktu_ujian);
			foreach ($res as $rec) {
				$a++;
				if (!in_array($rec->id_dosen, $dos) && !in_array($rec->id_mhs, $mhs)) {
					$no++;
					array_push($mhs, $rec->id_mhs);
					array_push($dos, $rec->id_dosen);
					if ($a == 1) {
						if ($hari == 1) {
							$table .= "
								<tr class='alert-success text-center'>
									<td colspan='7'>$tanggal_mulai</td>
								</tr>
							";
							$hari--;
						} else {
							$table .= "
								<tr>
									<td colspan='7' class='text-center'>istirahat</td>
								</tr>
							";
						}
						$table .= "
								<tr>
									<td rowspan='2'>$no</td>
									<td rowspan='2'>" . ucwords(strtolower($rec->m_nama)) . "</td>
									<td rowspan='2'>" . $rec->d_nama . "</td>
									<td>" . ((array_key_exists($b, $uji[$u])) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
									<td rowspan='2'>" . $rec->judul . "</td>
									<td style='vertical-align:middle' rowspan='". $batas*2 ."'> 
										<div class='verticalText'>
											" . $jam_mulai . "-" . $jam_selesai . "
										</div> 
									</td>
									<td rowspan='2' class='text-center'> R-" . $a . " </td>
								</tr>
						";
						$b++;
						$table .= "<tr>
									<td>" . ((array_key_exists($b, $uji[$u])) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
								</tr>";
						$b++;
						continue;
					} else {
						$table .= "
								<tr>
									<td rowspan='2'>$no</td>
									<td rowspan='2'>" . ucwords(strtolower($rec->m_nama)) . "</td>
									<td rowspan='2'>" . $rec->d_nama . "</td>
									<td>" . ((array_key_exists($b, $uji[$u])) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
									<td rowspan='2'>" . $rec->judul . "</td>
									<td rowspan='2' class='text-center'> R-" . $a . " </td>
								</tr>
						";
						$b++;
						$table .= "<tr>
									<td>" . ((array_key_exists($b, $uji[$u])) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
								</tr>";
						$b++;
					}

				} else {
					$a--;
					continue;
				}

				if ($a == $batas) {
					unset($dos);
					$dos = array();
					break;
				}
			}
			$jam_mulai = $jam_selesai;
			$jam_mulai = $this->jam($jam_mulai, $waktu_istirahat);
			if (strtotime($jam_mulai) >= strtotime($batas_ujian)) {
				$hari = 1;
				$jam_mulai = $awal;
			}
			$table .= "</tbody>";
			$urut++;
		}
		$table .= "</table>";
		$data['table']       = /*$this->table->generate();*/ $table;
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

	function jam($time,$rentang, $operan = '')
	{
		$time      = strtotime(date('Y-m-d').' '.$time.':00');
		$rentang   = strtotime(date('Y-m-d').' '.$rentang.':00');

		$begin_day = strtotime(date('Y-m-d').' 00:00:00');
		if ($operan == '') {
			$hasil     = date('H:i', ($time + ($rentang - $begin_day)));
		} elseif ($operan == '-') {
			$hasil     = date('H:i', ($time - ($rentang - $begin_day)));
		}

		return $hasil;
	}

	function edit($id)
	{
		$query = $this->m_jadwal->getById($id);
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
				echo json_encode(array('stat' => true));
			}
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/modules/mahasiswa/controllers/mahasiswa.php */