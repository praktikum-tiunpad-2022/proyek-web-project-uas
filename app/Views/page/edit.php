 <?php
    session_start();
    include 'index.php';
    $level = $_SESSION["level"];
    $username = $_SESSION["user"];

    if ($_SESSION["level"] == "") {
        header("location:login");
    } else if ($_SESSION["level"] == "1") {
        $sql = "SELECT * FROM data, kategori, negara where data.id_negara = negara.id_negara AND data.id_kategori=kategori.id_kategori AND data.id_data='" . $_GET['id'] . "'";
    } else {
        $sql = "SELECT * FROM data, kategori, negara where data.id_negara = negara.id_negara AND data.id_kategori=kategori.id_kategori AND data.id_data='" . $_GET['id'] . "'";
    }

    $hasil = $koneksi->query($sql);

    $row = $hasil->fetch_object();

    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Data Streaming</title>
     <link rel="stylesheet" type="text/css" href="style.css">
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
                     <li style="display: inline-block; float: right;"><a href="login">
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
     <!--content-->
     <div class="section">
         <div class="container2">
             <h3>Edit Data data</h3>
             <div class="box">
                 <form action="" method="POST">
                     <p>
                     <div class="btn3"><a href="streaming">Kembali</a></div>
                     </p>
                     <input type="text" name="id_data" placeholder="Kode Streaming" class="input-control" value="<?php echo $row->id_data ?>" readonly>
                     <input type="text" name="judul" placeholder="Judul" class="input-control" value="<?php echo $row->judul ?>" required>
                     <input type="text" name="tahun" placeholder="Tahun Rilis" class="input-control" value="<?php echo $row->tahun ?>" required>
                     <input type="text" name="id_negara" placeholder="Asal Negara (cn/jpn/id/tl/kr/hk/us)" class="input-control" value="<?php echo $row->id_negara ?>" required>
                     <input type="text" name="id_kategori" placeholder="Kategori (drama/movies/series/tvshow)" class="input-control" value="<?php echo $row->id_kategori ?>" required>
                     <input type="text" name="status" placeholder="Status (wishlist/ongoing/finished)" class="input-control" value="<?php echo $row->status ?>" required >
                     <input type="submit" name="update_data" value="Update data" class="btn">
                 </form>
                 <?php
                    if (isset($_POST['update_data'])) {
                        $judul = ucwords($_POST['judul']);
                        $tahun = $_POST['tahun'];
                        $status = ucwords($_POST['status']);
                        $id_kategori = ($_POST['id_kategori']);
                        $id_negara = ($_POST['id_negara']);

                        $update = mysqli_query($koneksi, "UPDATE data SET judul='" . $judul . "', 
                                                                    tahun='" . $tahun . "', 
                                                                    status='" . $status . "', 
                                                                    id_kategori='" . $id_kategori . "',
                                                                    id_negara='" . $id_negara . "'
                                                                    where id_data='" . $row->id_data . "'");
                        if ($update) {
                            echo '<script>alert("Data berhasil diperbarui!")</script>';
                            echo '<script>window.location="streaming"</script>';
                        } else {
                            echo 'Data gagal diperbarui!' . mysqli_error($koneksi);
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