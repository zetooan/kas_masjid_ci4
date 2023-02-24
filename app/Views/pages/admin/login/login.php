<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Sistem Informasi Masjid</title>
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

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-3">
        <div class="container">
          <?php
          if (session()->getFlashdata('Pesan')) {
            echo '<div class="col-12">';
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . session()->getFlashdata('Pesan');
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button </div>';
            echo '</div>';
          }
          ?>
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 d-flex flex-column align-items-center justify-content-center">
              <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center justify-content-center">

                  <img src="assets/img/logo.png" alt="Profile" class="rounded-circle" width="20%">
                  <h4>SISTEM INFORMASI MASJID</h4>
                  <h4><?= $setting['nama_masjid'] ?></h4>
                </div>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <form class="row g-3 needs-validation" method="POST" action="<?= base_url('login'); ?>" novalidate>
                    <?= csrf_field(); ?>
                    <div class="col-12 mt-5">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12 mb-3">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div>
                    <div class="col-12 mb-4">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/js/main.js'); ?>"></script>

</body>

</html>