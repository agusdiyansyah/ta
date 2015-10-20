<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dos extends CI_Model {

	private $tbl = "dosen";
	function getAll($limit = array()){
		$this->_filter();
		$this->db->select('id_dosen, nama');
		$this->db->order_by('id_dosen', 'desc');
		if($limit == NULL){
			return $this->db->get($this->tbl);
		}
		else {
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get($this->tbl);
		}
	}

	public function getById($id)
	{
		$this->db->where('id_dosen', $id);
		return $this->db->get('dosen');
	}

	public function update($data, $id)
	{
		$this->db->where('id_dosen', $id);
		$this->db->update('dosen', $data);
		return $this;
	}

	public function delete($id)
	{
		$this->db->where('id_dosen', $id);
		$dos = $this->db->delete('dosen');
		if ( $dos ) {
			$this->db->where('rel_id', $id);
			$this->db->where('u_level', '2');
			$this->db->delete('user');
		}
		return $this;
	}

	public function insert($object)
	{
		$this->db->insert('dosen', $object);
		return $this->db->insert_id();
	}

	public function _filter()
	{
		$cari = $this->session->flashdata('key');
		if (!empty($cari)) {
			$this->db->like('nama', $cari);
			$this->db->or_like('nip', $cari);
		}
	}

}

/* End of file m_mhs.php */
/* Location: ./application/modules/dosen/models/m_mhs.php */