<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo $flashmessage; }?>
<div class="formpinjam">
<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/buku/cari_buku"; ?>" accept-charset="utf-8">
    <label for="tglsedia"><center>Cari Buku</center></label>
	<input type="text" placeholder="Keyword Judul Buku" name="judul" required>
    <input type="submit" value="Submit" name="pinjam">
</form>
</div>
<?php if($pencarian != null){ ?>
<div class="isiuser">
    <ul>
        <li>ID Buku</li>
        <li>Nama Buku</li>
        <li>Pengarang</li>
        <li>Penerbit</li>
        <li>Kategori</li>
        <li>Stok</li>
        <li>Ketersediaan Buku</li>
        <li>Pinjam</li>
        <?php if($this->session->userdata("level") == '10') {?><li>Update Buku</li> <?php }?>
    </ul>
    <!-- while looping-->
    <?php foreach ($pencarian as $value) { ?>
    <ul class="isilooping">
	        <li><?php echo $value['id'] ?></li>
	        <li><?php echo $value['judul'] ?></li>
	        <li><?php echo $value['pengarang'] ?></li>
	        <li><?php echo $value['penerbit'] ?></li>
	        <li><?php echo $value['kategori'] ?></li>
	        <li><?php echo $value['stock'] ?></li>
	        <li><?php if($value['stock'] == 0) {
	        	$tgl_balik = GetQuery("tgl_balik", "booking", 'id_buku = '.$value['id'].'')->result_array();
				echo $tgl_balik[0]['tgl_balik'];
	        } else {
	        	echo 'Tersedia';
	        }?></li>
	        <li><a href="<?php echo base_url()."index.php/buku/pinjam_buku/".$value['id']; ?>">Pinjam Buku</a></li>
	        <?php if($this->session->userdata("level") == '10') {?><li><a href="<?php echo base_url()."index.php/buku/edit_buku/src/".$value['id']; ?>">Update Buku</a></li><?php }?>
        </ul>
	    <?php } ?>
</div>	
<?php } ?>
