<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>

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
	<div class="box-login">
		<h5 style="text-align: center;"><b>Forgot Password</b></h5>
		<form action="">
			<input type="text" name="user" placeholder="Username/Email" class="input-control">
			<input type="password" name="pass" placeholder="New Password" class="input-control">
			<input type="submit" name="submit" value="Submit" class="btn-login">
		</form>
	</div>

	<footer>
		<small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
	</footer>
</body>

</html>

<?= $this->endSection('content'); ?>