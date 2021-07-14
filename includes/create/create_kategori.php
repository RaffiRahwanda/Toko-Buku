<?php
  $nama_kategori = $_POST['nama_kategori'];

  include '../kategori.php';
  $kategori = new Kategori();

  $add_kategori = $kategori->add($nama_kategori);
  
  if ($add_kategori) {
    echo '<script>alert("Berhasil tambah data");</script>';
  } else {
    echo '<script>alert("Gagal tambah data");</script>';
  }
  echo '<script>window.location.href="../../kategori.php";</script>';
?>