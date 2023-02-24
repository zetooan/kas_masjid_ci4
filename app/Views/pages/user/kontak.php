<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="section-map box-middle-container row-20">
    <div class="google-map" data-parallax="scroll" data-natural-height="800" data-natural-width="1920"
        data-image-src="../image/manajemen.jpg"></div>
    <div class=" overlaybox overlaybox-side overlaybox">
        <div class="container content">
            <div class="row">
                <div class="col-md-6 overlaybox-inner box-middle" data-anima="fade-left">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Masjid Al-Furqon</h2>
                            <p class="text-left text-s">
                                Bagi pihak yang ingin silaturahmi, pelatihan manajemen masjid, sewa kamar atau keperluan
                                lainnya bisa menghubungi kami sesuai kebutuhannya :
                            </p>
                            <hr class="space s" />
                            <div class="btn-group social-group btn-group-icons social-colors">
                                <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                                <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <hr class="space m visible-xs" />
                            <h2>Contacts</h2>
                            <hr class="space m" />
                            <ul class="fa-ul ul-squares no-margins text-s">
                                <li>Jl. Jogokaryan No.36, Mantrijeron, Kec. Mantrijeron, Kota Yogyakarta, Daerah
                                    Istimewa Yogyakarta 55143</li>
                                <li>masidalfurqon@gmail.com</li>
                                <li>@alfurqon</li>
                                <li>(+62) 456-7891-2340</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-6 col-sm-12 text-left">
                <h2>Hubungi Kami</h2>
                <p>
                    Apakah Anda memiliki pertanyaan yang ingin Anda tanyakan kepada kami?
                    Apakah Anda mempunyai masukan untuk Masjid Al-Furqon?
                </p>
                <hr class="space m" />
                <form action="http://www.framework-y.com/scripts/php/contact-form.php" class="form-box form-ajax"
                    method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nama</p>
                            <input id="name" name="name" placeholder="" type="text" class="form-control form-value"
                                required>
                        </div>
                        <div class="col-md-6">
                            <p>Email</p>
                            <input id="email" name="email" placeholder="" type="email" class="form-control form-value"
                                required>
                        </div>
                    </div>
                    <hr class="space xs" />
                    <p>Subyek</p>
                    <input id="subject" name="subject" placeholder="" type="text" class="form-control form-value"
                        required>
                    <hr class="space xs" />
                    <p>Pesan</p>
                    <textarea id="messagge" name="messagge" placeholder="" class="form-control form-value"
                        required></textarea>
                    <hr class="space s" />
                    <button class="btn-sm btn" type="submit">Kirim</button>
                    <div class="success-box">
                        <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                    </div>
                    <div class="error-box">
                        <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-12">
                <table class="table table-hover text-s">
                    <h2>Jam Operasional Kantor</h2>
                    <br>
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Pagi</th>
                            <th>Sore</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Senin</th>
                            <td>08.00 - 12.00</td>
                            <td>15.00 - 20.00</td>
                        </tr>
                        <tr>
                            <th>Selasa</th>
                            <td>08.00 - 12.00</td>
                            <td>15.00 - 20.00</td>
                        </tr>
                        <tr>
                            <th>Rabu</th>
                            <td>08.00 - 12.00</td>
                            <td>15.00 - 20.00</td>
                        </tr>
                        <tr>
                            <th>Kamis</th>
                            <td>08.00 - 12.00</td>
                            <td>15.00 - 20.00</td>
                        </tr>
                        <tr>
                            <th>Jum'at</th>
                            <td>08.00 - 12.00</td>
                            <td>15.00 - 20.00</td>
                        </tr>
                        <tr>
                            <th>Sabtu</th>
                            <td>08.00 - 12.00</td>
                            <td>15.00 - 20.00</td>
                        </tr>
                        <tr>
                            <th>Minggu</th>
                            <td>Tutup</td>
                            <td>Tutup</td>
                        </tr>
                    </tbody>
                </table>
                <hr class="space m" />
                <!-- <div class="advs-box advs-box-side-icon boxed-inverse pull-right" data-anima="scale-up"
                    data-trigger="hover">
                    <div class="icon-box">
                        <i class="im-environmental-3 icon anima"></i>
                    </div>
                    <div class="caption-box">
                        <h3>For a green future</h3>
                        <p>
                            Ligula aenean, voluptatem a lorem laoreet koLorem ipsum dolor consetuer adipo icingo

                        </p>
                        <a href="#" class="btn-text">Read more</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>