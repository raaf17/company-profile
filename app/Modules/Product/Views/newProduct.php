<div class="container-fluid px-4">
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-2 text-gray-800"><b>Tambah Produk</b></h1>
  </div>

  <!-- Alert Kondisi Sukses -->
  <?php if (session('success')) : ?>
    <div class="alert alert-success" role="alert">
      <button class="close" data-dismiss="alert">x</button>
      <?= session('success') ?>
    </div>
  <?php endif; ?>

  <!-- Alert Kondisi Gagal -->
  <?php if (session('failed')) : ?>
    <div class="alert alert-danger" role="alert">
      <button class="close" data-dismiss="alert">x</button>
      <?= session('failed') ?>
    </div>
  <?php endif; ?>

  <!-- Card Tambah Data Produk -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
    </div>
    <div class="card-body">
      <!-- Form Tambah Data Kategori -->
      <form action="<?= site_url('product/addProduct') ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="row">
          <div class="mb-3 col-6">
            <label for="product_name">Nama Produk</label>
            <input type="text" name="product_name" id="product_name" class="form-control <?= $validation->hasError('product_name') ? 'is-invalid' : null ?>" value="<?= old('product_name') ?>">
            <?php if ($validation->hasError('product_name')) : ?>
              <div class="invalid-feedback">
                <?= $validation->hasError('product_name') ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="mb-3 col-6">
            <label for="category_slug">Kategori Produk</label>
            <select name="category_slug" id="category_slug" class="form-control <?= $validation->hasError('category_slug') ? 'is-invalid' : null ?>">
              <option value="">-- Pilih --</option>
              <?php foreach ($category_product as $category) : ?>
                <?php if (old('category_slug') == $category->category_slug) : ?>
                  <option value="<?= $category->category_name; ?>" selected><?= $category->category_name; ?></option>
                <?php else : ?>
                  <option value="<?= $category->category_name; ?>"><?= $category->category_name; ?></option>
                <?php endif; ?>
              <?php endforeach ?>
            </select>
            <?php if ($validation->hasError('category_slug')) : ?>
              <div class="invalid-feedback">
                <?= $validation->hasError('category_slug') ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="description">Deskripsi Produk</label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control <?= $validation->hasError('description') ? 'is-invalid' : null ?>"><?= old('description') ?></textarea>
          <?php if ($validation->hasError('description')) : ?>
            <div class=" invalid-feedback">
              <?= $validation->hasError('description') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="mb-3 col-6">
          <label for="image">Gambar Produk</label>
          <input type="file" name="image" id="image" class="form-control <?= $validation->hasError('description') ? 'is-invalid' : null ?>" onchange="previewImg()">
          <?php if ($validation->hasError('image')) : ?>
            <div class=" invalid-feedback">
              <?= $validation->hasError('image') ?>
            </div>
          <?php endif; ?>
          <?php if(old('image')) : ?>
            <img src="" alt="..." class="preview-img mt-2" width="100px">
          <?php endif; ?>
        </div>
        <div class="justify-content-end d-flex">
          <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>