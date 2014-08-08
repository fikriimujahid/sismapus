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
<center><b><h1>PANDUAN ADMIN UNTUK OLAH USER</h1></b></center>
<p class="sectiontitle"><strong>&nbsp;A.&nbsp; PANDUAN TAB MENU TAMBAH USER</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN TAMBAH USER, ADMIN DAPAT MENAMBAH DATA USER UNTUK DILAKUKAN PROSES REGISTRASI AGAR TERDAFTAR SEBAGAI ANGGOTA BARU DARI SISTEM INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN TAMBAH USER :</br> <br> 
<ol>
	<li>ADMIN MEMBUKA TAB MENU TAMBAH USER, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/olah1.png"/><br>
	<br><li>ADMIN MENGINPUT KEYWORD DARI MASING - MASING FIELD SESUAI DENGAN DATA DARI SISWA DAN SISWI. PERLU DIKETAHUI UNTUK PENGINPUTAN KEYWORD, MASING - MASING FIELD HARUS TERISI DAN KEYWORD HARUS LEBIH DARI ATAU MINIMAL 5 KARAKTER.  </li><br>
<img src="../../template/images/olah2.png"/><br>
  <br><li>BILA TELAH TERINPUT SEMUA FIELD LALU TEKAN TOMBOL TAMBAH. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI</li><br>
<img src="../../template/images/olah3.png"/><br>

<p class="sectiontitle"><strong>&nbsp;B.&nbsp; PANDUAN TAB MENU MANAGE USER</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN MANAGE USER, ADMIN DAPAT MENG-UPDATE DATA USER YANG TELAH TERDAFTAR SEBAGAI ANGGOTA DARI SISTEM INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN TAMBAH USER :</br> <br> 
<ol>
<li>ADMIN MEMBUKA TAB MENU MANAGE USER, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/manage1.png"/><br>
<br><li>ADMIN MENGINPUT KEYWORD NOMOR INDUK USER.</li><br>
<img src="../../template/images/manage2.png"/><br>
<br><li>BILA TELAH TERINPUT KEYWORD YANG DIKEHENDAKI LALU TEKAN TOMBOL SUBMIT. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI YANG MENANDAKAN DATA SIAP UNTUK DI-UPDATE</li><br>
<img src="../../template/images/manage3.png"/><br>

</ol>
 
        
        
        
        <?php } ?>
    </div>
</div>
<?php //pre($this->session->all_userdata()); ?>
