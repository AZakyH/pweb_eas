<?php
$host = "localhost";
$user = "id7091718_user";
$pass = "password";
$name = "id7091718_dindik";
 
$koneksi = mysqli_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih!");
?>