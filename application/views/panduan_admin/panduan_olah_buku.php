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
<center><b><h1>PANDUAN ADMIN UNTUK OLAH BUKU</h1></b></center>
<p class="sectiontitle"><strong>&nbsp;A.&nbsp; PANDUAN TAB MENU MANAGE KATEGORI</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN MANAGE KATEGORI, ADMIN DAPAT MENAMBAH DAN MENGHAPUS KATEGORI BUKU SESUAI DENGAN KEBUTUHAN INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN MANAGE KATEGORI :</br> <br> 
<ol>
	<li>ADMIN MEMBUKA TAB MENU TAMBAH USER, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/kategori1.png"/><br>
	<br><li>ADMIN MENGINPUT KATEGORI YANG DIKEHENDAKI.</li><br>
<img src="../../template/images/kategori2.png"/><br>
  <br><li>BILA TELAH TERINPUT LALU TEKAN TOMBOL TAMBAH. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI</li><br>
<img src="../../template/images/kategori3.png"/><br>

<p class="sectiontitle"><strong>&nbsp;B.&nbsp; PANDUAN TAB MENU TAMBAH BUKU</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN TAMBAH BUKU, ADMIN DAPAT MENAMBAH KOLEKSI DATA BUKU KE DALAM SISTEM INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN TAMBAH BUKU :</br> <br> 
<ol>
<li>ADMIN MEMBUKA TAB MENU TAMBAH BUKU, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/tambah1.png"/><br>
<br><li>ADMIN MENGINPUT KEYWORD DARI MASING - MASING FIELD SESUAI DENGAN DATA DARI BUKU. PERLU DIKETAHUI UNTUK PENGINPUTAN KEYWORD, MASING - MASING FIELD HARUS TERISI DAN KEYWORD HARUS LEBIH DARI ATAU MINIMAL 5 KARAKTER.</li><br>
<img src="../../template/images/tambah2.png"/><br>
<br><li>BILA TELAH TERINPUT KEYWORD YANG DIKEHENDAKI LALU TEKAN TOMBOL TAMBAH BUKU. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI YANG MENANDAKAN BUKU BERHASIL DI TAMBAH</li><br>
<img src="../../template/images/tambah3.png"/><br>
    
<p class="sectiontitle"><strong>&nbsp;C.&nbsp; PANDUAN TAB MENU MANAGE BUKU</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN MANAGE BUKU, ADMIN DAPAT MENGUPDATE BUKU PADA SISTEM INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN MANAGE BUKU :</br> <br> 
<ol>
<li>ADMIN MEMBUKA TAB MENU MANAGE BUKU, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/mb1.png"/><br>
<br><li>ADMIN MENGINPUT KEYWORD BUKU YANG AKAN DI MANAGE.</li><br>
<img src="../../template/images/mb2.png"/><br>
<br><li>BILA TELAH TERINPUT KEYWORD BUKU YANG AKAN DI MANAGE LALU TEKAN TOMBOL SUBMIT. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI YANG MENANDAKAN BUKU SIAP DI MANAGE</li><br>
<img src="../../template/images/mb3.png"/><br>

</ol>
    
        
        <?php } ?>
    </div>
</div>
<?php //pre($this->session->all_userdata()); ?>
