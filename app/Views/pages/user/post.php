<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="header-base">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="title-base text-left">
                    <h1><?= $artikel->judul?></h1>
                </div>
            </div>
            <div class="col-md-3">
                <ol class="breadcrumb b white">
                    <li><a href="<?php echo base_url('/blog')?>">BLog</a>
                    </li>
                    <li class="active">Post</li>
                </ol>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<div class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="flexslider slider nav-inner white">
                    <ul class="slides">
                        <li>
                            <a class="img-box row-17">
                                
                                <img src="<?= base_url('assets/images/'.$artikel->gambar)?>" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
                <hr class="space l" />
                <div class="tag-row">
                    <span><i class="fa-solid fa-calendar-days"></i> <a><?= date("d / m / Y", strtotime($artikel->updated_at)); ?></a></span>
                    <span><i class="fa-solid fa-circle-user"></i><a><?= $artikel->nama ?></a></span>
                </div>
                <hr class="space m" />
                <?= $artikel->konten ?>
                <hr class="space m" />
                <div class="btn-group social-group social-colors">
                    <a target="_blank" href="#" data-social="share-facebook" data-toggle="tooltip" data-placement="top"
                        title="Facebook"><i class="fa fa-facebook text-s"></i></a>
                    <a target="_blank" href="#" data-social="share-twitter" data-toggle="tooltip" data-placement="top"
                        title="Twitter"><i class="fa fa-twitter text-s"></i></a>
                    <a target="_blank" href="#" data-social="share-google" data-toggle="tooltip" data-placement="top"
                        title="Google+"><i class="fa fa-google-plus text-s"></i></a>
                    <a target="_blank" href="#" data-social="share-linkedin" data-toggle="tooltip" data-placement="top"
                        title="LinkedIn"><i class="fa fa-linkedin text-s"></i></a>
                </div>
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
<div id="comments" class="section-empty">
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <div class="comment-list">
                    <h4>Comments</h4>
                    <div class="item row">
                        <img src="../images/users/user-2.jpg" class="col-md-1" alt="" />
                        <div class="col-md-10">
                            <p class="name">Federico Schiocchet <span>25 feb, 2018</span></p>
                            <p class="msg">Lorem ipsum dolor sit amet, consectetur adipisicingomnis iste na dolor quod,
                                ullam nemo, impedit nesciunt voluptatus error sit voluptatem accusantium doloremque
                                laudantium</p>
                        </div>
                    </div>
                    <div class="item row">
                        <img src="../images/users/user-4.jpg" class="col-md-1" alt="" />
                        <div class="col-md-10">
                            <p class="name">Vaky Yo <span>25 feb, 2018</span></p>
                            <p class="msg">Lorem ipsum dolor sit amet, consectetur adipisicing elit,magnam, amet quam
                                enim veniam tempus cumque. Integer vel impedit quidem, dolor quod, ullam nemo, impedit
                                nesciunt volupta sed do eiusmod tempor incididunt ut labore et dolore magna. </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Leave a comment</h4>
                <hr class="space s" />
                <div class="form-box">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Name</p>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <p>Email</p>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                    <hr class="space xs" />
                    <div class="row">
                        <div class="col-md-12">
                            <p>Website</p>
                            <input type="text" class="form-control" placeholder="">
                            <hr class="space xs" />
                            <p>Messagge</p>
                            <textarea name="messagge" class="form-control" placeholder=""></textarea>
                            <hr class="space s" />
                            <button class="btn btn-border btn-xs" type="button">Send comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>