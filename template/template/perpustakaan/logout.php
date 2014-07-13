<?php
session_start();
if(session_destroy())
{
setcookie('nama', '', time() - 1*24*60*60);
setcookie('password', '', time() - 1*24*60*60);
header("Location: index.php");
}
?>