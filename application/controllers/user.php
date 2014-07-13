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
}
?>