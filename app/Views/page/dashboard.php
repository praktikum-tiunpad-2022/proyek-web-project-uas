<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>

<?php
session_start();
include 'index.php';
$level = $_SESSION["level"];
$username = $_SESSION["user"];

if($_SESSION["level"] == ""){
    header("location:login");
}

else if ($_SESSION["level"] == "1"){
    $sql = "SELECT * FROM users where username = '$username'";
}

else{
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
    <div class="section">
        <div class="container2">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang, <?php echo $row['nama'] ?>!</h4>
            </div>
        </div>
    </div>

    <footer>
		<small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
	</footer>
</body>
</html>

<?= $this->endSection('content'); ?>