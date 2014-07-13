<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "perpus");
$connect_error = 'Sorry, but we have some trouble here';

$link = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if (!$link) { die($connect_error); }
$db_selected = mysql_select_db(DB_NAME, $link);
if (!$db_selected) { die ($connect_error);
}?>