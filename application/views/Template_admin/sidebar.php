<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src">
                <img style="width: 100px" src="<?= base_url() ?>assets/images/logo_yagami.png" alt="">
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="<?= base_url('Admin') ?>" class="">
                            <i class="metismenu-icon icofont-dashboard"></i>
                            Dashboard
                        </a>
                        <a href="<?= base_url('Admin/masukan') ?>" class="">
                            <i class="metismenu-icon icofont-learn"></i>
                            Masukan
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Content Website</li>
                    <li>
                        <a href="<?= base_url('Admin/header') ?>">
                            <i class="metismenu-icon icofont-info"></i>
                            Info Web
                        </a>
                        <a href="<?= base_url('Admin/produk') ?>">
                            <i class="metismenu-icon icofont-box"></i>
                            Produk
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Akun</li>
                    <li>
                        <a href="<?= base_url('Admin/tampilAkun') ?>">
                            <i class="metismenu-icon icofont-live-messenger"></i>
                            List Akun
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>