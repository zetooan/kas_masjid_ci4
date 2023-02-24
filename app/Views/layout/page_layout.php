<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $page ?> | Sistem Informasi Masjid</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/logo.png'); ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

</head>

<body>

    <!-- ======= Header ======= -->


    <?= $this->include('layout/header'); ?>
    <?= $this->include('layout/sidebar'); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <!-- <h1><?= $page ?></h1> -->
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="bi bi-house-door"></i></a></li>
                    <?php
                    foreach ($url as $akses) {
                        echo '<li class="breadcrumb-item">' . $akses . '</li>';
                    }
                    ?>
                    <li class="breadcrumb-item active"><?= $page ?></li>
                </ol>
            </nav>


            <?= $this->renderSection('content'); ?>

        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">



                    </div><!-- End Left side columns -->

                    <!-- Right side columns -->
                    <div class="col-lg-4">


                    </div><!-- End Right side columns -->

                </div>
        </section>

    </main><!-- End #main -->
    <?= $this->include('layout/footer'); ?>

    <!-- ======= Footer ======= -->

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/chart.js/chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/quill/quill.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

    <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
    <!-- <script src="/ckeditor/ckeditor.js" type="text/javaScript"></script> -->

</body>

</html>