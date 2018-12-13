<?php
include 'koneksi.php';
session_start();
            if($_SESSION['status']!="login"){
                header("location:index.php?pesan=belum_login");
            }
            $id = $_SESSION['id'];
            $permanen = $_SESSION['permanen'];

    $resultpermanen = mysqli_query($koneksi,"select permanen from daftar_siswa where id='$id'");
    $permanennya = mysqli_fetch_assoc($resultpermanen);
    $permanen = $permanennya['permanen'];

$daftar_siswa = mysqli_query($koneksi, "select * from daftar_siswa where id='$id'");
$row        = mysqli_fetch_array($daftar_siswa);
// membuat data agama menjadi dinamis dalam bentuk array
$agama    = array('Buddha','Hindu','Islam', 'Katolik', 'Konghucu', 'Kristen');
$gender     = array('Laki-Laki','Perempuan');
// membuat function untuk set aktif radio button
function active_radio_button($value,$input){
    // apabilan value dari radio sama dengan yang di input
    $result = $value==$input?'checked':'';
    return $result;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Calon Siswa</title>
        <link rel="stylesheet" type="text/css" href="presis.css">
    </head>
    <body>
        <div class="header">
            <h2>Biodata Calon Siswa</h2>
        </div>
            <ul class="menu">
                <li><a href="edit-biodata.php?id=$id">Biodata Calon Siswa</a></li>
                <li><a href="edit-ortu.php?id=$id">Orang Tua</a></li>
                <li><a href="form-pendaftaran-sekolah.php?id=$id">Form Pendaftaran</a></li>
                        <span class="tombol"><a href="logout.php">LOGOUT</a></span>
            </ul>

        <form method="post" action="update.php">
            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
            <table>
                <tr><td>NISN</td><td><input type="text" value="<?php echo $row['nisn'];?>" name="nisn" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>NIK</td><td><input type="text" value="<?php echo $row['nik'];?>" name="nik" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>NAMA</td><td><input type="text" value="<?php echo $row['nama'];?>" name="nama" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>AGAMA <!-- <?php echo $row['agama'];?> --></td><td>
                        <select name="agama" <?php if($permanen==1){echo "disabled";} ?>>
                            <?php
                            foreach ($agama as $j){
                                echo "<option value='$j' ";
                                echo $row['agama']==$j?'selected="selected"':'';
                                echo ">$j</option>";
                            }
                            ?>
                        </select>
                </td></tr>
                <tr><td>TEMPAT, TANGGAL LAHIR</td><td><input type="text" value="<?php echo $row['ttl'];?>" name="ttl" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>JENIS KELAMIN</td><td>
                        <input type="radio" name="gender" value="Laki-Laki" <?php echo active_radio_button("Laki-Laki", $row['gender'])?> <?php if($permanen==1){echo "disabled";} ?>>Laki Laki
                        <input type="radio" name="gender" value="Perempuan" <?php echo active_radio_button("Perempuan", $row['gender'])?> <?php if($permanen==1){echo "disabled";} ?>>Perempuan
                </td></tr>
                <tr><td>ALAMAT</td><td><input type="text" value="<?php echo $row['alamat'];?>" name="alamat" <?php if($permanen==1){echo "disabled";} ?>></td></tr>  
                <tr><td>PROVINSI</td><td><input type="text" value="<?php echo $row['provinsi'];?>" name="provinsi" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>KOTA</td><td><input type="text" value="<?php echo $row['kota'];?>" name="kota" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>KECAMATAN</td><td><input type="text" value="<?php echo $row['kecamatan'];?>" name="kecamatan" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>KELURAHAN</td><td><input type="text" value="<?php echo $row['kelurahan'];?>" name="kelurahan" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan" <?php if($permanen==1){echo "disabled";} ?>>SIMPAN PERUBAHAN</button>
            </table>
        </form>

        <div class="footer">
            <b>Pemerintah Daerah Cilegon</b>
        </div>
    </body>
</html>