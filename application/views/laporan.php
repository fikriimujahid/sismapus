<div class="formsiswa">
	<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/laporan/periode/" ?>" accept-charset="utf-8">
		<div class="warning">
			<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
			<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
		</div>		
	    <select name="bulan">
	        <option value="01">Januari</option>
	        <option value="02">Februari</option>
	        <option value="03">Maret</option>
	        <option value="04">April</option>
	        <option value="05">Mei</option>
	        <option value="06">Juni</option>
	        <option value="07">Juli</option>
	        <option value="08">Agustus</option>
	        <option value="09">September</option>
	        <option value="10">Oktober</option>
	        <option value="11">November</option>
	        <option value="12">Desember</option>
	    </select>
	    <select name="tahun">
	    	<option value="2013">2013</option>
	        <option value="2014">2014</option>
	        <option value="2015">2015</option>
	    </select>	    
	    <input type="submit" value="Cari Data Peminjaman" name="pinjam">
	</form>
</div>
<?php if($pencarian != null){ ?>
<center><a href="<?php echo base_url()."index.php/laporan/print_laporan/".$tabul; ?>">Print Laporan</a></center>
<div class="isiuser">
    <ul>
        <li>ID Buku</li>
        <li>Nama Buku</li>
        <li>Total Peminjaman</li>
    </ul>
    <!-- while looping-->
    <?php foreach ($pencarian as $value) { ?>
    <ul class="isilooping">
	        <li><?php echo $value['id'] ?></li>
	        <li><?php echo GetValue("judul", "buku", array("id" => "where/".$value['id_buku'])); ?></li>
	        <li><?php echo $value['count'] ?></li>
     </ul>
     <?php } ?>
</div>
<?php } else if($pencarian == null) {?>
<div class="isiuser">
    <ul>
        <li>ID Buku</li>
        <li>Nama Buku</li>
        <li>Total Peminjaman</li>
    </ul>
    <!-- while looping-->
    <ul class="isilooping">
	        <li rowspan='3'>Tidak ada peminjaman</li>
     </ul>
</div>	
<?php } ?>