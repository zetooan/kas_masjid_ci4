<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>
<div class="col-xl-12">
    <!-- Default Card -->
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                    <div class="row">
                        <div class="col-xl-12">
                            <br>   
                            <div class="form-group mb-3">
                                <label for="penulis" class="col-form-label">Penulis : <?= $isi->nama?></label>
                                
                            </p>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group mb-3">
                                <!-- <label for="judul" class="col-form-label"> Judul:</label> -->
                                <Center><h3><?= $isi->judul ?></h3> </Center>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-group mb-3">
                                <!-- <label for="judul" class="col-form-label"> Judul:</label> -->
                                <Center><img src="<?= base_url('assets/images/'.$isi->gambar)?>" alt="" class="img-fluid"></Center>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group mb-3">
                                <!-- <label for="konten" class="col-form-label"> Konten:</label> -->
                                <?= $isi->konten; ?>
                            </div>
                        </div>
                        
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>