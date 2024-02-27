<div class="container-fluid px-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800"><b>Kelola Slider</b></h1>
    <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="fas fa-plus"></i> Tambah Slider</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Slider</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($slider_list as $slider) : ?>
              <tr>
                <td width="5%"><?= $no++; ?>.</td>
                <td width="20%"><?= $slider->title; ?></td>
                <td><?= $slider->description; ?></td>
                <td width="20%" style="text-align: center;">
                  <img src="<?= base_url('asset_admin/img/slider/' . $slider->image_slider) ?>" alt="..." width="150x">
                </td>
                <td width="10%" class="text-center">
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $slider->id_slider; ?>"><i class="fas fa-trash"></i> Hapus</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Tambah Data Slider</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('slider/addSlider') ?>" enctype="multipart/form-data" method="POST">
          <?= csrf_field() ?>
          <div class="mb-2">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= old('title') ?>">
          </div>
          <div class="mb-2">
            <label for="description2">Deskripsi</label>
            <textarea name="description2" id="description2" cols="30" rows="10" class="form-control" value="<?= old('description2') ?>"></textarea>
          </div>
          <div class="mb-2">
            <label for="image_slider">Gambar</label>
            <input type="file" class="form-control" name="image_slider" id="image_slider" required>
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

<!-- Modal Hapus Kategori -->
<?php foreach ($slider_list as $slider) : ?>
  <div class="modal fade" id="hapusModal<?= $slider->id_slider; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Hapus Data Slider</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('slider/deleteSlider/' . $slider->id_slider) ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <p>Yakin Data Kategori <b class="text-danger"><?= $slider->title; ?></b> akan dihapus?</p>
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