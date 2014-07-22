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
		$this->form_validation->set_rules('nis','Nomor Induk Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password','Password', 'trim|required|min_length[5]|max_length[50]|xss_clean');
		
		$nis	  = $this->input->post('nis');
		$password = md5($this->input->post('password'));
		
		$result = $this->model_user->login_validate($nis, $password);
		
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
	Olah User Module
*************************************/

	function tambah_user($type = null) {
		if($this->session->userdata("level") == '10'){
			if($type == null) {
				$data["main_content"]	= "users/tambah_user";
				$this->load->view("main/template", $data);
			} if ($type == 'ins') {
				$this->load->model('model_user');
				$this->form_validation->set_rules('nis','Nomor Induk Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('nama','Nama Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('alamat','Alamat Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('password','Password', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				
				if($this->form_validation->run() == FALSE) {
					$data["main_content"]	= "users/tambah_user";
					$this->load->view('main/template',$data);
				} else {
					$post 		= $this->input->post();
					$nis 		= $post['nis'];
					$password	= md5($post['password']);
					$level		= 1;
					$name		= $post['nama'];
					$jk			= $post['kelamin'];
					$alamat		= $post['alamat'];
					
					Insert("users", array(
						"id" 	   	=> NULL,
						"nis"		=> $nis,
						"password"	=> $password,
						"level"		=> $level,
						"name"		=> $name,
						"jk"		=> $jk,
						"alamat"	=> $alamat
						));
					
					$this->session->set_flashdata('flash_message','User Berhasil ditambah');
					redirect(base_url()."index.php/user/tambah_user");
				}			
			}
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function manage_user($type = null) {
		if($this->session->userdata("level") == '10'){
			if($type == null) {
				$data['pencarian']		= null;
				$data["main_content"]	= "users/manage_user";
				$this->load->view("main/template", $data);
			} if ($type == 'src') {
				$this->load->model('model_user');
				$this->form_validation->set_rules('nis','Nomor Induk Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');

				if($this->form_validation->run() == FALSE) {
					$data['pencarian']		= null;
					$data["main_content"]	= "users/manage_user";
					$this->load->view('main/template',$data);
				} else {
					$nis = $this->input->post('nis');
					$data_user = GetQuery('*', 'users', "nis = '".$nis."'");
					$data['pencarian']		= $data_user->row_array();
					$data["main_content"]	= "users/manage_user";
					$this->load->view('main/template',$data);
				}			
			} if ($type == 'ins') {
				$this->load->model('model_user');
				$this->form_validation->set_rules('nis','Nomor Induk Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('nama','Nama Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('alamat','Alamat Siswa', 'trim|required|min_length[5]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('password','Password', 'trim|required|min_length[5]|max_length[50]|xss_clean');				
				
				if($this->form_validation->run() == FALSE) {
					$data['pencarian']		= null;
					$data["main_content"]	= "users/manage_user";
					$this->load->view('main/template',$data);
				} else {
					$post 		= $this->input->post();
					$id			= $post['id'];
					$nis 		= $post['nis'];
					$password	= md5($post['password']);
					$level		= $post['level'];
					$name		= $post['nama'];
					$jk			= $post['kelamin'];
					$alamat		= $post['alamat'];
					
					Update("users", array(
						"nis"		=> $nis,
						"password"	=> $password,
						"level"		=> $level,
						"name"		=> $name,
						"jk"		=> $jk,
						"alamat"	=> $alamat
						), array('id' => 'where/'.$id));
					
					$this->session->set_flashdata('flash_message','User Berhasil diubah');
					redirect(base_url()."index.php/user/manage_user");
				}
			} if(!$this->session->userdata("level")){		
				$data["main_content"]	= "users/login";
				$this->load->view("main/template", $data);
			}
		}
	}	
}
?>