<?php
  $target_dir = "../../uploads/";
  $kode_buku = $_POST['kode_buku'];
  $nama_buku = $_POST['nama_buku'];
  $id_kategori = $_POST['id_kategori'];
  $penerbit = $_POST['penerbit'];
  $harga = $_POST['harga'];
  $cover_lama = $_POST['cover_lama'];

  $nama_file = "";
  $upload_success = true;

  if ($_FILES["cover"] != null && $_FILES["cover"]["tmp_name"] != null) {
    $original_file = $target_dir . basename($_FILES["cover"]["name"]);
    $imageFileType = strtolower(pathinfo($original_file,PATHINFO_EXTENSION));

    $nama_file = time().".".$imageFileType;
    $target_file = $target_dir . $nama_file;
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
        // Berhasil upload
        unlink($target_dir.$cover_lama);
    } else {
        $upload_success = false;
        // Gagal upload
    }
  }

  if ($upload_success) {
    $cover = $nama_file;

    include '../buku.php';
    $buku = new Buku();

    $update_buku = $buku->update($kode_buku, $nama_buku, $id_kategori, $penerbit, $harga, $cover);
    
    if ($update_buku) {
      echo '<script>alert("Berhasil edit data");</script>';
    } else {
      echo '<script>alert("Gagal edit data");</script>';
    }
    echo '<script>window.location.href="../../index.php";</script>';
  } else {
    echo '<script>alert("Gagal upload cover");</script>';
  }
?>