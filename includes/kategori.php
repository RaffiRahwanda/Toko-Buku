<?php
class Kategori {

  function getAll() {
    include './config.php';

    $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
    
    $array = array();

    while ($row = mysqli_fetch_assoc($query)) {
      $array[] = $row;
    }
    return $array;
  }

  function add($nama_kategori) {
    include '../../config.php';

    $query = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");

    return $query;
  }

  function update($id_kategori, $nama_kategori) {
    include '../../config.php';

    $query = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori'");

    return $query;
  }

  function delete($id_kategori) {
    include '../../config.php';

    $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id_kategori'");

    return $query;
  }

}
?>