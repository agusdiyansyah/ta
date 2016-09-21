<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A extends MX_Controller {

	public function index()
	{
		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = $_SERVER['HTTP_USER_AGENT']; //bebas sesuai keinginan kamu
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "tls://smtp.gmail.com";
		$config['smtp_port']= "587";
		$config['smtp_timeout']= "10";
		$config['smtp_user']= "tes1890@gmail.com";//isi dengan email kamu
		$config['smtp_pass']= ""; // isi dengan password kamu
		$config['crlf']="\r\n"; 
		$config['newline']="\r\n"; 
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);

		$this->email->to("kreasiin@gmail.com");
		$this->email->from("tes1890@gmail.com");
		$this->email->subject("subject");
		$this->email->message("semoga berhasil");
		if ($this->email->send()) {
			echo $this->email->print_debugger();
		}
		
	}

}

/* End of file a.php */
/* Location: ./application/modules/a/controllers/a.php */
