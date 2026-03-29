<!DOCTYPE html>
<html lang="tr">

<head>
    <link rel="shortcut icon" href="<?php if (isset($settings['favIcon_url'])) {
                                        echo base_url('img/settings/' . $settings['favIcon_url']);
                                    } ?>" type="">
    <meta charset="utf-8">
    <title><?= $settings['companyName'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #d4a373;
            /* Altın/Bronz tonu */
            --dark-bg: #1a1a1a;
            --card-bg: #ffffff;
            --text-dark: #2d2d2d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            margin: 0;
            color: var(--text-dark);
        }

        /* Navbar Modernize */
        .navbar {
            background: var(--dark-bg);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            border-radius: 8px;
            transition: 0.3s;
        }

        /* Hero Section - Daha Elegant */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 80px 20px;
            text-align: center;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .hero p {
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        /* Kategoriler - Scroll Tasarımı */
        .filters-wrapper {
            background: #fff;
            padding: 15px 0;
            position: sticky;
            top: 60px;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: none;
            /* Firefox */
        }

        .filters-wrapper::-webkit-scrollbar {
            display: none;
        }

        /* Chrome/Safari */

        .filters-wrapper a {
            display: inline-block;
            margin: 0 10px;
            padding: 8px 20px;
            border-radius: 4px;
            color: #666;
            font-weight: 500;
            text-decoration: none;
            transition: 0.3s;
            border: 1px solid #eee;
        }

        .filters-wrapper a.active,
        .filters-wrapper a:hover {
            background: var(--dark-bg);
            color: var(--primary-color);
            border-color: var(--dark-bg);
        }

        /* Ürün Kartları - 2'li Grid */
        .menu-list {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .menu-item {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid #f0f0f0;
        }

        .menu-item:hover {
            transform: translateY(-8px);
        }

        .menu-item img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .menu-info {
            padding: 15px;
            text-align: left;
        }

        .menu-info h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .menu-info small {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            color: #777;
            font-size: 0.8rem;
            height: 2.4em;
        }

        .price {
            display: block;
            margin-top: 10px;
            font-weight: 600;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        /* Footer */
        .footer {
            background: var(--dark-bg);
            color: #aaa;
            padding: 50px 20px;
            margin-top: 50px;
        }

        .footer p {
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .footer .fab {
            font-size: 1.5rem;
            margin: 0 10px;
            color: var(--primary-color);
        }

        /* Modal Özelleştirme */
        .modal-content {
            border-radius: 20px;
            border: none;
        }

        #modalImg {
            max-height: 250px;
            width: 100%;
            object-fit: cover;
        }

        /* Mobil Uyumluluk */
        @media(max-width: 576px) {
            .menu-list {
                gap: 10px;
                padding: 10px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .menu-item img {
                height: 130px;
            }
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

    <nav class="navbar navbar-expand-lg navbar-dark px-3 py-2 sticky-top">
        <a class="navbar-brand" href="">
            <img style="max-height:45px;" src="<?= isset($settings['logo_url']) ? base_url('img/settings/' . $settings['logo_url']) : '' ?>" alt="logo">
        </a>
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

        <!-- === BİTİŞ: Dil Seçimi === -->
    </nav>

    <div class="hero">
        <h1><?= $settings['companyName'] ?></h1>
        <p>Lezzetin Modern Dokunuşu</p>
    </div>

    <div class="filters-wrapper px-3 text-center">
        <a class="active" data-filter="*">Tüm Menü</a>
        <?php foreach ($category as $item) { ?>
            <a data-filter=".cat-<?= $item['id'] ?>"><?= $item['name'] ?></a>
        <?php } ?>
    </div>

    <div class="menu-list">
        <?php foreach ($products as $item) { ?>
            <div class="menu-item all cat-<?= $item['categories_id'] ?> openModal"
                data-bs-toggle="modal" data-bs-target="#productModal"
                data-name="<?= $item['name']; ?>" data-price="<?= $item['price']; ?>"
                data-info="<?= $item['info']; ?>" data-img="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>">

                <?php if ($status[0]['resim'] == 1): ?>
                    <img src="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>" alt="<?= $item['name']; ?>">
                <?php endif; ?>

                <div class="menu-info">
                    <h6><?= $item['name']; ?></h6>
                    <?php if ($status[0]['aciklama'] == 1): ?><small><?= $item['info']; ?></small><?php endif; ?>
                    <?php if ($status[0]['fiyat'] == 1): ?><span class="price">₺<?= $item['price']; ?></span><?php endif; ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="footer text-center">
        <?php if (!empty($settings['location'])): ?><p><i class="fa fa-map-marker-alt me-2"></i> <?= $settings['location'] ?></p><?php endif; ?>
        <?php if (!empty($settings['phone'])): ?><p><i class="fa fa-phone-alt me-2"></i> <?= $settings['phone'] ?></p><?php endif; ?>

        <div class="mt-4">
            <?php if (!empty($settings['instagramUrl'])): ?><a href="<?= $settings['instagramUrl'] ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
            <?php if (!empty($settings['twitterUrl'])): ?><a href="<?= $settings['twitterUrl'] ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
            <?php if (!empty($settings['facebookUrl'])): ?><a href="<?= $settings['facebookUrl'] ?>" target="_blank"><i class="fab fa-facebook"></i></a><?php endif; ?>
        </div>
        <div class="mt-4" style="font-size: 0.7rem; opacity: 0.5;">
            © <?= date('Y') ?> <?= $settings['companyName'] ?>. Tüm hakları saklıdır.
        </div>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <button type="button" class="btn-close position-absolute"
                    style="top:15px; right:15px; z-index:1055; background-color: #fff; border-radius: 50%; padding: 10px;"
                    data-bs-dismiss="modal" aria-label="Close"></button>

                <?php if ($status[0]['resim'] == 1): ?>
                    <img id="modalImg" src="" class="img-fluid">
                <?php endif; ?>

                <div class="p-4 text-center">
                    <h4 id="modalName" class="mb-2" style="font-family: 'Playfair Display', serif;"></h4>
                    <?php if ($status[0]['fiyat'] == 1): ?>
                        <h5 id="modalPrice" class="mb-3" style="color: var(--primary-color); font-weight: 700;"></h5>
                    <?php endif; ?>
                    <?php if ($status[0]['aciklama'] == 1): ?>
                        <p id="modalInfo" class="text-muted small"></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Filtreleme
            $('.filters-wrapper a').click(function(e) {
                e.preventDefault();
                $('.filters-wrapper a').removeClass('active');
                $(this).addClass('active');
                var filter = $(this).data('filter');
                if (filter == '*') {
                    $('.all').fadeIn(300).css('display', 'flex');
                } else {
                    $('.all').hide();
                    $(filter).fadeIn(300).css('display', 'flex');
                }
            });

            // Modal açma
            $('.openModal').click(function() {
                $('#modalName').text($(this).data('name'));
                <?php if ($status[0]['fiyat'] == 1): ?>$('#modalPrice').text('₺' + $(this).data('price'));
            <?php endif; ?>
            <?php if ($status[0]['aciklama'] == 1): ?>$('#modalInfo').text($(this).data('info'));
            <?php endif; ?>
            <?php if ($status[0]['resim'] == 1): ?>$('#modalImg').attr('src', $(this).data('img'));
            <?php endif; ?>
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

    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- === BİTİŞ: Dil Seçimi === -->

</body>

</html>