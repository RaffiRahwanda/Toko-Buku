<?php
  $target_dir = "../../uploads/";
  $id_kategori = $_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];

  include '../kategori.php';
  $kategori = new Kategori();

  $update_kategori = $kategori->update($id_kategori, $nama_kategori);
  
  if ($update_kategori) {
    echo '<script>alert("Berhasil edit data");</script>';
  } else {
    echo '<script>alert("Gagal edit data");</script>';
  }
  echo '<script>window.location.href="../../kategori.php";</script>';
?>