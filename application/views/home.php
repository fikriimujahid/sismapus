<!-- Main jumbotron for a primary marketing message or call to action -->
<?php if ($this->session->userdata('level')) { ?>
<div class="jumbotron">
  <div class="container">
    <h1>Selamat Datang <?php echo $this->session->userdata('fname'); ?> !</h1>
    <p>Privasi Anda sangat penting bagi kami. Untuk lebih melindungi privasi Anda kami sediakan pemberitahuan ini untuk menjelaskan tentang bagaimana cara informasi dikumpulkan dan digunakan. Untuk membuat pemberitahuan ini mudah ditemukan, kami membuatnya tersedia di homepage kami.</p>
    <p><a href="<?php echo base_url()."index.php/dashboard/regist"; ?>" class="btn btn-primary btn-lg" role="button">Manage Your Resensi</a></p>
  </div>
</div>
<?php } elseif (!$this->session->userdata('level')) { ?>
<div class="jumbotron">
  <div class="container">
    <h1>Resensi Novel Populer Indonesia</h1>
    <p>Novel merupakan salah satu media yang paling diminati oleh berbagai kalangan. Apabila ceritanya menarik, tak jarang si pembaca dibawa seolah-olah ke dunia lain melalui imajinasi.</p>
    <p><a href="<?php echo base_url()."index.php/dashboard/regist"; ?>" class="btn btn-primary btn-lg" role="button">Klik disini untuk registrasi</a></p>
  </div>
</div>
<?php } ?>
<div class="container">
      <!-- Three columns of text below the carousel -->
      <div class="row">
      	<?php if($this->session->userdata("level") == '1'){ ?>
      		<?php foreach ($article as $articles) { ?>
	        <div class="col-lg-4">
	          <img class="img-circle" src="http://ptest01.url.ph/<?php echo $foto ?>" alt="Generic placeholder image" style="float: left; margin: 0px 15px 0px 0px; width: 140px; height: 140px;">
	          <h2><?php echo character_limiter($articles['judul'], 10); ?></h2>
	          <p class="blog-post-meta"><?php echo date('d F Y', strtotime($articles['date'])); ?> by <a href="#"><?php echo $name ?></a></p>
	          <p><?php echo character_limiter($articles['content'], 200); ?></p>
	          <p><a class="btn btn-default" href="<?php echo base_url()."index.php/articles/view/".$articles['judul'].'_id_'.$articles['id']; ?>" role="button">View details &raquo;</a></p>
	        </div><!-- /.col-lg-4 -->   
	        <?php } ?>  		
      	<?php } if($this->session->userdata("level") == '5' || !$this->session->userdata("level")) {?>
      		<?php foreach ($article as $articles) { ?>
	        <div class="col-lg-4">
	          <img class="img-circle" src="http://ptest01.url.ph/<?php $foto = GetValue("foto", "user", array("id" => "where/".$articles['user_id'])); echo $foto ?>" alt="Generic placeholder image" style="float: left; margin: 0px 15px 0px 0px; width: 140px; height: 140px;">
	          <h2><?php echo character_limiter($articles['judul'], 10); ?></h2>
	          <p class="blog-post-meta"><?php echo date('d F Y', strtotime($articles['date'])); ?> by <a href="#"><?php $query = GetQuery("fname, lname", "user", 'id ='. $articles['user_id'].''); $name = $query->result_array(); echo $name[0]['fname'].' '.$name[0]['lname'] ?></a></p>
	          <p><?php echo character_limiter($articles['content'], 200); ?></p>
	          <p><a class="btn btn-default" href="<?php echo base_url()."index.php/articles/view/".$articles['judul'].'_id_'.$articles['id']; ?>" role="button">View details &raquo;</a></p>
	        </div><!-- /.col-lg-4 -->
	        <?php } ?> 
        <?php } ?>
      </div><!-- /.row -->
</div> <!-- /container -->