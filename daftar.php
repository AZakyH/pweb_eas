<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pendaftaran Calon Siswa</title>
        <link rel="stylesheet" type="text/css" href="presis.css">
    </head>
    <div class="header"><h2>Form Pendaftaran Calon Siswa</h2></div>
    <body>
        <form method="post" action="insert.php">
            <table>
                <tr><td>NISN</td><td><input type="text" value="9991234567" name="nisn"></td></tr>
                <tr><td>NIK</td><td><input type="text" value="1234567890123456" name="nik"></td></tr>
                <tr><td>NAMA</td><td><input type="text" value="Valent F Altan" name="nama"></td></tr>
                <tr><td>ALAMAT</td><td><input type="text" value="Jl. Menuju Masa Depan no. 1" name="alamat"></td></tr>
                <tr><td>KOTA</td><td><input type="text" value="Malang" name="kota"></td></tr>
                <tr><td>KECAMATAN</td><td><input type="text" value="Gubeng" name="kecamatan"></td></tr>
                <tr><td>KELURAHAN</td><td><input type="text" value="Airlangga" name="kelurahan"></td></tr>

                <tr><td colspan="2"><button type="submit" value="simpan">DAFTAR</button>
                        <a href="index.php">Kembali</a></td></tr>
            </table>
        </form>
    </body>
    <div class="footer">
        <b>Pemerintah Daerah Cilegon</b>
    </div>
</html>
<!-- It works Alhamdulillah -->