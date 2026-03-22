<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Qr Menu | Sistemi</title>
  <link rel="icon" href="<?php if (isset($settings['favIcon_url'])) {
                      echo base_url('img/settings/'.$settings['favIcon_url']);
                      
                    }  ?>" type="" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(''); ?>/assets/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <img style="max-width:80%;height: auto;" src="
                    <?php if (isset($settings['logo_url'])) {
                      echo base_url('img/settings/'.$settings['logo_url']);
                      
                    }  ?>" alt="logo_resim" srcset="">
  

    <!--<a href="#"><b><?php if(isset($settings['companyName'])) 
    {
      echo $settings['companyName'];
    } ?></a>
     -->  
  </div>
  <?php if(session()->get('danger')) : ?>             
              <div class="alert alert-danger" role="alert">
                 <?php echo session()->getFlashdata('danger'); ?>
              </div>
              <?php endif; ?> 
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Qr Menü Sistemi Panel Giriş</p>

      <form action="<?= base_url('login/kontrol'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="k_adi" placeholder="Telefon no giriniz...." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  name="k_sifre" placeholder="Şifreniz...." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

          <div class="col-12">
            <button type="submit" class="btn btn-info btn-block">Giriş yap</button>
          </div>
          <!-- /.col -->
        </div>
        <i><p class="login-box-msg" style="text-align:center; color:gray;">-SolutionSoftware-</p></i>
      </form>

    
      <!-- /.social-auth-links -->

  
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url(''); ?>/assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(''); ?>/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(''); ?>/assets/backend/dist/js/adminlte.min.js"></script>
</body>
</html>
