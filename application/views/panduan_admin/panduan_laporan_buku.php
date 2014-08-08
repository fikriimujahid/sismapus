<div class="tengah">
    <?php if ($this->session->userdata('level') == '10'){ ?>
    <div class="info2">
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_olah_user"; ?>">Panduan Olah User</a></span><br><br>
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_olah_buku"; ?>">Panduan Olah Buku</a></span><br><br>
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_olah_peminjaman"; ?>">Panduan Olah Peminjaman</a></span><br><br>
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_laporan_buku"; ?>">Panduan Laporan Buku</a></span><br><br>
    </div>
    <?php } ?>    
    <div class="isibuku">
        <?php if ($this->session->userdata('level') == '10'){ ?>
        <style type="text/css">
	body {
		font-family:Arial, Helvetica, sans-serif;
		font-size:12px;
		}
	.pagetitle {
		font-size:16px }
	.sectiontitle {
		font-size:14px }
</style>
<head>
	<title>PANDUAN ADMIN</title>	<script type="text/javascript" src="http://studentsman5.url.ph/geci_assets/7b18b0c981a1fdaade30b4be075679e2/jquery-1.7.2.min.js"></script>
</head>
<center><b><h1>PANDUAN ADMIN UNTUK LAPORAN BUKU</h1></b></center>
&nbsp;<br> &nbsp;PADA PANDUAN ADMIN LAPORAN BUKU, ADMIN DAPAT MELAKUKAN REKAPITULASI MENGENAI LAPORAN DARI PEMINJAMAN BUKU PADA SISTEM INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN LAPORAN BUKU :</br> <br> 
<ol>
	<li>ADMIN MEMBUKA TAB MENU LAPORAN BUKU, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/laporan1.png"/><br>
	<br><li>ADMIN MEMILIH PERIODE WAKTU YANG AKAN DI BUAT LAPORAN.  </li><br>
  <br><li>BILA PERIODE SUDAH DIPILIH LALU TEKAN TOMBOL CARI DATA PEMINJAMAN. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI</li><br>
<img src="../../template/images/laporan2.png"/><br>
<br><li>ADMIN DAPAT MELAKUKAN PENCETAKAN LAPORAN DENGAN MENG KLIK PRINT LAPORAN</li><br>


</ol>
        
        <?php } ?>
    </div>
</div>
<?php //pre($this->session->all_userdata()); ?>
