<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><b>Detail Product</b></h1>
  </div>

  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Detail Product</h6>
        </div>
        <div class="card-body">
          <div class="text-center">
            <img class="px-3 px-sm-4 mt-2 mb-4" style="width: 30rem;" src="<?= base_url('asset_admin/img/' . $product_list->image) ?>" alt="Ilustration">
          </div>
          <h6 class="text-primary"><b><?= $product_list->category_slug; ?></b></h6>
          <p class="text-secondary"><?= date('d/m/Y h:i:s', strtotime($product_list->created_at)) ?></p>
          <p><?= $product_list->description; ?></p>
          <a href="<?= site_url('product') ?>" class="btn btn-primary btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>