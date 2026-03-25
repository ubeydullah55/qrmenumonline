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
          <h1 style="text-align:center; color:orange;">ÜRÜN DÜZENLEME</h1>
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
              <h3 class="card-title">Ürün Düzenleme Sayfası</h3>

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
              <form action="<?= base_url('panel/productEdit/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Kategori Seçin</label>
                    <select class="form-control" name="category" required>
                      <?php foreach ($category as $rows) : ?>
                        <option value="<?= $rows['id'] ?>" <?= ($productCategory['id'] == $rows['id']) ? 'selected' : '' ?>>
                          <?= $rows['name'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Ürün ad ..." value="<?= $product['name'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Ürün Açıklaması</label>
                    <textarea class="form-control" name="product_info" rows="3" placeholder="Açıklama ..." required><?= $product['info'] ?> </textarea>
                  </div>
                  <div class="form-group">
                    <label>Ürün Fiyatı</label>
                    <input type="number" class="form-control" name="product_price" placeholder="Fiyat ..." value=<?= $product['price'] ?> required>
                  </div>
                  <div class="form-group">
                    <label>Ürün Resim</label>
                    <div class="dropzone-wrapper" id="productDropzone">
                      <div class="dropzone-desc">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span>Ürün resmi sürükleyip bırakın veya tıklayın</span>
                      </div>
                      <input type="file" name="product_img" class="dropzone-input" accept="image/*">
                      <?php if (!empty($product['img'])): ?>
                        <img id="productPreview"
                          src="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $product['img']) ?>"
                          style="max-height:80px; margin-top:10px;">
                      <?php else: ?>
                        <img id="productPreview" style="display:none; max-height:80px; margin-top:10px;">
                      <?php endif; ?>
                    </div>
                  </div>


                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center flex-wrap">
                      <!-- GÜNCELLE Butonu -->
                      <button type="submit" class="btn btn-outline-warning btn-lg mr-2">
                        <i class="fa fa-pen mr-1"></i> GÜNCELLE
                      </button>

                      <!-- SİL Butonu -->
                      <a href="#" data-url="<?= base_url('panel/productsDelete/' . $product['id']) ?>"
                        class="btn btn-outline-danger btn-lg btn-delete">
                        <i class="fa fa-trash mr-1"></i> SİL
                      </a>
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