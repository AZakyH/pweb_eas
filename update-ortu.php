<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id			= $_POST['id'];
$ayah       = $_POST['nama_ayah'];
$ibu        = $_POST['nama_ibu'];
$wali       = $_POST['nama_wali'];

// query SQL untuk insert data
$query="UPDATE daftar_siswa SET nama_ayah='$ayah', nama_ibu='$ibu', nama_wali='$wali' where id='$id'";
mysqli_query($koneksi, $query);

// mengalihkan ke halaman index.php
header("location:edit-ortu.php?id=$id");
?>