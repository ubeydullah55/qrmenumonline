<!DOCTYPE html>
<html lang="tr">
<head>
    <link rel="shortcut icon" href="<?php if (isset($settings['favIcon_url'])) { echo base_url('img/settings/' . $settings['favIcon_url']); } ?>" type="">
    <meta charset="utf-8">
    <title><?= $settings['companyName'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
<style>
:root {
    --app-primary: #121212;
    --app-accent: #E67E22; /* İştah açıcı turuncu/bronz tonu */
    --app-bg: #FDFDFD;
    --app-card: #FFFFFF;
    --app-text: #1A1A1A;
    --app-muted: #8E8E93;
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--app-bg);
    margin: 0;
    padding-bottom: 80px; /* Alt bar için boşluk */
    color: var(--app-text);
    -webkit-tap-highlight-color: transparent;
}

/* App Header */
.app-header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    padding: 12px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(0,0,0,0.05);
}
.app-header h1 {
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0;
    letter-spacing: -0.5px;
}


/* Horizontal Categories (Chips) */
.categories-scroller {
    padding: 15px 0;
    overflow-x: auto;
    white-space: nowrap;
    scrollbar-width: none;
    background: var(--app-bg);
}
.categories-scroller::-webkit-scrollbar { display: none; }

.category-chip {
    display: inline-block;
    padding: 8px 18px;
    margin: 0 5px;
    border-radius: 20px;
    background: #F2F2F7;
    color: var(--app-muted);
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none !important;
    transition: 0.2s;
    border: 1px solid transparent;
}
.category-chip.active {
    background: var(--app-primary);
    color: #fff;
}

/* App Grid */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    padding: 0 15px;
}

.app-card {
    background: var(--app-card);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    border: 1px solid #F2F2F7;
}
.app-card:active {
    transform: scale(0.96);
}

.card-img-wrapper {
    position: relative;
    padding-top: 100%; /* 1:1 Aspect Ratio */
}
.card-img-wrapper img {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    object-fit: cover;
}

.card-body {
    padding: 12px;
}
.card-title {
    font-size: 0.95rem;
    font-weight: 700;
    margin-bottom: 4px;
    color: var(--app-text);
}
.card-info {
    font-size: 0.75rem;
    color: var(--app-muted);
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 8px;
}
.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-price {
    font-weight: 700;
    color: var(--app-accent);
    font-size: 0.9rem;
}

/* Bottom Tab Bar */
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 70px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: space-around;
    align-items: center;
    border-top: 1px solid rgba(0,0,0,0.05);
    z-index: 1000;
}
.nav-item {
    text-align: center;
    color: var(--app-muted);
    text-decoration: none !important;
    font-size: 0.7rem;
    font-weight: 500;
}
.nav-item i {
    font-size: 1.4rem;
    display: block;
    margin-bottom: 2px;
}
.nav-item.active {
    color: var(--app-primary);
}

/* Modal Styling */
.modal-content {
    border-radius: 25px;
    border: none;
    overflow: hidden;
}
.modal-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

@media (min-width: 768px) {
    .menu-grid { grid-template-columns: repeat(3, 1fr); max-width: 900px; margin: 0 auto; }
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

<header class="app-header">
    <img src="<?= isset($settings['logo_url']) ? base_url('img/settings/'.$settings['logo_url']) : '' ?>" alt="logo" style="height: 35px; border-radius: 8px;">
    <h1><?= $settings['companyName'] ?></h1>
   
            <!-- === BAŞLANGIÇ: Dil Seçimi === -->
        <div class="lang-dropdown me-1">
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
</header>

<div class="categories-scroller px-2">
    <a class="category-chip active" data-filter="*">Tümü</a>
    <?php foreach($category as $item){ ?>
      <a class="category-chip" data-filter=".cat-<?= $item['id'] ?>"><?= $item['name'] ?></a>
    <?php } ?>
</div>

<div class="menu-grid">
  <?php foreach($products as $item){ ?>
    <div class="app-card all cat-<?= $item['categories_id'] ?> openModal"
         data-bs-toggle="modal" data-bs-target="#productModal"
         data-name="<?= $item['name']; ?>" data-price="<?= $item['price']; ?>"
         data-info="<?= $item['info']; ?>" data-img="<?= base_url('img/product/'. session()->get('firma')->firma_id . '/'.$item['img']); ?>">
      
      <div class="card-img-wrapper">
        <?php if($status[0]['resim']==1): ?>
          <img src="<?= base_url('img/product/'. session()->get('firma')->firma_id . '/'.$item['img']); ?>" alt="">
        <?php endif; ?>
      </div>

      <div class="card-body">
        <div class="card-title"><?= $item['name']; ?></div>
        <?php if($status[0]['aciklama']==1): ?>
            <div class="card-info"><?= $item['info']; ?></div>
        <?php endif; ?>
        <div class="card-footer">
            <?php if($status[0]['fiyat']==1): ?>
                <span class="card-price">₺<?= $item['price']; ?></span>
            <?php endif; ?>
            <i class="fa-solid fa-circle-plus" style="color: var(--app-primary); font-size: 1.2rem;"></i>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<nav class="bottom-nav">
    <a href="#" class="nav-item active">
        <i class="fa-solid fa-house"></i>
        Anasayfa
    </a>
    <a href="tel:<?= $settings['phone'] ?>" class="nav-item">
        <i class="fa-solid fa-phone"></i>
        Ara
    </a>
    <a href="<?= $settings['instagramUrl'] ?>" target="_blank" class="nav-item">
        <i class="fa-brands fa-instagram"></i>
        Sosyal
    </a>
    <a href="#productModal" class="nav-item" data-bs-toggle="modal">
        <i class="fa-solid fa-heart"></i>
        Favori
    </a>
</nav>

<div class="modal fade" id="productModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered mx-3">
    <div class="modal-content">
      <div class="position-relative">
          <button type="button" class="btn-close position-absolute" 
                  style="top:15px; right:15px; z-index:10; background-color: white; border-radius: 50%; opacity: 1; padding: 10px;" 
                  data-bs-dismiss="modal"></button>
          <?php if($status[0]['resim']==1): ?>
            <img id="modalImg" src="" class="modal-img">
          <?php endif; ?>
      </div>
      <div class="p-4">
          <div class="d-flex justify-content-between align-items-start mb-2">
              <h4 id="modalName" class="m-0" style="font-weight: 800;"></h4>
              <span id="modalPrice" style="color: var(--app-accent); font-weight: 800; font-size: 1.2rem;"></span>
          </div>
          <hr>
          <p id="modalInfo" class="text-muted" style="font-size: 0.9rem; line-height: 1.6;"></p>
          <button class="btn w-100 py-3 mt-2" data-bs-dismiss="modal" 
                  style="background: var(--app-primary); color: white; border-radius: 15px; font-weight: 700;">
              Kapat
          </button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    // Uygulama Tipi Filtreleme
    $('.category-chip').click(function(e){
        e.preventDefault();
        $('.category-chip').removeClass('active');
        $(this).addClass('active');
        var filter = $(this).data('filter');
        if(filter=='*'){
            $('.all').show();
        } else {
            $('.all').hide();
            $(filter).show();
        }
    });

    // Modal Veri Aktarımı
    $('.openModal').click(function(){
        $('#modalName').text($(this).data('name'));
        $('#modalPrice').text('₺'+$(this).data('price'));
        $('#modalInfo').text($(this).data('info'));
        $('#modalImg').attr('src', $(this).data('img'));
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