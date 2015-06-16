<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_lap extends CI_Model {

/**
KATEGORI LAPORAN
*/

	public function get_cat()
	{
		$this->db->order_by('TID', 'asc');
		$this->db->select('t_name, TID, t_slug');
		$this->db->where('t_type', '1');
		return $this->db->get('taxonomy');
	}

	public function insert($data)
	{
		$in = $this->db->insert('taxonomy', $data);
		if ($in) {
			return true;
		} else {
			return false;
		}

	}

	public function hapus($id)
	{
		$this->db->where('TID', $id);
		$del = $this->db->delete('taxonomy');
		if ($del) {
			return true;
		} else {
			return false;
		}
	}

}

/* End of file cat_lap.php */
/* Location: ./application/modules/widget/models/cat_lap.php */