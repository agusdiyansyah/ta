<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index($acak = 0, $cetak = false)
	{
		// included library
			$this->load->library('table');	

		/**
		CONFIG
		*/
			$set = $this->m_jadwal->get_set()->row();
			$json = json_decode($set->meta_value);
			// select field
			$sql 				= 'select id_dosen from dosen';

			// setingan jadwal
			$title_table		= $json->title;
			$nama				= $json->nama;
			$nip 				= $json->nip;
			$jumlah_penguji   	= 3;
			$tanggal_mulai		= $json->tgl_ujian;
			$awal             	= $json->jam_mulai;
			$batas_ujian	  	= $json->jam_selesai;
			$kondisi          	= $json->kondisi;
			$waktu_istirahat  	= $json->jam_istirahat; // 5 menit
			$waktu_ujian      	= $json->jam_ujian; // 45 menit
			$batas            	= floor(($this->m_jadwal->query($sql)->num_rows()) / $jumlah_penguji);

			// setingan table
			$template_table		= array('table_open' => ' <table class="table table-bordered">');
			$heading 			= array('No', 'Nama Mahasiswa', 'Pembimbing', 'Penguji', 'Judul', 'Waktu', 'Ruang');

			// get data
			$mahasiswa 			= $this->m_jadwal->getAll();

		/**
		END OF CONFIG
		*/

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

		$dos = array();
		$mhs = array();

		// table jadwal
		$table = "<table class='table table-bordered' style='border-color: #000'>
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
		
		$jdl = $this->m_jadwal->cek_jadwal();
		$res = $mahasiswa->result();
		
		$urut = 0;
		$a = 0;
		$c = 0;
		$uji = array();

		if ($jdl->num_rows() == 0) {

			$this->load->model('dosen/m_dos');
			$query = $this->m_dos->getAll();
			$a = 1;
			// buat array dosen
			foreach ($query->result() as $key) {
				$dos[$key->id_dosen] = $key->nama;
			}

			
			$data_dosen = $dos;
			
			// membuat daftar dosen penguji yang tidak membimbing
			$c = 0;
			$mhs = array();
			while (count($res) != $c && count($res) != 0) {
				$a = 0;
				$dos_uji = array();
				foreach ($res as $rec) {
					if (!in_array($rec->id_dosen, $dos_uji) && !in_array($rec->id_mhs, $mhs)) {
						array_push($dos_uji, $rec->id_dosen);
						array_push($mhs, $rec->id_mhs);
						unset($data_dosen[$rec->id_dosen]);
						// echo $rec->d_nama.' | ';
						$c++;
						$a++;
					}
					if ($a == $batas || count($res) == $c) {
						// echo "<br>";
						$uji[$urut] = array();
						foreach ($data_dosen as $key => $value) {
							array_push($uji[$urut], $value);
						}
						$data_dosen = $dos;
						$urut++;
						break;
					}
				}
			}
			$obj = array(
				'id' => 0,
				'meta_key' => 1,
				'meta_value' => json_encode($uji),
				'meta_group' => 0
			);
			$this->m_jadwal->penguji($obj, 1);
		}

		$jdl = $this->m_jadwal->cek_jadwal();
		$list = $jdl->row();
		$uji = json_decode($list->meta_value);

		if ($acak == 1) {
			$mta = array();
			for ($i=0; $i < count($uji); $i++) { 
				$mta[$i] = $this->acak($uji[$i]);
			}
			$uji = $mta;

			$obj = array(
				'id' => 0,
				'meta_key' => 1,
				'meta_value' => json_encode($uji),
				'meta_group' => 0
			);
			$this->m_jadwal->penguji($obj, 2);
		}
		while ((count($mhs)) != (count($res))) {
			$a = 0;
			$b = 0;

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
								<tr class='alert-success text-center batas'>
									<td colspan='7'>$tanggal_mulai</td>
								</tr>
							";
							$hari--;
						} else {
							$table .= "
								<tr class='batas'>
									<td colspan='7' class='text-center'>istirahat</td>
								</tr>
							";
						}
						$table .= "
								<tr>
									<td rowspan='2'>$no</td>
									<td rowspan='2'>" . ucwords(strtolower($rec->m_nama)) . "</td>
									<td rowspan='2'>" . $rec->d_nama . "</td>
									<td>" . (!empty($uji[$u][$b]) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
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
									<td>" . (!empty($uji[$u][$b]) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
								</tr>";
						$b++;
						continue;
					} else {
						$table .= "
								<tr>
									<td rowspan='2'>$no</td>
									<td rowspan='2'>" . ucwords(strtolower($rec->m_nama)) . "</td>
									<td rowspan='2'>" . $rec->d_nama . "</td>
									<td>" . (!empty($uji[$u][$b]) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
									<td rowspan='2'>" . $rec->judul . "</td>
									<td rowspan='2' class='text-center'> R-" . $a . " </td>
								</tr>
						";
						$b++;
						$table .= "<tr>
									<td>" . (!empty($uji[$u][$b]) ? $uji[$u][$b] : 'gx ada pengujinya') . "</td>
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
				$tanggal_mulai = date('d-m-Y', strtotime('+1 days', strtotime($tanggal_mulai)));
				$jam_mulai = $awal;
			}
			$table .= "</tbody>";
			$urut++;
			$u++;
		}

		$table .= "</table>";

		$data['meta']		= array('header' => $title_table, 'nama' => $nama, 'nip' => $nip, 'tgl_jadwal' => $json->tgl_jadwal);
		$data['table']      = $table;
		
		if ($cetak) {
			return $data;
		} else {
			$this->load->view('data', $data);
		}

	}

	public function cetak()
	{
		// <link href='".base_url()."gudang/css/bootstrap.min.css' rel='stylesheet'>
		$css = "	
			<link href='".base_url()."gudang/css/module/jadwal_cetak.css' rel='stylesheet' type='text/css'>
		";
		$html = $this->index(0, true);
		$header = "<div class='header'>".$html['meta']['header']."</div><br>";
		$fother = '
			<div class="fother">
				<div class="" style="color:#000">
					Pontianak, '.$html["meta"]["tgl_jadwal"].'
					<br>
					Panitia Tugas Akhir
					<br>
					Penanggungjawab Administrasi
					<br>
					<br>
					<br>
					<b><u>'. $html["meta"]["nama"] .'</u></b>
					<br>
					NIP. '. $html["meta"]["nip"] .'
				</div>
			</div>
		';
		$data = "
			$header
			<br>
			{$html['table']}
			<br>
			$fother
		";
		// $html = $this->coba();
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($css, 1);
		$pdf->WriteHTML($data, 2);
		$pdf->Output();
	}

	public function coba()
	{
		$table = '<table class="table table-bordered">
			      <thead>
			        <tr>
			          <th>#</th>
			          <th>First Name</th>
			          <th>Last Name</th>
			          <th>Username</th>
			        </tr>
			      </thead>
			      <tbody>
			        <tr>
			          <td rowspan="2">1</td>
			          <td>Mark</td>
			          <td>Otto</td>
			          <td>@mdo</td>
			        </tr>
			        <tr>
			          <td>Mark</td>
			          <td>Otto</td>
			          <td>@TwBootstrap</td>
			        </tr>
			        <tr>
			          <td>2</td>
			          <td>Jacob</td>
			          <td>Thornton</td>
			          <td>@fat</td>
			        </tr>
			        <tr>
			          <td>3</td>
			          <td colspan="2">Larry the Bird</td>
			          <td>@twitter</td>
			        </tr>
			      </tbody>
			    </table>';
		return $table;
	}

	function acak($list) { 
		if (!is_array($list)) 
			return $list; 

		$keys = array_keys($list); 
		shuffle($keys); 
		$random = array(); 
		$i = 0;
		foreach ($keys as $key) {
			$random[$i] = $list[$key]; 
			$i++;
		}

		return $random; 
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

	public function setting()
	{
		$this->load->module('user');
		if ($this->user->grant('1')) {
			$sql = $this->m_jadwal->cek_jadwal(0);
			$data['meta'] = array(
				'title' => '',
				'tgl_ujian' => '',
				'jam_mulai' => '',
				'kondisi' => '',
				'jam_selesai' => '',
				'jam_istirahat' => '',
				'jam_ujian' => '',
				'tgl_jadwal' => '',
				'nama' => '',
				'nip' => '',
			);
			if ($sql->num_rows() > 0) {
				$row = $sql->row();
				$data['meta'] = json_decode($row->meta_value);
			}
			$this->load->view('form', $data);
		}
	}

	public function simpan_setting()
	{
		$this->load->module('user');
		if ($this->user->grant('1')) {
			$set = array(
				"title" 		=> $this->input->post('title'),
				"tgl_ujian" 	=> $this->input->post('tgl_ujian'),
				"jam_mulai" 	=> $this->input->post('jam_mulai'),
				"kondisi" 		=> $this->input->post('kondisi'),
				"jam_selesai" 	=> $this->input->post('jam_selesai'),
				"jam_istirahat" => $this->input->post('jam_istirahat'),
				"jam_ujian" 	=> $this->input->post('jam_ujian'),
				"tgl_jadwal" 	=> $this->input->post('tgl_jadwal'),
				"nama" 			=> $this->input->post('nama'),
				"nip" 			=> $this->input->post('nip'),
			);
			$data = array(
				'id' 			=> 0,
				'meta_key' 		=> 0,
				'meta_value' 	=> json_encode($set),
				'meta_group' 	=> 0,
			);
			$setting = $this->m_jadwal->set_jadwal($data);
			if ($setting) {
				echo json_encode(array('stat' => true));
			} else {
				echo json_encode(array('stat' => false));
			}
		}
	}

}

/* End of file mahasiswa.php */
/* Location: ./application/modules/mahasiswa/controllers/mahasiswa.php */