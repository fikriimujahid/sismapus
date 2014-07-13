<?php
function item_exists($table, $item) {
	$table 	= mysql_real_escape_string($table);
	$item	= (int)$item;
	
	return (mysql_result(mysql_query("SELECT COUNT(`artikel_id`) FROM `$table` WHERE `artikel_id` = $item"), 0) == 1) ? true : false;
}

function rate($table, $item, $rating) {
	$table	= mysql_real_escape_string($table);
	$item	= (int)$item;
	$rating	= (int)$rating;
	
	mysql_query("UPDATE `$table` SET `artikel_rating_total` = `artikel_rating_total` + $rating, `artikel_rating_count` = `artikel_rating_count`+ 1 WHERE `artikel_id` = $item");
}

function add_category($category_data) {
	array_walk($category_data, 'array_sanitize');
	
	$fields = '(`' . implode('`, `', array_keys($category_data)) . '`)';
	$data = "('" . implode("', '", $category_data) . "')";
	
	mysql_query("INSERT INTO `category` $fields VALUES $data");
}

function add_artikel($artikel_data){
	array_walk($artikel_data);
	$fields = '(`' . implode('`, `', array_keys($artikel_data)) . '`)';
	$data = "('" . implode("', '", $artikel_data) . "')";
	mysql_query("INSERT INTO `artikel` $fields VALUES $data");
}

function category_exists($cat_name) {
	$cat_name = sanitize($cat_name);
	return (mysql_result(mysql_query("SELECT COUNT(`cat_id`) FROM `category` WHERE `cat_name` = '$cat_name'"), 0) == 1) ? true : false;
}

function get_category($cat_id=null, $loop){
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$loop = (int) $loop;
	$start_from = ($page-1) * $loop;
	
	$sql 		 = "SELECT * FROM `category`";
	
	$sql .= "ORDER BY `category`.`cat_id` DESC LIMIT $start_from, $loop";
	$query = mysql_query($sql);
	$rows 	 	 = array();
	
	while ($row = mysql_fetch_assoc($query)){
		$rows[] = $row;
	}
	return $rows;
}

function get_artikel($cat_id=null, $art_id=null, $most=null, $loop){
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$loop = (int) $loop;
	$start_from = ($page-1) * $loop;
	
	$sql = "SELECT
				`artikel`.`artikel_id`,
				`artikel`.`artikel_title`,
				`category`.`cat_id`,
				`category`.`cat_name`,
				DATE_FORMAT(`artikel`.`artikel_date`, '%Y/%m/%d') AS 'artikel_date',
				`users`.`user_first_name`,
				`users`.`user_last_name`,
				`artikel`.`artikel_body`,
				`artikel`.`artikel_rating_total`,
				`artikel`.`artikel_rating_count`,
				`artikel`.`keywords`
			FROM `artikel`
				INNER JOIN `users` ON `users`.`user_name` = `artikel`.`artikel_user`
				INNER JOIN `category` ON `category`.`cat_id` = `artikel`.`artikel_cat_id`";

	if( isset($cat_id)){
        $cat_id = (int) $cat_id;
        $sql .= " WHERE `artikel`.`artikel_cat_id` = '{$cat_id}'"; 
    }
	
	if( isset($art_id)){
        $art_id = (int) $art_id;
        $sql .= " WHERE `artikel`.`artikel_id` = '{$art_id}'"; 
    }
	
	if( isset($most)){
        $most = (int) $most;
        $sql .= "ORDER BY `artikel`.`artikel_rating_total` DESC LIMIT $start_from, $most"; 
    } else {
		$sql .= "ORDER BY `artikel`.`artikel_id` DESC LIMIT $start_from, $loop";
	}
	
	$rows 	 	 = array();
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)){
		$rows[] = array(
			'art_id'			=> $row['artikel_id'],
			'art_tit'			=> $row['artikel_title'],
			'art_cont'			=> $row['artikel_body'],
			'art_dat'			=> $row['artikel_date'],
			'art_key'			=> $row['keywords'],
			'art_rat'			=> ($row['artikel_rating_count'] != 0) ? $row['artikel_rating_total'] / $row['artikel_rating_count'] : 0,
			'cat_id'			=> $row['cat_id'],
			'cat_nam'			=> $row['cat_name'],
			'use_first_name'	=> $row['user_first_name'],
			'use_last_name'		=> $row['user_last_name']
		);
	}
	return $rows;
}

function edit_artikel($art_id, $title, $body, $category) {
	$art_id		= (int) $art_id;
    $title 		= mysql_real_escape_string($title);
    $body 		= mysql_real_escape_string(stripslashes($body));
	$category	= (int) $category;
	
	mysql_query ("UPDATE `artikel` SET 
						 `artikel_cat_id` 		= '$category',
						 `artikel_title`  		= '$title',
						 `artikel_body`			= '$body'
				  WHERE  `artikel`.`artikel_id` = '$art_id'");
}

function delete($table, $row, $id){
	$table 	= mysql_real_escape_string($table);
	$row 	= mysql_real_escape_string($row);
	$id 	= (int) $id;
	mysql_query("DELETE FROM ".$table." WHERE ".$row." = ".$id."");
}

function numlinks($page,$db,$tr,$tp,$cp) {
	
	$start_from = ($page-1) * 3;
	
	echo '<table border="0" cellspacing="0" cellpadding="0" class="t-border"><tr>';
	if ($page > 1) {
		echo '<td class="td-border"><a href="index.php?'.$cp.'" class="numlinks">&laquo;</a></td>';   // first page
		echo '<td class="td-border"><a href="index.php?'.$db.''.($page-1).'" class="numlinks">previous</a></td>';   // prev page
	} else {
		echo '<td class="td-border numlinks-inactive">&laquo;</td>';   // first page
		echo '<td class="td-border numlinks-inactive">previous</td>';   // prev page
	}

	$i = 1;
	while($i <= $tr){
		if ($page-ceil($tr/2) < 0){
			if ($i == $page) echo '<td class="td-border numhighlight">'.($page).'</td>';
			else echo '<td class="td-border"><a href="index.php?'.$db.''.$i.'" class="numlinks">'.($i).'</a></td>';
		} else if ($page+floor($tr/2) > $tp){
			if($tp > $tr) $j = $tp-$tr+$i;
			else $j = $i;
			
			if($j == $page) echo '<td class="td-border numhighlight">'.($page).'</td>';
			else echo '<td class="td-border"><a href="index.php?'.$db.''.$j.'" class="numlinks">'.$j.'</a></td>';
		} else {
			if ($i == ceil($tr/2)) echo '<td class="td-border numhighlight">'.($page).'</td>';
			else {
			$j = $page-ciel($tr/2)+$i;
			echo '<td class="td-border"><a href="index.php?'.$db.''.$j.'" class="numlinks">'.$j.'</a></td>';
			}
		}
		if ($i == $tp) break;
		$i++;
	}
	if ($page < $tp){
		echo '<td class="td-border"><a href="index.php?'.$db.''.($page+1).'" class="numlinks">next</a></td>';  // next page
		echo '<td class="td-border"><a href="index.php?'.$db.''.$tp.'" class="numlinks">&raquo;</a></td>';   // last page
	} else {
		echo '<td class="td-border numlinks-inactive">next</td>';   // first page
		echo '<td class="td-border numlinks-inactive">&raquo;</td>';   // prev page
	}
	echo '</tr></table>';
}
?>