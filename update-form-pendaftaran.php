<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id			= $_POST['id'];
$nisn       = $_POST['nisn'];
$nik        = $_POST['nik'];
$nama       = $_POST['nama'];
$sekolahasal= $_POST['sekolah_asal'];
$pilihan1 	= $_POST['pilihan1'];
$pilihan2 	= $_POST['pilihan2'];

// query SQL untuk insert data
$query="UPDATE daftar_siswa SET nisn='$nisn', nik='$nik', nama='$nama', sekolah_asal='$sekolahasal', pilihan1='$pilihan1', pilihan2='$pilihan2' where id='$id'";
mysqli_query($koneksi, $query);

// mengalihkan ke halaman index.php
header("location:form-pendaftaran-sekolah.php?id=$id");
?>