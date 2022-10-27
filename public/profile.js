const submit = document.getElementById("submit")
const output = document.getElementById("output")

submit.addEventListener("click", () => {
    const nama = document.getElementById("nama").value;
    const npm = document.getElementById("npm").value;
    const tpt_lahir = document.getElementById("tpt_lahir").value;
    const tgl_lahir = document.getElementById("tgl_lahir").value;
    const alamat = document.getElementById("alamat").value;
    const jk = document.querySelector("input[name='jk']:checked").value;
    const select = document.getElementById("years");
    const angkatan = select.options[select.selectedIndex].value;
    const kelas = document.querySelector("input[name='kelas']:checked").value;

    output.innerHTML = `
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Kelas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>${nama}</td>
                    <td>${npm}</td>
                    <td>${tpt_lahir}</td>
                    <td>${tgl_lahir}</td>
                    <td>${alamat}</td>
                    <td>${jk}</td>
                    <td>${angkatan}</td>
                    <td>${kelas}</td>
                </tr>
            </tbody>
        </table>
    `
    
    output.style.backgroundColor = "#FFFFFF";
}
)