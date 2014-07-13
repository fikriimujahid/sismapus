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
			$foto = GetValue("foto", "user", array("id" => "where/".$this->session->userdata('id')));
			$fname = GetValue("fname", "user", array("id" => "where/".$this->session->userdata('id')));
			$lname = GetValue("lname", "user", array("id" => "where/".$this->session->userdata('id')));
			$article = GetQuery('*', 'article', 'user_id = '.$this->session->userdata("id").'','id DESC');
			
			$data["foto"]			= $foto;
			$data["name"]			= $fname.' '.$lname;
			$data["article"]		= $article->result_array();
			$data["main_content"]	= "home";
			$this->load->view("main/template", $data);
		} if($this->session->userdata("level") == '5' || !$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}
	
	function regist() {
		$data["main_content"]	= "regist";
		$data["error"]			= "";
		$data["sukses"]			= "";
		$this->load->view("main/template", $data);
	}

	function repass() {
		$data["main_content"]	= "repass";
		$data["error"]			= "";
		$data["sukses"]			= "";
		$this->load->view("main/template", $data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('dashboard/home');
	}

	function profile(){
		if($this->session->userdata("level") == '1' || $this->session->userdata("level") == '5'){
			// Get data user
			$user = GetQuery('*', 'user', 'id = '.$this->session->userdata("id").'');
			$data['data_user'] = $user->row_array();
		
			$data["main_content"]	= "profile";
			$data["sukses"]			= "";
			$this->load->view("main/template", $data);
		} else {
			redirect('dashboard/home');
		}
	}	
}
?>