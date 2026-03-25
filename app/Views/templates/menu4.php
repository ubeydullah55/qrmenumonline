<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?php if (isset($settings['favIcon_url'])) {
                                        echo base_url('img/settings/' . $settings['favIcon_url']);
                                    }  ?>" type="">

    <title><?= $settings['companyName'] ?></title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/menu1'); ?>/css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="<?= base_url('assets/frontend/menu1'); ?>/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/frontend/menu1'); ?>/css/style.css" rel="stylesheet" />
    <link href="<?= base_url('assets/frontend/menu1'); ?>/css/style.sccs" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?= base_url('assets/frontend/menu1'); ?>/css/responsive.css" rel="stylesheet" />
    <style>
        .img-box {
            width: 100%;
            height: 250px;
            /* yüksekliği istediğine göre ayarlayabilirsin */
            overflow: hidden;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-box img {
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            /* resmi kırpar ama kutuya tam oturtur */
            display: block;
            border: none;
            /* varsa border kaldırır */
            box-shadow: none;
            /* varsa gölgeyi kaldırır */
        }

        @media (max-width: 767px) {
            .filters-wrapper {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .filters_menu {
                display: flex !important;
                flex-wrap: nowrap !important;
            }

            .filters_menu li {
                flex: 0 0 auto;
                white-space: nowrap;
            }

            .filters_menu::-webkit-scrollbar {
                display: none;
            }
        }
    </style>

</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
            <img src="<?= base_url('assets/frontend/menu1'); ?>/images/hero-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="">
                        <span>
                            <?= $settings['companyName'] ?>
                        </span>
                    </a>

                    <div class="ml-auto d-flex align-items-center">
                        <?php if (!empty($settings['instagramUrl'])): ?>
                            <a href="<?= $settings['instagramUrl'] ?>" target="_blank" style="color: white; text-decoration: none; margin-left: 10px; display: flex; align-items: center;">
                                <i class="fa fa-instagram" aria-hidden="true" style="margin-right:5px;"></i>
                                <span>instagram</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($settings['twitterUrl'])): ?>
                            <a href="<?= $settings['twitterUrl'] ?>" target="_blank" style="color: white; text-decoration: none; margin-left: 10px; display: flex; align-items: center;">
                                <i class="fa fa-twitter" aria-hidden="true" style="margin-right:5px;"></i>
                                <span>twitter</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($settings['facebookUrl'])): ?>
                            <a href="<?= $settings['facebookUrl'] ?>" target="_blank" style="color: white; text-decoration: none; margin-left: 10px; display: flex; align-items: center;">
                                <i class="fa fa-facebook" aria-hidden="true" style="margin-right:5px;"></i>
                                <span>facebook</span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- üst taraf kategori ekleme <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav  mx-auto " style="color: white">
                
                <li class="active" data-filter="*">All</li>
                <?php foreach ($category as $item) { ?>
                <li data-filter=".<?php echo $item['id']; ?>"><?php echo $item['name']; ?></li>
                <?php } ?>

            </ul>
            </ul>
            -->

            </div>
            </nav>
    </div>
    </header>
    <!-- end header section -->
    </div>



    <!-- food section -->
    <section class="food_section layout_padding" style="padding:5px">
        <div class="container">
            <div class="heading_container heading_center">
                <div class="logo">


                    <img style="max-width:50%;height: auto;" src="
                    <?php if (isset($settings['logo_url'])) {
                        echo base_url('img/settings/' . $settings['logo_url']);
                    }  ?>" alt="logo_resim" srcset="">
                </div>
                <br>
                <?php if ($status[0]['garson_cagir'] == 1): ?>
                    <?php if ($_GET) : ?>
                        <?php $table_no = $_GET["id"]; ?>
                        <a href="<?= base_url('call/' . $table_no) ?>"><button type="submit"
                                style="background-color:#FF5733; color:white;" type="button" class="btn btn"><b>GARSON
                                    ÇAĞIR</b></button></a>

                    <?php endif; ?>
                <?php endif; ?>
                <?php if (session()->get('info')) : ?>
                    <br>
                    <div class="alert alert-info" style="text-align:center;" role="alert">
                        <?php echo session()->getFlashdata('info'); ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->get('danger')) : ?>
                    <div class="alert alert-danger" style="text-align:center;" role="alert">
                        <?php echo session()->getFlashdata('danger'); ?>
                    </div>
                <?php endif; ?>

            </div>





            <div class="filters-wrapper">
                <ul class="nav nav-pills d-inline-flex justify-content-start border-bottom mb-5 filters_menu">
                    <li class="nav-item active" data-filter="*">
                        <div class="ps-3">
                            <h6 class="mt-n1 mb-0">Tüm Ürünler</h6>
                        </div>
                    </li>
                    <?php foreach ($category as $item) { ?>
                        <li class="nav-item" data-filter=".<?php echo $item['id']; ?>">
                            <div class="ps-3">
                                <h6 class="mt-n1 mb-0"><?php echo $item['name']; ?></h6>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>





            <div class="filters-content">
                <div class="row grid">
                    <?php foreach ($products as $item) { ?>
                        <div class="col-sm-6 col-lg-4 all <?php echo $item['categories_id']; ?>">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <?php if ($status[0]['resim'] == 1): ?>
                                            <img src="<?= base_url('img/product/'. session()->get('firma')->firma_id . '/'. $item['img']); ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="detail-box">
                                        <h5 style="color:orange">
                                            <?php echo $item['name']; ?>
                                        </h5>
                                        <?php if ($status[0]['aciklama'] == 1): ?> <!-- Aciklama 1 olduğunda göster -->
                                            <p>
                                                <?php echo $item['info']; ?>
                                            </p>
                                        <?php endif; ?>
                                        <div class="options">
                                            <?php if ($status[0]['fiyat'] == 1): ?> <!-- Aciklama 1 olduğunda göster -->
                                                <h5 style="color:orange; text-align:center;">
                                                    <?php echo "₺" . $item['price']; ?>
                                                </h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>

    <!-- end food section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            İletişim Bilgileri
                        </h4>
                        <div class="contact_link_box">
                            <?php if (!empty($settings['location'])): ?>
                                <a href="#">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span><?= $settings['location'] ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['phone'])): ?>
                                <a href="tel:<?= $settings['phone'] ?>">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span><?= $settings['phone'] ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['mail'])): ?>
                                <a href="mailto:<?= $settings['mail'] ?>">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span><?= $settings['mail'] ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['instagramUrl'])): ?>
                                <a href="<?= $settings['instagramUrl'] ?>" target="_blank">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                    <span>instagram</span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['twitterUrl'])): ?>
                                <a href="<?= $settings['twitterUrl'] ?>" target="_blank">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                    <span>twitter</span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['facebookUrl'])): ?>
                                <a href="<?= $settings['facebookUrl'] ?>" target="_blank">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                    <span>facebook</span>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            Hakkımızda
                        </a>
                        <p>
                            <?= $settings['hakkimizda'] ?>
                        </p>

                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Çalışma Saatleri
                    </h4>
                    <p>
                        Hafta İçi
                    </p>
                    <p>
                        <?= $settings['haftaIci'] ?>
                    </p>
                    <p>
                        Hafta Sonu
                    </p>
                    <p>
                        <?= $settings['haftaSonu'] ?>
                    </p>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    <a href="">
                        &copy; <span id="displayYear"></span> Distributed By SolutionSoftware</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="<?= base_url('assets/frontend/menu1'); ?>/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="<?= base_url('assets/frontend/menu1'); ?>/js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url('assets/frontend/menu1'); ?>/js/custom.js"></script>
    <!-- Google Map -->

    </script>
    <!-- End Google Map -->


</body>

</html>