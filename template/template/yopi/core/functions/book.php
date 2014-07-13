<?php
function change_book_image($book_id, $file_temp, $file_extn) {
	$file_path	= 'media/book/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `book` SET `book_image` = '".mysql_real_escape_string($file_path)."' WHERE `book_id` = " . (int)$book_id ."");
}

function change_ebook_image($ebook_id, $file_temp, $file_extn) {
	$file_path	= 'media/e-book/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `e-book` SET `ebook_image` = '".mysql_real_escape_string($file_path)."' WHERE `ebook_id` = " . (int)$ebook_id ."");
}

function add_category_book($category_book_data) {
	array_walk($category_book_data, 'array_sanitize');
	
	$fields = '(`' . implode('`, `', array_keys($category_book_data)) . '`)';
	$data = "('" . implode("', '", $category_book_data) . "')";
	
	mysql_query("INSERT INTO `category_book` $fields VALUES $data");
}

function add_book($book_data, $table) {
	array_walk($book_data, 'array_sanitize');
	
	$fields = '(`' . implode('`, `', array_keys($book_data)) . '`)';
	$data = "('" . implode("', '", $book_data) . "')";
	
	mysql_query("INSERT INTO $table $fields VALUES $data");
}

function get_category_book($cat_bok_id=null, $loop){
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$loop = (int) $loop;
	$start_from = ($page-1) * $loop;
	
	$sql 		 = "SELECT * FROM `category_book`";
	
	if( isset($cat_bok_id)){
        $cat_bok_id = (int) $cat_bok_id;
        $sql .= " WHERE `category_book`.`cat_bok_id` = '{$cat_bok_id}'"; 
    }	
	
	$sql .= "ORDER BY `category_book`.`cat_bok_id` DESC LIMIT $start_from, $loop";
	$query = mysql_query($sql);
	$rows 	 	 = array();
	
	while ($row = mysql_fetch_assoc($query)){
		$rows[] = $row;
	}
	return $rows;
}

function get_ebook($cat_bok_id=null, $bok_id=null, $most=null, $loop){
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$loop = (int) $loop;
	$start_from = ($page-1) * $loop;
	
	$sql = "SELECT
				`e-book`.`ebook_id`,
				`e-book`.`ebook_name`,
				`e-book`.`ebook_pengarang`,
				`category_book`.`cat_bok_id`,
				`category_book`.`cat_bok_name`,
				`e-book`.`ebook_location`,
				`e-book`.`ebook_deskripsi`,
				`e-book`.`ebook_image`,
				`e-book`.`keywords`
			FROM `e-book`
				INNER JOIN `category_book` ON `category_book`.`cat_bok_id` = `e-book`.`ebook_category_id`";

	if( isset($cat_bok_id)){
        $cat_bok_id = (int) $cat_bok_id;
        $sql .= " WHERE `e-book`.`ebook_category_id` = '{$cat_bok_id}'"; 
    }
	
	if( isset($bok_id)){
        $bok_id = (int) $bok_id;
        $sql .= " WHERE `e-book`.`ebook_id` = '{$bok_id}'"; 
    }
	
	if( isset($most)){
        $most = (int) $most;
        $sql .= "ORDER BY `e-book`.`ebook_id` DESC LIMIT $start_from, $loop";
    } else {
		$sql .= "ORDER BY `e-book`.`ebook_id` ASC LIMIT $start_from, $loop";
	}
	
	$rows 	 	 = array();
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)){
		$rows[] = array(
			'eid'			=> $row['ebook_id'],
			'enam'			=> $row['ebook_name'],
			'epeng'			=> $row['ebook_pengarang'],
			'eloc'			=> $row['ebook_location'],
			'edes'			=> $row['ebook_deskripsi'],
			'eimg'			=> $row['ebook_image'],
			'ekey'			=> $row['keywords'],
			'cid'			=> $row['cat_bok_id'],
			'cnam'			=> $row['cat_bok_name']
		);
	}
	return $rows;
}

function get_book($book_id=null, $book_cat_id=null, $book_pengarang, $most=null, $loop){
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$loop = (int) $loop;
	$start_from = ($page-1) * $loop;
	
	$sql = "SELECT
				`book`.`book_id`,
				`book`.`book_cat_id`,
				`book`.`book_judul`,
				`book`.`book_pengarang`,
				`book`.`book_jumlah`,
				`book`.`book_deskripsi`,
				`book`.`book_image`,
				`book`.`keywords`,
				`category_book`.`cat_bok_id`,
				`category_book`.`cat_bok_name`
			FROM `book`
				INNER JOIN `category_book` ON `category_book`.`cat_bok_id` = `book`.`book_cat_id`";

	if( isset($book_id)){
        $book_id = (int) $book_id;
        $sql .= " WHERE `book`.`book_id` = '{$book_id}'"; 
    }
	
	if( isset($book_cat_id)){
        $book_cat_id = (int) $book_cat_id;
        $sql .= " WHERE `book`.`book_cat_id` = '{$book_cat_id}'"; 
    }
	
	if( isset($book_pengarang)){
        $book_pengarang = mysql_real_escape_string($book_pengarang);
        $sql .= " WHERE `book`.`book_pengarang` = '{$book_pengarang}'"; 
    }

	if( isset($most)){
        $most = (int) $most;
        $sql .= "ORDER BY `book`.`book_id` ASC LIMIT $start_from, $loop";
    } else {
		$sql .= "ORDER BY `book`.`book_id` DESC LIMIT $start_from, $loop";
	}
	
	$rows 	 	 = array();
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)){
		$rows[] = array(
			'bid'			=> $row['book_id'],
			'bcid'			=> $row['book_cat_id'],
			'bjud'			=> $row['book_judul'],
			'bpen'			=> $row['book_pengarang'],
			'bjum'			=> $row['book_jumlah'],
			'bdes'			=> $row['book_deskripsi'],
			'bimg'			=> $row['book_image'],
			'bkey'			=> $row['keywords'],
			'cid'			=> $row['cat_bok_id'],
			'cnam'			=> $row['cat_bok_name']
		);
	}
	return $rows;
}

function edit_book($book_id, $book_judul, $book_pengarang, $book_jumlah, $book_deskripsi, $book_keywords, $book_category) {
	$book_id			= (int) $book_id;
    $book_judul 		= mysql_real_escape_string($book_judul);
    $book_deskripsi		= mysql_real_escape_string($book_deskripsi);
    $book_keywords 		= mysql_real_escape_string($book_keywords);
    $book_pengarang		= mysql_real_escape_string(stripslashes($book_pengarang));
	$book_jumlah		= (int) $book_jumlah;
	$book_category		= (int) $book_category;
	
	mysql_query ("UPDATE `book` SET 
						 `book_judul`		 	= '$book_judul',
						 `book_pengarang`  		= '$book_pengarang',
						 `book_jumlah`			= '$book_jumlah',
						 `book_cat_id`			= '$book_category',
						 `book_deskripsi`		= '$book_deskripsi',
						 `keywords`				= '$book_keywords'
				  WHERE  `book`.`book_id` 		= '$book_id'");
}

function edit_ebook($ebook_id, $ebook_judul, $ebook_pengarang, $ebook_deskripsi, $ebook_keywords, $ebook_category) {
	$ebook_id			= (int) $ebook_id;
    $ebook_judul 		= mysql_real_escape_string($ebook_judul);
	$ebook_pengarang	= mysql_real_escape_string(stripslashes($ebook_pengarang));
    $ebook_deskripsi	= mysql_real_escape_string($ebook_deskripsi);
    $ebook_keywords 	= mysql_real_escape_string($ebook_keywords);
	$ebook_category		= (int) $ebook_category;
	
	mysql_query ("UPDATE `e-book` SET 
						 `ebook_name`		 	= '$ebook_judul',
						 `ebook_pengarang`  	= '$ebook_pengarang',
						 `ebook_category_id`	= '$ebook_category',
						 `ebook_deskripsi`		= '$ebook_deskripsi',
						 `keywords`				= '$ebook_keywords'
				  WHERE  `e-book`.`ebook_id` 	= '$ebook_id'");
}
?>