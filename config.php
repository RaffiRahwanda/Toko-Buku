<?php

$koneksi = mysqli_connect("localhost","root","","ucp2pkw_tokobuku-094");

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>