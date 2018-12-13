<?php
include 'koneksi.php';
// menyimpan data kedalam variabel\
session_start();
$id = $_SESSION['id'];
$permanen	= "1";

// query SQL untuk insert data
$query="UPDATE daftar_siswa SET permanen='$permanen' where id='$id'";
mysqli_query($koneksi, $query);

// mengalihkan ke halaman index.php
header("location:form-pendaftaran-sekolah.php?id=$id");
?>