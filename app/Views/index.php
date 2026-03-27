<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚀 Dijital QR Menü Satış Paneli</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-grad: linear-gradient(135deg, #6a11cb, #2575fc);
            --soft-bg: #f8f9fa;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--soft-bg);
            color: #333;
        }

        /* Modern Header */
        header {
            background: var(--primary-grad);
            padding: 3rem 1rem 5rem 1rem;
            border-radius: 0 0 30px 30px;
            color: white;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 10px;
        }

        /* Slider Kutusu */
        .slider-wrapper {
            background: white;
            border-radius: 25px;
            padding: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin-top: -60px;
            /* Yukarı kaydırma efekti */
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .carousel-item {
            border-radius: 15px;
            overflow: hidden;
            text-align: center;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 450px;
            object-fit: contain;
            /* Resimlerin bozulmaması için */
            background: #f1f1f1;
        }

        .carousel-item h4 {
            padding: 15px 0;
            font-weight: 700;
            color: #2575fc;
        }

        /* Butonlar */
        .cta-box {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
            padding-bottom: 10px;
        }

        .btn-demo {
            background: var(--primary-grad);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            flex: 1;
            max-width: 200px;
        }

        .btn-whatsapp {
            background: #25d366;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            flex: 1;
            max-width: 200px;
        }

        .btn-demo:hover,
        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            color: white;
        }

        /* Özellik Kartları */
        .feature-card {
            background: white;
            padding: 1.5rem;
            border-radius: 20px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card i {
            font-size: 2rem;
            color: #6a11cb;
            margin-bottom: 1rem;
            display: block;
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: #888;
            font-size: 0.9rem;
        }

        /* Full Width Banner - Sabit ve Tam Görünüm */
        .full-width-banner {
            width: 100%;
            height: 500px;
            /* Yüksekliği görselin formuna göre artırdım */
            background-image: url('<?= base_url("assets/satis/qr-banner.png"); ?>');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            /* Resmi alanı kaplayacak şekilde yayar */
            background-attachment: scroll;
            /* İSTEDİĞİN: Sayfayla beraber normal şekilde kayar */
            position: relative;
            margin: 40px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Mobil cihazlarda görselin çok küçülmemesi için yükseklik ayarı */
        @media (max-width: 768px) {
            .full-width-banner {
                height: 220px;
                margin: 20px 0;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <h1>🚀 İşletmeni Dijital Çağa Taşı!</h1>
            <p class="opacity-75">Müşterilerinize modern, temassız ve dinamik bir menü deneyimi sunun</p>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 slider-wrapper">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-demo="<?= str_replace('://', '://demo1.', base_url('')) ?>">
                            <h4>Modern Menü Şablonu 1</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu1.png" alt="Menu 1">
                        </div>
                        <div class="carousel-item" data-demo="<?= str_replace('://', '://demo2.', base_url('')) ?>">
                            <h4>Şık Menü Şablonu 2</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu2.png" alt="Menu 2">
                        </div>
                        <div class="carousel-item" data-demo="<?= str_replace('://', '://demo3.', base_url('')) ?>">
                            <h4>Zarif Menü Şablonu 3</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu3.png" alt="Menu 3">
                        </div>
                        <div class="carousel-item" data-demo="<?= str_replace('://', '://demo4.', base_url('')) ?>">
                            <h4>Premium Menü Şablonu 4</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu4.png" alt="Menu 4">
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                    </button>
                </div>

                <div class="cta-box text-center">
                    <a id="liveDemoBtn" href="<?= base_url('menu1') ?>" target="_blank" class="btn-demo">
                        <i class="bi bi-eye"></i> Canlı Demo
                    </a>
                    <a href="https://wa.me/90XXXXXXXXXX" class="btn-whatsapp" target="_blank">
                        <i class="bi bi-whatsapp"></i> Hemen Satın Al
                    </a>
                </div>
            </div>
        </div>

        <div class="full-width-banner"></div>



        <div class="row mt-5 g-4 text-center">
            <div class="col-md-3">
                <div class="feature-card">
                    <i class="bi bi-lightning-charge-fill"></i>
                    <h6 class="fw-bold">Anında Güncelleme</h6>
                    <p class="small text-muted mb-0">Fiyatları saniyeler içinde değiştirin, baskı masrafından kurtulun.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <i class="bi bi-check-circle-fill"></i>
                    <h6 class="fw-bold">Kolay Yönetim</h6>
                    <p class="small text-muted mb-0">Tükenen ürünleri tek tıkla gizleyin, hatalı siparişi önleyin.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <i class="bi bi-shield-check"></i>
                    <h6 class="fw-bold">Hijyenik Çözüm</h6>
                    <p class="small text-muted mb-0">Temassız menü ile müşterilerinize güvenli bir ortam sunun.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <i class="bi bi-graph-up-arrow"></i>
                    <h6 class="fw-bold">Satışları Artırın</h6>
                    <p class="small text-muted mb-0">Görsel odaklı menü tasarımıyla iştahları kabartın.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; <?= date("Y"); ?> Dijital QR Menü Yazılımı. Tüm Hakları Saklıdır.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const carousel = document.getElementById('carouselExampleIndicators');
        const liveDemoBtn = document.getElementById('liveDemoBtn');

        carousel.addEventListener('slid.bs.carousel', (event) => {
            const currentSlide = event.relatedTarget;
            liveDemoBtn.href = currentSlide.getAttribute('data-demo');
        });
    </script>
</body>

</html>