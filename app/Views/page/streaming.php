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
    <title>Data Streaming</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style.css'); ?>">
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
            <h3>Data Streaming</h3>
            <div class="box">
                <p>
                    <a href="/add">
                        <div class="btn-okay" style="margin-bottom:20px;">Tambah Data</div>
                    </a>
                </p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="">No.</th>
                            <th width="300px">Kode Streaming</th>
                            <th width="700px">Judul</th>
                            <th width="200px">Tahun Rilis</th>
                            <th width="150px">Kategori</th>
                            <th width="150px">Asal Negara</th>
                            <th width="50px">Status</th>
                            <?php
                            if ($_SESSION['level'] === "2") :
                            ?>
                                <th width="">Username</th>
                            <?php
                            endif;
                            ?>
                            <th width="50px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'index.php';
                        if ($_SESSION['level'] === "1") {
                            $data = mysqli_query($koneksi, "SELECT * from data join negara join kategori where data.id_negara = negara.id_negara and data.id_kategori=kategori.id_kategori and data.username='" . $_SESSION['user'] . "' order by id_data desc");
                        } else {
                            $data = mysqli_query($koneksi, "SELECT * from data join negara join kategori where data.id_negara = negara.id_negara and data.id_kategori=kategori.id_kategori order by id_data desc");
                        }
                        $filter = mysqli_query($koneksi, "SELECT * from data where status='finished'");
                        $fin = mysqli_fetch_array($filter);
                        $no = 1;
                        if (mysqli_num_rows($data) > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?>.</td>
                                    <td><?php echo $row['id_data'] ?></td>
                                    <td><?php echo $row['judul'] ?></td>
                                    <td><?php echo $row['tahun'] ?></td>
                                    <td><?php echo $row['nama_kategori'] ?></td>
                                    <td><?php echo $row['nama_negara'] ?></td>
                                    <td width="">
                                        <?php
                                        if (mysqli_num_rows($filter) == 0 || $row['status'] != $fin['status']) {
                                        ?>
                                            <a href="edit?id=<?php echo $row['id_data'] ?>">
                                                <div class="btn-okay"><?php echo $row['status'] ?></div>
                                            </a>
                                        <?php } else {
                                        ?>
                                            <a href="edit?id=<?php echo $row['id_data'] ?>">
                                                <div class="btn-okay"><?php echo $row['status'] ?></div>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <?php
                                    if ($_SESSION['level'] === "2") :
                                    ?>
                                        <td width=""><?php echo $row['username'] ?></td>
                                    <?php
                                    endif;
                                    ?>
                                    <td width="50px">
                                        <a href="edit?id=<?php echo $row['id_data'] ?>">
                                            <div class="btn-register">Edit</div><a href="delete?del_id=<?php echo $row['id_data'] ?>" onclick="return confirm('Data yang telah dihapus tidak dapat dikembalikan. Yakin ingin menghapus?')">
                                                <div class="btn-alert">Hapus</div>
                                            </a>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else { ?>
                            <tr>
                                <?php if ($_SESSION['level'] === "1") {
                                    ?><td colspan="8">Tidak ada data</td>
                                <?php
                                } else {
                                    ?><td colspan="9">Tidak ada data</td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer>
        <small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
    </footer>
</body>

</html>