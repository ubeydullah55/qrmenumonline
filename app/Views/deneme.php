<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚀 QR Menü | İşletmenizi Dijitalleştirin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-grad: linear-gradient(135deg, #4361ee, #4cc9f0);
            --dark-blue: #3f37c9;
            --soft-bg: #fdfeff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--soft-bg);
            color: #2b2d42;
        }

        /* Hero Header */
        header {
            background: var(--primary-grad);
            padding: 4rem 1rem;
            border-radius: 0 0 40px 40px;
            color: white;
            text-align: center;
            margin-bottom: -50px;
            /* Slider'ı yukarı çekmek için */
        }

        header h1 {
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -1px;
        }

        /* Slider Container */
        .promo-container {
            background: white;
            border-radius: 30px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .carousel-item img {
            border-radius: 20px;
            height: 400px;
            object-fit: cover;
        }

        /* Buttons */
        .btn-main {
            background: var(--primary-grad);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }

        .btn-whatsapp {
            background: #25d366;
            color: white;
            padding: 12px 30px;
            border-radius: 15px;
            font-weight: 600;
            text-decoration: none;
            margin-left: 10px;
        }

        .btn-main:hover,
        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            color: white;
        }

        /* Feature Cards */
        .feature-card {
            background: white;
            border: none;
            border-radius: 24px;
            padding: 2rem;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            background: #eff2ff;
            color: var(--dark-blue);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        footer {
            padding: 3rem 0;
            opacity: 0.7;
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <span class="badge bg-white text-primary mb-3 px-3 py-2">v2.0 Şimdi Yayında</span>
            <h1>Dijital Menü ile Satışlarını Artır</h1>
            <p class="lead opacity-75">Saniyeler içinde güncellenen, şık ve hızlı QR menü çözümleri.</p>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 promo-container mt-5">
                <div id="menuSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active" data-demo="menu1-link">
                            <h4 class="mb-3 fw-bold text-secondary">Modern Klasik</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu1.png" alt="Menu 1">
                        </div>
                        <div class="carousel-item" data-demo="menu2-link">
                            <h4 class="mb-3 fw-bold text-secondary">Modern Klasik</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu2.png" alt="Menu 1">
                        </div>
                        <div class="carousel-item" data-demo="menu3-link">
                            <h4 class="mb-3 fw-bold text-secondary">Modern Klasik</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu3.png" alt="Menu 3">
                        </div>
                        <div class="carousel-item" data-demo="menu4-link">
                            <h4 class="mb-3 fw-bold text-secondary">Modern Klasik</h4>
                            <img src="<?= base_url('assets/satis'); ?>/menu4.png" alt="Menu 4">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#menuSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#menuSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

                <div class="text-center mt-4 pb-3">
                    <a id="liveDemoBtn" href="#" class="btn-main" target="_blank">
                        <i class="bi bi-eye-fill me-2"></i> Şablonu İncele
                    </a>
                    <a href="https://wa.me/numaraniz" class="btn-whatsapp">
                        <i class="bi bi-whatsapp me-2"></i> Fiyat Al
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box"><i class="bi bi-lightning-charge"></i></div>
                    <h5>Işık Hızında</h5>
                    <p class="small text-muted">Müşterileriniz QR kodu okuttuğu anda menü açılır, bekleme yapmaz.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box"><i class="bi bi-pencil-square"></i></div>
                    <h5>Kolay Yönetim</h5>
                    <p class="small text-muted">Fiyat değiştiğinde kağıt menüleri çöpe atmayın. Panelden saniyeler içinde güncelleyin.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box"><i class="bi bi-phone"></i></div>
                    <h5>%100 Mobil Uyum</h5>
                    <p class="small text-muted">Tüm telefonlarda uygulama indirmeye gerek kalmadan kusursuz görünür.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <p>&copy; 2026 QR Menü Sistemleri. Tüm hakları saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const carousel = document.getElementById('menuSlider');
        const liveDemoBtn = document.getElementById('liveDemoBtn');

        function updateBtn() {
            const activeSlide = carousel.querySelector('.carousel-item.active');
            liveDemoBtn.href = activeSlide.getAttribute('data-demo');
        }

        carousel.addEventListener('slid.bs.carousel', updateBtn);
        window.onload = updateBtn;
    </script>
</body>

</html>