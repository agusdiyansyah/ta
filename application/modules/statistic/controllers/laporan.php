<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cat_lap', 'mcl');
		$this->load->module('user');
	}

	public function index()
	{
		$query = $this->mcl->get_cat();
		$result['rec'] = array('nama' => 'Uncategories');
		if ($query->num_rows() > 0) {
			$result['rec']['data'] = $query->result();
		}
		$this->load->view('laporan/st_lap', $result);
	}

	public function insert()
	{
		// $user = $this->user->grant('2');
		// if ($user) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Kategori', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required|xss_clean');

			if ($this->form_validation->run() == false) {
				echo json_encode(array('stat' => false));
			} else {
				$data = array('t_type' => 1 ,'t_name' => $this->input->post('title'), 't_content' => $this->input->post('ket'));

				$insert = $this->mcl->insert($data);

				if ($insert) {
					echo json_encode(array('stat' => true, 'msg' => $data));
				} else {
					
					echo json_encode(array('stat' => false));
				}
			}

		// }
		
	}

	public function update()
	{
		$id = $this->input->post('ac');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Kategori', 'trim|required|xss_clean');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required|xss_clean');

		if ($this->form_validation->run() == false) {
			echo json_encode(array('stat' => false));
		} else {
			$data = array('t_type' => 1 ,'t_name' => $this->input->post('title'), 't_content' => $this->input->post('ket'));

			$update = $this->mcl->update($id, $data);

			if ($update) {
				echo json_encode(array('stat' => true));
			} else {
				echo json_encode(array('stat' => false));
			}
		}
	}

	public function delete()
	{
		$del = $this->mcl->hapus($this->input->post('id'));
		if ($del) {
			echo json_encode(array('stat' => true));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

	public function get()
	{
		$query = $this->mcl->getid($this->input->post('id'));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			echo json_encode(array('stat' => true,'title' => $row->t_name, 'ket' => $row->t_content));
		} else {
			echo json_encode(array('stat' => false));
		}
	}

	public function detil()
	{
		if (empty($this->input->post('id'))) {
			$this->load->view('laporan/detil');
		} else {
			$id = $this->input->post('id');
			$query = $this->mcl->getid($id);
			if ($query->num_rows() > 0) {
				$res = $query->row();
				$data = array(
					'stat' => true,
					'title' => $res->t_name, 
					'ket' => $res->t_content
				);
				echo json_encode($data);
			} else {
				echo json_encode(array('stat' => false));
			}
		}
	}

	public function form()
	{
		$this->load->view('laporan/form');
	}

}

/* End of file laporan.php */
/* Location: ./application/modules/statistic/controllers/laporan.php */