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
                <li><a href="<?php echo base_url()."index.php/dashboard/peminjaman_buku"; ?>">Peminjaman Buku</li>
                <li><a href="<?php echo base_url()."index.php/dashboard/panduan"; ?>">Panduan</li>
                <li><a href="<?php echo base_url()."index.php/dashboard/logout"; ?>">Logout</a></li>
            </ul>
        </div>
    </div>
	<?php } if ($this->session->userdata('level') == '10'){ ?>
    <div class="atas">
        <div class="cover"><img></div>
        <div class="menu">
            <ul>
                <li><a href="<?php echo base_url()."index.php/dashboard/home"; ?>">Home</li>
                <li class="olahuser"><a href="<?php echo base_url()."index.php/dashboard/manage_user"; ?>">Olah User</a><span class="submnu">
                    <a href="#">Tambah User</a>
                    <a href="#">Manage User</a>
                    <a href="#">Aktivitas User</a>
    			</span></li>
                <li class="olahuser"><a href="<?php echo base_url()."index.php/dashboard/manage_user"; ?>">Olah Buku</a><span class="submnu">
                    <a href="#">Tambah Buku</a>
                    <a href="#">Update Buku</a>
    			</span></li>
                <li class="olahuser"><a href="<?php echo base_url()."index.php/dashboard/manage_user"; ?>">Olah Peminjaman</a><span class="submnu">
                    <a href="#">Peminjaman Manual</a>
                    <a href="#">Pengembalian Buku</a>
                    <a href="#">Booking Manual</a>
    			</span></li>
               	<li><a href="#">Laporan Buku</li>
                <li><a href="<?php echo base_url()."index.php/dashboard/logout"; ?>">Logout</a></li>
            </ul>
        </div>
    </div>
	<?php } ?>