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
                  <a href="<?= base_url('product/detailProduct/'.$product->id_product) ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                  <a href="<?= base_url('product/editProduct/'.$product->id_product) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $product->id_product; ?>')"><i class="fas fa-trash"></i> Hapus</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>