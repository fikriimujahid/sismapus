<?php if(!defined('BASEPATH')) exit('No direct script allowed');

/**************************************
  * Created : April 2014
  * Creator : Fikri Mujahid
  * Email   : itsmefikri@gmail.com
  * CMS ver : CI ver.2.1.2
**************************************/	

class dashboard extends CI_Controller {
	function __contruct() {
		parent::__construct();
	}
	public function index() {
		$this->home();
	}
	
	function home() {
		if($this->session->userdata("level") == '1'){
			$data["main_content"]	= "users/home";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function booking() {
		if($this->session->userdata("level") == '1'){
			$data["main_content"]	= "users/booking";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('dashboard/home');
	}	
}
?>