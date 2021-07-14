<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'templates/assets.php';

  include 'includes/kategori.php';
  $kategori = new Kategori();
  $all = $kategori->getAll();
  ?>
</head>
<body style="background-color: #FFFFFF;">
  <?php include 'templates/header.php'; ?>

  <section class="mt-5 mb-5">
    <div class="container col-md-11">
      <div class="p-5">
        <div class="row mb-4 pl-3 pr-3">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Data</button>
        </div>
        <table id="tableKategori" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Kategori</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php for ($i=0; $i < count($all); $i++) { ?>
            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $all[$i]['nama_kategori'] ?></td>
              <td class="text-center" width="180px">
                <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#editModal_<?php echo $all[$i]['id_kategori'] ?>">EDIT</a>
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal_<?php echo $all[$i]['id_kategori'] ?>">HAPUS</a>
              </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal_<?php echo $all[$i]['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="includes/update/update_kategori.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $all[$i]['id_kategori'] ?>">
                        <label for="nama_kategori" class="col-form-label">Nama Kategori : </label>
                        <input type="text" class="form-control" name="nama_kategori" value="<?php echo $all[$i]['nama_kategori'] ?>" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="btnUpdateKategori" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Edit Modal End -->

            <!-- Delete Modal -->
            <div class="modal" id="deleteModal_<?php echo $all[$i]['id_kategori'] ?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Hapus Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda yakin?</p>
                  </div>
                  <form action="includes/delete/delete_kategori.php" method="post">
                    <div class="modal-footer">
                      <input type="hidden" class="form-control" name="id_kategori" value="<?php echo $all[$i]["id_kategori"] ?>">
                      <button type="submit" name="btnDeleteKategori" class="btn btn-primary">Ya</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Delete Modal End -->
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="includes/create/create_kategori.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_kategori" class="col-form-label">Nama Kategori : </label>
              <input type="text" class="form-control" name="nama_kategori" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnAddKategori" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <?php include 'templates/footer.php'; ?>

  <script>
    $(document).ready(function() {
      $("#tableKategori").DataTable();
    });
  </script>
</body>
</html>