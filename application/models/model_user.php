<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class model_user extends CI_Model {
	
	private $email_code;
	
/*************************************
	Registration Module
*************************************/
	
	public function insert_user(){
		$post = $this->input->post();
		
		$fname 		= $post['fname'];
		$lname 		= $post['lname'];
		$email 		= $post['email'];
		$password	= md5($post['password']);
		$sex		= $post['sex'];
		
		$data_user = array(
		"id" 		=> NULL,
		"fname"		=> $fname,
		"lname"		=> $lname,
		"email"		=> $email,
		"password" 	=> $password,
		"sex"		=> $sex,
		"level"		=> "1",
		"activated"	=> "0"
		);
		$this->db->insert('user',$data_user);
		
		if ($this->db->affected_rows() === 1) {
			$this->set_session($fname, $email);
			$this->send_validation_email();
			return $fname;
		} else {
			$this->load->library('email');
			$this->email->form($this->config->item('bot_email'), 'Freight Forum Admin');
			$this->email->to($this->config->item('admin_email'));
			$this->email->subject('Problem inserting user into database');
			
			if (isset($email)){
				$this->email->message('Unable to register and insert user with the email if '.$email.' to the database.');
			} else {
				$this->email->message('Unable to register and insert user to the database');
			}
			
			$this->email->send();
			return false;
		}
	}
	
	private function set_session($fname, $email){
		$sql = "SELECT id, reg_time FROM user WHERE email ='".$email."' LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		
		$sess_data = array(
			'id'		=> $row->id,
			'fname'		=> $fname,
			'email'		=> $email,
			'logged_in'	=> 0
		);
		
		$this->email_code = md5((string)$row->reg_time);
		$this->session->set_userdata($sess_data);
	}
	
	private function send_validation_email(){
		$this->load->library('email');
		$fname = $this->session->userdata('fname');
		$email = $this->session->userdata('email');
		$email_code = $this->email_code;
		
		$this->email->set_mailtype('html');
		$this->email->from($this->config->item('bot_email'), 'PTest01');
		$this->email->to($email);
		$this->email->subject('Please activate your account at PTest01');
	
		$message = '<p>Dear '.$this->session->userdata('fname'). ',</p>';
		$message .= '<p>Thanks for registering on PTest01! Please <strong><a href="'.base_url().'index.php/user/validate_email/'.$fname.'/'.$email_code.'">
		click here</a></strong> to activate your account. After you have activated your account, you will be able to log into PTest01</p>';
		$message .= '<p>Thank you!</p>';
		$message .= '<p>The Team at PTest01</p>';
		$message .= '</body></html>';
		
		$this->email->message($message);
		$this->email->send();
	}

	public function validate_email($fname, $email_code) {
		$sql 	= "SELECT email, reg_time, fname FROM user WHERE fname = '{$fname}' LIMIT 1";
		$result	= $this->db->query($sql);
		$row	= $result->row();
		
		if ($result->num_rows() === 1 && $row->fname) {
			if (md5((string)$row->reg_time) === $email_code)
			$result = $this->activate_account($fname);
			if ($result === true){
				return true;
			} else {
				echo 'There was an error when activating your account. Please contact the admin at '.$this->config->item('admin_email');
				return false;
			}
		} else {
			echo 'There was an error when activating your account. Please contact the admin at '.$this->config->item('admin_email');
		}
	}
	
	private function activate_account($fname) {
		$sql = "UPDATE user SET activated = 1 WHERE fname = '".$fname."' LIMIT 1";
		$this->db->query($sql);
		if ($this->db->affected_rows() === 1) {
			return true;
		} else {
			echo 'Error when activating your account in the database, please contact admin at '.$this->config->item('admin_email');
			return false;
		}
	}
	
	public function email_exists($email) {
		$sql	= "SELECT fname, email FROM user WHERE email = '{$email}'";
		$result	= $this->db->query($sql);
		$row	= $result->row();
		
		return ($result->num_rows() === 1 && $row->email) ? $row->fname : false;
	}
	
/*************************************
	Reset Password Module
*************************************/

	public function reset_password($email, $result) {
		$this->load->library('email');
		$fname = $result;
		$email = $email;

		$sql = "SELECT id, reg_time FROM user WHERE email ='".$email."' LIMIT 1";
		$result = $this->db->query($sql);
		$row = $result->row();		
		$email_code = md5((string)$row->reg_time);
		
		$this->email->set_mailtype('html');
		$this->email->from($this->config->item('bot_email'), 'PTest01');
		$this->email->to($email);
		$this->email->subject('Please reset your password at PTest01');
	
		$message = '<p>Dear '.$fname.',</p>';
		$message .= 'We want to help you reset your password! Please <strong><a href="'.base_url().'index.php/user/reset_password_form/'.$fname.'/'.$email_code.'">
		click here</a></strong> to reset your password.</p>';
		$message .= '<p>Thank you!</p>';
		$message .= '<p>The Team at PTest01</p>';
		$message .= '</body></html>';
		
		$this->email->message($message);
		$this->email->send();
	}
	
	public function verify_reset_password_code($fname, $email_code){
		$sql	= "SELECT fname, email, reg_time FROM user WHERE fname ='{$fname}' LIMIT 1";
		$result	= $this->db->query($sql);
		$row	= $result->row();
		
		if($result->num_rows() === 1){
			return ($email_code == md5((string)$row->reg_time)) ? true : false;
		} else {
			return false;
		}
	}
	
	public function update_password(){
		$email 		= $this->input->post('email');
		$password	= md5($this->input->post('password'));
		
		$sql		= "UPDATE user SET password = '{$password}' WHERE email = '{$email}' LIMIT 1";
		$this->db->query($sql);
		
		if ($this->db->affected_rows() === 1){
			return true;
		} else {
			return false;
		}
	}

/*************************************
	Login Module
*************************************/
	
	public function login_validate($email, $password) {

		$sql = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";
				
		$result = $this->db->query($sql);
		$row = $result->row();
		
		if ($result->num_rows() === 1) {
			if ($row->activated) {
				if ($row->password === $password) {
					$session_data = array (
						'id'		=> $row->id,
						'fname'		=> $row->fname,
						'level'		=> $row->level,
						'logged_in'	=> 1
					);
					$this->session->set_userdata($session_data);
					Update("user", array("last_login" => date("Y-m-d H:i:s")), array("email" => "where/".$email));
					return 'logged_in';			
				} else {
					return 'incorrect_password';
				}
			} else { return 'not_activated'; }
		} else { return 'not_found'; }
	}
	
/*************************************
	Update Profile Module
*************************************/

	function simpan_foto($path, $id) {
		$this->db->query("UPDATE user SET `foto` = '".mysql_real_escape_string($path)."' WHERE `id` = " . $id ."");
		return TRUE;
	}	
}
