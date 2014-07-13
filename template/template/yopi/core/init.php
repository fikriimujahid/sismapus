<?php
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';
//require 'functions/blog.php';
//require 'functions/book.php';

$current_file = $_SERVER['QUERY_STRING'];
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id,'jenis_user');
}

$errors = array();
?>