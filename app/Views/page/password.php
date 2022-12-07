<?php
session_start();
include 'index.php';
?>

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
		<h5 style="text-align: center;"><b>Forgot Password</b></h5>
		<form action="" method="post">
			<input type="text" name="user" placeholder="Username/Email" class="input-control">
			<input type="password" name="pass" placeholder="New Password" class="input-control">
			<input type="submit" name="submit" value="Submit" class="btn-login">
		</form>
		<?php
		if (isset($_POST['submit'])) {
			$username = ($_POST['user']);
			$pass = $_POST['pass'];

			$update = mysqli_query($koneksi, "UPDATE users SET password='" . MD5($pass) . "'
                                                                    where username='" . $username . "'
																	or email='" . $username . "'");
			if ($update) {
				echo '<script>alert("Password berhasil diperbarui!")</script>';
				echo '<script>window.location="/"</script>';
			} else {
				echo 'Data gagal diperbarui!' . mysqli_error($koneksi);
			}
		}
		?>
	</div>

	<footer>
		<small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
	</footer>
</body>

</html>