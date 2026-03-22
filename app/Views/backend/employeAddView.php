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
          <h1 style="text-align:center; color:pink;">PERSONEL EKLEME</h1>
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
              <h3 class="card-title">Personel Ekleme Sayfası</h3>

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
                        <div class="card-header" style="background-color:pink">
                          <h3 class="card-title">Personel Ekle</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('panel/employeInsert') ?>" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Personel Adı</label>
                              <input type="text" name="employeName" class="form-control" id="exampleInputEmail1">
                              <label for="exampleInputEmail1">Personel SoyAdı</label>
                              <input type="text" name="employeSurName" class="form-control" id="exampleInputEmail1">
                              <label for="exampleInputEmail1">Personel Telefon</label>
                              <input type="text" name="employeNumber" class="form-control" id="exampleInputEmail1" required>
                              <label for="exampleInputEmail1">Personel Şifre</label>
                              <input type="password" name="employePassword" class="form-control" id="exampleInputEmail1" required>
                              <label for="exampleInputEmail1">Personel Ünvan</label>
                              <select class="form-control" name="unvan" required>
                                <option>KULLANICI</option>
                                <option>YÖNETİCİ</option>
                              </select>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" style="background-color:pink" class="btn btn-block btn-m">KAYDET</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- Personel Listesi -->

                    <div class="col-12 col-xl-6">
                      <section class="content pb-3">
                        <div class="container-fluid h-100">
                          <div class="card card-row card-gray ">
                            <div class="card-header">
                              <h3 class="card-title">
                                Personel Listesi
                              </h3>
                            </div>
                            <div class="card-body">

                              <?php foreach ($personel as $row): ?>
                                <div class="card card-gray card-outline">
                                  <div class="card-header">
                                    <h5 class="card-title"><?php echo $row['ad'] . " " . $row['soyad'] . " (" . $row['unvan'] . ")" ?></h5>
                                    <div class="card-tools">
                                      <a href="#"
                                        data-url="<?= base_url('panel/employeDelete/' . $row['id']) ?>"
                                        class="btn btn-tool btn-link btn-delete">
                                        <i class="fa fa-trash" aria-hidden="true" style="color:#cd5c5c"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; ?>
                              <!-- Card bitişi -->
                            </div>

                          </div>
                      </section>




                      <!-- /.card -->
                      <!-- /.card -->
                    </div>





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