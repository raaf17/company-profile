</div>
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Company Profile 2024</span>
    </div>
  </div>
</footer>
</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>/template/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>/template/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>/template/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>/template/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>/template/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url(); ?>/template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/template/js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  const swal = $('.swal').data('swal');
  // if (swal) {
  //   Swal.fire({
  //     title: "Are you sure?",
  //     text: "You won't be able to revert this!",
  //     icon: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: "#3085d6",
  //     cancelButtonColor: "#d33",
  //     confirmButtonText: "Yes, delete it!"
  //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       Swal.fire({
  //         title: "Deleted!",
  //         text: "Your file has been deleted.",
  //         icon: "success"
  //       });
  //     }
  //   });
  // }

  function hapus(id_product) {
    Swal.fire({
      title: "Hapus?",
      text: "Yakin Data Produk akan dihapus?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus"
    }).then((result) => {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url('product/deleteProduct'); ?>',
        data: {
          _method: 'delete',
          <?= csrf_token() ?>: "<?= csrf_hash() ?>",
          id_product: id_product
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            Swal.fire({
              title: "Terhapus!",
              text: response.success,
              icon: "success",
            }).then((result) => {
              if (result.value) {
                window.location.href = "<?= base_url('product'); ?>"
              }
            })
          }
        }
      });
    });
  }

  function hapus_akun(id) {
    Swal.fire({
      title: "Hapus?",
      text: "Yakin Data Akun akan dihapus?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Hapus"
    }).then((result) => {
      $.ajax({
        type: 'POST',
        url: '<?php echo base_url('account/deleteAccount'); ?>',
        data: {
          _method: 'delete',
          <?= csrf_token() ?>: "<?= csrf_hash() ?>",
          id: id
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            Swal.fire({
              title: "Terhapus!",
              text: response.success,
              icon: "success",
            }).then((result) => {
              if (result.value) {
                window.location.href = "<?= base_url('account'); ?>"
              }
            })
          }
        }
      });
    });
  }
</script>

<script>
  CKEDITOR.replace('description');
</script>

<script>
  function previewImg() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.preview-img');

    const imageFiles = new FileReader();
    imageFiles.readAsDataURL(image.files[0]);

    imageFiles.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
</script>
</body>

</html>