<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $settings['companyName'] ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="shortcut icon" href="<?php if (isset($settings['favIcon_url'])) {
                                        echo base_url('img/settings/' . $settings['favIcon_url']);
                                    } ?>" type="">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= base_url('assets/frontend/menu2/menu2'); ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/menu2'); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/menu2'); ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="<?= base_url('assets/frontend/menu2'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url('assets/frontend/menu2'); ?>/css/style.css" rel="stylesheet">
    <style>
        .filters-wrapper {
            overflow-x: auto;
            /* sağa sola kaydır */
            -webkit-overflow-scrolling: touch;
            /* mobilde smooth */
            scrollbar-width: none;
            /* Firefox scrollbar gizle */
        }

        .filters-wrapper::-webkit-scrollbar {
            display: none;
            /* Chrome/Safari scrollbar gizle */
        }

        .filters_menu {
            flex-wrap: nowrap !important;
            /* alt satıra geçme, tek satırda kalsın */
        }

        .filters_menu h6 {
            white-space: nowrap;
            /* yazıyı tek satırda tut */
        }

        /*Dil özellikleri */
        .lang-dropdown {
            position: relative;
        }

        .selected-lang img {
            width: 24px;
            cursor: pointer;
        }

        .lang-menu {
            display: none;
            position: absolute;
            top: 30px;
            background: white;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .lang-menu img {
            width: 24px;
            margin: 3px;
            cursor: pointer;
        }

        .lang-menu img:hover {
            transform: scale(1.2);
            transition: 0.2s;
        }

        /* GOOGLE BAR KAPAT */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }


        /*Dil özellikleri */
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <img style="max-width:100%;height:auto;" src="<?php if (isset($settings['logo_url'])) {
                                                                        echo base_url('img/settings/' . $settings['logo_url']);
                                                                    } ?>" alt="logo_resim">
                </a>
                <div class="ms-auto d-flex align-items-center gap-2">
                    <!-- === BAŞLANGIÇ: Dil Seçimi === -->
                    <div class="lang-dropdown me-3">
                        <div class="selected-lang" onclick="toggleLangMenu()">
                            <img id="selectedFlag"
                                src="<?= base_url('assets/flags/tr.png') ?>"
                                data-base="<?= base_url('assets/flags/') ?>"
                                title="Türkçe">
                        </div>
                        <div id="langMenu" class="lang-menu">
                            <img src="<?= base_url('assets/flags/tr.png') ?>" onclick="selectLang('tr','tr')" title="Türkçe">
                            <img src="<?= base_url('assets/flags/gb.png') ?>" onclick="selectLang('en','gb')" title="English">
                            <img src="<?= base_url('assets/flags/de.png') ?>" onclick="selectLang('de','de')" title="Deutsch">
                            <img src="<?= base_url('assets/flags/ru.png') ?>" onclick="selectLang('ru','ru')" title="Русский">
                            <img src="<?= base_url('assets/flags/sa.png') ?>" onclick="selectLang('ar','sa')" title="العربية">
                            <img src="<?= base_url('assets/flags/fr.png') ?>" onclick="selectLang('fr','fr')" title="Français">
                            <img src="<?= base_url('assets/flags/es.png') ?>" onclick="selectLang('es','es')" title="Español">
                            <img src="<?= base_url('assets/flags/it.png') ?>" onclick="selectLang('it','it')" title="Italiano">
                        </div>
                    </div>
                    <!-- GOOGLE TRANSLATE -->
                    <div id="google_translate_element" style="display:none;"></div>
                </div>
                <!-- === BİTİŞ: Dil Seçimi === -->
                <!-- Menü Butonu -->
                <button class="btn btn-dark ms-2"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sideMenu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </nav>


              <!-- ✅ BURASI BODY ALTINA GELECEK -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sideMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menü</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body d-flex flex-column gap-3">

            <?php if (!empty($settings['wifi'])): ?>
                <button class="btn btn-outline-primary w-100 text-start"
                    data-bs-toggle="modal" data-bs-target="#wifiModal">
                    <i class="fa-solid fa-wifi me-2"></i> Wifi
                </button>
            <?php endif; ?>

            <?php if (!empty($settings['hakkimizda'])): ?>
                <button class="btn btn-outline-secondary w-100 text-start"
                    data-bs-toggle="modal" data-bs-target="#aboutModal">
                    <i class="fa-solid fa-circle-info me-2"></i> Hakkımızda
                </button>
            <?php endif; ?>

            <?php if (!empty($settings['instagramUrl']) || !empty($settings['facebookUrl']) || !empty($settings['twitterUrl'])): ?>
                <button class="btn w-100 text-start"
                    data-bs-toggle="modal" data-bs-target="#socialModal"
                    style="border:2px solid #E1306C; color:#E1306C; font-weight:600;">
                    <i class="fa-brands fa-instagram me-2"></i> Sosyal Medya
                </button>
            <?php endif; ?>

            <?php if (!empty($settings['googleyorum'])): ?>
                <button class="btn w-100 text-start"
                    data-bs-toggle="modal" data-bs-target="#googleReviewModal"
                    style="background: linear-gradient(135deg,#4285F4,#EA4335,#FBBC05,#34A853);
                       color:white; font-weight:600; border:none; border-radius:12px;">
                    <i class="fa-brands fa-google me-2"></i> Bizi Değerlendir
                </button>
            <?php endif; ?>

        </div>
    </div>



            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal"><?= $settings['companyName'] ?></h5>
                        <h1 class="mb-5">Menümüz</h1>
                    </div>

                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                        <div class="filters-wrapper">
                            <ul class="nav nav-pills d-inline-flex justify-content-start border-bottom mb-5 filters_menu">
                                <li class="nav-item">
                                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-filter="*">
                                        <div class="ps-3">
                                            <h6 class="mt-n1 mb-0">Tüm Ürünler</h6>
                                        </div>
                                    </a>
                                </li>
                                <?php foreach ($category as $item) { ?>
                                    <li class="nav-item">
                                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-filter=".cat-<?php echo $item['id']; ?>">
                                            <div class="ps-3">
                                                <h6 class="mt-n1 mb-0"><?php echo $item['name']; ?></h6>
                                            </div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>


                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-4 grid">
                                    <?php foreach ($products as $item) { ?>
                                        <div class="col-lg-6 all cat-<?php echo $item['categories_id']; ?>">
                                            <div class="d-flex align-items-center">
                                                <?php if ($status[0]['resim'] == 1) : ?>
                                                    <img class="flex-shrink-0 img-fluid rounded product-modal-trigger" src="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>" alt="" style="width: 80px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#productModal" data-image-url="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>" data-product-name="<?php echo htmlspecialchars($item['name']); ?>" data-product-info="<?php echo htmlspecialchars($item['info']); ?>" data-product-price="₺<?php echo htmlspecialchars($item['price']); ?>">
                                                <?php endif; ?>

                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2 product-modal-trigger" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#productModal" data-image-url="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>" data-product-name="<?php echo htmlspecialchars($item['name']); ?>" data-product-info="<?php echo htmlspecialchars($item['info']); ?>" data-product-price="₺<?php echo htmlspecialchars($item['price']); ?>">
                                                        <span><?php echo $item['name']; ?></span>
                                                        <?php if ($status[0]['fiyat'] == 1) : ?>
                                                            <span class="text-primary">₺<?php echo $item['price']; ?></span>
                                                        <?php endif; ?>
                                                    </h5>
                                                    <?php if ($status[0]['aciklama'] == 1) : ?>
                                                        <small class="fst-italic"><?php echo $item['info']; ?></small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="row g-5">
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">İletişim Bilgileri</h4>

                            <?php if (!empty($settings['location'])) : ?>
                                <p class="mb-2">
                                    <i class="fa fa-map-marker-alt me-3"></i>
                                    <?php if (!empty($settings['location_url'])) : ?>
                                        <a href="<?= $settings['location_url'] ?>" target="_blank" class="text-white text-decoration-none">
                                            <?= $settings['location'] ?>
                                        </a>
                                    <?php else: ?>
                                        <?= $settings['location'] ?>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>



                            <?php if (!empty($settings['phone'])) : ?>
                                <a href="tel:<?= $settings['phone'] ?>">
                                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?= $settings['phone'] ?></p>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($settings['mail'])) : ?>
                                <a href="mailto:<?= $settings['mail'] ?>">
                                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?= $settings['mail'] ?></p>
                                </a>
                            <?php endif; ?>

                            <div class="d-flex pt-2">
                                <?php if (!empty($settings['instagramUrl'])) : ?>
                                    <a href="<?= $settings['instagramUrl'] ?>" class="btn btn-outline-light btn-social" target="_blank">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($settings['twitterUrl'])) : ?>
                                    <a href="<?= $settings['twitterUrl'] ?>" class="btn btn-outline-light btn-social" target="_blank">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($settings['facebookUrl'])) : ?>
                                    <a href="<?= $settings['facebookUrl'] ?>" class="btn btn-outline-light btn-social" target="_blank">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Çalışma Saatleri</h4>
                            <h5 class="text-light fw-normal">Hafta İçi</h5>
                            <p> <?= $settings['haftaIci'] ?></p>
                            <h5 class="text-light fw-normal">Hafta Sonu</h5>
                            <p> <?= $settings['haftaSonu'] ?></p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Hakkımızda</h4>
                            <p> <?= $settings['hakkimizda'] ?></p>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                <a href="">
                                    &copy; <span id="displayYear"></span> Distributed By SolutionSoftware</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <?php if ($status[0]['resim'] == 1) : ?>
                            <img id="modalProductImage" src="" class="img-fluid mb-3" alt="Ürün Resmi">
                        <?php endif; ?>

                        <?php if ($status[0]['aciklama'] == 1) : ?>
                            <p id="modalProductInfo" class="text-muted"></p>
                        <?php endif; ?>

                        <?php if ($status[0]['fiyat'] == 1) : ?>
                            <span id="modalProductPrice" class="text-primary fw-bold fs-4"></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="">
            <!-- Google Yorum Modal -->
            <div class="modal fade" id="googleReviewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius:20px; padding:20px;">
                        <div class="modal-header border-0 pb-0">
                            <h5 class="modal-title">Bizi Google'da Değerlendir</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-center">
                            <p>Yorumunuzu Google üzerinde bırakabilirsiniz.</p>
                            <a href="<?= $settings['googleyorum'] ?>" target="_blank" class="btn"
                                style="background:#4285F4; color:white; border-radius:10px; padding:10px 20px; font-weight:600;">
                                Google Yorum Yap
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wifi Modal -->
            <div class="modal fade" id="wifiModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius:20px; padding:15px;">
                        <div class="modal-header">
                            <h5 class="modal-title">Wifi Bilgileri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div style="margin-bottom:10px;">
                                <label>Wifi Adı</label>
                                <div style="display:flex; gap:5px;">
                                    <input type="text" id="wifiName" class="form-control" value="<?= $settings['wifi'] ?>" readonly>
                                    <i class="fa-solid fa-copy" style="cursor:pointer; align-self:center; color:#555;" onclick="copyText('wifiName')"></i>
                                </div>
                            </div>
                            <div>
                                <label>Şifre</label>
                                <div style="display:flex; gap:5px;">
                                    <input type="text" id="wifiPass" class="form-control" value="<?= $settings['wifipass'] ?>" readonly>
                                    <i class="fa-solid fa-copy" style="cursor:pointer; align-self:center; color:#555;" onclick="copyText('wifiPass')"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hakkımızda Modal -->
            <div class="modal fade" id="aboutModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius:20px; padding:15px;">
                        <div class="modal-header">
                            <h5 class="modal-title">Hakkımızda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <?= $settings['hakkimizda'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sosyal Medya Modal -->
            <div class="modal fade" id="socialModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius:20px; padding:20px;">
                        <div class="modal-header border-0 pb-0">
                            <h5 class="modal-title">Sosyal Medya</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body d-flex flex-wrap justify-content-center gap-3 pt-2">

                            <?php if (!empty($settings['instagramUrl'])): ?>
                                <a href="<?= $settings['instagramUrl'] ?>" target="_blank"
                                    style="text-decoration:none; display:flex; flex-direction:column; align-items:center; justify-content:center;
                              width:80px; height:80px; border-radius:15px; background:#E1306C; color:white; font-weight:600;">
                                    <i class="fa-brands fa-instagram" style="font-size:28px;"></i>
                                    <span style="font-size:12px; margin-top:4px;">Instagram</span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['facebookUrl'])): ?>
                                <a href="<?= $settings['facebookUrl'] ?>" target="_blank"
                                    style="text-decoration:none; display:flex; flex-direction:column; align-items:center; justify-content:center;
                              width:80px; height:80px; border-radius:15px; background:#1877F2; color:white; font-weight:600;">
                                    <i class="fa-brands fa-facebook" style="font-size:28px;"></i>
                                    <span style="font-size:12px; margin-top:4px;">Facebook</span>
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($settings['twitterUrl'])): ?>
                                <a href="<?= $settings['twitterUrl'] ?>" target="_blank"
                                    style="text-decoration:none; display:flex; flex-direction:column; align-items:center; justify-content:center;
                              width:80px; height:80px; border-radius:15px; background:#1DA1F2; color:white; font-weight:600;">
                                    <i class="fa-brands fa-twitter" style="font-size:28px;"></i>
                                    <span style="font-size:12px; margin-top:4px;">Twitter</span>
                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/wow/wow.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/easing/easing.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/counterup/counterup.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/tempusdominus/js/moment.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="<?= base_url('assets/frontend/menu2'); ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
        <script>
            $(document).ready(function() {
                // Isotope başlat
                var $grid = $('.grid').isotope({
                    itemSelector: '.all',
                    layoutMode: 'fitRows'
                });

                // Filtreleme
                $('.filters_menu li a').click(function(e) {
                    e.preventDefault();
                    $('.filters_menu li a').removeClass('active');
                    $(this).addClass('active');
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                });

                // Modalın içeriğini dinamik olarak doldurma
                $('#productModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var imageUrl = button.data('image-url');
                    var productName = button.data('product-name');
                    var productInfo = button.data('product-info');
                    var productPrice = button.data('product-price');

                    var modal = $(this);
                    modal.find('.modal-title').text(productName);
                    modal.find('#modalProductImage').attr('src', imageUrl);
                    modal.find('#modalProductInfo').text(productInfo);
                    modal.find('#modalProductPrice').text(productPrice);
                });
            });
        </script>


        <!-- === BAŞLANGIÇ: Dil Seçimi === -->
        <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'tr',
                    includedLanguages: 'en,de,ru,ar,fr,es,it,tr',
                    autoDisplay: false
                }, 'google_translate_element');
            }

            function toggleLangMenu() {
                var menu = document.getElementById("langMenu");
                menu.style.display = menu.style.display === "block" ? "none" : "block";
            }

            function selectLang(lang, flag) {
                // HTML'deki data-base attribute ile base URL alıyoruz
                var img = document.getElementById("selectedFlag");
                var base = img.dataset.base;

                if (!base.endsWith('/')) base += '/'; // eksikse / ekle
                img.src = base + flag + ".png";

                localStorage.setItem("selectedLang", lang);
                localStorage.setItem("selectedFlag", flag);

                var interval = setInterval(function() {
                    var select = document.querySelector(".goog-te-combo");
                    if (select) {
                        select.value = lang;
                        select.dispatchEvent(new Event('change'));
                        clearInterval(interval);
                    }
                }, 300);

                document.getElementById("langMenu").style.display = "none";
            }

            document.addEventListener("DOMContentLoaded", function() {
                var img = document.getElementById("selectedFlag");
                var base = img.dataset.base;

                var savedLang = localStorage.getItem("selectedLang");
                var savedFlag = localStorage.getItem("selectedFlag");

                if (savedFlag) {
                    img.src = base + savedFlag + ".png";
                }
                if (savedLang) {
                    selectLang(savedLang, savedFlag);
                }
            });
        </script>
        <script>
            function copyText(id) {
                var copyText = document.getElementById(id);
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                alert("Kopyalandı: " + copyText.value);
            }
        </script>
        <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <!-- === BİTİŞ: Dil Seçimi === -->




        <script src="<?= base_url('assets/frontend/menu2'); ?>/js/main.js"></script>
</body>

</html>