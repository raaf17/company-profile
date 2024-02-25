<div class="container-fluid px-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800"><b>Daftar Kategori Produk</b></h1>
    <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</button>
  </div>

  <!-- Alert Kondisi Sukses -->
  <?php if (session('success')) : ?>
    <div class="alert alert-success" role="alert">
      <button class="close" data-dismiss="alert">x</button>
      <?= session('success') ?>
    </div>
  <?php endif; ?>

  <!-- Tabel Daftar Produk -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Daftar Produk</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Tanggal Input</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($category_list as $category) : ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $category->category_name; ?></td>
                <td><?= date('d/m/Y H:i:s', strtotime($category->created_at)) ?></td>
                <td width="18%" class="text-center">
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $category->id_category; ?>"><i class="fas fa-edit"></i> Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $category->id_category; ?>"><i class="fas fa-trash"></i> Hapus</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Kategori -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Tambah Data Kategori</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('product/addCategory') ?>" method="POST">
          <?= csrf_field() ?>
          <div class="mb-3">
            <label for="category_name">Nama Kategori</label>
            <input type="text" class="form-control" name="category_name" id="category_name" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit Kategori -->
<?php foreach ($category_list as $category) : ?>
  <div class="modal fade" id="ubahModal<?= $category->id_category; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Ubah Data Kategori</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('product/editCategory/' . $category->id_category) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label for="category_name">Nama Kategori</label>
              <input type="text" class="form-control" name="category_name" id="category_name" value="<?= $category->category_name; ?>" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- Modal Hapus Kategori -->
<?php foreach ($category_list as $category) : ?>
  <div class="modal fade" id="hapusModal<?= $category->id_category; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Hapus Data Kategori</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('product/deleteCategory/' . $category->id_category) ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <p>Yakin Data Kategori <b class="text-danger"><?= $category->category_name; ?></b> akan dihapus?</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>