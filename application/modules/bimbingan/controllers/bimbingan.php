<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends MX_Controller {

	private $dosen = false;
	private $uid;

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('u_level') == 2) {
			$this->dosen = true;
		}
		$this->uid = $this->session->userdata('uid');
		$this->load->module('user');
		$this->user->grant('1 2 3');
	}
	
	public function index()
	{
		if ($this->user->grant('2 3')) {
			if ($this->dosen) {
				$this->load->model('m_mhs');
				$this->load->model('m_kmn');

				$data['mhs'] = $this->m_mhs->get_mhs('',$this->uid)->result();
				$data['kmn'] = $this->m_kmn->get()->result();

				if (!empty($data['mhs'])) {
					foreach ($data['mhs'] as $res) {
						$id[$res->id] = $this->src_id($res->id);
					}
					$data['id'] = $id;
					$this->load->view('layout_dosen', $data);

				} else {
					$this->load->view('gx_punya_bimbingan');
				}
			} else {
				// kalo bukan dosen, maka cek id, mungkin punya mahasiswa :D
				$this->pesan($this->uid);
			}
		}
	}
	
	public function src_id($id)
	{
		$this->load->model('m_mhs');
		$id = $this->m_mhs->src_id($id)->row();
		return $id->uid;
	}

	public function pesan($id)
	{

		// cek session untuk u_level
		// misal dosen yang lagi login
		$this->load->model('m_mhs');
		$rec = $this->m_mhs->get_mhs($id)->row();

		$data['meta'] = array(
			'id' => $id, 
			'id_mhs' => $rec->id_mhs, 
			'dosen' => $this->dosen,
		);

		$this->load->view('layout', $data);
	}

	public function cat($id)
	{
		// header('Content-Type: application/json');
		$this->load->model('m_file');

		$file = $this->m_file->getfile($id);
		if ($file->num_rows() > 0) {
			$rec = $file->result();
			
			foreach ($rec as $file) {
				// $fl[$file->TID] = array();
				$json = json_decode($file->p_name);
				$d = array(
					array(
						'pid' => $file->pid,
						'p_name' => $json->file_name,
						'p_name_enc' => $json->file_name_enc,
						'p_date' => $json->file_date,
						'asis' => $this->m_file->getasis($file->pid)
					)
				);
				$fl[$file->TID] = array_merge((empty($fl[$file->TID]) ? $fl[$file->TID] = array() : $fl[$file->TID]), $d);
			}
		}


		$tax = $this->m_file->gettax();
		if ($tax->num_rows() > 0) {
			$rec = $tax->result();
			$data['cat']['data'] = array();
			foreach ($rec as $tax) {
				$d = array(
					'tid' => $tax->tid,
					't_name' => $tax->t_name,
					't_count' => empty($fl[$tax->tid]) ? 0 : count($fl[$tax->tid]),
					't_data' => empty($fl[$tax->tid]) ? '' : $fl[$tax->tid],
				);
				array_push($data['cat']['data'] , $d);
			}
		}


		// echo json_encode($data);


		$this->load->view('cat/data', $data);
	}

/**
META
*/

	public function meta_data($id)
	{
		// misal session user = 18

		$this->load->model('m_mhs','');
		$data['meta'] = $this->m_mhs->get_mhs($id)->row();
		$this->load->view('meta/data', $data);
	}

/**
UPLOAD FILE
*/
	public function upl_form()
	{
		$this->load->model('statistic/m_cat_lap', 'mcl');
		$data['cat'] = $this->mcl->get_cat()->result();
		$this->load->view('upload/form', $data);
	}

	public function del_file($pid)
	{
		$this->load->model('m_file');
		$del = $this->m_file->delete($pid);
		if ($del) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
		
	}
	// belum
	public function update_file()
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_file');
		$this->load->model('statistic/m_cat_lap', 'mcl');

		$dir 						= 'gudang/file/laporan/';
		$config['upload_path'] 		= $dir ;
		$config['allowed_types'] 	= 'docx|docm|dotx|dotm|docb|pdf';
		$config['encrypt_name'] 	= TRUE;

		$this->load->library('upload', $config);

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			if( ! $this->upload->do_upload('file')){
				echo json_encode(array('stat' => false));
			} else {
				$upload 	= $this->upload->data('file');
				$enc_name 	= $upload['file_name'];

				$content = array(
					'file_name' 		=> $_FILES['file']['name'],
					'file_name_enc'  	=> $enc_name,
					'file_date'			=> date('d-m-Y H:i:s'),
				);

				// p_type = 1 (file)
				$data = array(
					'TID'				=> $this->input->post('cat_id'),
					'uid' 				=> $this->session->userdata('uid'),
					'p_type' 			=> '1',
					'p_name' 			=> json_encode($content),
				);

				$id = $this->input->post('pid');

				$file_in = $this->m_file->update($id, $data);
				if ($file_in) {
					$tax = $this->mcl->up_count($cat_id);
					if ($tax) {
						echo json_encode(array('stat' => true));
					} else {
						echo json_encode(array('stat' => false));
					}
					echo json_encode(array('stat' => true));
				} else {
					echo json_encode(array('stat' => false));
				}
				
			}
		}
	}

	public function upl_proses($cat_id)
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_file');
		$this->load->model('statistic/m_cat_lap', 'mcl');

		$dir 						= 'gudang/file/laporan/';
		$config['upload_path'] 		= $dir ;
		$config['allowed_types'] 	= 'docx|docm|dotx|dotm|docb|pdf';
		$config['encrypt_name'] 	= TRUE;

		$this->load->library('upload', $config);

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			if( ! $this->upload->do_upload('file')){
				echo json_encode(array('stat' => false));
			} else {
				$upload 	= $this->upload->data('file');
				$enc_name 	= $upload['file_name'];

				/*
					POST
						file_name
						file_name_enc

					TAXONOMY
						t_count ++

				*/
				$content = array(
					'file_name' 		=> $_FILES['file']['name'],
					'file_name_enc'  	=> $enc_name,
					'file_date'			=> date('d-m-Y H:i:s'),
				);

				// p_type = 1 (file)
				$data = array(
					'TID'				=> $cat_id,
					'uid' 				=> $this->session->userdata('uid'),
					'p_type' 			=> '1',
					'p_name' 			=> json_encode($content),
				);

				$file_in = $this->m_file->insert($data);
				if ($file_in) {
					$tax = $this->mcl->up_count($cat_id);
					if ($tax) {
						echo json_encode(array('stat' => true));
					} else {
						echo json_encode(array('stat' => false));
					}
					echo json_encode(array('stat' => true));
				} else {
					echo json_encode(array('stat' => false));
				}
				
			}
		}
	}

/**
KOMENTAR
*/
	
	public function asis()
	{
		header('Content-Type: application/json');

		$tid = $this->input->post('pid');
		$ass = $this->input->post('asis');

		if (empty($tid) || empty($ass)) {
			
			echo json_encode(array('stat' => false));

		} else {

			$this->load->model('m_kmn');

			$data = array(
				'TID' => $tid,
				'p_type' => '5',
				'p_name' => $ass,
			);

			$in = $this->m_kmn->asis($data);

			if ($in) {
				echo json_encode(array('stat' => true, 'pid' => $in, 'title' => $ass));
			} else {
				echo json_encode(array('stat' => false));
			}
			

		}
	}

	public function asis_chk()
	{
		$pid = $this->input->post('pid');
		$val = $this->input->post('val');

		$this->load->model('m_file');
		$data = array(
			'p_parent_id' => ($val == 0) ? null : '1',
			'date' => ($val == 0) ? null : date(" Y-m-d H:i:s ")
		);
		$this->m_file->updasis($pid, $data);

		if ($data['p_parent_id']) {
			echo json_encode(array('stat' => false));
		} else {
			echo json_encode(array('stat' => true));
		}
		
	}

	public function asis_up()
	{
		$pid = $this->input->post('pid');
		$ass = $this->input->post('asis');

		$this->load->model('m_file');
		$data = array(
			'p_name' => $ass
		);
		$up = $this->m_file->updasis($pid, $data);
		if ($up) {
			echo json_encode(array('stat' => true, 'pid' => $pid, 'title' => $ass));
		} else {
			echo json_encode(array('stat' => false));
		}
		
	}

	public function asis_cetak($id_mhs)
	{
		header('content-type: text/html');
		$css = "<link href='".base_url()."gudang/css/module/jadwal_cetak.css' rel='stylesheet' type='text/css'>";
		$html = $this->asistensi($id_mhs);
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		// $pdf->WriteHTML($css, 1);
		$pdf->WriteHTML($html);
		$pdf->Output();
	}


	function asistensi($uid)
	{
		// $ses = $this->session->all_userdata();
		// var_dump($ses);

		$this->load->model('m_mhs');
		$data['mhs'] = $this->m_mhs->mhs($uid)->row();
		$data['asis'] = $this->m_mhs->asistensi($uid);

		return $this->load->view('cetak', $data, true);
	}

	public function asis_rm()
	{
		$pid = $this->input->post('pid');

		$this->load->model('m_file');
		$rm = $this->m_file->rmasis($pid);
		if ($rm) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

	public function kmn_data($id)
	{
		// cek session id dosen
		$dosen = true;

		if ($dosen) {
			$dosen = true;
		} else {
			$dosen = false;
		}
		$this->load->model('m_kmn');
		$data['pesan'] = $this->m_kmn->get_msg($id)->result();
		$data['meta'] = array(
			'k_type' => 'Pesan',
			'dosen' => $dosen,
		);
		$this->load->view('komentar/data', $data);
	}

	public function kmn_pengumuman()
	{
		$this->load->model('m_kmn');
		$data['pesan'] = $this->m_kmn->get()->result();
		$data['meta'] = array(
			'k_type' => 'Pengumuman'
		);
		$this->load->view('komentar/data', $data);
		$id_dosen = $this->session->userdata('id_dosen');
		echo "<script>
			$('.pid').val('".$id_dosen."');
			$('.typ').val('2');
		</script>";
	}

	public function kmn_id()
	{
		$data['blk'] = array(
			'pid' => $this->input->post('pid'),
			'cat' => $this->input->post('cat_name'),
			'file' => $this->input->post('file_name'),
		);
		$this->load->model('m_kmn');
		$data['pesan'] = $this->m_kmn->get_file($this->input->post('pid'))->result();
		$data['meta'] = array(
			'k_type' => 'Komentar'
		);
		$this->load->view('komentar/data', $data);
	}

	public function kmn_umum()
	{
		$this->load->model('m_kmn');

		$level = $this->session->userdata('u_level');
		$name = $this->session->userdata('u_nicename');
		if ($level == 1) {
			$sender = $name." (Admin) ";
		} elseif($level == 2) {
			$sender = $name." (Pembimbing) ";
		} else {
			$sender = $name;
		}

		$json = array(
			'level' => $level,
			'sender' => $sender,
			'tanggal' => date(" d-m-Y H:i:s "),
			'wasiat' => $this->input->post('komen'),
		);

		$komen = array(
			'TID' => $this->input->post('pid'),
			'p_type' => $this->input->post('type'),
			'uid' => $this->session->userdata('uid'),
			'p_name' => json_encode($json),
		);
		$in = $this->m_kmn->in_umum($komen);
		if ($in) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

/**
DOWNLLOAD
*/
	function download($id)
	{
		$this->load->model('m_file');
		$this->load->helper('download');
		$query = $this->m_file->getid($id);
		if ($query->num_rows() > 0) {
			$record = $query->row();
			$json = json_decode($record->p_name);
			$url = base_url()."gudang/file/laporan/".$json->file_name_enc;
			$data = file_get_contents($url);
			force_download($json->file_name, $data, TRUE);
			echo json_encode(array('stat' => true));
		}
		else {
			echo json_encode(array('stat' => false));
		}
	}

}

/* End of file bimbingan.php */
/* Location: ./application/modules/bimbingan/controllers/bimbingan.php */