<html>
    <head>
        <title>Perpustakaan</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>       
        <!--Bagian Isi-->
        <div class="atas">
            <div class="cover"><img src="library.jpg" width="100%" height="100%"></div>
            <!--kondisi User ( admin atau user)-->
            <div class="menu">
                <ul>
				<?php
				if ($_SESSION['user_id'] == 1) { ?>
                    <li><a href="dashboard.php">Home</a></li>
                    <li>Menu B</li>
                    <li>Menu C</li>
                    <li>Menu D</li>
				<?php } if ($_SESSION['user_id'] == 2) { ?>
                    <li>Home</li>
                    <li>Menu B</li>
                    <li>Menu C</li>
                    <li>Menu D</li>
				<?php }	?>     				
                </ul>
            </div>
        </div>