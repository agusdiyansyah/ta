<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B extends CI_Model {

	public function get()
	{
		$this->db->select('nama, id_dosen, judul');
		return $this->db->get('mahasiswa');
	}

}

/* End of file a.php */
/* Location: ./application/modules/a/models/a.php */