<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo $flashmessage; }?>
<div class="formpinjam">
<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/buku/cari_buku"; ?>" accept-charset="utf-8">
    <label for="tglsedia"><center>Cari Buku</center></label>
	<input type="text" placeholder="Keyword Judul Buku" name="judul" required>
    <input type="submit" value="Submit" name="pinjam">
</form>
</div>
<?php if($buku != null){ ?>
<div class="formsiswa">
	<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/buku/edit_buku/ins/".$buku['id']; ?>" accept-charset="utf-8">
		<div class="warning">
			<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
			<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
		</div>		
	    <input type="text" placeholder="Judul Buku" name="judul" value="<?php echo $buku['judul']; ?>">
	    <input type="text" placeholder="Pengarang" name="pengarang" value="<?php echo $buku['pengarang']; ?>">
	    <input type="text" placeholder="Penerbit" name="penerbit" value="<?php echo $buku['penerbit']; ?>">
	    <select name="kategori">
	    	<?php foreach($kategori as $values) { ?>
	    		<option value="<?php echo $values['id']; ?>"> <?php echo $values['nama_kategori']; ?> </option>	
	    	<?php } ?>	
	    </select>
	    <input type="text" placeholder="Stock" name="stock" value="<?php echo $buku['stock']; ?>">
	    <input type="submit" value="Tambah Buku" name="tambahbuku">
	</form>
</div>
<?php } ?>