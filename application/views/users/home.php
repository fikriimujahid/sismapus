<center><div class="warning">
	<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
	<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
</div></center>	
<div class="tengah">
	<?php if ($this->session->userdata('level') == '1'){ ?>
    <div class="info">
    	<?php foreach($buku as $value) : ?>
    		<?php if(date('F', strtotime($value['tgl_update'])) == date('F')) { ?>
    		<span><a href=""><?php echo $value['judul'] ?></a></span><br><br><br>
    		<?php } ?>
    	<?php endforeach; ?>
    	<div class="paginfo"><?php echo $this->pagination->create_links(); ?></div>
    </div>
    <?php } if ($this->session->userdata('level') == '10'){ ?>
    <div class="info2">
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_olah_user"; ?>">Panduan Olah User</a></span><br><br>
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_olah_buku"; ?>">Panduan Olah Buku</a></span><br><br>
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_olah_peminjaman"; ?>">Panduan Olah Peminjaman</a></span><br><br>
    	<span><a href="<?php echo base_url()."index.php/dashboard/panduan_laporan_buku"; ?>">Panduan Laporan Buku</a></span><br><br>
    </div>
    <?php } ?>    
    <div class="isibuku">
    	<?php if ($this->session->userdata('level') == '1'){ ?>
    	<center>Selamat Datang <?php echo $this->session->userdata('name'); ?></center><br>
    	<div class="historypem">
            <h5 class="jdlhistory">History Peminjaman Buku</h5>
            <ul>
                <li>Nama Buku</li>
                <li>Tgl Peminjaman</li>
                <li>Tgl Pengembalian</li>
                <li>Status</li>
            </ul>

            <!-- Looping sebelum ul -->
            <?php if ($pinjam != null) { ?>
            <?php foreach ($pinjam as $pinjams) { ?>
            <ul class="isihistory">
	                <li title="<?php echo GetValue("judul", "buku", array("id" => "where/".$pinjams['id_buku'])); ?>"><?php echo GetValue("judul", "buku", array("id" => "where/".$pinjams['id_buku'])); ?></li>
	                <li><?php echo $pinjams['tgl_pinjam'] ?></li>
	                <li><?php echo $pinjams['tgl_balik'] ?></li>
	                <?php if($pinjams['status'] == 1)  {?><li>Belum Dikembalikan</li><?php } else if($pinjams['status'] == 0) { echo '<li>Sudah Dikembalikan</li>';} ?>
            </ul>
	        <?php }} else { ?>
            <ul class="isihistory">
	               	<li rowspan='3'>Tidak ada data</li> 
            </ul>
	            <?php } ?>
            <!-- akhir looping -->
        </div>
    	<div class="dftrbook">
            <h5 class="jdldftr">Daftar Booking Buku</h5>
            <ul>
                <li>Nama Buku</li>
                <li>Tgl Tersedia</li>
            </ul>
            
            <?php if ($booking != null) { ?>
            <?php foreach ($booking as $bookings) { ?>
            <ul class="isidftr">
	                <li title="<?php echo GetValue("judul", "buku", array("id" => "where/".$bookings['id_buku'])); ?>"><?php echo GetValue("judul", "buku", array("id" => "where/".$bookings['id_buku'])); ?></li>
	                <li><?php echo $bookings['tgl_balik'] ?></li>
            </ul>
                <?php }} else { ?>
             <ul class="isidftr">
                	<li rowspan='3'>Tidak ada data</li>
            </ul>
                <?php } ?>
            
        </div>
        <?php } if ($this->session->userdata('level') == '10'){ ?>
            <p class="welcadm">Selamat Datang di <br> Sistem Manajeman Perpustakaan Online</p>
        <?php } ?>
    </div>
</div>
<?php //pre($this->session->all_userdata()); ?>
