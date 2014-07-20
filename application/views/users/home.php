<div class="tengah">
    <div class="info">
    	<?php foreach($buku as $value) : ?>
    		<?php if(date('F', strtotime($value['tgl_update'])) == date('F')) { ?>
    		<span><a href=""><?php echo $value['judul'] ?></a></span><br><br><br>
    		<?php } ?>
    	<?php endforeach; ?>
    	<div class="paginfo"><?php echo $this->pagination->create_links(); ?></div>
    </div>
    <div class="isibuku">
    	<center>Selamat Datang <?php echo $this->session->userdata('name'); ?></center><br>
    <div class="historypem">
            <h5 class="jdlhistory">History Peminjaman Buku</h5>
            <ul>
                <li>Nama Buku</li>
                <li>Tgl Peminjaman</li>
                <li>Tgl Pengembalian</li>
            </ul>
            <ul class="isihistory">
            	<?php if ($pinjam != null) { ?>
	            <?php foreach ($pinjam as $pinjams) { ?>
	                <li><?php echo GetValue("judul", "buku", array("id" => "where/".$pinjams['id_buku'])); ?></li>
	                <li><?php echo $pinjams['tgl_pinjam'] ?></li>
	                <li><?php echo $pinjams['tgl_balik'] ?></li>
	            <?php }} else { ?>
	               	<li rowspan='3'>Tidak ada data</li> 	
	            <?php } ?>
            </ul>
        </div>
    <div class="dftrbook">
            <h5 class="jdldftr">Daftar Booking Buku</h5>
            <ul>
                <li>Nama Buku</li>
                <li>Tgl Tersedia</li>
            </ul>
            <ul class="isidftr">
            	<?php if ($booking != null) { ?>
            	<?php foreach ($booking as $bookings) { ?>
	                <li><?php echo GetValue("judul", "buku", array("id" => "where/".$bookings['id_buku'])); ?></li>
	                <li><?php echo $bookings['tgl_balik'] ?></li>
                <?php }} else { ?>
                	<li rowspan='3'>Tidak ada data</li> 
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php //pre($this->session->all_userdata()); ?>
