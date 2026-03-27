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
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Firma Adı</th>
                          <th>Oluşturma Tarihi</th>
                          <th>Bitiş Tarihi</th>
                          <th>Fiyat</th>
                          <th>Template</th>
                          <th>Açıklama</th>
                          <th>İşlemler</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($firmalar)): ?>
                          <?php foreach ($firmalar as $firma): ?>
                            <tr>
                              <td><?= esc($firma['firma_id']) ?></td>
                              <td><?= esc($firma['firma_ad']) ?></td>
                              <td><?= esc($firma['creadet_date']) ?></td>
                              <td><?= esc($firma['end_date']) ?></td>
                              <td><?= esc($firma['price']) ?></td>
                              <td><?= esc($firma['template']) ?></td>
                              <td><?= esc($firma['aciklama']) ?></td>
                              <td>
                                <div class="mt-2">
                                  <!-- Düzenle -->
                                  <a href="<?= base_url('firma/edit/' . $firma['firma_id']) ?>"
                                    class="btn btn-outline-warning btn-sm me-1">
                                    <i class="fa fa-pen"></i>
                                  </a>

                                  <!-- Sil -->
                                  <a href="#"
                                    data-url="<?= base_url('panel/firmadelete/' . $firma['firma_id']) ?>"
                                   class="btn btn-outline-danger btn-sm btn-delete">
                                    <i class="fa fa-trash" aria-hidden="true" style="color:#cd5c5c"></i>
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="7" class="text-center text-muted">Kayıt bulunamadı</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>

                    </table>
                  </div>
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