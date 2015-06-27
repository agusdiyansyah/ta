<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistic extends MX_Controller {

	public function index()
	{
		$data['st_cat_lap'] = Modules::run("widget/cat_lap");
		$this->load->view('st_layout', $data);
	}

}

/* End of file statistic.php */
/* Location: ./application/modules/statistic/controllers/statistic.php */