<?= $this->include('backend/include/header'); ?>
<!-- /.navbar -->


<!-- Main Sidebar Container -->
<?= $this->include('backend/include/leftmenu'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 style="text-align:center; color:orange;">KATEGORİ EKLEME</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kategori Ekleme Sayfası</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">

              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-12 col-xl-6">
                      <!-- general form elements -->

                      <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title">Kategori Ekle</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('panel/category_insert') ?>" method="post">

                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kategori Adı</label>
                              <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Kategori Adı Girin">
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-outline-success btn-m">KAYDET</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->


                    <div class="col-12 col-xl-6">
                      <section class="content pb-3">
                        <div class="container-fluid h-100">
                          <div class="card card-row card-info ">
                            <div class="card-header d-flex align-items-center">
                              <!-- SOL: Başlık -->
                              <h3 class="card-title mb-0">Aktif / Pasif Kategoriler</h3>

                              <!-- SAĞ: Filtre Dropdown -->
                              <div class="ml-auto">
                                <select id="categoryFilter" class="form-control form-control-sm w-auto">
                                  <option value="all">Tüm Ürünler</option>
                                  <option value="1">Aktif Ürünler</option>
                                  <option value="0">Pasif Ürünler</option>
                                </select>
                              </div>
                            </div>
                            <div class="card-body">


                              <div class="row">
                                <?php foreach ($category as $row): ?>

                                  <div class="col-12 col-md-6 product-item" data-active="<?= $row['is_active'] ?>">

                                    <div class="card <?= $row['is_active'] == 1 ? 'card-info' : 'card-secondary' ?> card-outline">

                                      <div class="card-header d-flex justify-content-between align-items-center">

                                        <!-- SOL -->
                                        <div class="d-flex align-items-center">
                                          <a href="<?= base_url('panel/categoryEditView/' . $row['id']) ?>" class="btn btn-tool btn-link mr-2">
                                            <i class="fa fa-pen" style="color:orange"></i>
                                          </a>
                                          <h5 class="card-title mb-0"><?= $row['name'] ?></h5>
                                        </div>

                                        <!-- SAĞ -->
                                        <div class="ml-auto">
                                          <a href="<?= base_url('panel/category_info/' . $row['id'] . '/' . $row['is_active']) ?>">
                                            <div class="custom-control custom-switch">
                                              <input type="checkbox" class="custom-control-input" id="switch<?= $row['id'] ?>"
                                                <?= $row['is_active'] == 1 ? 'checked' : '' ?>
                                                onclick="event.preventDefault(); this.closest('a').click();">
                                              <label class="custom-control-label" for="switch<?= $row['id'] ?>"></label>
                                            </div>
                                          </a>
                                        </div>

                                      </div>

                                    </div>

                                  </div>

                                <?php endforeach; ?>
                              </div>


                              <!-- Card bitişi -->
                            </div>

                          </div>
                      </section>




                      <!-- /.card -->
                      <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                  </div>
                  <!-- /.row -->
                </div><!-- /.container-fluid -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

          </div>
          <!-- /.card-body -->
          <div class="card-footer" style="text-align:center;">
            Kategori Ekle->Kategori ismi gir->Kaydet tuşuna basıp kategori ekleyebilirsiniz.<br>
            Aktif Kategoriler->Kalem tuşuna basarak kategori düzenleyebilirsiniz.<br>
            Aktif Kategoriler->Çöp kutusu tuşuna basarak kategoriyi silebilirsiniz.<br>
            NOT:Silinen kategori ile birlikte sistemden kategori altındaki ürünlerde silinecektir.
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </div>
    </div>
</div>
</section>
<!-- /.content -->

<!-- /.content-wrapper -->


<?= $this->include('backend/include/footer'); ?>

<!-- Filtreleme JS -->
<script>
  const filterSelect = document.getElementById('categoryFilter');
  const productItems = document.querySelectorAll('.product-item');

  filterSelect.addEventListener('change', function() {
    const filterValue = this.value;

    productItems.forEach(item => {
      const isActive = item.getAttribute('data-active');
      if (filterValue === 'all') {
        item.style.display = 'block';
      } else if (filterValue === isActive) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>