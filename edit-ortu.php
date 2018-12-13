<?php
include 'koneksi.php';
session_start();
            if($_SESSION['status']!="login"){
                header("location:index.php?pesan=belum_login");
            }
            $id = $_SESSION['id'];

    $resultpermanen = mysqli_query($koneksi,"select permanen from daftar_siswa where id='$id'");
    $permanennya = mysqli_fetch_assoc($resultpermanen);
    $permanen = $permanennya['permanen'];

$daftar_siswa = mysqli_query($koneksi, "select * from daftar_siswa where id='$id'");
$row        = mysqli_fetch_array($daftar_siswa);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Calon Siswa</title>
        <link rel="stylesheet" type="text/css" href="presis.css">
    </head>
    <body>
<!--         <?php 
            session_start();
            if($_SESSION['status']!="login"){
                header("location:index.php?pesan=belum_login");
            }
            $id = $_SESSION['id'];
            echo $id;
        ?> -->
        <div class="header"><h2>Biodata Calon Siswa</h2></div>

            <ul class="menu">
                <li><a href="edit-biodata.php?id=$id">Biodata Calon Siswa</a></li>
                <li><a href="edit-ortu.php?id=$id">Orang Tua</a></li>
                <li><a href="form-pendaftaran-sekolah.php?id=$id">Form Pendaftaran</a></li>
                <span class="tombol"><a href="logout.php">LOGOUT</a></span>
            </ul>


        <form method="post" action="update-ortu.php">
            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
            <table>
                <tr><td>AYAH</td><td><input type="text" value="<?php echo $row['nama_ayah'];?>" name="nama_ayah" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>IBU</td><td><input type="text" value="<?php echo $row['nama_ibu'];?>" name="nama_ibu" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>WALI</td><td><input type="text" value="<?php echo $row['nama_wali'];?>" name="nama_wali" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan" <?php if($permanen==1){echo "disabled";} ?>>SIMPAN PERUBAHAN</button>
            </table>
        </form>
        
        <div class="footer">
            <b>Pemerintah Daerah Cilegon</b>
        </div>
    </body>
</html>