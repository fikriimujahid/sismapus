<?php
include 'core/init.php';
include 'header.php';
	$pages_dir = 'pages';
if (!empty($_GET['p'])){
	$pages = scandir($pages_dir, 0);
	unset($pages[0], $pages[1]);
	$p = $_GET['p'];
	
	if(in_array($p.'.php', $pages)){
		include($pages_dir.'/'.$p.'.php');
	}else{
		echo 'Sorry, pages not found';
	}
}else{
	?><script language="javascript">window.location.replace("dashboard.php?p=home");</script><?php
}
?>
</div>
</body>
</html>