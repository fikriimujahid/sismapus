<?php
function search_result($keywords, $dbs) {
	$returned_results = array();
	$where = "";
	
	$keywords = preg_split('/[\s]+/', $keywords);
	$total_keywords = count($keywords);
	
	foreach($keywords as $key=>$keyword) {
		$where .= "`keywords` LIKE '%$keyword%'";
		if ($key != ($total_keywords - 1)) {
			$where .= " AND ";
		}
	}
	
	if ($dbs == "artikel") {
		$results = "SELECT `artikel_title`, `artikel_id`, LEFT(`artikel_body`, 180) as `artikel_body` FROM `artikel` WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		
		if ($results_num === 0) {
			return false;
		} else {
			while ($results_row = mysql_fetch_assoc($results)) {
				$returned_result[] = array(
					'id' 			=> $results_row['artikel_id'],
					'title' 		=> $results_row['artikel_title'],
					'description'	=> $results_row['artikel_body']
				);
			}
			return $returned_result;
		}	
	} else if ($dbs == "buku") {
		$results = "SELECT `book_id`, `book_judul`, LEFT(`book_deskripsi`, 180) as `book_deskripsi` FROM `book` WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		
		if ($results_num === 0) {
			return false;
		} else {
			while ($results_row = mysql_fetch_assoc($results)) {
				$returned_result[] = array(
					'id' 			=> $results_row['book_id'],
					'title' 		=> $results_row['book_judul'],
					'description'	=> $results_row['book_deskripsi']
				);
			}
			return $returned_result;
		}	
	} else if ($dbs == "ebook") {
		$results = "SELECT `ebook_id`, LEFT(`ebook_deskripsi`, 180) as `ebook_deskripsi`, `ebook_name` FROM `e-book` WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		
		if ($results_num === 0) {
			return false;
		} else {
			while ($results_row = mysql_fetch_assoc($results)) {
				$returned_result[] = array(
					'id' 			=> $results_row['ebook_id'],
					'title' 		=> $results_row['ebook_name'],
					'description'	=> $results_row['ebook_deskripsi']
				);
			}
			return $returned_result;
		}
	}
}

function email($to, $subject, $body){
	mail($to, $subject, $body, 'From: wannabeit.com');
}

function logged_in_redirect() {
	if (logged_in() === true) {
		?><script language="javascript">window.location.replace("dashboard.php");</script><?php
		exit();
	}
}

function protect_page() {
	if (logged_in() === false ) {
		?><script language="javascript">window.location.replace("index.php?p=protected");</script><?php
		exit();
	}
}

function admin_protect() {
	global $user_data;
	if (is_admin($user_data['user_id']) === false) {
		?><script language="javascript">window.location.replace("index.php");</script><?php
	}
}

function array_sanitize(&$item) {
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function sanitize($data){
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = $error;
	}
	return implode('', $output);
}
?>