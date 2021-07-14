<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'templates/assets.php';

  include 'includes/buku.php';
  $buku = new Buku();
  $kode = isset($_GET['kode']) != null ? $_GET['kode'] : null;
  if ($kode != null) {
    $all = $buku->getDetail($kode);
  }
  ?>
</head>
<body onload="window.print();">
  <section class="mt-5">
    <div class="row text-lg-left justify-content-center">
      <?php for ($i=0; $i < count($all); $i++) { ?>
        <div class="card m-3 p-4" style="width: 30rem; height: 20rem;">
          <h5>Toko Buku - Bahagia</h5>
          <div class="row p-3">
            <img class="mt-2" style="width:130px;" src="uploads/<?php echo $all[$i]["cover"] ?>" alt="">
            <div class="card-body">
              <h6 class="card-title">Judul : <?php echo $all[$i]["nama_buku"] ?></h6>
              <p class="card-text">Penerbit : <?php echo $all[$i]["penerbit"] ?></p>
              <p class="card-text">Harga Normal : <?php echo $all[$i]["harga"] ?></p>
              <p class="card-text">Diskon : <?php echo $all[$i]["diskon"] ?></p>
              <p class="card-text">Harga : <?php echo $all[$i]["harga_setelah_diskon"] ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</body>
</html>