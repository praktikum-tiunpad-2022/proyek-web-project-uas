<?php
session_start();
include 'index.php';
$level = $_SESSION["level"];
$username = $_SESSION["user"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <header>
        <div class="container" style="background-color: #555555; color: #ffffff;">
            <ul style="list-style-type: none;">
                <li style="display: inline-block">
                    <h1><a href="dashboard"></a>MyStreamingList</h1>
                </li>
                <?php
                if ($_SESSION['level'] == "") {
                ?>
                    <li style="display: inline-block; float: left;"><a href="login">
                            <div class="btn2">Login</div>
                        </a>
                    </li>
                    <li style="display: inline-block;  float: left;" ;><a href="register">
                            <div class="btn2">Sign Up</div>
                        </a>
                    </li>
                <?php
                }
                ?>
                <?php
                if ($_SESSION['level'] == "1" || $_SESSION['level'] == "2") {
                ?>
                    <li style="display: inline-block; float: right;"><a href="logout">
                            <div class="btn2">Logout</div>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container2">
            <h3>TAmbah data</h3>
            <div class="box">
                <p><div class="btn3"><a href="streaming">Kembali</a></div></p>
                <form action="" method="POST">
                    <input type="text" name="id_data" placeholder="Kode Streaming" class="input-control" required>
                    <input type="text" name="judul" placeholder="Judul" class="input-control" required>
                    <input type="text" name="tahun" placeholder="Tahun Rilis" class="input-control" required>
                    <input type="text" name="id_negara" placeholder="Asal Negara (cn/jpn/id/tl/kr/hk/us)" class="input-control" required>
                    <input type="text" name="id_kategori" placeholder="Kategori (drama/movies/series/tvshow)" class="input-control" required>
                    <input type="text" name="status" placeholder="Status (wishlist/ongoing/finished)" class="input-control" required>
                    <input type="submit" name="add_data" value="Add data" class="btn">
                </form>
                <?php
                    if(isset($_POST['add_data'])){
                        $id_data = $_POST['id_data'];
                        $judul = ucwords($_POST['judul']);
                        $tahun = $_POST['tahun'];
                        $status = ucwords($_POST['status']);
                        $id_kategori = ($_POST['id_kategori']);
                        $id_negara = ($_POST['id_negara']);

                        $insert = mysqli_query($koneksi, "INSERT into data VALUES ('".$judul."','".$tahun."','".$id_negara."','".$id_kategori."','".$id_data."','".$username."','".$status."')");
                        if($insert){
                            echo '<script>alert("Data berhasil ditambahkan!")</script>>';
                            echo '<script>window.location="streaming"</script>';
                        }
                        else{
                            echo 'Data gagal ditambahkan!'.mysqli_error($koneksi);
                        }
                    }
                ?>
            </div>
        </div>
        <div class="container3">
            
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="container"></div>
        <small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
    </footer>
</body>

</html>