<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from daftar_siswa where NISN='$username' and NISN='$password'");

//ambil id-nya
$resultid = mysqli_query($koneksi,"select id from daftar_siswa where NISN='$username' and NISN='$password'");
$idnya = mysqli_fetch_assoc($resultid);

//ambil permanennya
$resultpermanen = mysqli_query($koneksi,"select permanen from daftar_siswa where NISN='$username' and NISN='$password'");
$permanennya = mysqli_fetch_assoc($resultpermanen);


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0)
{
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['id'] = "$idnya[id]";
	$_SESSION['permanen'] = "$permanennya[permanen]";
	header("location:edit-biodata.php?id=$idnya[id]");
}
else
{
	header("location:index.php?pesan=gagal");
}
?>