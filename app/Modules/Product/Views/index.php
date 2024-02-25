<div class="container-fluid px-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800"><b>Daftar Produk</b></h1>
    <a href="<?= site_url('product/newProduct') ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah</a>
  </div>

  <!-- Alert Kondisi Sukses -->
  <?php if (session('success')) : ?>
    <div class="alert alert-success" role="alert">
      <button class="close" data-dismiss="alert">x</button>
      <?= session('success') ?>
    </div>
  <?php endif; ?>

  <!-- Tabel Daftar Kategori Produk -->
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
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Tanggal Input</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($product_list as $product) : ?>
              <tr>
                <td width="5%"><?= $no++; ?>.</td>
                <td><?= $product->product_name; ?></td>
                <td><?= $product->category_slug; ?></td>
                <td><?= date('d/m/Y H:i:s', strtotime($product->created_at)) ?></td>
                <td width="25%" class="text-center">
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $product->id_product; ?>"><i class="fas fa-eye"></i> Detail</button>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $product->id_product; ?>"><i class="fas fa-edit"></i> Edit</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $product->id_product; ?>"><i class="fas fa-trash"></i> Hapus</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ubah Data Kategori -->
<?php foreach ($product_list as $product) : ?>
  <div class="modal fade" id="ubahModal<?= $product->id_product; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Ubah Data Kategori</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('product/edit/' . $product->id_product) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label for="product_name">Nama Produk</label>
              <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $product->product_name; ?>" required>
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

<!-- Modal Hapus Data Kategori -->
<?php foreach ($product_list as $product) : ?>
  <div class="modal fade" id="hapusModal<?= $product->id_product; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Hapus Data Kategori</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('product/delete/' . $product->id_product) ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <p>Yakin Data Kategori <b class="text-danger"><?= $product->product_name; ?></b> Mau dihapus?</p>
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