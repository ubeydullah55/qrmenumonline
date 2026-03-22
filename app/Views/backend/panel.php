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
                <div class="col-sm-6">
                <!--  <h1>Collapsed Sidebar</h1> -->   
                </div>
                <div class="col-sm-6">

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
                            <h3 class="card-title">Anasayfa</h3>

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
                            <div class="row">

                                <div class="col-lg-3 col-6">

                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <p style="text-align:center;">Toplam Ürün Sayısı</p>
                                            <h3 style="text-align:center;"><?php if (isset($productCount)) {
                                                        echo $productCount;
                                                      } else {
                                                        echo "---";
                                                      } ?><sup style="font-size: 20px"></sup></h3>

                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">

                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <p style="text-align:center;">Toplam Kategori Sayısı</p>
                                            <h3 style="text-align:center;"><?php if (isset($categoryCount)) {
                                                        echo $categoryCount;
                                                      } else {
                                                        echo "---";
                                                      } ?></h3>

                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">

                                    <div class="small-box" style="background-color:pink;">
                                        <div class="inner">
                                            <p style="text-align:center;">Aktif Ürün Sayısı</p>
                                            <h3 style="text-align:center;"><?php if (isset($activeProductCount)) {
                                                        echo $activeProductCount;
                                                      } else {
                                                        echo "---";
                                                      } ?><sup style="font-size: 20px"></sup></h3>

                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>

                                    </div>

                                </div>
                                   <div class="col-lg-3 col-6">

                                    <div class="small-box" style="background-color:#d3d3d3;">
                                        <div class="inner">
                                            <p style="text-align:center;">Pasif Ürün Sayısı</p>
                                            <h3 style="text-align:center;"><?php if (isset($pasiveProductCount)) {
                                                        echo $pasiveProductCount;
                                                      } else {
                                                        echo "---";
                                                      } ?><sup style="font-size: 20px"></sup></h3>

                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Genel Değerlendirme Sayfası
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