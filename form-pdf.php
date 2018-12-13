<?php
include 'koneksi.php';
    session_start();
                if($_SESSION['status']!="login"){
                    header("location:index.php?pesan=belum_login");
                }
                $id = $_SESSION['id'];

    $nisnnya = mysqli_fetch_assoc(mysqli_query($koneksi,"select nisn from daftar_siswa where id='$id'"));
    $nisn = $nisnnya['nisn'];

    $niknya = mysqli_fetch_assoc(mysqli_query($koneksi,"select nik from daftar_siswa where id='$id'"));
    $nik = $niknya['nik'];

    $namanya = mysqli_fetch_assoc(mysqli_query($koneksi,"select nama from daftar_siswa where id='$id'"));
    $nama = $namanya['nama'];

    $asalnya = mysqli_fetch_assoc(mysqli_query($koneksi,"select sekolah_asal from daftar_siswa where id='$id'"));
    $asal = $asalnya['sekolah_asal'];
    $pilihan1nya = mysqli_fetch_assoc(mysqli_query($koneksi,"select pilihan1 from daftar_siswa where id='$id'"));
    $pilihan1 = $pilihan1nya['pilihan1'];

    $pilihan2nya = mysqli_fetch_assoc(mysqli_query($koneksi,"select pilihan2 from daftar_siswa where id='$id'"));
    $pilihan2 = $pilihan2nya['pilihan2'];


	require("fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(180,10,"Formulir Pendaftaran Sekolah",1,1);

	$pdf->Cell(90, 10, "ID PENDAFTARAN", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$id}", 1,1);

	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(90, 10, "NISN", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$nisn}", 1,1);

	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(90, 10, "NIK", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$nik}", 1,1);

	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(90, 10, "NAMA", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$nama}", 1,1);

	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(90, 10, "SEKOLAH ASAL", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$asal}", 1,1);

	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(90, 10, "SEKOLAH PILIHAN 1", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$pilihan1}", 1,1);

	$pdf->SetFont("Arial", "B", 16);
	$pdf->Cell(90, 10, "SEKOLAH PILIHAN 2", 1,0);
	$pdf->SetFont("Arial");
	$pdf->Cell(90, 10, "{$pilihan2}", 1,1);

	$pdf->output();

?>