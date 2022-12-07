<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
	<header>
		<div class="container" style="background-color: #555555; color: #ffffff;">
			<ul style="list-style-type: none;">
				<li style="display: inline-block">
					<h1><a href="dashboard"></a>MyStreamingList</h1>
				</li>
				<li style="display: inline-block; float: right;margin-left:20px;"><a href="login">
						<div class="btn2">Login</div>
					</a>
				</li>
				<li style="display: inline-block;  float: right;" ;><a href="register">
						<div class="btn2">Sign Up</div>
					</a>
				</li>
			</ul>
		</div>
	</header>

	<div class="box-login">
		<h5 style="text-align: center;"><b>Login to MyStreamingList</b></h5>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username/Email" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn-login">
		</form>
		<?php
		if (isset($_POST['submit'])) {
			session_start();
			include 'index.php';
			$user = $_POST['user'];
			$pass = $_POST['pass'];

			$sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '" . $user . "' OR email = '" . $user . "' AND password = '" . MD5($pass) . "'");

			if (mysqli_num_rows($sql) > 0) {
				$row = mysqli_fetch_assoc($sql);
				$_SESSION['level'] = $row["level"];
				$_SESSION['user'] = $row["username"];
				echo '<script>window.location="/dashboard"</script>';	/*untuk lanjut ke dashboard*/
			} else {
				echo '<script>alert("Username atau Password Anda salah!")</script>';	/*munculin notif gagal login*/
			}
		}
		?>
		<p style="text-align: center; margin-top: 30px;"><a href="password">Forgot Password</a></p>
		<p style="text-align: center;">Don't have an account yet? <br><a href="register">Sign Up</a> here</p>
	</div>

	<footer>
		<small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
	</footer>
</body>

</html>