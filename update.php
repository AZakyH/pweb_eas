<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id			= $_POST['id'];
$nisn       = $_POST['nisn'];
$nik        = $_POST['nik'];
$nama       = $_POST['nama'];
$agama        = $_POST['agama'];
$ttl        = $_POST['ttl'];
$gender        = $_POST['gender'];
$alamat		= $_POST['alamat'];
$provinsi        = $_POST['provinsi'];
$kota 		= $_POST['kota'];
$kecamatan 	= $_POST['kecamatan'];
$kelurahan  = $_POST['kelurahan'];

// query SQL untuk insert data
$query="UPDATE daftar_siswa SET nisn='$nisn', nik='$nik', nama='$nama', agama='$agama', ttl='$ttl', gender='$gender', alamat='$alamat', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', kelurahan='$kelurahan' where id='$id'";
mysqli_query($koneksi, $query);

// mengalihkan ke halaman index.php
header("location:edit-biodata.php?id=$id");
?>