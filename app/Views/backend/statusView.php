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
                    <h1 style="text-align:center; color:blue;">SİTE AYARLARI</h1>
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
                            <h3 class="card-title">Ana Menü Site Ayarları</h3>

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

                            <form action="<?= base_url('panel/updateStatus') ?>" method="post"
                                enctype="multipart/form-data">
                                <?php if (session()->get('info')) : ?>
                                    <div class="alert alert-info" role="alert">
                                        <?php echo session()->getFlashdata('info'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->get('danger')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo session()->getFlashdata('danger'); ?>
                                    </div>
                                <?php endif; ?>
                               
                               
                                <div class="card-body">

                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <label>Fiyat</label>
                                        <label style="position:relative; display:inline-block; width:50px; height:26px;">
                                            <input type="checkbox" name="fiyat" value="1"
                                                <?= ($status['fiyat'] == 1) ? 'checked' : '' ?>
                                                style="opacity:0; width:0; height:0;"
                                                onchange="this.nextElementSibling.style.backgroundColor = this.checked ? '#007bff' : '#ccc';
                          this.nextElementSibling.children[0].style.transform = this.checked ? 'translateX(24px)' : 'translateX(0px)';">

                                            <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:<?= ($status['fiyat'] == 1) ? '#007bff' : '#ccc' ?>; border-radius:34px; transition:.4s;">
                                                <span style="position:absolute; height:20px; width:20px; left:3px; bottom:3px; background:white; border-radius:50%; transition:.4s; transform:<?= ($status['fiyat'] == 1) ? 'translateX(24px)' : 'translateX(0px)' ?>;"></span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <label>Açıklama</label>
                                        <label style="position:relative; display:inline-block; width:50px; height:26px;">
                                            <input type="checkbox" name="aciklama" value="1"
                                                <?= ($status['aciklama'] == 1) ? 'checked' : '' ?>
                                                style="opacity:0; width:0; height:0;"
                                                onchange="this.nextElementSibling.style.backgroundColor = this.checked ? '#007bff' : '#ccc';
                          this.nextElementSibling.children[0].style.transform = this.checked ? 'translateX(24px)' : 'translateX(0px)';">

                                            <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:<?= ($status['aciklama'] == 1) ? '#007bff' : '#ccc' ?>; border-radius:34px; transition:.4s;">
                                                <span style="position:absolute; height:20px; width:20px; left:3px; bottom:3px; background:white; border-radius:50%; transition:.4s; transform:<?= ($status['aciklama'] == 1) ? 'translateX(24px)' : 'translateX(0px)' ?>;"></span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="mb-3 d-flex justify-content-between align-items-center">
                                        <label>Resim</label>
                                        <label style="position:relative; display:inline-block; width:50px; height:26px;">
                                            <input type="checkbox" name="resim" value="1"
                                                <?= ($status['resim'] == 1) ? 'checked' : '' ?>
                                                style="opacity:0; width:0; height:0;"
                                                onchange="this.nextElementSibling.style.backgroundColor = this.checked ? '#007bff' : '#ccc';
                          this.nextElementSibling.children[0].style.transform = this.checked ? 'translateX(24px)' : 'translateX(0px)';">

                                            <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background-color:<?= ($status['resim'] == 1) ? '#007bff' : '#ccc' ?>; border-radius:34px; transition:.4s;">
                                                <span style="position:absolute; height:20px; width:20px; left:3px; bottom:3px; background:white; border-radius:50%; transition:.4s; transform:<?= ($status['resim'] == 1) ? 'translateX(24px)' : 'translateX(0px)' ?>;"></span>
                                            </span>
                                        </label>
                                    </div>

                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">

                                        </div>
                                        <div class="col-4">
                                            <button type="submit"
                                                class="btn btn-outline-primary btn-m btn-block">KAYDET</button>
                                        </div>
                                        <div class="col-4">

                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

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