<?= $this->extend('/base'); ?>

<?= $this->section('content'); ?>

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
    <div class="container-box">
        <form>
            <div>
                <label for="name" class="label-form">Nama</label>
                <input id="nama" class="input-control" type="text" placeholder="Nama Lengkap" autocomplete="off">
            </div>
            <div>
                <label for="tpt_lahir">Tempat Lahir</label>
                <input type="text" id="tpt_lahir" name="tpt_lahir" class="input-control" placeholder="Tempat Lahir" autocomplete="off" required>
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" class="input-control" required>
            </div>
            <div>
                <label for="alamat" class="label-form">Alamat</label>
                <textarea class="input-control" name="alamat" id="alamat" placeholder="Alamat Lengkap"></textarea>
            </div>
            <div id="email-input">
                <label for="email" class="label-form">Email</label>
                <input id="nama" class="input-control" type="email" placeholder="Alamat Email" autocomplete="off">
            </div>
            <div id="telp-input">
                <label for="phone" class="label-form">Nomor Telepon</label>
                <input id="phone" class="input-control" type="text" placeholder="Nomor Telepon Pribadi" autocomplete="off">
            </div>
            <div id="jk">
                <label for="genders" class="label-form">Jenis Kelamin</label>
                <div id="genders">
                    <input type="radio" class="btn-check" name="jk" id="laki" value="Laki-Laki" autocomplete="off">
                    <label class="btn btn-outline-primary" for="laki">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                        </svg>
                        Laki-laki
                    </label>
                    <input type="radio" class="btn-check" name="jk" id="perempuan" value="Perempuan" autocomplete="off">
                    <label class="btn btn-outline-danger" for="perempuan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z" />
                        </svg>
                        Perempuan
                    </label>
                </div>
            </div>
            <div id="agree-input">
                <input id="agree" name="agree" type="checkbox" value="agree">
                <label for="agree">Saya menyetujui untuk berlangganan newsletter dari MyStreamingList</label><br>
            </div>
            <div>
                <button id="reset" type="button" class="btn-alert" onclick="location.reload()">Reset</button>
                <button id="submit" type="button" class="btn-okay">Submit</button>
            </div>
        </form>

        <div id="output">
            <script>
                const submit = document.getElementById("submit")
                const output = document.getElementById("output")

                submit.addEventListener("click", () => {
                    const nama = document.getElementById("nama").value;
                    const tpt_lahir = document.getElementById("tpt_lahir").value;
                    const tgl_lahir = document.getElementById("tgl_lahir").value;
                    const alamat = document.getElementById("alamat").value;
                    const jk = document.querySelector("input[name='jk']:checked").value;
                    const email = document.getElementById("email");
                    const phone = document.getElementById("phone");

                    output.innerHTML = `
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tempat Lahir</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nomor Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${nama}</td>
                                    <td>${tpt_lahir}</td>
                                    <td>${tgl_lahir}</td>
                                    <td>${alamat}</td>
                                    <td>${jk}</td>
                                    <td>${email}</td>
                                    <td>${phone}</td>
                                </tr>
                            </tbody>
                        </table>
                    `
                    output.style.backgroundColor = "#FFFFFF";
                })
            </script>
        </div>
    </div>
    <footer>
        <small>Copyright &copy; 2022 - Kelompok Project UAS Praktikum Pemrograman Web 2022</small>
    </footer>
</body>

</html>

<?= $this->endSection('content'); ?>