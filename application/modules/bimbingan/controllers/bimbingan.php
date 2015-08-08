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
		$this->user->grant('2 3');
	}
	
	public function index()
	{

		if ($this->dosen) {
			$this->load->model('m_mhs');

			$data['mhs'] = $this->m_mhs->get_mhs('',$this->uid)->result();

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

		$data['meta'] = array(
			'id' => $id, 
			'dosen' => $this->dosen,
		);

		$this->load->view('layout', $data);
	}

	public function cat($id)
	{
		$this->load->model('m_file');

		$file = $this->m_file->getfile();
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
					't_count' => empty($fl[$tax->tid]) ? '0' : count($fl[$tax->tid]),
					't_data' => empty($fl[$tax->tid]) ? '' : $fl[$tax->tid],
				);
				array_push($data['cat']['data'] , $d);
			}
		}

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

	public function upl_proses($cat_id)
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_file');
		$this->load->model('statistic/m_cat_lap', 'mcl');

		$dir 						= 'gudang/file/laporan/';
		$config['upload_path'] 		= $dir ;
		$config['allowed_types'] 	= 'jpg|jpeg|gif|png';
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
	public function kmn_data()
	{
		// cek session id dosen
		$dosen = true;

		if ($dosen) {
			$dosen = true;
		} else {
			$dosen = false;
		}
		$data['meta'] = array(
			'k_type' => 'Pengumuman',
			'dosen' => $dosen,
		);
		$this->load->view('komentar/data', $data);
	}

	public function kmn_id($id, $cat_name, $file_name)
	{
		$data['blk'] = array(
			'pid' => $id,
			'cat' => $cat_name,
			'file' => $file_name,
		);
		$data['meta'] = array(
			'k_type' => 'Komentar'
		);
		$this->load->view('komentar/data', $data);
	}

}

/* End of file bimbingan.php */
/* Location: ./application/modules/bimbingan/controllers/bimbingan.php */