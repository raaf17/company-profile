<div class="container-fluid px-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800"><b>Kelola Team</b></h1>
    <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahModal"><i class="fas fa-plus"></i> Tambah Team</button>
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
      <h6 class="m-0 font-weight-bold text-primary">Tabel Team</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Facebook</th>
              <th>Instagram</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($team_list as $team) : ?>
              <tr>
                <td width="5%"><?= $no++; ?>.</td>
                <td width="20%"><?= $team->name; ?></td>
                <td width="20%"><?= $team->position; ?></td>
                <td><?= $team->fb; ?></td>
                <td><?= $team->ig; ?></td>
                <td width="20%" style="text-align: center;">
                  <img src="<?= base_url('asset_admin/img/team/' . $team->team_image) ?>" alt="..." width="150x">
                </td>
                <td width="10%" class="text-center">
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $team->id_team; ?>"><i class="fas fa-trash"></i> Hapus</button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Team -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Tambah Data Team</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('team/addTeam') ?>" enctype="multipart/form-data" method="POST">
          <?= csrf_field() ?>
          <div class="mb-2">
            <label for="name">Nama</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= old('name') ?>">
          </div>
          <div class="mb-2">
            <label for="position">Jabatan</label>
            <input type="text" class="form-control" name="position" id="position" value="<?= old('position') ?>">
          </div>
          <div class="mb-2">
            <label for="fb">Facebook</label>
            <input type="text" class="form-control" name="fb" id="fb" value="<?= old('fb') ?>">
          </div>
          <div class="mb-2">
            <label for="ig">Instagram</label>
            <input type="text" class="form-control" name="ig" id="ig" value="<?= old('ig') ?>">
          </div>
          <div class="mb-2">
            <label for="team_image">Gambar</label>
            <input type="file" class="form-control" name="team_image" id="team_image" required>
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

<!-- Modal Hapus Team -->
<?php foreach ($team_list as $team) : ?>
  <div class="modal fade" id="hapusModal<?= $team->id_team; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Hapus Data Slider</b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= site_url('team/deleteTeam/' . $team->id_team) ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <p>Yakin Data Team <b class="text-danger"><?= $team->name; ?></b> akan dihapus?</p>
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