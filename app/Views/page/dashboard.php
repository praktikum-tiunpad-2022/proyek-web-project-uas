<?php
session_start();
include 'index.php';
$level = $_SESSION["level"];
$username = $_SESSION["user"];

if ($_SESSION["level"] == "") {
	header("location:/");
} else if ($_SESSION["level"] == "1") {
	$sql = "SELECT * FROM users where username = '$username'";
} else {
	$sql = "SELECT * FROM users order by username";
}

$hasil = $koneksi->query($sql);

$row = $hasil->fetch_assoc();

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
				<?php
				if ($_SESSION['level'] == "") {
				?>
					<li style="display: inline-block; float: right; margin-left:20px;"><a href="login">
							<div class="btn2">Login</div>
						</a>
					</li>
					<li style="display: inline-block;  float: right;" ;><a href="register">
							<div class="btn2">Sign Up</div>
						</a>
					</li>
				<?php
				}
				?>
				<?php
				if ($_SESSION['level'] == "1" || $_SESSION['level'] == "2") {
				?>
					<li style="display: inline-block; float: right; margin-left:20px;"><a href="logout">
							<div class="btn2">Logout</div>
						</a>
					</li>
					<li style="display: inline-block; float: right; margin-left:20px"><a href="dashboard">
                            <div class="btn2">Dashboard</div>
                        </a>
                    </li>
                    <li style="display: inline-block; float: right;"><a href="profile">
                            <div class="btn2">Profil</div>
                        </a>
                    </li>
				<?php
				}
				?>
			</ul>
		</div>
	</header>
	<div class="section">
		<div class="container2">
			<h3>Dashboard</h3>
			<div class="box">
				<h4>Selamat Datang, <?php echo $row['nama'] ?>!</h4>
				<p>Click <a href="streaming">here</a> to continue to List</p>
			</div>
		</div>
	</div>

	<footer>
		<small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
	</footer>
</body>

</html>