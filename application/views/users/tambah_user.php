<div class="formsiswa">
	<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/user/tambah_user/ins"; ?>" accept-charset="utf-8">
		<div class="warning">
			<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
			<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
		</div>		
	    <input type="text" placeholder="Nomor Induk Siwa" name="nis">
	    <input type="text" placeholder="Nama Siswa" name="nama">
	    <input type="text" placeholder="Alamat" name="alamat">
	    <select name="kelamin">
	        <option value="L">Laki-laki</option>
	        <option value="P">Perempuan</option>
	    </select>
	    <input type="text" placeholder="Password" name="password">
	    <input type="submit" value="Tambah" name="tambahsiswa">
	</form>
</div>