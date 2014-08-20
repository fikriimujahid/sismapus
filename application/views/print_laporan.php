<link href="<?php echo base_url(); ?>template/css/style.css" rel="stylesheet">
<div class="isiuser">
<center>
	Laporan Peminjaman Buku SMP Negeri 22 Jakarta<br>
	Periode : <?php
	
	if ($tabul[1] == '01') {$bulan = "Januari"; }
	if ($tabul[1] == '02') {$bulan = "Februari"; }
	if ($tabul[1] == '03') {$bulan = "Maret"; }
	if ($tabul[1] == '04') {$bulan = "April"; }
	if ($tabul[1] == '05') {$bulan = "Mei"; }
	if ($tabul[1] == '06') {$bulan = "Juni"; }
	if ($tabul[1] == '07') {$bulan = "Juli"; }
	if ($tabul[1] == '08') {$bulan = "Agustus"; }
	if ($tabul[1] == '09') {$bulan = "September"; }
	if ($tabul[1] == '10') {$bulan = "Oktober"; }
	if ($tabul[1] == '11') {$bulan = "November"; }
	if ($tabul[1] == '12') {$bulan = "Desember"; }
	 
	echo $bulan.' Tahun '.$tabul[0];
	?>
</center>
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