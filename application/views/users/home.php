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
    	<?php //pre($this->session->all_userdata()); ?>
    	<center>Selamat Datang <?php echo $this->session->userdata('name'); ?></center><br>
    <div class="historypem">
            <h5 class="jdlhistory">History Peminjaman Buku</h5>
            <ul>
                <li>Nama Buku</li>
                <li>Tgl Peminjaman</li>
                <li>Tgl Pengembalian</li>
                <li>Denda Peminjaman</li>
            </ul>
            <ul class="isihistory">
                <li>isi</li>
                <li>isi</li>
                <li>isi</li>
                <li>isi</li>
            </ul>
        </div>
    <div class="dftrbook">
            <h5 class="jdldftr">Daftar Booking Buku</h5>
            <ul>
                <li>Nama Buku</li>
                <li>Tgl Tersedia</li>
            </ul>
            <ul class="isidftr">
                <li>isi</li>
                <li>isi</li>
            </ul>
        </div>
    </div>
</div>
