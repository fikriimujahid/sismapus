<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo $flashmessage; }?>
<div class="formpinjam">
<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/buku/manage_buku/src"; ?>" accept-charset="utf-8">
    <label for="tglsedia"><center>Cari Buku</center></label>
	<input type="text" placeholder="Keyword Judul Buku" name="judul" required>
    <input type="submit" value="Submit" name="pinjam">
</form>
</div>
<?php if($pencarian != null){ ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="formsiswa">
	<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/user/manage_user/ins"; ?>" accept-charset="utf-8">
		<div class="warning">
			<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
			<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
		</div>		
	    <input type="text" placeholder="Nomor Induk Siwa" name="nis" value="<?php echo $pencarian['nis'] ?>">
	    <input type="text" placeholder="Nama Siswa" name="nama" value="<?php echo $pencarian['name'] ?>">
	    <input type="text" placeholder="Alamat" name="alamat" value="<?php echo $pencarian['alamat'] ?>">
	    <select name="kelamin">
	    	<?php 
	    	$default = $pencarian['jk'];
			$states	 = array(
				'L'  => 'Laki - Laki',
				'P'  => 'Perempuan'
			);
			foreach($states as $key=>$val) {
				echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
			}
			?>
	    </select>
	    <select name="level">
	    	<?php 
	    	$default = $pencarian['level'];
			$states	 = array(
				'1'  => 'User',
				'10' => 'Admin'
			);
			foreach($states as $key=>$val) {
				echo ($key == $default) ? "<option selected=\"selected\" value=\"$key\">$val</option>":"<option value=\"$key\">$val</option>";
			}
			?>
	    </select>	    
	    <input type="text" placeholder="Password" name="password">
	    <input type="hidden" name="id" value="<?php echo $pencarian['id']; ?>">
	    <input type="submit" value="Tambah" name="tambahsiswa">
	</form>
</div>	
<?php } ?>
