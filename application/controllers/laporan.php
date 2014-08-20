<?php if(!defined('BASEPATH')) exit('No direct script allowed');

/*************************************
  * Created : April 2014
  * Creator : Fikri Mujahid
  * Email   : itsmefikri@gmail.com
  * CMS ver : CI ver.2.1.2
*************************************/	

class laporan extends CI_Controller {
	function __contruct() {
		parent::__construct();
	}
	public function index() {
		redirect(base_url()."index.php/dashboard");
	}
	
/*************************************
	Laporan Module
*************************************/
	function periode() {
		$this->load->model('model_laporan');
		$post 		= $this->input->post();
		$tabul		= $post['tahun'].'-'.$post['bulan'];
		$laporan 	= $this->model_laporan->laporan($tabul);
		
		$data['pencarian']		= $laporan->result_array();
		$data["main_content"]	= "laporan";
		$this->load->view("main/template", $data);
	}
	
	function print_laporan($tabul){
		$this->load->model('model_laporan');
		$laporan 	= $this->model_laporan->laporan($tabul);
		$arr_tabul = explode('-',$tabul);
		(is_array($arr_tabul)) ? $arr_tabul = $arr_tabul : $arr_tabul = array($id_tabul);
		
		$data['tabul']			= $arr_tabul;
		$data['pencarian']		= $laporan->result_array();
		$this->load->view("print_laporan", $data);
	}
}
?>