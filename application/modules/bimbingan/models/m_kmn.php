<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kmn extends CI_Model {

	public function get()
	{
		$level = $this->session->userdata('u_level');
		if ($level == 2) {
			$id_dosen = $this->session->userdata('relasi');
		} else {
			$this->db->select('id_dosen');
			$this->db->where('id_mhs', $this->session->userdata('relasi'));
			$sql = $this->db->get('mahasiswa')->row();
			$id_dosen = $sql->id_dosen;
		}
		$this->db->select('p_name, TID');
		$this->db->where('p_type', '2');
		$this->db->where('TID', $id_dosen);
		$this->db->order_by('pid', 'desc');
		return $this->db->get('post');
	}

	public function in_umum($obj)
	{
		$in = $this->db->insert('post', $obj);
		if ($in) {
			return true;
		} else {
			return false;
		}
	}

	public function get_pengumuman()
	{
		$this->db->select('p_name');
		$this->db->where('TID', 0);
		$this->db->where('p_type', '2');
		$this->db->order_by('pid', 'desc');
		return $this->db->get('post');
	}

	public function get_msg($rel)
	{
		$this->db->select('p_name');
		$this->db->where('p_type', '3');
		$this->db->where('TID', $rel);
		$this->db->order_by('pid', 'desc');
		return $this->db->get('post');
	}
	
	public function get_file($parent)
	{
		$this->db->select('p_name');
		$this->db->where('p_type', '4');
		$this->db->where('TID', $parent);
		$this->db->order_by('pid', 'desc');
		return $this->db->get('post');
	}

	public function count($type)
	{
		$this->db->select('pid, p_type');
		$this->db->where('p_type', ''.$type.'');
		$sql = $this->db->get('post');
		// var_dump($sql->result());
		return $sql->num_rows();
	}

	public function asis($data)
	{
		$in = $this->db->insert('post', $data);
		if ($in) {
			return $this->db->insert_id();
		} else {
			return false;
		}
		
	}

	// public function _filter($type)
	// {
	// 	$level = $this->session->userdata('u_level');
	// 	$rel_id = $this->session->userdata('relasi');
	// 	// mahasiswa
	// 	if ($level == 3) {
	// 		$sql = "
	// 			SELECT
	// 				u.uid
	// 			FROM
	// 				mahasiswa m,
	// 				user u
	// 			WHERE
	// 				m.id_dosen = $rel_id
	// 			and u.rel_id = m.id_mhs
	// 		";
	// 		$sql = $this->db->query($sql);
	// 		if ($type == 1) {
	// 			$uid = array();
	// 			foreach ($sql->result() as $data) {
	// 				$uid = array_push($uid, $data->uid)
	// 			}
	// 		}
	// 	}
	// }

}

/* End of file m_kmn.php */
/* Location: ./application/modules/bimbingan/models/m_kmn.php */