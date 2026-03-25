<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>SolutionSoftware &copy; 2022-2023</strong> All rights reserved.

  <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/backend'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/backend'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/backend'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/backend'); ?>/dist/js/demo.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- Optional Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script>
  function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Logo
  const logoInput = document.querySelector('#logoDropzone .dropzone-input');
  if (logoInput) {
    logoInput.addEventListener('change', function() {
      previewImage(this, 'logoPreview');
    });
  }

  // Favicon
  const favInput = document.querySelector('#favDropzone .dropzone-input');
  if (favInput) {
    favInput.addEventListener('change', function() {
      previewImage(this, 'favPreview');
    });
  }

  // Ürün resmi
  const productInput = document.querySelector('#productDropzone .dropzone-input');
  if (productInput) {
    productInput.addEventListener('change', function() {
      previewImage(this, 'productPreview');
    });
  }
</script>

<!-- Diğer footer scriptler buraya -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Silme butonları
    document.querySelectorAll('.btn-delete').forEach(btn => {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.getAttribute('data-url');

        Swal.fire({
          title: 'Emin misiniz?',
          text: "Bu işlemi geri alamazsınız!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Evet, sil!',
          cancelButtonText: 'İptal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        });
      });
    });

    // İşlem başarılı popup
    <?php if (session()->getFlashdata('success')): ?>
      Swal.fire({
        icon: 'success',
        title: 'Başarılı!',
        text: '<?= session()->getFlashdata("success") ?>',
        timer: 2000,
        showConfirmButton: false
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('info')): ?>
      Swal.fire({
        icon: 'info',
        title: 'Bilgi',
        text: '<?= session()->getFlashdata("info") ?>',
        timer: 2000,
        showConfirmButton: false
      });
    <?php endif; ?>

    <?php if (session()->getFlashdata('danger')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Hata!',
        text: '<?= session()->getFlashdata("danger") ?>',
        timer: 2500,
        showConfirmButton: false
      });
    <?php endif; ?>
  });
</script>

<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      responsive: true,
      dom: 'Bfrtip', // arama, export ve pagination için
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
      order: [
        [0, 'asc']
      ], // ID kolonuna göre varsayılan sıralama
    });
  });
</script>


</body>

</html>