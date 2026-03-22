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
            <h1 style="text-align:center; color:blue;">ÜRÜN EKLEME</h1>          
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
                <h3 class="card-title">Ürün Ekeleme Sayfası</h3>
                  
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
              <form action="<?= base_url('panel/insertProduct') ?>" method="post" enctype="multipart/form-data">
      
                <div class="card-body">
                <div class="form-group">
                        <label>Kategori Seçin</label>
                        <select class="form-control" name="category" required>
                          <?php foreach($category as $rows) { ?>
                           <option value="<?= $rows['id']; ?>"><?= $rows['name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Ürün ad ..." required>
                  </div>
                  <div class="form-group">
                        <label>Ürün Açıklaması</label>
                        <textarea class="form-control" name="product_info" rows="3" placeholder="Açıklama ..." required></textarea>
                      </div>
                      <div class="form-group">
                        <label>Ürün Fiyatı</label>
                        <input type="number" class="form-control" name="product_price"  placeholder="Fiyat ..." required>
                      </div>
                <div class="form-group">
    <label>Ürün Resim</label>
    <div class="dropzone-wrapper" id="productDropzone">
        <div class="dropzone-desc">
            <i class="fas fa-cloud-upload-alt"></i>
            <span>Ürün resmi sürükleyip bırakın veya tıklayın</span>
        </div>
        <input type="file" name="product_img" class="dropzone-input" accept="image/*" required>
        <?php if (!empty($product['img'])): ?>
            <img id="productPreview" src="<?= base_url('img/product/' . $product['img']) ?>" style="max-height:80px; margin-top:10px;">
        <?php else: ?>
            <img id="productPreview" style="display:none; max-height:80px; margin-top:10px;">
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
                  <button type="submit" class="btn btn-outline-primary btn-lg btn-block">KAYDET</button>
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