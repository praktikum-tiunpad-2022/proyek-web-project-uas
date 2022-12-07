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
				<li style="display: inline-block; float: right;margin-left:20px;"><a href="/">
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
		<p>
		<h5 style="text-align: center;"><b>Join to MyStreamingList</b>
			<p style="text-align: center; font-size:small; margin-top:10px;">list, track, and organize your streaming lists</p>
		</h5>
		</p>
		<form action="" method="post">
			<input type="text" name="user" placeholder="Username" class="input-control" required>
			<input type="password" name="pass" placeholder="Password" class="input-control" required>
			<input type="email" name="email" placeholder="Email" class="input-control" required>
			<input type="text" name="level" placeholder="Level ([1]Regular | [2]Superuser)" class="input-control" required>
			<input type="text" name="name" placeholder="Nama" class="input-control" required>
			<input type="submit" name="submit" value="Sign Up" class="btn-login" required>
		</form>
		<p style="text-align: center; margin-top: 40px;">If you already have an account, <a href="/">Login</a></p>
		<?php
		if (isset($_POST['submit'])) {
			include 'index.php';
			$user = $_POST['user'];
			$pass = ($_POST['pass']);
			$email = $_POST['email'];
			$level = ($_POST['level']);
			$nama = ucwords($_POST['name']);

			$insert = mysqli_query($koneksi, "INSERT into users VALUES ('" . $user . "','" . MD5($pass) . "','" . $email . "','" . $level . "','" . $nama . "')");
			if ($insert) {
				echo '<script>alert("Registrasi berhasil!")</script>>';
				echo '<script>window.location="/"</script>';
			} else {
				echo 'Registrasi gagal!' . mysqli_error($koneksi);
			}
		}
		?>
	</div>

	<footer>
		<small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
	</footer>
</body>

</html>