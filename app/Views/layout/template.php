<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masjid Al-Furqon</title>
    <?php
    $css = [
        'css/font-awesome/css/all.css',
        'css/bootstrap.css',
        'css/homestyle.css',
        'css/content-box.css',
        'css/image-box.css',
        'css/flexslider.css',
        'css/magnific-popup.css',
        'css/animations.css',
        'css/components.css',
        'css/contact-form.css',
        'css/social.stream.css',
        'css/skin.css',
        'css/line-icons.min.css',
    ];
    foreach ($css as $data) {
        echo '<link rel="stylesheet" href="' . base_url($data) . '" />';
    }
    ?>
    <meta name="description" content="Multipurpose HTML template.">

    <link rel="icon" href="<?= base_url('logo.png') ?>">
</head>

<body>
    <div id="preloader"></div>
    <header class="fixed-top scroll-change logo-left" data-menu-height="139">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-main navbar-middle">
                <div class="container">
                    <div class="scroll-hide">
                        <div class="container">
                            <a class="navbar-brand center" href="<?php echo base_url('/') ?>">
                                <img class="logo-default" src="../image/logo/logo.png" alt="logo" />
                                <h1>Masjid <?= $setting['nama_masjid'] ?></h1>
                            </a>
                        </div>
                    </div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="../../../index.html">
                            <img class="logo-default" src="../images/logo.png" alt="logo" />
                            <img class="logo-retina" src="../images/logo-retina.png" alt="logo" />
                        </a>
                        <button type="button" class="navbar-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="<?php echo base_url('/') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button">Home <span class="caret"></span></a>
                            </li>
                            <li class="dropdown">
                                <a href="/profile" class="dropdown-toggle" data-toggle="dropdown" role="button">Profile
                                    <span class="caret"></span></a>
                            </li>
                            <li class="dropdown">
                                <a href="/manajemen" class="dropdown-toggle" data-toggle="dropdown" role="button">Manajeman
                                    Masjid <span class="caret"></span></a>
                            </li>
                            <li class="dropdown active">
                                <a href="<?php echo base_url('/blog') ?>" class="dropdown-toggle" data-toggle="dropdown" role="button">Blog <span class="caret"></span></a>
                            </li>
                            <li class="dropdown mega-dropdown mega-tabs">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('/kontak') ?>">Kontak <span class="caret"></span></a>
                            </li>

                        </ul>

                        <div class="nav navbar-nav navbar-right">



                            <!-- <div class="custom-area"> -->

                            <li class="nav-item dropdown pe-3">

                                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?= (isset($_SESSION['akses'])) ? '#' : base_url('login') ?>" data-bs-toggle="dropdown">
                                    <!-- <img src="assets/img/admin.jpg" alt="Profile" class="rounded-circle"> -->
                                    <span class="d-none d-md-block dropdown-toggle ps-2">
                                        &nbsp
                                        &nbsp
                                        <?php
                                        if (isset($_SESSION['akses'])) {
                                        ?>
                                            Hi, <?= $_SESSION['username'] ?> </span>
                                <?php
                                        } else {
                                            echo 'Login';
                                        }
                                ?>
                                &nbsp
                                &nbsp
                                </a><!-- End Profile Iamge Icon -->
                                <?php
                                if (isset($_SESSION['akses'])) {
                                ?>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('rekap') ?>">
                                                <i class="bi bi-box-arrow-right"></i>
                                                <span>Dasboard</span>
                                            </a>

                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
                                                <i class="bi bi-box-arrow-right"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>

                                    </ul><!-- End Profile Dropdown Items -->
                            </li><!-- End Profile Nav -->
                            <!-- </div> -->
                        <?php
                                }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?= $this->renderSection('content'); ?>

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>
    <footer class="footer-base">
        <div class="container content">
            <div class="row">
                <div class="col-md-4">
                    <img class="logo" src="../image/logo/logo.png" alt="logo" />
                    <hr class="space s" />
                    <p class="text-s">
                        Berawal dari sebuah langgar kecil di Kampung Pinggiran Selatan Yogyakarta, Masjid Al-Furqon
                        terus berusaha membangun Ummat dan Mensejahterakan Masyarakat.
                    </p>
                    <hr class="space s" />
                    <div class="btn-group social-group btn-group-icons">
                        <a target="_blank" href="#" data-social="share-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <i class="fa fa-facebook text-s circle"></i>
                        </a>
                        <a target="_blank" href="#" data-social="share-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <i class="fa fa-twitter text-s circle"></i>
                        </a>
                        <a target="_blank" href="#" data-social="share-google" data-toggle="tooltip" data-placement="top" title="Google+">
                            <i class="fa fa-google-plus text-s circle"></i>
                        </a>
                        <a target="_blank" href="#" data-social="share-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIn">
                            <i class="fa fa-linkedin text-s circle"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-black text-uppercase">Contact Info</h3>
                    <hr class="space space-30" />
                    <ul class="fa-ul text-s ul-squares">
                        <li><?= $setting['alamat'] ?></li>
                        <li>masjid<?= $setting['nama_masjid'] ?>@gmail.com</li>
                        <li>@<?= $setting['nama_masjid'] ?></li>
                        <li>(+62) 456-7891-2340</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-black text-uppercase">Useful resources</h3>
                    <hr class="space space-30" />
                    <div class="footer-menu text-s">
                        <a href="<?php echo base_url('/profile') ?>">PROFILE</a>
                        <a href="<?php echo base_url('/manajemen') ?>">MANAJEMEN MASJID</a>
                        <a href="<?php echo base_url('/blog') ?>">BLOG</a>
                        <a href="<?php echo base_url('/') ?>">KONTAK</a>
                    </div>
                </div>
            </div>
            <hr class="space hidden-sm" />
            <div class="row copy-row">
                <div class="col-md-12 copy-text">
                    &copy; Copyright <strong><span>Agung~Seto~Ridho</span></strong>. All Rights Reserved
                </div>
            </div>
        </div>
        <?php
        $javas = [
            'js/jquery.min.js',
            'js/parallax.min.js',
            'js/script.js',
            'js/bootstrap.min.js',
            'js/imagesloaded.min.js',
            'js/jquery.magnific-popup.min.js',
            'js/jquery.flexslider-min.js',
            'js/jquery.tab-accordion.js',
            'js/isotope.min.js',
            'js/bootstrap.popover.min.js',
            'js/contact-form.js',
            'js/jquery.progress-counter.js',
            'js/smooth.scroll.min.js',
            'js/social.stream.min.js',
        ];
        foreach ($javas as $data) {
            echo '<script src="' . $data . '"></script>';
        }

        ?>

    </footer>
</body>

</html>