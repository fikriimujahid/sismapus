<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class model_buku extends CI_Model {
	
/*************************************
	Registration Module
*************************************/

	public function get_buku($num = NULL, $offset = NULL, $blog_id = NULL) {
		// Cek yang dikirim cuman 1 row atau semua records
		if($blog_id != NULL){
			// Dikirim cuman 1 row
			$query = $this->db->get_where('blog',array('blog_id'=>$blog_id));
			if($query->num_rows() == 1){
				// Cek lagi kalau yang dikirim cuman 1 row yang sama
				return $query->row_array();
			} else {
				// Kalau ga
				return false;
			}
		} else {
			// Dikirim semua records
			$this->db->order_by("id","desc");
			$query = $this->db->get('buku',$num,$offset);
			if($query->num_rows() > 0){
				// Balikin semua rows
				return $query->result_array();
			}
				// Gada rows
				return false;
		}
	}


	function insert_article($data) {
		$this->db->insert('article', $data);
	}

	function update_article($id, $data) {
		$this->db->where('id', $id);
		$result = $this->db->update('article', $data);
	}
	
	function LogActivities($users_id,$tbl,$logs,$url,$judul,$content,$act)
	{
		$date = date("Y-m-d H:i:s");
		
		$data = array(
			"user_id"		=> $users_id,
			"tabel"			=> $tbl,
			"logs"			=> $logs,
			"action"		=> $act,
			"judul"			=> $judul,
			"content"		=> $content,
			"date"			=> $date,
			"url"			=> $url
		);
		
		$this->db->insert("article_log", $data);
	}
	
	public function view_article($id) {
		$query = $this->db->get_where('article',array('id'=>$id))->row_array();
		return $query;
	}
	
	function delete($table, $id) {
		$this->db->delete($table,array('id'=>$id));
	}			
}