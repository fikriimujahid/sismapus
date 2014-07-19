<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class model_articles extends CI_Model {
	
/*************************************
	Registration Module
*************************************/
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
	
	function delete($id) {
		$this->db->delete('article',array('id'=>$id));
	}			
}