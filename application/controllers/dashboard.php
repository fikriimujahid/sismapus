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
		if($this->session->userdata("level") == '1' || $this->session->userdata("level") == '10'){
			$this->load->library('pagination');
			$config['base_url'] = base_url()."index.php/dashboard/home/";
			$config['total_rows'] = $this->db->count_all('buku');
			$config['per_page'] = '3';
			$config['next_link'] = 'Newer Posts >>';
			$config['prev_link'] = '&lt;&lt; Previous Posts';
			$config['num_links'] = 3;
			$this->pagination->initialize($config);
			
			$offset = $this->uri->segment(3);
			
			$this->db->order_by("id","desc");
			$buku 	= $this->db->get('buku',$config['per_page'],$offset);
			
			$data['buku']			= $buku->result_array();
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

	function search() {
		if($this->session->userdata("level") == '1'){
			$data["main_content"]	= "users/search";
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