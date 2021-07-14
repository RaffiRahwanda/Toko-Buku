<?php
  $target_dir = "../../uploads/";
  $kode_buku = $_POST['kode_buku'];
  $cover = $_POST['cover'];

  include '../buku.php';
  $buku = new Buku();

  $delete_buku = $buku->delete($kode_buku);
  if ($delete_buku) {
    unlink($target_dir.$cover);
    echo '<script>alert("Berhasil hapus data");</script>';
  } else {
    echo '<script>alert("Gagal hapus data");</script>';
  }
  echo '<script>window.location.href="../../index.php";</script>';
?>