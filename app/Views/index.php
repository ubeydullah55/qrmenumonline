<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚀 Dijital QR Menü Çözümleri - Geleceğin Menü Deneyimi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient-start: #6a11cb;
            --primary-gradient-end: #2575fc;
            --secondary-gradient-start: #FF7B54;
            --secondary-gradient-end: #FFB26B;
            --dark-blue: #0A1931;
            --text-light: #ecf0f1;
            --card-background: rgba(255, 255, 255, 0.95);
            --shadow-light: rgba(0, 0, 0, 0.08);
            --shadow-medium: rgba(0, 0, 0, 0.15);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.8;
            background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
            color: var(--text-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 2rem 0;
            /* Sayfanın üst ve altında boşluk bırak */
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0 1.5rem;
            flex-grow: 1;
        }

        header {
            text-align: center;
            padding: 4rem 0;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            /* Animasyonlar için */
        }

        header h1 {
            font-size: 3.5rem;
            color: #fff;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 0 5px 15px var(--shadow-medium);
            opacity: 0;
            /* JS ile animasyon */
            transform: translateY(20px);
            /* JS ile animasyon */
        }

        header p {
            font-size: 1.3rem;
            color: #fff;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0;
            /* JS ile animasyon */
            transform: translateY(20px);
            /* JS ile animasyon */
        }

        .section {
            background-color: var(--card-background);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px var(--shadow-medium);
            margin-bottom: 3rem;
            transition: transform 0.6s ease-out, opacity 0.6s ease-out;
            transform: translateY(50px);
            opacity: 0;
        }

        .section.is-visible {
            transform: translateY(0);
            opacity: 1;
        }

        h2 {
            font-size: 2.5rem;
            color: var(--dark-blue);
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
            font-weight: 600;
        }

        h2::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-gradient-start), var(--primary-gradient-end));
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-light);
            text-align: center;
            transition: all 0.4s ease;
            color: var(--dark-blue);
            border-bottom: 4px solid var(--secondary-gradient-start);
            /* Renkli alt çizgi */
        }

        .feature-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 35px var(--shadow-medium);
            border-color: var(--secondary-gradient-end);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: var(--primary-gradient-start);
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .feature-card p {
            font-size: 1rem;
            color: #555;
        }

        .demo-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .demo-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 8px 20px var(--shadow-light);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        .demo-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 35px var(--shadow-medium);
        }

        .demo-item img {
            width: 100%;
            height: 450px;
            /* Sabit yükseklik */
            object-fit: cover;
            /* Resimleri orantılı doldurur */
            display: block;
            transition: transform 0.5s ease;
        }

        .demo-item:hover img {
            transform: scale(1.1);
        }

        .demo-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%);
            color: #fff;
            padding: 1.5rem;
            transform: translateY(100%);
            transition: transform 0.4s ease;
        }

        .demo-item:hover .overlay {
            transform: translateY(0);
        }

        .overlay h3 {
            font-size: 1.3rem;
            text-align: left;
            margin-bottom: 0.5rem;
        }

        .overlay p {
            font-size: 0.9rem;
            text-align: left;
            opacity: 0.8;
        }

        footer {
            text-align: center;
            padding: 2.5rem 0;
            color: var(--text-light);
            font-size: 0.9rem;
            opacity: 0.8;
            margin-top: 3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            header p {
                font-size: 1rem;
            }

            h2 {
                font-size: 2rem;
            }

            .section {
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .feature-card,
            .demo-item {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            header h1 {
                font-size: 2rem;
            }

            header p {
                font-size: 0.9rem;
            }

            h2 {
                font-size: 1.7rem;
            }

            body {
                padding: 1rem 0;
            }
        }

        @media (max-width: 480px) {
            .feature-card h3 {
                font-size: 1.1rem;
                /* Başlıkları küçült */
            }

            .feature-card p {
                font-size: 0.85rem;
                /* Metni küçült */
            }

            h2 {
                font-size: 1.5rem;
                /* Section başlığını küçült */
            }
        }

        /* Bilgisayar ekranları */
        @media (min-width: 992px) {
            #carouselExampleIndicators .carousel-item img {
                max-height: 400px;
                object-fit: contain;
            }

            #carouselExampleIndicators h4 {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }

            #liveDemoBtn {
                font-size: 1rem;
                padding: 0.5rem 1.5rem;
            }
        }

        /* Tablet ve mobil ekranlar */
        @media (max-width: 991px) {
            #carouselExampleIndicators .carousel-item img {
                max-height: none;
                /* Yüksekliği sınırlamıyoruz */
                width: 100%;
                height: auto;
                /* Orantıyı koruyarak tam göster */
                object-fit: cover;
                /* Resmi kesmeden göster */
            }

            #carouselExampleIndicators h4 {
                font-size: 1.2rem;
            }

            #liveDemoBtn {
                font-size: 0.9rem;
                padding: 0.4rem 1.2rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <header style="
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); /* Gradient renk */
    padding: 2rem 1rem;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    text-align: center;
    color: #fff; /* Yazılar beyaz */
    margin-bottom: 2rem;
">
            <h1 class="animate-text-in" style="font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700;">
                🚀 İşletmeni Dijital Çağa Taşı!
            </h1>
            <p class="animate-text-in delay-1" style="font-size: 1.1rem; max-width: 700px; margin: 0 auto;">
                Müşterilerinize modern, temassız ve dinamik bir menü deneyimi sunun. Kağıt menülerin zahmetine veda edin!
            </p>
        </header>





        <section>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active" data-demo="<?= base_url('menu1') ?>">
                        <h4 class="text-center">Menü 1</h4>
                        <img src="<?= base_url('assets/satis'); ?>/menu1.png" class="d-block w-100" alt="Modern Minimalist">
                    </div>

                    <div class="carousel-item" data-demo="<?= base_url('menu2') ?>">
                        <h4 class="text-center">Menü 2</h4>
                        <img src="<?= base_url('assets/satis'); ?>/menu2.png" class="d-block w-100" alt="Canlı ve Enerjik">
                    </div>

                    <div class="carousel-item" data-demo="<?= base_url('menu3') ?>">
                        <h4 class="text-center">Menü 3</h4>
                        <img src="<?= base_url('assets/satis'); ?>/menu3.png" class="d-block w-100" alt="Sıcak ve Samimi">
                    </div>

                     <div class="carousel-item" data-demo="<?= base_url('menu4') ?>">
                        <h4 class="text-center">Menü 4</h4>
                        <img src="<?= base_url('assets/satis'); ?>/menu4.png" class="d-block w-100" alt="Sıcak ve Samimi">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Canlı Demo Butonu Slider’ın hemen altında -->
            <p class="text-center mt-3">
                <a id="liveDemoBtn" href="<?= base_url('menu1') ?>" target="_blank" class="btn btn-lg btn-success rounded-pill shadow">
                    🚀 Canlı Demo
                </a>
            </p>
        </section>

        <section class="section">
            <h2>Neden Dijital QR Menü?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>⚡ Anında Güncelleme</h3>
                    <p>Fiyatları, ürünleri veya stok durumunu saniyeler içinde güncelle. Artık baskı maliyeti ve bekleme süresi yok!</p>
                </div>
                <div class="feature-card">
                    <h3>✅ Kolay Ürün Yönetimi</h3>
                    <p>Tükenen veya mevsime bağlı ürünleri tek tıkla pasife al, menüden kaldır. Müşterine her zaman doğru bilgiyi göster.</p>
                </div>
                <div class="feature-card">
                    <h3>✨ Temassız & Hijyenik</h3>
                    <p>Müşteriler kendi telefonlarıyla QR kodu tarar, menüye anında ulaşır. Pandemi sonrası hijyen beklentilerini karşıla.</p>
                </div>
                <div class="feature-card">
                    <h3>📈 Etkileşimli Deneyim</h3>
                    <p>Görsel açıdan zengin menüler, ürün fotoğrafları ve açıklamalarla müşteri memnuniyetini artır.</p>
                </div>
            </div>
        </section>


    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Dijital QR Menü Çözümleri. Tüm Hakları Saklıdır. | Geleceğin Menüleri Burada!</p>
    </footer>



    <script>
        const carousel = document.getElementById('carouselExampleIndicators');
        const liveDemoBtn = document.getElementById('liveDemoBtn');

        // Başlangıçta aktif slider'ın linkini ayarla
        const activeSlide = carousel.querySelector('.carousel-item.active');
        liveDemoBtn.href = activeSlide.getAttribute('data-demo');

        // Slider değiştiğinde buton linkini güncelle
        carousel.addEventListener('slid.bs.carousel', (event) => {
            const currentSlide = event.relatedTarget; // Yeni aktif slide
            liveDemoBtn.href = currentSlide.getAttribute('data-demo');
        });
    </script>
    <script>
        // Header Metin Animasyonu
        document.addEventListener('DOMContentLoaded', () => {
            const heading = document.querySelector('header h1');
            const paragraph = document.querySelector('header p');

            setTimeout(() => {
                heading.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
                heading.style.opacity = '1';
                heading.style.transform = 'translateY(0)';
            }, 300); // Küçük bir gecikme

            setTimeout(() => {
                paragraph.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
                paragraph.style.opacity = '1';
                paragraph.style.transform = 'translateY(0)';
            }, 800); // Başlıktan biraz sonra başlasın
        });

        // Scroll Animasyonları (Intersection Observer)
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.section');

            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15 // %15'i göründüğünde tetikle
            };

            const sectionObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Bir kere göründükten sonra gözlemlemeyi bırak
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                sectionObserver.observe(section);
            });
        });

        // Demo item hover animasyonları için js'e gerek yok css ile hallettik
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>