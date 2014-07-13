<?php
include("koneksi.php");
global $db; //wajib
?>
<html>
    <head>
        <title>Perpustakaan</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        // check email sama password
        // cookie di cek dulu
       if(isset($_COOKIE['nama']) && isset($_COOKIE['password'])){
                $idadmin=$_COOKIE['nama'];
                $passadmin=$_COOKIE['password'];
         
        }
        // kalau cookie kosong baru menggunakan input
        else{       if (isset($_POST['btnlgn'])){
                    $idadmin = isset($_POST['nama']) ? $_POST['nama'] : null;
                    $passadmin = isset($_POST['password']) ? md5($_POST['password']) : null;
                    }
            }
                    global $idadmin;
                    global $passadmin;
                    $sql="SELECT * FROM admin WHERE nama='$idadmin' and password='$passadmin'";
                    $result= mysqli_query($db,$sql);
                    $row= mysqli_fetch_array($result);
                    $count= mysqli_num_rows($result);
                    $gagal= $idadmin != $row['nama'] || $passadmin != $row['password'];
                    $masuk= $count>0;
        
?>
        <!-- form login -->
        <div class="lgn" id="lgn">
            <form class="formlgn" id="formlgn" method="post">
            <input type="text" id="username" name="nama" autocomplete="off" placeholder="Nama">
            <input type="password" id="password" name="password" placeholder="Password">
            <input type="submit" value="Masuk" id="btnlgn" name="btnlgn">
            </form>
        </div>
        <!--masuk-->
        <?php if($masuk) {
        session_start();
            setcookie('nama', $idadmin, time() + 1*24*60*60);
            setcookie('password', $passadmin, time() + 1*24*60*60);
        ?>
        <style>.lgn{display:none;}</style>
        <div class="atas">
            <div class="cover"><img></div>
            <div class="menu">
                <ul>
                    <li>Menu A</li>
                    <li>Menu B</li>
                    <li>Menu C</li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="tengah">
            <div class="info">
                <span>akaka</span></div>
            <div class="isibuku">dfdf</div>
        </div>
        <div class="bawah"><span>Created By Yopi</span></div>
        <?php } ?>
    </body>

</html>