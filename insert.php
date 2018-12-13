<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nisn       = $_POST['nisn'];
$nik        = $_POST['nik'];
$nama       = $_POST['nama'];
$alamat		= $_POST['alamat'];
$kota 		= $_POST['kota'];
$kecamatan 	= $_POST['kecamatan'];
$kelurahan  = $_POST['kelurahan'];

// query SQL untuk insert data

$sql = "INSERT INTO daftar_siswa (nisn, nik, nama, alamat, kota, kecamatan, kelurahan)
VALUES ('$nisn', '$nik', '$nama', '$alamat', '$kota', '$kecamatan', '$kelurahan')";

if ($koneksi->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
// mengalihkan ke halaman index.php
header("location:index.php");
?>
<!-- It works Alhamdulillah -->