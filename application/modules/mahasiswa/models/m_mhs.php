<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {

	private $tbl = "mahasiswa";

	function getAll($limit = array()){
		// $this->filter();
		$this->db->select('id_mhs, id_dosen, nama m_nama, judul');
		$this->db->order_by('id_mhs', 'desc');
		if($limit == NULL){
			return $this->db->get($this->tbl);
		}
		else {
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get($this->tbl);
		}
	}

	public function getDosen()
	{
		$this->db->select('nama, id_dosen');
		return $this->db->get('dosen');
	}

	public function getById($id)
	{
		$this->db->where('id_mhs', $id);
		return $this->db->get('mahasiswa');
	}

	public function update($data, $id)
	{
		$this->db->where('id_mhs', $id);
		$this->db->update('mahasiswa', $data);
		return $this;
	}

	public function delete($id)
	{
		$this->db->where('id_mhs', $id);
		$this->db->delete('mahasiswa');
		return $this;
	}

	public function insert($object)
	{
		$this->db->insert('mahasiswa', $object);
		return $this;
	}

}

/* End of file m_mhs.php */
/* Location: ./application/modules/mahasiswa/models/m_mhs.php */