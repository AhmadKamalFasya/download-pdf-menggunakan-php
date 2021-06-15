<?php

require_once('koneksi.php');

// ambil data file
$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "assets/";


$namaFile = uniqid();
$namaFile .= '.pdf';

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

$query = "INSERT INTO `file` (`id_file`,`nama_file`)
VALUES (NULL,'$namaFile')";
$exe = mysqli_query($link, $query);
if ($exe) {
  // kalau berhasil
  $_SESSION['success'] = " Data added! ";
  header("Location: index.php");
} else {
  $_SESSION['failed'] = " Data failed to add ";
  header("Location: index.php");
}
