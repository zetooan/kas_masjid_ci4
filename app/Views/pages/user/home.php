<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="section-slider">
    <div class="flexslider slider white" data-options="animation:fade,controlNav:false,slideshowSpeed:4000">
        <ul class="slides">
            <li>
                <div class="bg-cover" style="background-image:url('../image/desa1.jpg')"></div>
            </li>
            <li>
                <div class="bg-cover" style="background-image:url('../image/desa1.jpg')"></div>
            </li>
        </ul>
    </div>
    <div class="container content overlay-content white">
        <div class="row">
            <div class="col-md-6">
                <hr class="space" />
                <h1 class="text-uppercase">Dari Masjid <br /> Membangun Umat</h1>
                <p>Berawal dari sebuah langgar kecil di Kampung Pinggiran Selatan Yogyakarta, Masjid Al-Furqon terus
                    berusaha membangun Ummat dan Mensejahterakan Masyarakat. </p>
                <hr class="space l" />
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <a href="#" class="btn btn-sm btn-yellow nav-justified">Contact us</a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="#" class="btn btn-sm btn-border nav-justified">View services</a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="space space-250" />
    </div>
</div>
<div class="section-empty section-over">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="flexslider carousel outer-navs" data-options="minWidth:210,itemMargin:60,numItems:2,controlNav:false,directionNav:true">
                    <ul class="slides">
                        <?php foreach ($kegiatan as $data) : ?>
                            <li>
                                <div class="advs-box advs-box-top-icon-img boxed-inverse text-left">
                                    <div class="advs-box-content">
                                        <h3><?= date("d F Y", strtotime($data->tanggal)); ?></h3>
                                        <h5><?= $data->pj; ?></h5>
                                        <p>
                                            <?= $data->keterangan; ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 boxed white">
                <h2 class="text-color">Jumlah<br />Kas Masjid</h2>
                <hr class="space m" />
                <p class="text-s">
                    Masjid Al-Furqon mempunyai moto pemicu, semangat dan motivasi para Pengurus, serta sebagai
                    prinsip dan jati diri dari Takmir Masjid Al-Furqon. Moto adalah
                    “Dari Masjid Membangun Umat.”
                </p>
                <hr class="space m" />
                <table class="grid-table border-table text-left grid-table-sm-12">
                    <tbody>
                        <tr>
                            <td>
                                <div class="icon-box counter-box-icon">
                                    <div class="icon-box-cell">
                                        <i class="fa-solid fa-hand-holding-dollar text-xl text-color"></i>
                                    </div>
                                    <div class="icon-box-cell">
                                        <label class="counter text-l" data-speed="500" data-to="<?= ($akhir); ?>"> </label>


                                        <p class="text-s">Uang Kas Masjid</p>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
                <hr class="space m" />
                <p class="text-s">
                    Semoga amal kebaikan dapat menjadi penolong hidup bagi mereka yang sudah menginfaqkan sebagian
                    hartanya.
                </p>
                <!-- <a href="#" class="btn btn-xs btn-border">More projects</a> -->
            </div>
        </div>
        <hr class="space" />
        <div class="row ">
            <div class="col-md-8">
                <h2>Manajeman Masjid</h2>
                <p>
                    Setiap masjid pasti mempunyai manajemen sendiri dalam mengelola jamaah. Masjid Al-Furqon salah
                    satu masjid yang mengelola jamaah nya dengan berorientasi pada pelayanan jamaah. Setiap acara,
                    kegiatan serta program masjid selalu kembali pada kenyamanan jamaah serta kesejahteraan jamaah.
                    Manajemen Masjid Al-Furqon merupakan manajemen masjid modern yang berlandaskan pada nilai-nilai
                    masjid pada zaman Rasulullah SAW yang dimana masjid menjadi jantung pokok kegiatan masyarakat serta
                    bermanfaat bagi kesejahteraan masyarakat sekitar. Berikut kami sediakan link download materi
                    manajemen masjid Al-Furqon yang telah kami kompilasi.
                </p>
                <a href="/manajemen" class="btn-text">Lihat lebih lanjut</a>
            </div>
            <br>
            <br>
            <div class="col-md-4">
                <ul class="fa-ul ul-squares no-margins">
                    <li>Menjadikan Masjid sebagai pusat kegiatan masyarakat</li>
                    <li>Memakmurkan kegiatan ubudiyah di Masjid</li>
                    <!-- <li>Menjadikan masjid sbg tempat rekreasi rohani jama’ah</li> -->
                    <li>Menjadikan masjid tempat merujuk berbagai persoalan masyarakat</li>
                    <li>Menjadikan masjid sebagai pesantren dan kampus masyarakat</li>
                    <!-- <li>Repair and buying service</li>
                    <li>Explore our rooms</li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="section-empty bg-white">
    <div class="container content">
        <table class="grid-table border-table grid-table-xs-12 text-left">
            <tbody>
                <tr>
                    <td>
                        <h2>Blog Post</h2>
                    </td>
                    <td>
                        <hr class="space m visible-xs" />
                        <p>
                            Seluruh kegiatan yang diadakan di masjid didokumentasikan dengan baik, sehingga masyarakat
                            luas bisa melihat kegiatan apa saja yang telah dilaksanakan di masjid Al-Furqon
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr class="space" />
        <div class="flexslider carousel outer-navs" data-options="minWidth:200,itemMargin:30,numItems:3,controlNav:true,directionNav:true">
            <ul class="slides">

                <?php foreach ($artikel as $data) : ?>

                    <li>
                        <div class="advs-box advs-box-multiple boxed-inverse" data-anima="scale-up" data-trigger="hover">
                            <a class="img-box"><img class="anima" src="../image/post/post1.jpg" alt="" /></a>
                            <!-- <div class="circle"><i class="im-solar"></i></div> -->
                            <div class="advs-box-content">
                                <h3><?= $data->judul; ?></h3>
                                <h5><?= $data->nama; ?></h5>

                                <h6><?= date('d F Y', strtotime($data->updated_at)) ?></h6>
                                <p>

                                    <?php
                                    $num_char = 300;
                                    $text = $data->konten;;
                                    echo substr($text, 0, $num_char) . '...';
                                    ?>


                                </p>


                                <a class="btn btn-warning m-1" href="<?= base_url('post?k=' . $data->id); ?>">Show More</a>
                            </div>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="section-bg-image parallax-window white" data-natural-height="1080" data-natural-width="1920" data-parallax="scroll" data-image-src="../image/desa2.jpg">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 boxed" data-anima="fade-left">
                <h2 class="text-color">Langganan Berita Terbaru Kami</h2>
                <p class="text-s">
                    Kami akan mengirimi Anda satu email setiap bulan, kami tidak mengirim promosi, kami tidak suka spam.
                    Anda dapat berhenti berlangganan segera dengan mengklik tautan berhenti berlangganan di bagian bawah
                    email.
                </p>
                <hr class="space m" />
                <form action="http://www.framework-y.com/HTWF/scripts/php/contact-form.php" class="form-box form-ajax" method="post" data-email="">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama</p>
                            <input id="name" name="name" placeholder="" type="text" class="form-control form-value">
                        </div>
                        <div class="col-md-6">
                            <p>Email</p>
                            <input id="email" name="email" placeholder="" type="email" class="form-control form-value" required>
                        </div>
                    </div>
                    <hr class="space m" />
                    <button class="btn-xs btn-border btn" type="submit">Langganan Sekarang</button>
                    <div class="success-box">
                        <div class="alert alert-success">Congratulations. Your message has been sent successfully
                        </div>
                    </div>
                    <div class="error-box">
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="section-empty no-paddings-y text-center">
    <div class="content">
        <div class="tab-box full-width" data-tab-anima="fade-in">
            <ul class="nav nav-tabs nav-justified nav-center">
                <li class="active"><a href="#">Program Mingguan</a></li>
                <li><a href="#">Program Unggulan</a></li>
            </ul>
            <div class="panel active">
                <div class="row box-steps">
                    <div class="step-item col-md-4">
                        <span class="step-number">1</span>
                        <h3>Peta Dakwah</h3>
                        <p>
                            Masjid harus memiliki peta dakwah yang jelas, wilayah kerja yang nyata, dan jama’ah yang
                            terdata.
                        </p>
                    </div>
                    <div class="step-item col-md-4">
                        <span class="step-number">2</span>
                        <h3>Infaq Nol Rupiah</h3>
                        <p>
                            Semangat segera menyalurkan amanah infaq dari jamaah kembai ke jamaah lagi dalam bentuk
                            pelayanan beribadah yang nyaman.
                        </p>
                    </div>
                    <div class="step-item col-md-4">
                        <span class="step-number">3</span>
                        <h3>Shodaqoh ATM Beras</h3>
                        <p>
                            Jamaah masjid bersama-sama mengumpulkan beras untuk dishodaqahkan kepada yang membutuhkan ke
                            kotak beras. Disalurkan melalui kotak ATM beras.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="row box-steps">
                    <div class="step-item col-md-4">
                        <span class="step-number">1</span>
                        <h3>Mensholatkan Orang Hidup</h3>
                        <p>
                            Memberikan pelatihan sholat kepada warga yang belum bisa sholat, sehingga tidak malu lagi
                            untuk pergi ke masjid untuk sholat berjamaah.
                        </p>
                    </div>
                    <div class="step-item col-md-4">
                        <span class="step-number">2</span>
                        <h3>Kampoeng Ramadhan</h3>
                        <p>
                            Seluruh warga Al-Furqon bersama-sama memeriahkan bulan ramadhan dengan berbagai kegiatan
                            yang bersifat event besar.
                        </p>
                    </div>
                    <div class="step-item col-md-4">
                        <span class="step-number">3</span>
                        <h3>Gerakan Jamaah Mandiri</h3>
                        <p>
                            Gerakan Jama’ah Mandiri ini sukses menaikkan infak pekanan Masjid Al-Furqon hingga 400%.
                            Sebab, ternyata, orang malu jika Ibadah saja disubsidi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty bg-white">
    <div class="container content">
        <table class="grid-table border-table cell-50 grid-table-xs-12">
            <tbody>
                <tr>
                    <td><img src="../images/logos/logo-1.png" alt=""></td>
                    <td><img src="../images/logos/logo-2.png" alt=""></td>
                    <td><img src="../images/logos/logo-3.png" alt=""></td>
                    <td><img src="../images/logos/logo-4.png" alt=""></td>
                    <td><img src="../images/logos/logo-5.png" alt=""></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="section-bg-image parallax-window white" data-natural-height="800" data-natural-width="1920" data-parallax="scroll" data-image-src="../image/desa3.jpg">
    <div class=" container content">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1 class="text-uppercase">Lihat Profil Singkat<br />Masjid Al-Furqon</h1>
                <hr class="space l" />
                <a href="https://www.youtube.com/watch?v=MQnYUgnL-Zo" data-lightbox-anima="fade-right" class="btn btn-play lightbox mfp-iframe text-color">Watch video <i></i></a>
            </div>
            <div class="col-md-6 col-sm-12">
                <h1 class="text-uppercase">Kota <?= $waktu['data']['daerah'] ?></h1>
                <h3 class="text-uppercase"><?= $waktu['data']['lokasi'] ?></h3>
                <h5 class="text-uppercase">Tanggal <?= $waktu['data']['jadwal']['date'] ?></h5>
                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Dhuha</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['dhuha'] ?>
                    </div>
                </div>

                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Shubuh</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['subuh'] ?>
                    </div>
                </div>

                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Terbit</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['terbit'] ?>
                    </div>
                </div>

                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Dzuhur</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['dzuhur'] ?>
                    </div>
                </div>

                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Ashar</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['ashar'] ?>
                    </div>
                </div>

                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Maghrib</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['maghrib'] ?>
                    </div>
                </div>

                <div class="row vertical-row">
                    <div class="col-md-3">
                        <p class="progress-label"><i class="fa-regular fa-clock"></i> Isya'</p>
                    </div>
                    <div class="col-md-9">
                        <?= $waktu['data']['jadwal']['isya'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty bg-white">
    <div class="container content">
        <div class="social-feed-tw flexslider carousel outer-navs" data-social-id="yellow_au" data-options="minWidth:250,show_media:false,limit: 10"></div>
    </div>
</div>
<?= $this->endSection(); ?>