<div class="formsiswa">
	<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/buku/peminjaman_manual/pjm/" ?>" accept-charset="utf-8">
		<div class="warning">
			<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
			<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
		</div>		
	    <input type="text" placeholder="ID Buku" name="id">
	    <input type="text" placeholder="NIS Peminjam" name="nis">
	    <input type="submit" value="Pinjam Buku" name="pinjam">
	</form>
</div>