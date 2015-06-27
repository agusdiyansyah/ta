<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dos extends CI_Model {

	private $tbl = "dosen";
	function getAll($limit = array()){
		// $this->filter();
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
			$this->db->select('uid');
			$this->db->where('rel_id', $id);
			$this->db->where('u_level', '2');
			$user = $this->db->get('user')->row();

			$this->db->where('rel_id', $id);
			$this->db->where('u_level', '2');
			$this->db->delete('user');

			$this->db->where('id', $user->uid);
			$this->db->delete('meta');
		}
		return $this;
	}

	public function insert($object)
	{
		$this->db->insert('dosen', $object);
		return $this->db->insert_id();
	}

}

/* End of file m_mhs.php */
/* Location: ./application/modules/dosen/models/m_mhs.php */