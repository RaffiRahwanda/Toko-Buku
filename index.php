<?php
  session_start();
  if (isset($_SESSION["id"]) == null) {
    include "login.php";
  } else {
    include "home.php";
  }
?>