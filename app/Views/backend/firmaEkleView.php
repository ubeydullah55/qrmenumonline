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
          <h1 style="text-align:center; color:blue;">FİRMA LİSTELEME</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <a href="<?= base_url('panel/firmaEkleView') ?>" class="btn btn-primary btn-sm">Yeni Firma Ekle</a>
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
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color: #fff;">
                  <form action="<?= base_url('panel/firmaKaydet') ?>" method="post">

                    <!-- Satır 1: Firma Adı ve Fiyat -->
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <label for="firma_ad" class="form-label">Domain</label>
                        <input type="text" class="form-control" id="domain" name="domain" placeholder="Domain adını girin" required>
                      </div>
                      <div class="col-md-4">
                        <label for="price" class="form-label">Fiyat</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Fiyat girin" required>
                      </div>
                       <div class="col-md-4">
                        <label for="firma_ad" class="form-label">Firma Adı</label>
                        <input type="text" class="form-control" id="firma_ad" name="firma_ad" placeholder="Firma adını girin" required>
                      </div>
                    </div>

                    <!-- Satır 2: Oluşturma ve Bitiş Tarihi + Template -->
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <label for="creadet_date" class="form-label">Oluşturma Tarihi</label>
                        <input type="date" class="form-control" id="creadet_date" name="creadet_date"
                          value="<?= date('Y-m-d') ?>" required>
                      </div>
                      <div class="col-md-4">
                        <label for="end_date" class="form-label">Bitiş Tarihi</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                          value="<?= date('Y-m-d', strtotime('+1 year')) ?>">
                      </div>
                      <div class="col-md-4 d-flex flex-column">
                        <label for="template" class="form-label">Template</label>
                        <select class="form-select mt-auto" id="template" name="template" required>
                          <option value="">Seçiniz</option>

                          <?php if (!empty($template)): ?>
                            <?php foreach ($template as $t): ?>
                              <option value="<?= esc($t['menu']) ?>">
                                <?= esc($t['menu']) ?>
                              </option>
                            <?php endforeach; ?>
                          <?php endif; ?>

                        </select>
                      </div>
                    </div>

                    <!-- Satır 3: Açıklama -->
                    <div class="mb-4">
                      <label for="aciklama" class="form-label">Açıklama</label>
                      <textarea class="form-control" id="aciklama" name="aciklama" rows="4" placeholder="Açıklama girin"></textarea>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary px-5">Kaydet</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
              <div class="row">
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>

              </div>
            </div>








            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?= $this->include('backend/include/footer'); ?>