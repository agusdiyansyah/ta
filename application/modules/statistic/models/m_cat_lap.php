<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cat_lap extends CI_Model {

	public function get_cat()
	{
		$this->db->order_by('TID', 'asc');
		$this->db->select('t_name, TID');
		$this->db->where('t_type', '1');
		$this->db->where('TID <>', '1');
		return $this->db->get('taxonomy');
	}	

	public function getid($id)
	{
		$this->db->where('TID', $id);
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

	public function up_count($id)
	{
		// $this->db->where('TID', $id);
		// $up = $this->db->update('taxonomy', $object);
		$up = $this->db->query("
			update taxonomy
			set 
				`t_count` = `t_count`+1
			where
				TID = ".$id."
		");
		if ($up) {
			return true;
		} else {
			return false;
		}
		
	}

	public function update($id, $object)
	{
		$this->db->where('TID', $id);
		$up = $this->db->update('taxonomy', $object);
		if ($up) {
			return true;
		} else {
			return false;
		}
	}

	public function hapus($id)
	{
		$this->db->where('TID', $id);
		
		$src = $this->db->get('post')->num_rows();
		if ($src > 0) {
			$up = $this->db->query("
				update post
				set TID = 1
				where 
					TID = $id
				and p_type = '1'
			");
			if ($up) {
				$this->db->where('TID', $id);
				$del = $this->db->delete('taxonomy');
				if ($del) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			$this->db->where('TID', $id);
			$del = $this->db->delete('taxonomy');
			if ($del) {
				return true;
			} else {
				return false;
			}
		}
	}

}

/* End of file m_cat_lap.php */
/* Location: ./application/modules/statistic/models/m_cat_lap.php */