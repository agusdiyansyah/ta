<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends MX_Controller {

	public function index()
	{
		$this->load->model('widget/cat_lap', 'lap');
		$data['cat'] = $this->lap->get_cat()->result();
		$this->load->view('data', $data);
	}


}

/* End of file bimbingan.php */
/* Location: ./application/modules/bimbingan/controllers/bimbingan.php */