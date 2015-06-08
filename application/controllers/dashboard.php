<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function index()
	{
		$this->load->view('layouts/admin');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */