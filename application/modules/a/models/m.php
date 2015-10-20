<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Model {

	public function gen()
	{
		for ($i=1; $i <= 208 ; $i++) { 
			$this->db->where('meta_id', $i);
			$this->db->delete('meta');
		}
	}

}

/* End of file m.php */
/* Location: ./application/modules/a/models/m.php */