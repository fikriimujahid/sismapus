<?php
include 'core/init.php';
logged_in_redirect();

if (isset($_POST['username'])) {
	$user_name 		= $_POST['username'];
	$user_password 	= $_POST['password'];
	
	if (empty ($user_name) === true || empty($user_password) === true) {
		$errors = "<p class='error'>This is when something is wrong!</p>";
	} else if (user_exists($user_name) === false) {
		$errors = "<p class='error'>This is when something is wrong!</p>";
	} else if (user_active($user_name) === false){
		$errors = "<p class='error'>This is when something is wrong!</p>";
	} else {

		$login = login($user_name, $user_password);
		if ($login === false) {
			$errors = "Wrong password / Username";
		} else {
			$_SESSION['user_id'] = $login;
			?>
			<script language="javascript">window.location.replace("dashboard.php");</script>
			<?php
		}
	}
} else {
	$errors = '';
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistem Informasi Perpustakaan</title>
	<link href="template/css/login.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="container_16">
		<div class="grid_6 prefix_5 suffix_5">
			<h1>Sistem Informasi Perpustakaan - Login</h1>
			<div id="login">
				<?php echo $errors; ?>
				<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
					<p>
						<label><strong>Username</strong>
						<input type="text" name="username" class="inputText" id="textfield" />
						</label>
					</p>
					<p>
						<label><strong>Password</strong>
						<input type="password" name="password" class="inputText" id="textfield2" />
						</label>
					</p>
					<input class="black_button" type="submit" name="authentification" value="Authentification">  
				</form>
				<br clear="all" />
			</div>
		</div>
	</div>
	<br clear="all" />
</body>
</html>