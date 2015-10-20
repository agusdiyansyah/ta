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
					user u,
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
					mahasiswa.judul,
					mahasiswa.id_mhs
				FROM
					mahasiswa,
					dosen,
					user
				WHERE
					mahasiswa.id_dosen = dosen.id_dosen
				AND user .rel_id = mahasiswa.id_mhs
				AND user .uid = $id
			";
		}
		$query = $this->db->query($sql);

		return $query;
	}

	public function src_id($id)
	{
		$sql = "
			select uid, rel_id
			from user
			where 
				rel_id = $id
			and u_level = '3'
		";
		$query = $this->db->query($sql);
		return $query;
	}

	public function mhs($id)
	{
		$this->db->select('nama, nim, judul');
		$this->db->where('id_mhs', $id);
		return $this->db->get('mahasiswa');
	}

	public function asistensi($id_mhs)
	{
		$this->db->select('uid');
		$this->db->where('rel_id', $id_mhs);
		$this->db->where('u_level', '3');
		$uid = $this->db->get('user')->row();
		$sql = "
			select 
				pp.p_name , pp.p_type, t_name, pp.date
			from 
				post p left join post pp on (
					p.pid = pp.TID
					and pp.p_type = '5'	
					and pp.p_parent_id = 1		
				)
				left join taxonomy on (
					pp.TID = taxonomy.TID
				)
			where 
				p.p_type = '1'
			and p.uid = ".$uid->uid."
			order by pp.date
		";
		return $this->db->query($sql)->result();
	}

}

/* End of file m_mhs.php */
/* Location: ./application/modules/bimbingan/models/m_mhs.php */