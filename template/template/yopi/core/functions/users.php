<?php
function change_profile_image($user_id, $file_temp, $file_extn) {
	$file_path	= 'media/user/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `users` SET `user_image` = '".mysql_real_escape_string($file_path)."' WHERE `user_id` = " . (int)$user_id ."");
}

function is_admin($user_id) {
	$user_id = (int)$user_id;
	return(mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = '$user_id' AND `type` = 1"), 0) == 1) ? true : false;
}

function recover($mode, $user_email) {
	$mode 			= sanitize($mode);
	$user_email		= sanitize($user_email);
	
	$user_data		= user_data(user_id_from_user_email($user_email), 'user_id', 'user_first_name', 'user_name');
	
	if ($mode == 'user_name') {
		email($user_email, 'Your username', "Hello " . $user_data['user_first_name'] . ", \n\nYour Username is : " . $user_data['user_name'] . "\n\n-wannabeit");
	} else if ($mode == 'password') {
		$generated_password =  substr(md5(rand(999, 999999)), 0, 8);
		change_password($user_data['user_id'], $generated_password);
		
		update_user($user_data['user_id'], array('user_password_recover' => '1'));
		
		email($user_email, 'Your new password', "Hello " . $user_data['user_first_name'] . ", \n\nYour new Password is : " . $generated_password . "\n\n-wannabeit");
	}
}

function update_user($user_id, $update_data) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field => $data) {
		$update[] = '`' .$field . '` = \'' . $data . '\'';
	}
	
	mysql_query("UPDATE `users` SET " .implode(', ', $update) . " WHERE `user_id` = $user_id");
}

function activate($user_email, $user_email_code) {
	$user_email			= mysql_real_escape_string($user_email);
	$user_email_code	= mysql_real_escape_string($user_email_code);
	
	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_email` = '$user_email' AND `user_email_code` = '$user_email_code' AND `user_active` = 0"), 0) == 1) {
		mysql_query("UPDATE `users` SET `user_active` = 1 WHERE `user_email` = '$user_email'");
		return true;
	} else {
		return false;
	}
}

function change_password($user_id, $user_password) {
	$user_id = (int)$user_id;
	$user_password = md5($user_password);
	
	mysql_query("UPDATE `users` SET `user_password` = '$user_password', `user_password_recover` = 0 WHERE `user_id` = '$user_id'");
}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['user_password'] = md5($register_data['user_password']);
	
	$fields = '(`' . implode('`, `', array_keys($register_data)) . '`)';
	$data = "('" . implode("', '", $register_data) . "')";
	
	mysql_query("INSERT INTO `users` $fields VALUES $data");
	email($register_data['user_email'], 'Activate your account', "Hello " . $register_data['user_first_name']. ",\n\nYou need to activate your account, so use the link below :\n\nhttp://localhost/index.php?p=activate&user_email=" . $register_data['user_email'] . "&user_email_code=" . $register_data['user_email_code']. " \n\n- wannabeit");
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_active` = 1"), 0);
}

function user_data($user_id){
	$data = array();
	$user_id = (int)$user_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1){
		unset($func_get_args[0]);
		
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `user` WHERE `id` = '$user_id'"));
		
		return $data;
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($user_name) {
	$user_name = sanitize($user_name);
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `user` WHERE `nis` = '$user_name'"), 0) == 1) ? true : false;
}

function email_exists($user_name) {
	$user_email = sanitize($user_name);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_email` = '$user_email'"), 0) == 1) ? true : false;
}

function user_active($user_name) {
	$user_name = sanitize($user_name);
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `user` WHERE `nis` = '$user_name'"), 0) == 1) ? true : false;
}

function user_id_from_user_name($user_name){
	$user_name = sanitize($user_name);
	return mysql_result(mysql_query("SELECT `id` FROM `user` WHERE `nis` = '$user_name'"), 0, 'id');
}

function user_id_from_user_email($user_email){
	$user_email = sanitize($user_email);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `user_email` = '$user_email'"), 0, 'user_id');
}

function login($user_name, $user_password){
	$user_id = user_id_from_user_name($user_name);
	
	$user_name = sanitize($user_name);
	$user_password = md5($user_password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `user` WHERE `nis` = '$user_name' AND `password` = '$user_password'"), 0) == 1) ? $user_id : false;
}
?>