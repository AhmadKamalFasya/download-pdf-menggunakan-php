<?php

require_once('koneksi.php');

$file_lama = $_GET['file_lama']; // tambahan informasi foto lama 
$file = $_POST['file'];

if (isset($_POST['update'])) {

  if (!empty($tmp)) {

    //upload foto pengganti
    move_uploaded_file($tmp, $path);

    //hapus gambar lama
    unlink("assets/" . $file_lama);

    //jika user mengganti gambar maka update foto
    $sql = "UPDATE file SET nama_file='$file_lama' WHERE id_file='$id_file'";
  } else {
    //user tidak mengganti foto 
    // foto='$buat_foto' harus dihapus (tdk perlu di update)
    echo 'test';
  }
}
