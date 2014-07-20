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
		$data["main_content"]	= "users/peminjaman_buku";
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
		redirect(base_url()."index.php/dashboard/peminjaman_buku");
	}	
}
?>