<div class="cover2">			
	<div class="lgn" id="lgn">
	    <form class="formlgn" id="formlgn" method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/user/login_validation"; ?>" accept-charset="utf-8">
		    <input type="text" id="username" name="nis" autocomplete="off" placeholder="Nomor Induk Siswa">
		    <input type="password" id="password" name="password" placeholder="Password">
			<?php echo validation_errors('<p class="btn btn-xs btn-danger">'); ?>
			<?php $flashmessage = $this->session->flashdata('flash_message'); if($flashmessage) { echo '<p class="btn btn-xs btn-info">'.$flashmessage.'</p>'; } ?>				    
		    <input type="submit" value="Masuk" id="btnlgn" name="btnlgn">
	    </form>
	</div>
</div>