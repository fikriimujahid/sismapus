<?php
date_default_timezone_set("Asia/Jakarta");
$db = new mysqli("localhost","root","","perpus");
if($db->connect_errno > 0){
    die('Tidak terhubung ke database [' . $db->connect_error . ']');
}
?>
