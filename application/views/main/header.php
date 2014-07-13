<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Sistem Management Perpustakaan</title>

		<link href="<?php echo base_url(); ?>template/css/style.css" rel="stylesheet">
	</head>
	<body>
	<?php if ($this->session->userdata('level') == '1'){ ?>
    <div class="atas">
        <div class="cover"><img></div>
        <div class="menu">
            <ul>
                <li><a href="<?php echo base_url()."index.php/dashboard/home"; ?>">Home</li>
                <li><a href="#">Menu B</li>
                <li><a href="#">Menu C</li>
                <li><a href="<?php echo base_url()."index.php/dashboard/logout"; ?>">Logout</a></li>
            </ul>
        </div>
    </div>
	<?php } ?>