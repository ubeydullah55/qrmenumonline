<!DOCTYPE html>
<html lang="tr">

<head>
    <link rel="shortcut icon" href="<?php if (isset($settings['favIcon_url'])) {
                                        echo base_url('img/settings/' . $settings['favIcon_url']);
                                    }  ?>" type="">
    <meta charset="utf-8">
    <title><?= $settings['companyName'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #f2f2f7;
            margin: 0;
        }

        /* Navbar */
        .navbar {
           background: linear-gradient(145deg, #ff6b6b, #f06595);
          
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
        }

        .navbar a.navbar-brand img {
            border-radius: 50%;
            border: 2px solid #fff;
        }

        /* Hero */
        .hero {
            background: linear-gradient(145deg, #ff6b6b, #f06595);
            color: #fff;
            padding: 60px 20px;
            text-align: center;
            font-family: 'Pacifico', cursive;
        }

        .hero h1 {
            font-size: 2.5rem;
            letter-spacing: 2px;
        }

        .hero p {
            font-size: 1.05rem;
            opacity: 0.85;
        }

        /* Filters */
        .filters-wrapper {
            background: #fff;
            padding: 12px;
            border-bottom: 2px solid #ff6b6b;
            overflow-x: auto;
            white-space: nowrap;
        }

        .filters-wrapper a {
            display: inline-block;
            margin: 0 8px;
            padding: 10px 22px;
            border-radius: 30px;
            background: #ffe6e6;
            color: #ff6b6b;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .filters-wrapper a.active,
        .filters-wrapper a:hover {
            background: #ff6b6b;
            color: #fff;
        }

        /* Menu List */
        /* Menu Listesi: Grid ile 2 ürün yan yana her ekran boyutunda mobilde */
        .menu-list {
            padding: 20px 10px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* her zaman iki kolon */
            gap: 15px;
            justify-items: center;
        }

        .menu-item {
            background: #fff;
            border-radius: 20px;
            padding: 15px;
            width: 100%;
            /* grid kolon genişliğine uyacak */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.07);
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: 0.3s;
            cursor: pointer;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .menu-item img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #ff6b6b;
            margin-bottom: 12px;
        }

        .menu-info h6 {
            margin: 5px 0;
            font-weight: 700;
            font-size: 1.1rem;
            color: #333;
            text-align: center;
        }

        .menu-info small {
            display: -webkit-box;
            /* Eski ve WebKit tarayıcılar için */
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            /* Görünecek satır sayısı */
            line-clamp: 2;
            /* Standard property untuk kompatibilitas */
            overflow: hidden;
            /* Taşan kısmı gizle */
            text-overflow: ellipsis;
            /* Sonuna ... ekle */
            line-height: 1.4em;
            /* Satır yüksekliği */
            max-height: calc(1.4em * 2);
            /* line-clamp ile aynı satır sayısı */
            color: #666;
            font-size: 0.9rem;
            margin-top: 4px;
        }

        .price {
            margin-top: 5px;
            font-weight: 700;
            color: #ff6b6b;
            font-size: 1rem;
        }

        /* Footer */
        .footer {
            background: #ff6b6b;
            color: #fff;
            text-align: center;
            padding: 30px 20px;
            margin-top: 30px;
        }

        .footer a {
            color: #fff;
            margin: 0 6px;
            font-size: 1.2rem;
        }

        /* Responsive mobile */
        @media(max-width:767.98px) {
            .menu-item {
                width: 48%;
                /* iki yan yana mobilde */
            }
        }

        @media(max-width:480px) {
            .menu-item {
                width: 100%;
                /* çok küçük ekranda tek kolon */
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
        <a href="">
            <img style="max-width:70px;" src="<?= isset($settings['logo_url']) ? base_url('img/settings/' . $settings['logo_url']) : '' ?>" alt="logo">
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
        <p>Menümüzden seçiminizi yapın</p>
    </div>

    <div class="filters-wrapper">
        <ul class="m-0 p-0" style="list-style:none;">
            <li style="display:inline;"><a class="active" data-filter="*">Tüm Ürünler</a></li>
            <?php foreach ($category as $item) { ?>
                <li style="display:inline;"><a data-filter=".cat-<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="menu-list">
        <?php foreach ($products as $item) { ?>
            <div class="menu-item all cat-<?= $item['categories_id'] ?> openModal"
                data-bs-toggle="modal" data-bs-target="#productModal"
                data-name="<?= $item['name']; ?>" data-price="<?= $item['price']; ?>"
                data-info="<?= $item['info']; ?>" data-img="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>">
                <?php if ($status[0]['resim'] == 1): ?>
                    <img src="<?= base_url('img/product/' . session()->get('firma')->firma_id . '/' . $item['img']); ?>" alt="">
                <?php endif; ?>
                <div class="menu-info">
                    <h6><?= $item['name']; ?></h6>
                    <?php if ($status[0]['aciklama'] == 1): ?><small><?= $item['info']; ?></small><?php endif; ?>
                    <?php if ($status[0]['fiyat'] == 1): ?><span class="price">₺<?= $item['price']; ?></span><?php endif; ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="footer">
        <?php if (!empty($settings['location'])): ?><p><i class="fa fa-map-marker-alt"></i> <?= $settings['location'] ?></p><?php endif; ?>
        <?php if (!empty($settings['phone'])): ?><p><i class="fa fa-phone-alt"></i> <?= $settings['phone'] ?></p><?php endif; ?>
        <?php if (!empty($settings['mail'])): ?><p><i class="fa fa-envelope"></i> <?= $settings['mail'] ?></p><?php endif; ?>
        <div class="mt-3">
            <?php if (!empty($settings['instagramUrl'])): ?><a href="<?= $settings['instagramUrl'] ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php endif; ?>
            <?php if (!empty($settings['twitterUrl'])): ?><a href="<?= $settings['twitterUrl'] ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
            <?php if (!empty($settings['facebookUrl'])): ?><a href="<?= $settings['facebookUrl'] ?>" target="_blank"><i class="fab fa-facebook"></i></a><?php endif; ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3 text-center position-relative" style="padding-top:50px;">

                <!-- Kapatma butonu: artık resmin üstüne binmiyor -->
                <button type="button" class="btn-close position-absolute"
                    style="top:10px; right:10px; z-index:1055;"
                    data-bs-dismiss="modal" aria-label="Close"></button>

                <?php if ($status[0]['resim'] == 1): ?>
                    <img id="modalImg" class="img-fluid mb-3" style="border-radius:15px; margin-top:30px;">
                <?php endif; ?>

                <h5 id="modalName"></h5>

                <?php if ($status[0]['fiyat'] == 1): ?>
                    <p id="modalPrice" class="fw-bold"></p>
                <?php endif; ?>

                <?php if ($status[0]['aciklama'] == 1): ?>
                    <p id="modalInfo" class="text-muted"></p>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Filtreleme: animasyon kaldırıldı
            $('.filters-wrapper a').click(function(e) {
                e.preventDefault();
                $('.filters-wrapper a').removeClass('active');
                $(this).addClass('active');
                var filter = $(this).data('filter');
                if (filter == '*') {
                    $('.all').css('display', 'flex');
                } else {
                    $('.all').hide();
                    $(filter).css('display', 'flex');
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