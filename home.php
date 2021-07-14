<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'templates/assets.php';

  include 'includes/buku.php';
  include 'includes/kategori.php';
  $buku = new Buku();
  $all = $buku->getAll();

  $kategori = new Kategori();
  $data_kategori = $kategori->getAll();
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
        <table id="tableBuku" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Buku</th>
              <th>Kategori</th>
              <th>Penerbit</th>
              <th>Cover</th>
              <th>Harga</th>
              <th>Diskon</th>
              <th>Harga Setelah Diskon</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php for ($i=0; $i < count($all); $i++) { ?>
            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $all[$i]['nama_buku'] ?></td>
              <td><?php echo $all[$i]['nama_kategori'] ?></td>
              <td><?php echo $all[$i]['penerbit'] ?></td>
              <td>
                <a target="_blank" href="uploads/<?php echo $all[$i]["cover"] ?>">
                  <img style="width:100px;" src="uploads/<?php echo $all[$i]["cover"] ?>" alt="">
                </a>
              </td>
              <td><?php echo $all[$i]['harga'] ?></td>
              <td><?php echo $all[$i]['diskon'] ?></td>
              <td><?php echo $all[$i]['harga_setelah_diskon'] ?></td>
              <td class="text-center" width="180px">
                <a class="btn btn-info btn-sm" target="_blank" href="print.php?kode=<?php echo $all[$i]['kode_buku'] ?>">PRINT</a>
                <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#editModal_<?php echo $all[$i]['kode_buku'] ?>">EDIT</a>
                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal_<?php echo $all[$i]['kode_buku'] ?>">HAPUS</a>
              </td>
            </tr>
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal_<?php echo $all[$i]['kode_buku'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="includes/update/update_buku.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="kode_buku" value="<?php echo $all[$i]['kode_buku'] ?>">
                        <input type="hidden" class="form-control" name="cover_lama" value="<?php echo $all[$i]['cover'] ?>">
                        <label for="nama_buku" class="col-form-label">Nama Buku : </label>
                        <input type="text" class="form-control" name="nama_buku" value="<?php echo $all[$i]['nama_buku'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="id_kategori" class="col-form-label">Kategori : </label>
                        <select name="id_kategori" required>
                          <option value="">- Pilih Kategori -</option>
                          <?php foreach ($data_kategori as $key => $value) { ?>
                            <option value="<?php echo $value["id_kategori"] ?>" <?php echo $value["id_kategori"] == $all[$i]['id_kategori'] ? 'selected' : '' ?>><?php echo $value["nama_kategori"] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="penerbit" class="col-form-label">Penerbit : </label>
                        <input type="text" class="form-control" name="penerbit" value="<?php echo $all[$i]['penerbit'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="harga" class="col-form-label">Harga : </label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $all[$i]['harga'] ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="cover" class="col-form-label">Cover : </label>
                        <a target="_blank" href="uploads/<?php echo $all[$i]["cover"] ?>">
                          <img style="width:100px; height:100px;" src="uploads/<?php echo $all[$i]["cover"] ?>" alt="">
                        </a>
                        <br>
                        <br>
                        <input type="file" name="cover" accept="image/*">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" name="btnUpdateBuku" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Edit Modal End -->

            <!-- Delete Modal -->
            <div class="modal" id="deleteModal_<?php echo $all[$i]['kode_buku'] ?>" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Hapus Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda yakin?</p>
                  </div>
                  <form action="includes/delete/delete_buku.php" method="post">
                    <div class="modal-footer">
                      <input type="hidden" class="form-control" name="kode_buku" value="<?php echo $all[$i]["kode_buku"] ?>">
                      <input type="hidden" class="form-control" name="cover" value="<?php echo $all[$i]["cover"] ?>">
                      <button type="submit" name="btnDeleteBuku" class="btn btn-primary">Ya</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="includes/create/create_buku.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_buku" class="col-form-label">Nama Buku : </label>
              <input type="text" class="form-control" name="nama_buku" required>
            </div>
            <div class="form-group">
              <label for="id_kategori" class="col-form-label">Kategori : </label>
              <select name="id_kategori" required>
                <option value="">- Pilih Kategori -</option>
                <?php foreach ($data_kategori as $key => $value) { ?>
                  <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="penerbit" class="col-form-label">Penerbit : </label>
              <input type="text" class="form-control" name="penerbit" required>
            </div>
            <div class="form-group">
              <label for="harga" class="col-form-label">Harga : </label>
              <input type="number" class="form-control" name="harga" required>
            </div>
            <div class="form-group">
              <label for="cover" class="col-form-label">Cover : </label>
              <br>
              <input type="file" name="cover" accept="image/*" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="btnAddBuku" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <?php include 'templates/footer.php'; ?>

  <script>
    $(document).ready(function() {
      $("#tableBuku").DataTable();
    });
  </script>
</body>
</html>