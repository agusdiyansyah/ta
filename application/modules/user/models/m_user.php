<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function getAll($limit = array()){
		$this->_filter();
		$this->db->select('uid, u_nicename, u_level, u_reg');
		$this->db->order_by('uid', 'desc');
		if($limit == NULL){
			return $this->db->get('user');
		}
		else {
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get('user');
		}
	}

	public function getcount()
	{
		$this->db->select('uid');
		$this->db->where('u_level', '1');
		$c = $this->db->get('user')->num_rows();
		return $c;
	}

	public function insert($data)
	{
		$usr = $this->db->insert('user', $data);

		if ($usr) {
			return true;
		} else {
			return false;
		}	
	}

	public function update($uid, $object)
	{
		$this->db->where('uid', $uid);
		$up = $this->db->update('user', $object);
		if ($up) {
			return true;
		} else {
			return false;
		}
		
	}

	public function delete($id)
	{
		$this->db->where('uid', $id);
		$d = $this->db->delete('user');
		if ($d) {
			return true;
		} else {
			return false;
		}
		
	}

	public function login($name, $pass)
	{
		$this->db->where('u_name', $name);
		$sql = $this->db->get('user');

		if ($sql->num_rows() <= 0) {
			$array = array(
				'login' => false
			);
		} else {
			$user 	= $sql->row();
			$reg 	= ($user->u_reg == 0) ? true : false;
			$pw 	= (!$reg) ? md5($pass) : $pass ;
			if ($pw != $user->u_pass) {
				$array = array(
					'login' => false
				);
			} else {
				$array = array(
					'u_name' 		=> $user->u_name,
					'relasi' 		=> $user->rel_id,
					'uid' 			=> $user->uid,
					'u_nicename' 	=> $user->u_nicename,
					'u_level' 		=> $user->u_level,
					'login' 		=> true,
					'pass_tmp' 		=> $reg,
				);
				if ($array['u_level'] == 3) {
					$this->db->select('id_dosen');
					$this->db->where('id_mhs', $user->rel_id);
					$sql = $this->db->get('mahasiswa')->row();					
					$this->session->set_userdata(array('id_dosen' => $sql->id_dosen));
				}
			}
			
		}

		if (!$array['login']) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username atau password salah !!!</div>');
		}	

		$this->session->set_userdata( $array );		
	}

	public function _filter()
	{
		$find = $this->session->flashdata('find');
		if (!empty($find)) {
			$this->db->like('u_nicename', $find);
		}
	}

	public function profile($uid)
	{
		$id = $uid;
		$this->db->select('u_level');
		$this->db->where('uid', $id);
		$lv = $this->db->get('user')->row();
		if (!empty($id)) {
			if ($lv->u_level == 3) {
				$sql = "
					select judul, u_name, u_pass, u_reg, uid, u_nicename, u_level
					from user, mahasiswa
					where
						uid = $id
					AND rel_id = id_mhs
				";
			} elseif ($lv->u_level == 1 || $lv->u_level == 2) {
				$sql = "
					select u_name, u_pass, u_reg, uid, u_nicename, u_level
					from user
					where
						uid = $id
				";
			}
			return $this->db->query($sql);
		}
	}

}

/* End of file m_user.php */
/* Location: ./application/modules/user/models/m_user.php */