<?php
class Buku {

  function getAll() {
    include './config.php';

    $query = mysqli_query($koneksi, "SELECT * FROM buku JOIN kategori ON kategori.id_kategori = buku.id_kategori ORDER BY kode_buku DESC");

    $array = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($query)) {
      $array[] = $row;
      $array[$i]['diskon'] = '10%';
      $array[$i]['harga_setelah_diskon'] = $row['harga'] - (($row['harga'] / 100) * 10);
      $i++;
    }
    return $array;
  }

  function getDetail($kode) {
    include './config.php';

    $query = mysqli_query($koneksi, "SELECT * FROM buku JOIN kategori ON kategori.id_kategori = buku.id_kategori WHERE kode_buku = '$kode'");

    $array = array();
    $i = 0;

    while ($row = mysqli_fetch_assoc($query)) {
      $array[] = $row;
      $array[$i]['diskon'] = '10%';
      $array[$i]['harga_setelah_diskon'] = $row['harga'] - (($row['harga'] / 100) * 10);
      $i++;
    }
    return $array;
  }

  function add($nama_buku, $id_kategori, $penerbit, $harga, $cover) {
    include '../../config.php';

    $query = mysqli_query($koneksi, "INSERT INTO buku (nama_buku, id_kategori, penerbit, harga, cover) VALUES ('$nama_buku','$id_kategori','$penerbit','$harga','$cover')");

    return $query;
  }

  function update($kode_buku, $nama_buku, $id_kategori, $penerbit, $harga, $cover) {
    include '../../config.php';

    if ($cover != "") {
      $query = mysqli_query($koneksi, "UPDATE buku SET nama_buku = '$nama_buku', id_kategori = '$id_kategori', penerbit = '$penerbit', harga = '$harga', cover = '$cover' WHERE kode_buku = '$kode_buku'");
    } else {
      $query = mysqli_query($koneksi, "UPDATE buku SET nama_buku = '$nama_buku', id_kategori = '$id_kategori', penerbit = '$penerbit', harga = '$harga' WHERE kode_buku = '$kode_buku'");
    }

    return $query;
  }

  function delete($kode_buku) {
    include '../../config.php';

    $query = mysqli_query($koneksi, "DELETE FROM buku WHERE kode_buku = '$kode_buku'");

    return $query;
  }

}
?>