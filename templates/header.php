<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="d-flex order-0">
    <a class="navbar-brand mr-1" href="index.php">Toko Buku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse order-2" id="collapsingNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">
        <a class="nav-link" href="index.php">Data Buku <span class="sr-only">Data Buku</span></a>
      </li>
      <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'kategori.php' ? 'active' : '' ?>">
        <a class="nav-link" href="kategori.php">Kategori <span class="sr-only">Kategori</span></a>
      </li>
    </ul>
  </div>
  <div class="nav-item dropdown text-right order-1 order-md-last">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="images/user.png" width="20" height="20" alt="">&nbsp
      <span><?php echo isset($_SESSION["nama"]) != null ? $_SESSION["nama"] : "" ?></span>
    </a>
    <?php if (isset($_SESSION["nama"]) != null) { ?>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    <?php } ?>
  </div>
</nav>

<div class="modal" id="logoutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin?</p>
      </div>
      <form action="includes/auth/logout.php" method="post">
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ya</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>