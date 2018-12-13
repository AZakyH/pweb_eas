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
    // membuat data agama menjadi dinamis dalam bentuk array
    $pilihan1    = array('SDN BLOK I','SDN CIWEDUS 1','SDN CIWEDUS 2', 'SMPN 2 CILEGON', 'SMPN 7 CILEGON', 'SMP PEMBANGUNAN CILEGON');
    $pilihan2    = array('SDN BLOK I','SDN CIWEDUS 1','SDN CIWEDUS 2', 'SMPN 2 CILEGON', 'SMPN 7 CILEGON', 'SMP PEMBANGUNAN CILEGON');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Calon Siswa</title>
        <link rel="stylesheet" type="text/css" href="presis.css">
    </head>
    <body>
        <div class="header"><h2>Form Pendaftaran Sekolah</h2></div>
            
            <ul class="menu">
                <li><a href="edit-biodata.php?id=$id">Biodata Calon Siswa</a></li>
                <li><a href="edit-ortu.php?id=$id">Orang Tua</a></li>
                <li><a href="form-pendaftaran-sekolah.php?id=$id">Form Pendaftaran</a></li>
                <span class="tombol"><a href="logout.php">LOGOUT</a></span>
            </ul>

        <form method="post" action="update-form-pendaftaran.php">
            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
            <table>
                <tr><td>ID PENDAFTARAN</td><td><input type="text" value="<?php echo $row['id'];?>" name="id" disabled></td></tr>
                <tr><td>NISN</td><td><input type="text" value="<?php echo $row['nisn'];?>" name="nisn" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>NIK</td><td><input type="text" value="<?php echo $row['nik'];?>" name="nik" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>NAMA</td><td><input type="text" value="<?php echo $row['nama'];?>" name="nama" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>SEKOLAH ASAL</td><td><input type="text" value="<?php echo $row['sekolah_asal'];?>" name="sekolah_asal" <?php if($permanen==1){echo "disabled";} ?>></td></tr>
                <tr><td>Sekolah Pilihan 1</td><td>
                        <select name="pilihan1" <?php if($permanen==1){echo "disabled";} ?>>
                            <?php
                            foreach ($pilihan1 as $j){
                                echo "<option value='$j' ";
                                echo $row['pilihan1']==$j?'selected="selected"':'';
                                echo ">$j</option>";
                            }
                            ?>
                        </select>
                </td></tr>
                <tr><td>Sekolah Pilihan 2</td><td>
                        <select name="pilihan2" <?php if($permanen==1){echo "disabled";} ?>>
                            <?php
                            foreach ($pilihan2 as $j){
                                echo "<option value='$j' ";
                                echo $row['pilihan2']==$j?'selected="selected"':'';
                                echo ">$j</option>";
                            }
                            ?>
                        </select>
                </td></tr>
                <tr><td colspan="2"><button type="submit" value="simpan" <?php if($permanen==1){echo "disabled";} ?>>SIMPAN PERUBAHAN</button>
                    <span class="tombol"><a href="permanenkan.php?id=$id">Permanenkan</a></span>
                    <span class="tombol"><a href="form-pdf.php?id=$id">Lihat Formulir</a></span>
            </table>
        </form>

        <div class="footer">
            <b>Pemerintah Daerah Cilegon</b>
        </div>
    </body>
</html>