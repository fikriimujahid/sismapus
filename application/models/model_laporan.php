<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class model_laporan extends CI_Model {
	
/*************************************
	Registration Module
*************************************/

	public function laporan($tabul) {
		$sql = "SELECT *, COUNT(*) as count 
				FROM (
					select distinct tgl_pinjam, nis, id, id_buku from peminjaman 
				) as sq
				WHERE tgl_pinjam LIKE '%$tabul%'
				group by id_buku";
		
		$result = $this->db->query($sql);
		return $result;
	}	
}