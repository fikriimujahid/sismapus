<div class="formpinjam">
<div class="warning">
	<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
	<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
</div>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/buku/kategori/ins"; ?>" accept-charset="utf-8">
    <label for="tglsedia"><center>Tambah Kategori</center></label>
	<input type="text" placeholder="Nama Kategori" name="nama" required>
    <input type="submit" value="Submit" name="pinjam">
</form>
</div>
<div class="isiuser">
    <ul>
        <li>ID Kategori</li>
        <li>Nama Kategori</li>
        <li>Action</li>
    </ul>
    <!-- while looping-->
    <?php foreach ($kategori as $value) { ?>
    <ul class="isilooping">
	        <li><?php echo $value['id'] ?></li>
	        <li><?php echo $value['nama_kategori'] ?></li>
	        <li><a href="<?php echo base_url()."index.php/buku/kategori/del/".$value['id']; ?>">Hapus</a></li>
     </ul>
        <?php } ?>
</div>