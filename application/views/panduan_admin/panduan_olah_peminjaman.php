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
<center><b><h1>PANDUAN ADMIN UNTUK OLAH PEMINJAMAN</h1></b></center>
<p class="sectiontitle"><strong>&nbsp;A.&nbsp; PANDUAN TAB MENU PEMINJAMAN MANUAL</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN PEMINJAMAN MANUAL, ADMIN DAPAT MELAKUKAN PROSES PEMINJAMAN BUKU SECARA LANGSUNG DENGAN SISWA ATAU SISWI YANG DATA KE PERPUSTAKAAN. PADA TAB MENU PEMINJAMAN MANUAL, ADMIN DAPAT MENGETAHUI DATA BUKU YANG SUDAH DI BOOKING SEBELUMNYA OLEH SISWA ATAU SISWI.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN PEMINJAMAN MANUAL :</br> <br> 
<ol>
	<li>ADMIN MEMBUKA TAB MENU PEMINJAMAN MANUAL, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/pjm1.png"/><br>
	<br><li>ADMIN MENGINPUT ID BUKU DAN NOMOR INDUK SISWA.</li><br>
<img src="../../template/images/pjm2.png"/><br>
  <br><li>BILA TELAH TERINPUT SEMUA FIELD LALU TEKAN TOMBOL PINJAM BUKU. PADA TAB MENU PEMINJAMAN MANUAL ADA DUA RESPON DARI SISTEM YANG PERTAMA ADALAH RESPON BAHWA BUKU BERHASIL DIPINJAM SEPERTI GAMBAR DI BAWAH INI</li><br>
<img src="../../template/images/pjm3.png"/><br>
<br><li>LALU RESPON YANG KEDUA ADALAH RESPON DIMANA BUKU YANG AKAN DIPINJAM SUDAH TER BOOKING OLEH USER LAIN SEPERTI GAMBAR DIBAWAH INI :</li><br>
<img src="../../template/images/pjm4.png"/><br>

<p class="sectiontitle"><strong>&nbsp;B.&nbsp; PANDUAN TAB MENU PENGEMBALIAN BUKU</strong></p>
&nbsp;<br>PADA PANDUAN ADMIN PENGEMBALIAN BUKU, ADMIN DAPAT MEMPROSES PENGEMBALIAN BUKU YANG DILAKUKAN OLEH SISWA MAUPUN SISWI YANG TELAH TERDAFTAR SEBAGAI ANGGOTA DARI SISTEM INFORMASI PERPUSTAKAAN.BERIKUT ADALAH LANGKAH LANGKAH MELAKUKAN PENGEMBALIAN BUKU :</br> <br> 
<ol>
<li>ADMIN MEMBUKA TAB MENU PENGEMBALIAN BUKU, YANG AKAN TERLIHAT SEPERTI GAMBAR DIBAWAH INI
</li><br>
<img src="../../template/images/balik1.png"/><br>
<br><li>ADMIN MENGINPUT KEYWORD ID BUKU DAN NOMOR INDUK SISWA PEMINJAM.</li><br>
<img src="../../template/images/balik2.png"/><br>
<br><li>BILA TELAH TERINPUT KEYWORD YANG DIKEHENDAKI LALU TEKAN TOMBOL KEMBALIKAN BUKU. MAKA SISTEM AKAN MENAMPILKAN RESPON SEPERTI GAMBAR DI BAWAH INI YANG MENANDAKAN BUKU SUDAH DIKEMBALIKAN</li><br>
<img src="../../template/images/balik3.png"/><br>

</ol>
 
        
        <?php } ?>
    </div>
</div>
<?php //pre($this->session->all_userdata()); ?>
