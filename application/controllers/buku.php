<?php if(!defined('BASEPATH')) exit('No direct script allowed');

/*************************************
  * Created : April 2014
  * Creator : Fikri Mujahid
  * Email   : itsmefikri@gmail.com
  * CMS ver : CI ver.2.1.2
*************************************/	

class buku extends CI_Controller {
	function __contruct() {
		parent::__construct();
	}
	public function index() {
		redirect(base_url()."index.php/dashboard");
	}
	
/*************************************
	Cari Buku
*************************************/

	public function cari_buku(){
		$this->form_validation->set_rules('judul','Keyword Judul Buku', 'trim|required|min_length[3]|max_length[150]|xss_clean');
		$buku = GetManyValue("*", "buku", array("judul"  => "like/".$this->input->post('judul')));
		
		$data['pencarian']		= $buku->result_array();
		$data["main_content"]	= "buku/peminjaman_buku";
		$this->load->view("main/template", $data);
	}
	
	public function pinjam_buku($id){
		$id_buku 	= $id;
		$nis	 	= $this->session->userdata('nis');
		$tgl_balik 	= date("Y-m-d",strtotime("+1 week"));

		Insert("booking", array(
			"id" 	   	=> NULL,
			"nis"		=> $nis,
			"id_buku"	=> $id_buku,
			"tgl_balik"	=> $tgl_balik
			));
		
		$this->session->set_flashdata('flash_message','Booking buku berhasil');
		
		$stock = GetQuery("stock", "buku", 'id = '.$id_buku.'')->row_array();
		if ($stock['stock'] == 0) {
			Update("booking", array(
				"booking"	=> 0
				), array(
					"id_buku" => "where/".$id_buku,
					"booking" => 1
				));	
		} else if($stock['stock'] != 0) {
			//echo $stock['stock'];
			$stock = $stock['stock'] - 1;
			Update("buku", array(
				"stock"	=> $stock
				), array("id" => "where/".$id_buku));
		}		
		redirect(base_url()."index.php/buku/peminjaman_buku");
	}

/*************************************
	Olah Buku
*************************************/
	
	function tambah_buku($type = null) {
		if($this->session->userdata("level") == '10'){
			if($type == null) {
				$data_kategori = GetQuery('*', 'kategori');
				$data['buku']			= null;
				$data['kategori']		= $data_kategori->result_array();
				$data["main_content"]	= "buku/tambah_buku";
				$this->load->view("main/template", $data);
			} if ($type == 'ins') {
				$this->form_validation->set_rules('judul','Judul Buku', 'trim|required|min_length[5]|max_length[150]|xss_clean');
				$this->form_validation->set_rules('pengarang','Pengarang', 'trim|required|min_length[3]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('penerbit','Penerbit', 'trim|required|min_length[3]|max_length[150]|xss_clean');
				$this->form_validation->set_rules('stock','Stock', 'trim|required|min_length[1]|max_length[4]|xss_clean');
				
				if($this->form_validation->run() == FALSE) {
					$data['buku']			= null;
					$data_kategori = GetQuery('*', 'kategori');
					$data['kategori']		= $data_kategori->result_array();
					$data["main_content"]	= "buku/tambah_buku";
					$this->load->view('main/template',$data);
				} else {
					$post 		= $this->input->post();
					$judul 		= $post['judul'];
					$pengarang	= $post['pengarang'];
					$penerbit	= $post['penerbit'];
					$kategori	= $post['kategori'];
					$stock		= $post['stock'];
					$tgl_update	= date("Y-m-d H:i:s");
					
					Insert("buku", array(
						"id" 	   	=> NULL,
						"judul"		=> $judul,
						"pengarang"	=> $pengarang,
						"penerbit"	=> $penerbit,
						"kategori"	=> $kategori,
						"stock"		=> $stock,
						"tgl_update"=> $tgl_update
						));
					
					$this->session->set_flashdata('flash_message','Buku Berhasil ditambah');
					redirect(base_url()."index.php/buku/tambah_buku");
				}			
			}
		} if(!$this->session->userdata("level")){		
			$data["main_content"]	= "users/login";
			$this->load->view("main/template", $data);
		}
	}

	function edit_buku($type = null, $id = null) {
		if($this->session->userdata("level") == '10'){
			if($type == null) {
				$data['pencarian']		= null;
				$data["main_content"]	= "buku/peminjaman_buku";
				$this->load->view("main/template", $data);
			} if ($type == 'src') {
				$data_buku 				= GetQuery('*', 'buku', "id = '".$id."'");
				$data_kategori = GetQuery('*', 'kategori');
				$data['kategori']		= $data_kategori->result_array();
				$data['buku']			= $data_buku->row_array();
				$data["main_content"]	= "buku/tambah_buku";
				$this->load->view('main/template',$data);
			} if ($type == 'ins') {
				$this->form_validation->set_rules('judul','Judul Buku', 'trim|required|min_length[5]|max_length[150]|xss_clean');
				$this->form_validation->set_rules('pengarang','Pengarang', 'trim|required|min_length[3]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('penerbit','Penerbit', 'trim|required|min_length[3]|max_length[150]|xss_clean');
				$this->form_validation->set_rules('stock','Stock', 'trim|required|min_length[1]|max_length[4]|xss_clean');
				
				if($this->form_validation->run() == FALSE) {
					$data_buku 				= GetQuery('*', 'buku', "id = '".$id."'");
					$data_kategori = GetQuery('*', 'kategori');
					$data['kategori']		= $data_kategori->result_array();
					$data['buku']			= $data_buku->row_array();
					$data["main_content"]	= "buku/tambah_buku";
					$this->load->view('main/template',$data);
				} else {
					$post 		= $this->input->post();
					$judul 		= $post['judul'];
					$pengarang	= $post['pengarang'];
					$penerbit	= $post['penerbit'];
					$kategori	= $post['kategori'];
					$stock		= $post['stock'];
					$tgl_update	= date("Y-m-d H:i:s");
					
					Update("buku", array(
						"judul"		=> $judul,
						"pengarang"	=> $pengarang,
						"penerbit"	=> $penerbit,
						"kategori"	=> $kategori,
						"stock"		=> $stock,
						"tgl_update"=> $tgl_update
						), array('id' => 'where/'.$id));
					
					$this->session->set_flashdata('flash_message','Buku Berhasil Diubah');
					redirect(base_url()."index.php/buku/edit_buku");
				}
			} if(!$this->session->userdata("level")){		
				$data["main_content"]	= "users/login";
				$this->load->view("main/template", $data);
			}
		}
	}			
}
?>