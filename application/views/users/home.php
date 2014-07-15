<div class="tengah">
    <div class="info">
    	<?php foreach($buku as $value) : ?>
    		<?php if(date('F', strtotime($value['tgl_update'])) == date('F')) { ?>
    		<span><a href=""><?php echo $value['judul'] ?></a></span><br><br><br>
    		<?php } ?>
    	<?php endforeach; ?> 
    	<span><?php echo $this->pagination->create_links(); ?></span>
    </div>
    <div class="isibuku">
    	<?php //pre($this->session->all_userdata()); ?>
    	<center>Selamat Datang <?php echo $this->session->userdata('name'); ?></center><br>
    </div>
</div>
