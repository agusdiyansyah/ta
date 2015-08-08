<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {

	public function get_mhs($id = '', $dos = '')
	{
		// $this->db->from('mahasiswa m, dosen d');
		// $this->db->select('m.nama name, d.nama dosen, m.judul');
		// $this->db->where('m.id_mhs', $id);
		// $this->db->where('m.id_dosen', 'd.id_dosen');
		// return $this->db->get();
		if ($dos != '') {
			$sql = "
				SELECT
					m.nama,
					judul,
					nim,
					m.id_mhs id
				FROM
					USER u,
					mahasiswa m,
					dosen d
				WHERE
					u.uid = $dos
				AND u.rel_id = d.id_dosen
				AND d.id_dosen = m.id_dosen
			";
		} else {
			$sql = "
				SELECT
					mahasiswa.nama name,
					dosen.nama dosen,
					mahasiswa.judul
				FROM
					mahasiswa,
					dosen,
					USER
				WHERE
					mahasiswa.id_dosen = dosen.id_dosen
				AND USER .rel_id = mahasiswa.id_mhs
				AND USER .uid = $id
			";
		}
		$query = $this->db->query($sql);

		return $query;
	}

	public function src_id($id)
	{
		$sql = "
			select uid 
			from user
			where 
				rel_id = $id
			and u_level = '3'
		";
		$query = $this->db->query($sql);
		return $query;
	}

}

/* End of file m_mhs.php */
/* Location: ./application/modules/bimbingan/models/m_mhs.php */