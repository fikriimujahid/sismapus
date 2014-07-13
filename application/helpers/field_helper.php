<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	function field($validation, $database = NULL, $last = ''){
	  $value = (isset($validation)) ? $validation : ( (isset($database)) ? $database : $last);
	  return $value;
	}
?>