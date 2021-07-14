<?php
  $target_dir = "../../uploads/";
  $nama_buku = $_POST['nama_buku'];
  $id_kategori = $_POST['id_kategori'];
  $penerbit = $_POST['penerbit'];
  $harga = $_POST['harga'];

  $nama_file = "";
  $upload_success = true;

  if ($_FILES["cover"] != null && $_FILES["cover"]["tmp_name"] != null) {
    $original_file = $target_dir . basename($_FILES["cover"]["name"]);
    $imageFileType = strtolower(pathinfo($original_file,PATHINFO_EXTENSION));

    $nama_file = time().".".$imageFileType;
    $target_file = $target_dir . $nama_file;
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
        // Berhasil upload
    } else {
        $upload_success = false;
        // Gagal upload
    }
  }

  if ($upload_success) {
    $cover = $nama_file;

    include '../buku.php';
    $buku = new Buku();

    $add_buku = $buku->add($nama_buku, $id_kategori, $penerbit, $harga, $cover);
    
    if ($add_buku) {
      echo '<script>alert("Berhasil tambah data");</script>';
    } else {
      echo '<script>alert("Gagal tambah data");</script>';
    }
    echo '<script>window.location.href="../../index.php";</script>';
  } else {
    echo '<script>alert("Gagal upload cover");</script>';
  }
?>