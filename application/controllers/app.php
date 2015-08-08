<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MX_Controller {


	public function index()
	{
		if ($this->session->userdata('login')) {
			$this->load->view('layouts/admin');
		} else {
			$this->login();
		}
	}
	public function login()
	{
		$this->load->view('layouts/login');
	}

	public function login_proses()
	{
		
		$this->load->model('user/m_user');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('u_name', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('u_pass', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run($this) == false) {
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Salah satu field kosong</div>');
			redirect('','refresh');
		} else {
			$name = $this->input->post('u_name');
			$pass = $this->input->post('u_pass');
			$login = $this->m_user->login($name, $pass);
			redirect('','refresh');			
		}
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */