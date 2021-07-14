<?php

  include '../../config.php';

  $email = $_POST['email'];
	$password = $_POST['password'];

  $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email' AND password = MD5('$password') LIMIT 1");

  $count = mysqli_num_rows($query);

  if ($count > 0) {
    $data = mysqli_fetch_assoc($query);

    session_start();

    $_SESSION["id"] = $data["id"];
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["email"] = $data["email"];

    echo '<script>alert("Login berhasil");</script>';
  } else {
    echo '<script>alert("Login gagal");</script>';
  }
  echo '<script>window.location.href="../../index.php";</script>';
	mysqli_close($koneksi);
?>