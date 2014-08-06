<link href="<?php echo base_url(); ?>template/css/style.css" rel="stylesheet">
<div class="isiuser">
    <ul>
        <li>ID Buku</li>
        <li>Nama Buku</li>
        <li>Total Peminjaman</li>
    </ul>
    <!-- while looping-->
    <?php foreach ($pencarian as $value) { ?>
    <ul class="isilooping">
	        <li><?php echo $value['id'] ?></li>
	        <li><?php echo GetValue("judul", "buku", array("id" => "where/".$value['id_buku'])); ?></li>
	        <li><?php echo $value['count'] ?></li>
     </ul>
     <?php } ?>
</div>