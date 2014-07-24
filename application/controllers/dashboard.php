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
			
			$pinjam = GetQuery("*", "peminjaman", 'nis = '.$this->session->userdata("nis").'');
			$booking = GetQuery("*", "booking", 'nis = '.$this->session->userdata("nis").'');
			//$user	= GetValue("*", "user", array("name" => "where/".$fname));
			
			//$data['user']			= $user;
			$data['pinjam']			= $pinjam->result_array();
			$data['booking']		= $booking->result_array();
			$data['buku']			= $buku->result_array();
			$data["main_content"]	= "users/home";
			$this->load->view("main/template", $data);
			
		} if($this->session->userdata("level") == '10'){
			$data["main_content"]	= "users/home";
			$this->load->view("main/template", $data);
			
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function peminjaman_buku() {
		if($this->session->userdata("level") == '1' || $this->session->userdata("level") == '10'){
			
			$data['pencarian']		= null;
			$data["main_content"]	= "buku/peminjaman_buku";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function peminjaman_manual() {
		if($this->session->userdata("level") == '1' || $this->session->userdata("level") == '10'){
			
			$data['pencarian']		= null;
			$data["main_content"]	= "buku/peminjaman_buku";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function panduan() {
		if($this->session->userdata("level") == '1'){
			$data["main_content"]	= "users/panduan";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function panduan_laporan_buku() {
		if($this->session->userdata("level") == '10'){
			$data["main_content"]	= "panduan_admin/panduan_laporan_buku";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}	

	function panduan_olah_buku() {
		if($this->session->userdata("level") == '10'){
			$data["main_content"]	= "panduan_admin/panduan_olah_buku";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}
	
	function panduan_olah_peminjaman() {
		if($this->session->userdata("level") == '10'){
			$data["main_content"]	= "panduan_admin/panduan_olah_peminjaman";
			$this->load->view("main/template", $data);
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}
	
	function panduan_olah_user() {
		if($this->session->userdata("level") == '10'){
			$data["main_content"]	= "panduan_admin/panduan_olah_user";
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