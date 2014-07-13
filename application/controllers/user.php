<?php if(!defined('BASEPATH')) exit('No direct script allowed');

/*************************************
  * Created : April 2014
  * Creator : Fikri Mujahid
  * Email   : itsmefikri@gmail.com
  * CMS ver : CI ver.2.1.2
*************************************/	

class user extends CI_Controller {
	function __contruct() {
		parent::__construct();
	}
	public function index() {
		redirect(base_url()."index.php/dashboard");
	}
	
/*************************************
	Login Module
*************************************/

	function login_validation(){
		$this->load->model('model_user');
		$this->form_validation->set_rules('nis','Nomor Induk Siswa', 'trim|required|min_length[6]|max_length[50]|valid_email|xss_clean');
		$this->form_validation->set_rules('password','Password', 'trim|required|min_length[5]|max_length[50]|xss_clean');
		
		$email	  = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		$result = $this->model_user->login_validate($email, $password);
		
		if($this->form_validation->run() == FALSE) {
			$data["main_content"]	= "users/login";
			$this->load->view('main/template',$data);
		} else {
			switch ($result) {
				case 'logged_in' :
					$this->session->set_flashdata('flash_message','Login Berhasil');
					redirect('dashboard/home');
					break;
				case 'incorrect_password' :
					$this->session->set_flashdata('flash_message','Email atau Password Salah');
					redirect('dashboard/home');
					break;
				case 'not_activated' :
					$this->session->set_flashdata('flash_message','Account belum aktivasi');
					redirect('dashboard/home');
					break;
				case 'not_found' :
					$this->session->set_flashdata('flash_message','Email tidak terdaftar');
					redirect('dashboard/home');
					break;	
			}
		}
	}
	
/*************************************
	Update Profile Module
*************************************/

	function update_user(){
		if($this->session->userdata("level") == '1' || $this->session->userdata("level") == '5'){
			$this->form_validation->set_rules('fname','First Name', 'trim|required|min_length[3]|max_length[15]|alpha|xss_clean');
			$this->form_validation->set_rules('lname','Last Name', 'trim|required|min_length[3]|max_length[15]|xss_clean');
			$this->form_validation->set_rules('email','Email', 'trim|required|min_length[6]|max_length[50]|valid_email|xss_clean');
			
			if($this->form_validation->run() == FALSE){
				$user = GetQuery('*', 'user', 'id = '.$this->session->userdata("id").'');
				$data['data_user'] = $user->row_array();			
			
				$data["main_content"]	= "profile";
				$data["sukses"]			= "";
				$this->load->view("main/template", $data);
			} else {
				$post = $this->input->post();
				
				$fname 	= $post['fname'];
				$lname 	= $post['lname'];
				$email 	= $post['email'];
				
				Update("user", array(
					"fname" => $fname,
					"lname" => $lname,
					"email" => $email
					), array("id" => "where/".$this->session->userdata("id")));
				
				$user = GetQuery('*', 'user', 'id = '.$this->session->userdata("id").'');
				$data['data_user'] = $user->row_array();			
			
				$data["main_content"]	= "profile";
				$data["sukses"]			= "Update Profile sukses";
				$this->load->view("main/template", $data);
			}
		} else {
			redirect('dashboard/home');
		}
	}

	function upload_foto() {
		if($this->session->userdata("level") == '1' || $this->session->userdata("level") == '5'){
			$this->load->model('model_user');
			$allowed = array('jpg', 'jpeg', 'png');
			
			$file_name 	= $_FILES['foto']['name'];
			$file_extn	= strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$file_temp	= $_FILES['foto']['tmp_name'];
			
			$id			= $this->session->userdata('id');
			$path 		= 'media/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
			move_uploaded_file($file_temp, $path);
			$result 	= $this->model_user->simpan_foto($path, $id);
			
			if ($result) {
				$user = GetQuery('*', 'user', 'id = '.$this->session->userdata("id").'');
				$data['data_user'] = $user->row_array();			
			
				$data["main_content"]	= "profile";
				$data["sukses"]			= "Upload Foto Berhasil";
				$this->load->view("main/template", $data);
			}
		} else {
			redirect('dashboard/home');
		}
	}	
}
?>