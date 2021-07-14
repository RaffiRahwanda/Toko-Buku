<?php
  $id_kategori = $_POST['id_kategori'];

  include '../kategori.php';
  $kategori = new Kategori();

  $delete_kategori = $kategori->delete($id_kategori);
  if ($delete_kategori) {
    echo '<script>alert("Berhasil hapus data");</script>';
  } else {
    echo '<script>alert("Gagal hapus data");</script>';
  }
  echo '<script>window.location.href="../../kategori.php";</script>';
?>