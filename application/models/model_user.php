<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class model_user extends CI_Model {

/*************************************
	Login Module
*************************************/
	
	public function login_validate($nis, $password) {

		$sql = "SELECT * FROM users WHERE nis = '{$nis}' LIMIT 1";
				
		$result = $this->db->query($sql);
		$row = $result->row();
		
		if ($result->num_rows() === 1) {
			if ($row->password === $password) {
				$session_data = array (
					'id'		=> $row->id,
					'name'		=> $row->name,
					'level'		=> $row->level,
					'logged_in'	=> 1
				);
				$this->session->set_userdata($session_data);
				return 'logged_in';
			} else {
				return 'incorrect_password';
			}
		} else { return 'not_found'; }
	}
}
