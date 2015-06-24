<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

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

		$meta = array(
			array(
				'id' 			=> $usr_id, 
				'meta_key' 		=> 'U_LOG',
				'meta_value' 	=> '0',
				'meta_group' 	=> 1,
			), 
			array(
				'id' 			=> $usr_id, 
				'meta_key' 		=> 'U_PASS',
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

}

/* End of file m_user.php */
/* Location: ./application/modules/user/models/m_user.php */