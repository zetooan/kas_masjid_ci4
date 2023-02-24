<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1>Blog Post</h1>
                    <p>Seluruh kegiatan yang diadakan di masjid didokumentasikan dengan baik, sehingga masyarakat luas
                        bisa melihat kegiatan apa saja yang telah dilaksanakan di masjid Jogokariyan</p>
                </div>
            </div>
            <div class="col-md-3">
                <ol class="breadcrumb b white">
                    <li><a href="<?php echo base_url('/')?>">Home</a>
                    </li>
                    <li class="active">Blog Post</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="grid-list one-row-list">
                    <div class="grid-box">
                        <?php foreach ($artikel as $data) : ?>
                        <div class="grid-item">
                            <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse"
                                data-anima="scale-rotate" data-trigger="hover">
                                <div class="block-infos">
                                    <div class="block-data">
                                        <p class="bd-day"><?= date('d', strtotime($data->updated_at))?></p>
                                        <p class="bd-month"><?= date('F Y', strtotime($data->updated_at))?></p>
                                    </div>
                                    <a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
                                </div>
                                <a class="img-box"><img class="anima" src="<?= base_url('assets/images/'.$data->gambar)?>" alt="" /></a>
                                <div class="advs-box-content">
                                    <h2><a href="<?= base_url('post?k='.$data->id); ?>"><?= $data->judul?></a></h2>
                                    <div class="tag-row">
                                        <span><i class="fa-solid fa-circle-user"></i><a><?= $data->nama?></a></span>
                                    </div>
                                    <div>
                                    <?= substr($data->konten,0,1000).(strlen($data->konten)>=1000?'...':'')?>
                                    </div>
                                    <a href="<?php echo base_url('post?k='.$data->id)?>" class="btn btn-sm">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <!-- <div class="grid-item">
                            <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse"
                                data-anima="scale-rotate" data-trigger="hover">
                                <div class="block-infos">
                                    <div class="block-data">
                                        <p class="bd-day">15</p>
                                        <p class="bd-month">July 2018</p>
                                    </div>
                                    <a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
                                </div>
                                <a class="img-box"><img class="anima" src="../image/manajemen.jpg" alt="" /></a>
                                <div class="advs-box-content">
                                    <h2><a href="#">Tasyakuran 50 Tahun Masjid Jogokariyan dan Penghargaan Masjid Besar
                                            Percontohan Idarah Nasional 2016 Oleh Kemenag RI</a></h2>
                                    <div class="tag-row">
                                        <span><i class="fa-solid fa-layer-group"></i> <a href="#">Event</a>, <a
                                                href="#">Keagamaan</a></span>
                                        <span><i class="fa-solid fa-circle-user"></i><a>Admin</a></span>
                                    </div>
                                    <p class="niche-box-content">
                                        Setelah beberapa rangkaian kegiatan Setengah Abad Masjid Jogokariyan yang
                                        diadakan sejak bulan Januari 2016 hingga pertengahan Desember 2016, Masjid
                                        Jogokariyan pada tanggal 14 Januari 2017 mengadakan tasyakuran mengundang 1000
                                        Jamah Masjid Jogokariyan dengan 58 tumpeng, ingkung dan pembagian paket sembako
                                        untuk 340 kepala keluarga. Selain sebagai rangkaian acara setengah abad masjid
                                        jogokariyan, acara ini juga dalam rangka tasyakuran penghargaan masjid besar
                                        percontohan idarah nasional 2016 oleh Kemenag RI.
                                    </p>
                                    <a href="#" class="btn btn-sm">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="grid-item">
                            <div class="advs-box advs-box-top-icon-img niche-box-post boxed-inverse"
                                data-anima="scale-rotate" data-trigger="hover">
                                <div class="block-infos">
                                    <div class="block-data">
                                        <p class="bd-day">27</p>
                                        <p class="bd-month">July 2018</p>
                                    </div>
                                    <a class="block-comment" href="#">2 <i class="fa fa-comment-o"></i></a>
                                </div>
                                <a class="img-box"><img class="anima" src="http://via.placeholder.com/809x550"
                                        alt="" /></a>
                                <div class="advs-box-content">
                                    <h2><a href="#">Mamoon Hamid is heading from Social Capital to Kleiner Perkins</a>
                                    </h2>
                                    <div class="tag-row">
                                        <span><i class="fa fa-bookmark"></i> <a href="#">Business</a>, <a
                                                href="#">Financial</a></span>
                                        <span><i class="fa fa-pencil"></i><a>Admin</a></span>
                                    </div>
                                    <p class="niche-box-content">
                                        Etcupiditate quisquam quos elit quaerat natoque tenetur porta elementum ut
                                        architecto nihil perspiciatis abitasse.
                                        Tincidunt integer eu augue augue nunc elit dolor, luctus placerat scelerisque
                                        euismodatoque tenetur porta elementum ut architiaculis eu lacus nunc mi elito
                                        vehicula ut laoreetartello martisoo arniela.
                                    </p>
                                    <a href="#" class="btn btn-sm">Read article</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="list-nav text-left">
                        <ul class="pagination-lg pagination-grid hide-first-last" data-page-items="3"
                            data-pagination-anima="fade-bottom" data-options="scrollTop:true"></ul>
                    </div>
                </div>
                <hr class="space visible-sm" />
            </div>
            <div class="col-md-4 col-sm-12 widget">
                <div class="input-group search-blog list-blog">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
                <hr class="space s" />
                <div class="list-group list-blog">
                    <p class="list-group-item active">Categories</p>
                    <a href="#" class="list-group-item">Construction</a>
                    <a href="#" class="list-group-item">Gardening and renovation</a>
                    <a href="#" class="list-group-item">Consulting and support</a>
                    <a href="#" class="list-group-item">From the world</a>
                </div>
                <div class="list-group list-blog">
                    <p class="list-group-item active">Latest posts</p>
                    <div class="list-group-item">
                        <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>26.05.2018</span></div>
                        <a href="#">
                            <h5>Return to the future day</h5>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod tempor incididunt ...
                        </p>
                    </div>
                    <div class="list-group-item">
                        <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>28.05.2018</span></div>
                        <a href="#">
                            <h5>The web 3.0 vision</h5>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod tempor incididunt ...
                        </p>
                    </div>
                    <div class="list-group-item">
                        <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span></div>
                        <a href="#">
                            <h5>Where to go on holiday ?</h5>
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, conse adipisicing elit, sed do eiusmod tempor incididunt ...
                        </p>
                    </div>
                </div>
                <div class="list-group latest-post-list list-blog">
                    <p class="list-group-item active">Latest posts</p>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="img-box circle">
                                    <img src="http://via.placeholder.com/809x550" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="#">
                                    <h5>Return to the artistic days of woodstock</h5>
                                </a>
                                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="img-box circle">
                                    <img src="http://via.placeholder.com/809x550" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="#">
                                    <h5>We can do better than now</h5>
                                </a>
                                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="img-box circle">
                                    <img src="http://via.placeholder.com/809x550" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="#">
                                    <h5>Inspiring people trough you</h5>
                                </a>
                                <div class="tag-row icon-row"><span><i class="fa fa-calendar"></i>02.06.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group list-blog">
                    <p class="list-group-item active">Tags</p>
                    <div class="tagbox">
                        <span>Hello!</span><span>Big deal</span><span>A new happy
                            time</span><span>Food</span><span>Cheese</span><span>Food</span>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>