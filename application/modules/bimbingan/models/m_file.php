<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_file extends CI_Model {

	public function get($id)
	{
		$select = 't_count, t_name, p.TID, pid, p_name';
		$sql = $this->db->query("
			select ".$select." from post p, taxonomy t
			where 
				p.p_type = '1'
			and p.TID = t.TID
			and p.uid = ".$id."
		");
		return $sql;
	}

	public function getfile()
	{
		$this->db->where('p_type', '1');
		$this->db->where('uid', $this->session->userdata('uid'));
		return $this->db->get('post');
	}

	public function gettax()
	{
		$this->db->select('TID tid, t_name');
		$this->db->where('t_type', '1');
		return $this->db->get('taxonomy');
	}

	public function getById($id)
	{
		$select = 't_count, t_name, p.TID, pid, p_name';
		$sql = $this->db->query("
			select ".$select." from post p, taxonomy t
			where 
				p.p_type = '1'
			and p.TID = $id
			and p.TID = t.TID
		");
		return $sql;
	}

	public function insert($object)
	{
		$in = $this->db->insert('post', $object);
		if ($in) {
			return true;
		} else {
			return false;
		}
		
	}

}

/* End of file m_file.php */
/* Location: ./application/modules/bimbingan/models/m_file.php */