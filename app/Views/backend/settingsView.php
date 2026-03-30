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
                            <h3 class="card-title">Site Ayarları</h3>

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
                            <form action="<?= base_url('panel/settingsInsert/' . $settings['id']) ?>" method="post"
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

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İşletme İsmi</label>
                                        <input type="text" class="form-control" name="CompanyName" value="<?= $settings['companyName'] ?>"
                                            id="exampleInputEmail1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Wifi Adı</label>
                                        <input type="text" class="form-control" name="wifi" value="<?= $settings['wifi'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Wifi Şifresi</label>
                                        <input type="text" class="form-control" name="wifipass" value="<?= $settings['wifipass'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Google Yorumlar</label>
                                        <input type="text" class="form-control" name="googleyorum" value="<?= $settings['googleyorum'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İnstagram Adresi</label>
                                        <input type="text" class="form-control" name="instagramUrl" value="<?= $settings['instagramUrl'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter Adresi</label>
                                        <input type="text" class="form-control" name="twitterUrl" value="<?= $settings['twitterUrl'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook Adresi</label>
                                        <input type="text" class="form-control" name="facebookUrl" value="<?= $settings['facebookUrl'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İşletme Adresi</label>
                                        <input type="text" class="form-control" name="location" value="<?= $settings['location'] ?>" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">İşletme Adresi GoogleMaps Url</label>
                                        <input type="text" class="form-control" name="locationUrl" value="<?= $settings['location_url'] ?>" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefon Numarası</label>
                                        <input type="text" class="form-control" name="phone" value="<?= $settings['phone'] ?>" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mail Adresi</label>
                                        <input type="mail" class="form-control" name="mail" value="<?= $settings['mail'] ?>" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label>İşletme Tanıtımı</label>
                                        <textarea class="form-control" name="hakkimizda" rows="3"><?= $settings['hakkimizda'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hafta İçi Çalışma Saatleri</label>
                                        <input type="text" class="form-control" name="haftaIci" value="<?= $settings['haftaIci'] ?>" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hafta Sonu Çalışma Saatleri</label>
                                        <input type="text" class="form-control" name="haftaSonu" value="<?= $settings['haftaSonu'] ?>"
                                            id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label>Logo Resim</label>
                                        <div class="dropzone-wrapper" id="logoDropzone">
                                            <div class="dropzone-desc">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <span>Logo sürükleyip bırakın veya tıklayın</span>
                                            </div>
                                            <input type="file" name="logo_img" class="dropzone-input" accept="image/*">
                                            <?php if (!empty($settings['logo_url'])): ?>
                                                <img id="logoPreview" src="<?= base_url('img/settings/' . $settings['logo_url']) ?>" style="max-height:80px; margin-top:10px;">
                                            <?php else: ?>
                                                <img id="logoPreview" style="display:none; max-height:80px; margin-top:10px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Favicon Resim</label>
                                        <div class="dropzone-wrapper" id="favDropzone">
                                            <div class="dropzone-desc">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <span>Favicon sürükleyip bırakın veya tıklayın</span>
                                            </div>
                                            <input type="file" name="favIcon_img" class="dropzone-input" accept="image/*">
                                            <?php if (!empty($settings['favIcon_url'])): ?>
                                                <img id="favPreview" src="<?= base_url('img/settings/' . $settings['favIcon_url']) ?>" style="max-height:50px; margin-top:10px;">
                                            <?php else: ?>
                                                <img id="favPreview" style="display:none; max-height:50px; margin-top:10px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">

                                        </div>
                                        <div class="col-4">
                                            <button type="submit"
                                                class="btn btn-outline-primary btn-lg btn-block">KAYDET</button>
                                        </div>
                                        <div class="col-4">

                                        </div>

                                    </div>
                                </div>
                            </form>

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