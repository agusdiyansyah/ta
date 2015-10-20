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

	public function getasis($pid)
	{
		$this->db->select('p_name ass_name, pid ass_pid, p_parent_id ch');
		$this->db->where('p_type', '5');
		$this->db->where('TID', $pid);
		return $this->db->get('post')->result();
	}

	public function updasis($id, $data)
	{
		$this->db->where('pid', $id);
		$up = $this->db->update('post', $data);
		if ($up) {
			return true;
		} else {
			return false;
		}
		
	}

	public function rmasis($id)
	{
		$this->db->where('pid', $id);
		$rm = $this->db->delete('post');

		if ($rm) {
			$this->db->where('p_type', '4');
			$this->db->where('TID', $id);
			$this->db->delete('post');
			return true;
		} else {
			return false;
		}
	}

	public function getfile($id)
	{
		$this->db->where('p_type', '1');
		$this->db->where('uid', $id);
		return $this->db->get('post');
	}

	public function delete($pid)
	{
		$this->db->select('p_name');
		$this->db->where('pid', $pid);
		$data = $this->db->get('post')->row();
		$json = json_decode($data->p_name);
		unlink('gudang/file/laporan/'.$json->file_name_enc);

		$this->db->where('pid', $pid);
		$file = $this->db->delete('post');

		$this->db->where('TID', $pid);
		$this->db->where('p_type', '4');
		$komen = $this->db->delete('post');
		if ($komen && $file) {
			return true;
		} else {
			return false;
		}
		
	}

	public function update($id, $object)
	{
		$this->db->where('pid', $id);
		$up = $this->db->update('post', $object);
		if ($up) {
			return true;
		} else {
			return false;
		}
	}

	public function getid($id)
	{
		$this->db->select('p_name');
		$this->db->where('pid', $id);
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