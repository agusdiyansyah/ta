<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function getAll($limit = array()){
		$this->_filter();
		$this->db->select('uid, u_nicename, u_level');
		$this->db->order_by('uid', 'desc');
		if($limit == NULL){
			return $this->db->get('user');
		}
		else {
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get('user');
		}
	}

	public function insert($data)
	{
		extract($data);
		$user = array(
			'rel_id'		=> $rel_id,
			'u_name' 		=> $u_name, 
			'u_pass' 		=> '0', 
			'u_nicename' 	=> $u_nicename, 
			'u_level'		=> $u_level, 
		);
		$usr = $this->db->insert('user', $user);
		$usr_id = $this->db->insert_id();

		/*
		meta key
		1 = User Log
		2 = User password
		*/
		$meta = array(
			array(
				'id' 			=> $usr_id, 
				'meta_key' 		=> 1,
				'meta_value' 	=> '0',
				'meta_group' 	=> 1,
			), 
			array(
				'id' 			=> $usr_id, 
				'meta_key' 		=> 2,
				'meta_value' 	=> $u_pass,
				'meta_group' 	=> 1,
			)
		);
		$mta = $this->db->insert_batch('meta', $meta);

		if ($usr && $mta) {
			return true;
		} else {
			return false;
		}	
	}

	public function delete($id)
	{
		
	}

	public function login($name, $pass)
	{
		$this->db->where('u_name', $name);
		$query = $this->db->get('user');
		// cek bahwa user ada
		if ($query->num_rows() > 0) {
			$user = $query->row();
			// cek password masih di meta atau gx
			if ($user->u_pass == '0') {
				// kalo password mash di meta
				$sql = "
					UPDATE meta
					SET meta_value = `meta_value` + 1
					WHERE
						id = ". $user->uid ."
					AND meta_key = 0
					AND meta_group = 1
				";
				$this->db->query($sql);

				$this->db->where('id', $user->uid);
				$this->db->where('meta_key', "1");
				$this->db->where('meta_group', "1");
				$meta = $this->db->get('meta')->row();
				if ($meta->meta_value == $pass) {
					$array = array(
						'u_name' => $user->u_name,
						'relasi' => $user->rel_id,
						'uid' => $user->uid,
						'u_nicename' => $user->u_nicename,
						'u_level' => $user->u_level,
						'login' => true,
						'pass_tmp' => true
					);
				} else {
					$array = array(
						'login' => false
					);
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah </div>');
				}
			} elseif ($user->u_pass == md5($pass)) {
				// kalo password udah di user
				$sql = "
					UPDATE meta
					SET meta_value = `meta_value` + 1
					WHERE
						id = ". $user->uid ."
					AND meta_key = 0
					AND meta_group = 1
				";
				$this->db->query($sql);
				
				$array = array(
					'u_name' => $user->u_name,
					'relasi' => $user->rel_id,
					'uid' => $user->uid,
					'u_nicename' => $user->u_nicename,
					'u_level' => $user->u_level,
					'login' => true,
					'pass_tmp' => false
				);
			} else {
				$array = array(
					'login' => false
				);
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah loh</div>');
			}
		} else {
			$array = array(
				'login' => false
			);

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Anda belum terdaftar</div>');
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

}

/* End of file m_user.php */
/* Location: ./application/modules/user/models/m_user.php */