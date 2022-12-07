<?php
    session_start();
    include 'index.php';
    $level = $_SESSION["level"];
    $username = $_SESSION["user"];

    if ($_SESSION["level"] == "") {
        header("location:login");
    } else {
        $sql = "SELECT * FROM users where username='" . $username . "'";
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
    <title>Form Biodata</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
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
    <div class="section" style="margin-left: 350px;">
        <div class="container2">
            <h3>Tambah data</h3>
            <div class="box">
                <p>
                <div class="btn-okay"><a href="streaming">Kembali</a></div>
                </p>
                <form action="" method="POST" style="text-align: center;">
                    <input type="text" name="username" placeholder="Username" class="input-control" value="<?php echo $row->username ?>" readonly>
                    <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $row->email ?>" required>
                    <input type="text" name="nama" placeholder="Nama" class="input-control" value="<?php echo $row->nama ?>" required>
                    <input type="submit" name="update_data" value="Update data" class="btn">
                </form>
                <?php
                if (isset($_POST['update_data'])) {
                    $email = $_POST['email'];
                    $nama = ucwords($_POST['nama']);

                    $update = mysqli_query($koneksi, "UPDATE users SET email='" . $email . "', 
                                                                    nama='" . $nama . "'
                                                                    where username='" . $username. "'");
                    if ($update) {
                        echo '<script>alert("Profil berhasil diperbarui!")</script>';
                        echo '<script>window.location="profil"</script>';    
                    } else {
                        echo 'Data gagal diperbarui!' . mysqli_error($koneksi);
                    }
                }
                ?>
            </div>
        </div>
        <div class="container2">
            <div class="box3">
        <h5 style="text-align: center;"><b>Ubah Password</b></h5>
		<form action="" method="post">
			<input type="password" name="pass" placeholder="New Password" class="input-control">
			<input type="submit" name="submit" value="Submit" class="btn-login">
		</form>
		<?php
		if (isset($_POST['submit'])) {
			$pass = $_POST['pass'];

			$update = mysqli_query($koneksi, "UPDATE users SET password='" . MD5($pass) . "'
                                                                    where username='" . $_SESSION['user'] . "'");
			if ($update) {
				echo '<script>alert("Password berhasil diperbarui!")</script>';
				echo '<script>window.location="profil"</script>';
			} else {
				echo 'Data gagal diperbarui!' . mysqli_error($koneksi);
			}
		}
		?>
        </div>

    </div>

    <!--footer-->
    <footer>
        <div class="container"></div>
        <small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
    </footer>
</body>

</html>