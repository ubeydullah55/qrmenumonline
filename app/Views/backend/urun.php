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
          <h1 style="text-align:center; color:blue;">AKTİF-PASİF ÜRÜNLER</h1>
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ürün Listeleme Sayfası</h3>

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
                  <div class="col-12 col-xl-12">
                    <div class="card card-info">
                      <div class="card-header d-flex align-items-center">

                        <!-- SOL -->
                        <h3 class="card-title mb-0 mr-3">Ürünler</h3>

                        <!-- SEARCH -->
                        <div class="input-group input-group-sm mr-2" style="max-width: 200px;">
                          <input type="text" id="productSearch" class="form-control" placeholder="Ara...">
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="fas fa-search"></i>
                            </span>
                          </div>
                        </div>

                        <!-- ➕ ÜRÜN EKLE (YENİ TASARIM) -->
                    <a href="<?= base_url('panel/productInsertView') ?>"
   class="btn btn-sm"
   style="background:#e8f5e9; color:#2e7d32; border-radius:12px; padding:6px 14px; border:1px solid #c8e6c9;">
   <i class="fas fa-plus mr-1"></i> Ürün Ekle
</a>

                        <!-- SAĞ -->
                        <div class="ml-auto">
                          <select id="productFilter" class="form-control form-control-sm">
                            <option value="all">Tümünü Göster</option>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                          </select>
                        </div>

                      </div>

                      <div class="card-body">
                        <form>
                          <div id="productList" class="row">
                            <?php foreach ($productsAll as $row): ?>
                              <div class="col-12 col-md-6 col-lg-3 product-item" data-active="<?= $row['is_active'] ?>">

                                <div class="card <?= $row['is_active'] == 1 ? 'card-info' : 'card-secondary' ?> card-outline">

                                  <div class="card-header d-flex justify-content-between align-items-center">

                                    <!-- SOL -->
                                    <div class="d-flex align-items-center">
                                      <a href="<?= base_url('panel/productsEditView/' . $row['id']) ?>" class="btn btn-tool btn-link mr-2">
                                        <i class="fa fa-pen" style="color:orange"></i>
                                      </a>
                                      <h5 class="card-title mb-0"><?= $row['name'] ?></h5>
                                    </div>

                                    <!-- SAĞ -->
                                    <div class="ml-auto">
                                      <a href="<?= base_url('panel/products_info/' . $row['id'] . '/' . $row['is_active']) ?>">
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
                        </form>
                      </div>
                    </div>
                  </div>


                  <!--
                    <div class="col-12 col-xl-6">
                      <section class="content pb-3">
                        <div class="container-fluid h-100">
                          <div class="card card-row card-gray ">
                            <div class="card-header">
                              <h3 class="card-title">
                                Pasif Ürünler
                              </h3>
                            </div>
                            <div class="card-body">

                              <?php foreach ($productsPassive as $row): ?>
                                <div class="card card-gray card-outline">
                                  <div class="card-header">
                                    <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                    <div class="card-tools">
                                      <a href="<?= base_url('panel/products_info/' . $row['id'] . "/" . $row['is_active']) ?>" class="btn btn-tool btn-link"><i class="fa fa-unlock" aria-hidden="true" style="color:#b8860b"></i></a>
                                      <a href="<?= base_url('panel/productsDelete/' . $row['id']) ?>" onclick="return confirm('Silmek istediğinize eminmisiniz?')" class="btn btn-tool btn-link"><i class="fa fa-trash" aria-hidden="true" style="color:#cd5c5c"></i></a>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; ?>
                         
                            </div>

                          </div>
                      </section>




              
                    </div>
                    -->
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
          Aktif Ürünler->Kilit tuşuna basıp ürünü pasife alabilirsiniz.Böylece müşterileriniz ürünü göremeyecektir..<br>
          Aktif Ürünler->Kalem tuşna basıp ürünü düzenleyebilirsiniz.<br>
          Pasif Ürünler->Kilit tuşuna basıp ürünü aktife alabilirsiniz.Böylece müşterileriniz tekrardan ürünü görebilecektir.<br>
          Pasif Ürünler->Çöp kutusu tuşuna basarak ürünü silebilirsiniz.Öncelikle silinecek ürünü pasif hale getirmlisiniz<br>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>

<!-- /.content -->

<!-- /.content-wrapper -->


<?= $this->include('backend/include/footer'); ?>
<!-- Filtreleme JS -->
<script>
  const filterSelect = document.getElementById('productFilter');
  const searchInput = document.getElementById('productSearch');
  const productItems = document.querySelectorAll('.product-item');

  function filterProducts() {
    const filterValue = filterSelect.value;
    const searchValue = searchInput.value.toLowerCase();

    productItems.forEach(item => {
      const isActive = item.getAttribute('data-active');
      const productName = item.querySelector('.card-title').innerText.toLowerCase();

      let showByFilter = false;
      let showBySearch = false;

      // dropdown filtre
      if (filterValue === 'all') {
        showByFilter = true;
      } else if (filterValue === isActive) {
        showByFilter = true;
      }

      // search filtre
      if (productName.includes(searchValue)) {
        showBySearch = true;
      }

      // ikisini birleştir
      if (showByFilter && showBySearch) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  }

  // eventler
  filterSelect.addEventListener('change', filterProducts);
  searchInput.addEventListener('keyup', filterProducts);
</script>