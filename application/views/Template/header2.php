<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/favicon.png">
    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <!--owl carousel css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
    <!--magnific popup css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
    <!--icofont css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/icofont.min.css">
    <!--animate css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/animate.css">
    <!--main css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/responsive.css">
    <!--fontawesome css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fontawesome/css/all.min.css">
    <!--status pesanan css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style-status-pesanan.css">

    <link rel="icon" type="image/png" href="<?= base_url('ico/favicon-32x32.png') ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('ico/favicon-16x16.png'); ?>" sizes="16x16" />
</head>

<body>
    <!--start header-->
    <header id="header">
        <!--start header top-->
        <div class="header-top">
            <div class="container">
                <div class="row header-top-wrap">
                    <div class="col-md-8">
                        <div class="header-cont-info">
                            <ul>
                                <li><i class="fa fa-phone"></i> Call Us: <?= $info_yagami['no_telepon']; ?></li>
                                <li><i class="fa fa-envelope"></i> Email Us: <?= $info_yagami['email']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="header-social text-right">
                            <ul>
                                <li><a href="<?= $info_yagami['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?= $info_yagami['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?= $info_yagami['instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end header top-->
        <!--start mainmenu-->
        <div class="mainmenu">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <!--logo-->
                        <a class="logo" href="#"><img width="150px" src="<?= base_url() ?>assets/images/logo_yagami.png" alt="logo" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"><i class="fas fa-bars"></i></span>
                        </button>
                        <!--navbar links-->
                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav mx-auto text-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('HomePage'); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('HomePage'); ?>">Fitur</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('HomePage'); ?>">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('HomePage'); ?>">Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('HomePage'); ?>">Faq</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('HomePage'); ?>">Kontak</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('User'); ?>">Profil</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav shop-btn">
                                <?php if (!$this->session->userdata('email')) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= base_url('Auth/login'); ?>">Masuk</a>
                                    </li>
                                <?php else : ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?= base_url('Auth/logout'); ?>">Logout</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--end mainmenu-->
    </header>
    <!--end header-->