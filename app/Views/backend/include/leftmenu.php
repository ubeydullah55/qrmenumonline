<?php $session = session(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">


        <?php if (session()->has('settings')): ?>
            <img src="<?= base_url('img/settings/' . esc(session()->get('settings')['logo_url'])); ?>" alt="AdminLTE Logo"
                class="brand-image elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><?= esc(session()->get('settings')['companyName']) ?></span>
        <?php else: ?>
            <span class="brand-text font-weight-light">Firma Adı</span>
            <img src="<?= base_url('assets/backend'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
        <?php endif; ?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/backend'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $session->get('ad') . " " . $session->get('soyad');  ?></a>
                <a href="#" class="d-block"
                    style="text-align:center"><small>(<?php echo $session->get('unvan')  ?>)</small></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('panel') ?>" class="nav-link">
                        <i class="nav-icon fas fa-home" style="color:orange"></i>
                        <p>Anasayfa</p>
                    </a>
                </li>

                <?php if ($session->get('yetki') == 0 && session()->get('firma')->firma_id == 1) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('panel/firmalistView') ?>" class="nav-link">
                            <i class="nav-icon fas fa-building" style="color:white"></i>
                            <p>Firma Listesi</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url('panel/category') ?>" class="nav-link">
                        <i class="nav-icon fas fa-bars" style="color:yellow"></i>
                        <p>Kategori İşlemleri</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?= base_url('panel/product') ?>" class="nav-link">
                        <i class="nav-icon fas fa-box" style="color:#339999"></i>
                        <p>Ürün İşlemleri</p>
                    </a>
                </li>

                <!--
                <li class="nav-item">
                    <a href="<?= base_url('panel/productInsertView') ?>" class="nav-link">
                        <i class="nav-icon fas fa-plus" style="color:#669e85"></i>
                        <p>
                            Ürün Ekle
                        </p>
                    </a>
                </li>

               
                <li class="nav-item">
                    <a href="<?= base_url() . 'panel/callView' ?>" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn" style="color:#629e85"></i>
                        <p>
                            Garson Bekleyenler
                        </p>
                    </a>
                </li>
                -->
                <?php if ($session->get('yetki') == 0) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('panel/employeAddView') ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-plus" style="color:pink" aria-hidden="true"></i>
                            <p>Kullanıcı Ekle</p>
                        </a>
                    </li>
                <?php endif ?>

                <li class="nav-item">
                    <a href="<?= base_url('panel/qrcode') ?>" class="nav-link">
                        <i class="nav-icon fas fa-qrcode" style="color:#7BF55A " aria-hidden="true"></i>
                        <p>Qr Kod Oluştur</p>
                    </a>
                </li>


                <?php if ($session->get('yetki') == 0) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('panel/settingsView') ?>" class="nav-link">
                            <i class="nav-icon fas fa-cog" style="color:#2ACFF3" aria-hidden="true"></i>
                            <p>Genel Ayarlar</p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($session->get('yetki') == 0) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('panel/statusView') ?>" class="nav-link">
                            <i class="nav-icon fas fa-eye" style="color:white" aria-hidden="true"></i>
                            <p>Görünürlük Ayarları</p>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a href="<?= base_url('panel/quit') ?>" class="nav-link">
                        <i class="nav-icon fas fa-arrow-right" style="color:red" aria-hidden="true"></i>
                        <p>Çıkış</p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>