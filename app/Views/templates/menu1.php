<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?php if (isset($settings['favIcon_url'])) {
                                        echo base_url('img/settings/' . $settings['favIcon_url']);
                                    }  ?>" type="">
    <title><?= $settings['companyName'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background: #fafafa;
            margin: 0;
            overflow-y: scroll;
            /* Kaydırma çubuğunu sabitler */
            overflow-x: hidden;
            /* Yatay kaymayı engeller */
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: #fff;
            padding: 80px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
        }

        .hero p {
            opacity: 0.9;
        }

        .filters-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            white-space: nowrap;
            background: #fff;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .filters-wrapper::-webkit-scrollbar {
            display: none;
        }

        .filters_menu a {
            display: inline-block;
            margin: 0 6px;
            padding: 8px 18px;
            border-radius: 25px;
            background: #f1f1f1;
            font-size: .9rem;
            color: #333;
            text-decoration: none;
            transition: .3s;
        }

        .filters_menu a.active,
        .filters_menu a:hover {
            background: #0d6efd;
            color: #fff;
        }

        .menu-list {
            padding: 30px 15px;
        }

        .menu-item {
            display: flex;
            align-items: flex-start;
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .menu-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            cursor: pointer;
        }

        .menu-info {
            flex: 1;
            margin-left: 15px;
        }

        .menu-info h6 {
            margin: 0;
            font-weight: 600;
        }

        .menu-info small {
            color: #666;
        }

        .price {
            font-weight: bold;
            color: #0d6efd;
        }

        .footer {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: #fff;
            text-align: center;
            padding: 30px 20px;
            margin-top: 40px;
        }

        .footer a {
            color: #fff;
            margin: 0 8px;
            font-size: 1.2rem;
        }

        .bg-custom-light {
            background-color: rgba(255, 255, 255, 0.9) !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .bg-custom-light a,
        .bg-custom-light span {
            color: #333 !important;
            text-decoration: none;
        }

        .bg-custom-light a:hover {
            text-decoration: underline;
        }

        /* MOBİL CİHAZ MODAL AÇILMA HATASI DÜZELTME */
        @media (max-width: 767.98px) {
            .modal-open {
                position: static !important;
                overflow-y: scroll !important;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-custom-light px-3 py-2 sticky-top">
        <a href="" class="navbar-brand p-0">
            <img style="max-width:70px; height:auto;" src="<?php if (isset($settings['logo_url'])) {
                                                                echo base_url('img/settings/' . $settings['logo_url']);
                                                            } ?>" alt="logo_resim">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto"></ul>
            <div class="d-flex align-items-center ms-auto">
                <?php if (!empty($settings['instagramUrl'])): ?>
                    <a href="<?= $settings['instagramUrl'] ?>" target="_blank" class="d-flex align-items-center me-2">
                        <i class="fab fa-instagram" style="margin-right:5px;"></i>
                        <span>Instagram</span>
                    </a>
                <?php endif; ?>
                <?php if (!empty($settings['twitterUrl'])): ?>
                    <a href="<?= $settings['twitterUrl'] ?>" target="_blank" class="d-flex align-items-center me-2">
                        <i class="fab fa-twitter" style="margin-right:5px;"></i>
                        <span>Twitter</span>
                    </a>
                <?php endif; ?>
                <?php if (!empty($settings['facebookUrl'])): ?>
                    <a href="<?= $settings['facebookUrl'] ?>" target="_blank" class="d-flex align-items-center me-2">
                        <i class="fab fa-facebook" style="margin-right:5px;"></i>
                        <span>Facebook</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1><?= $settings['companyName'] ?></h1>
        <p>Menümüze göz atın</p>
    </div>

    <div class="filters-wrapper">
        <ul class="filters_menu m-0 p-0" style="list-style:none;">
            <li style="display:inline;"><a class="active" data-filter="*">Tüm Ürünler</a></li>
            <?php foreach ($category as $item) { ?>
                <li style="display:inline;"><a data-filter=".cat-<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></li>
            <?php } ?>
        </ul>
    </div>

    <div class="menu-list grid row gx-3 gy-3">
        <?php foreach ($products as $item) { ?>
            <div class="col-12 col-md-6 all cat-<?php echo $item['categories_id']; ?>">
                <div class="menu-item d-flex align-items-start openModal"
                    data-bs-toggle="modal"
                    data-bs-target="#productModal"
                    data-name="<?= $item['name']; ?>"
                    data-price="<?= $item['price']; ?>"
                    data-info="<?= $item['info']; ?>"
                    data-img="<?= base_url('img/product/' . $item['img']); ?>">

                    <?php if ($status[0]['resim'] == 1): ?>
                        <img src="<?= base_url('img/product/' . $item['img']); ?>" alt="">
                    <?php endif; ?>

                    <div class="menu-info">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 style="cursor:pointer;"><?php echo $item['name']; ?></h6>

                            <?php if ($status[0]['fiyat'] == 1): ?>
                                <span class="price">₺<?php echo $item['price']; ?></span>
                            <?php endif; ?>
                        </div>

                        <?php if ($status[0]['aciklama'] == 1): ?>
                            <small><?php echo $item['info']; ?></small>
                        <?php endif; ?>
                    </div>
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
        <p class="mt-3 mb-0">&copy; <?= date('Y') ?> Distributed By SolutionSoftware</p>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">

                    <!-- RESİM -->
                    <?php if ($status[0]['resim'] == 1): ?>
                        <img id="modalImg" class="img-fluid mb-3" style="border-radius:10px;">
                    <?php endif; ?>

                    <!-- BAŞLIK -->
                    <h5 id="modalName"></h5>

                    <!-- FİYAT -->
                    <?php if ($status[0]['fiyat'] == 1): ?>
                        <p id="modalPrice" class="text-primary fw-bold"></p>
                    <?php endif; ?>

                    <!-- AÇIKLAMA -->
                    <?php if ($status[0]['aciklama'] == 1): ?>
                        <p id="modalInfo" class="text-muted"></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Filtreleme geçiş efekti
            $('.filters_menu a').click(function(e) {
                e.preventDefault();

                // Aktif sınıfı güncelle
                $('.filters_menu a').removeClass('active');
                $(this).addClass('active');

                var filterValue = $(this).attr('data-filter');

                // Eğer "Tüm Ürünler" ise, tüm ürünleri göster
                if (filterValue === '*') {
                    $('.all').stop(true, true).fadeIn(300);
                    $('.all').css('display', 'flex');
                } else {
                    // Sadece filtrelenmeyen ürünleri gizle
                    $('.all').not(filterValue).stop(true, true).fadeOut(300);

                    // Seçilen kategoriye ait ürünleri göster
                    $(filterValue).stop(true, true).fadeIn(300);
                    $(filterValue).css('display', 'flex');
                }
            });

            // Modalın resim kaynağını ayarlama

        });
    </script>
    <script>
        $(document).ready(function() {

            $('.openModal').click(function() {

                var name = $(this).data('name');
                var price = $(this).data('price');
                var info = $(this).data('info');
                var img = $(this).data('img');

                $('#modalName').text(name);

                <?php if ($status[0]['fiyat'] == 1): ?>
                    $('#modalPrice').text('₺' + price);
                <?php endif; ?>

                <?php if ($status[0]['aciklama'] == 1): ?>
                    $('#modalInfo').text(info);
                <?php endif; ?>

                <?php if ($status[0]['resim'] == 1): ?>
                    $('#modalImg').attr('src', img);
                <?php endif; ?>

            });

        });
    </script>
</body>

</html>