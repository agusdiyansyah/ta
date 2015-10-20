<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistic extends MX_Controller {

	public function index()
	{
		$this->load->view('st_layout');
	}

	public function count()
	{
		$this->load->model('bimbingan/m_kmn');
		$data = array(
			'c_file' 	=> $this->m_kmn->count(1), 
			'c_umum' 	=> $this->m_kmn->count(2), 
			'c_pm' 		=> $this->m_kmn->count(3), 
			'c_komen'	=> $this->m_kmn->count(4), 
		);

		$this->load->view('count/data', $data);
	}

	/*public function cetak()
	{
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML('hello world');
		$pdf->Output();
	}*/

}

/* End of file statistic.php */
/* Location: ./application/modules/statistic/controllers/statistic.php */