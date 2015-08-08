<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

	private $tbl = "mahasiswa";

	function getAll(){
		// $this->filter();

		$this->db->select('id_mhs, nim, mahasiswa.nama m_nama, dosen.nama d_nama, judul, mahasiswa.id_dosen');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen');
		$this->db->order_by('id_mhs', 'desc');

		return $this->db->get($this->tbl);
	}

	public function penguji($object, $ac)
	{
		if ($ac == 1) {
			$ls = $this->db->insert('meta', $object);
		} else {
			$this->db->where('id', '0');
			$this->db->where('meta_key', '1');
			$ls = $this->db->update('meta', $object);
		}
		if ($ls) {
			return true;
		} else {
			return false;
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

	public function query($sql)
	{
		return $this->db->query($sql);
	}

	public function set_jadwal($object)
	{
		$sql = $this->cek_jadwal(0);
		if ($sql->num_rows() > 0) {
			$this->db->where('id', '0');
			$this->db->where('meta_key', '0');
			$set = $this->db->update('meta', $object);
		} else {
			$set = $this->db->insert('meta', $object);
		}
		if ($set) {
			return true;
		} else {
			return false;
		}
	}

	public function get_set()
	{
		$this->db->where('id', '0');
		return $this->db->get('meta');
	}

	public function cek_jadwal($key = 1)
	{
		$this->db->where('id', '0');
		$this->db->where('meta_key', $key);
		return $this->db->get('meta');
	}

}

/* End of file m_mhs.php */
/* Location: ./application/modules/mahasiswa/models/m_mhs.php */