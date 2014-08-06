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
                <li class="olahuser"><a href="#">Olah User</a><span class="submnu">
                    <a href="<?php echo base_url()."index.php/user/tambah_user"; ?>">Tambah User</a>
                    <a href="<?php echo base_url()."index.php/user/manage_user"; ?>">Manage User</a>
    			</span></li>
                <li class="olahuser"><a href="#">Olah Buku</a><span class="submnu">
                    <a href="<?php echo base_url()."index.php/buku/tambah_buku"; ?>">Tambah Buku</a>
                    <a href="<?php echo base_url()."index.php/buku/edit_buku"; ?>">Manage Buku</a>
                    <a href="<?php echo base_url()."index.php/buku/kategori"; ?>">Manage Kategori</a>
    			</span></li>
                <li class="olahuser"><a href="#">Olah Peminjaman</a><span class="submnu">
                    <a href="<?php echo base_url()."index.php/buku/peminjaman_manual"; ?>">Peminjaman Manual</a>
                    <a href="<?php echo base_url()."index.php/buku/pengembalian_buku"; ?>">Pengembalian Buku</a>
    			</span></li>
               	<li><a href="<?php echo base_url()."index.php/dashboard/laporan"; ?>">Laporan Buku</li>
                <li><a href="<?php echo base_url()."index.php/dashboard/logout"; ?>">Logout</a></li>
            </ul>
        </div>
    </div>
	<?php } ?>