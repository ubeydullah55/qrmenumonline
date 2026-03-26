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
          <h1 style="text-align:center; color:orange;">KATEGORİ Düzenleme</h1>
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
              <h3 class="card-title">Kategori Düzenleme Sayfası</h3>

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
                      <!-- general form elements -->

                      <div class="card card-warning">
                        <div class="card-header">
                          <h3 class="card-title">Kategori Düzenle</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('panel/categoryEdit/' . $categoryId) ?>" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kategori Adı</label>
                              <input type="text" name="category" class="form-control" id="exampleInputEmail1" value="<?= $categoryName ?>">
                            </div>
                          </div>



                          <div class="card-footer">
                            <div class="row">
                              <div class="col-12 d-flex justify-content-center flex-wrap">
                                <!-- GÜNCELLE Butonu -->
                                <button type="submit" class="btn btn-outline-warning btn-lg mr-2">
                                  <i class="fa fa-pen mr-1"></i> GÜNCELLE
                                </button>

                                <!-- SİL Butonu -->
                                <a href="#" data-url="<?= base_url('panel/categoryDelete/' . $categoryId) ?>"
                                  class="btn btn-outline-danger btn-lg btn-delete">
                                  <i class="fa fa-trash mr-1"></i> SİL
                                </a>
                              </div>
                            </div>
                          </div>

                        </form>
                      </div>
                      <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->







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

<!-- /.content-wrapper -->


<?= $this->include('backend/include/footer'); ?>