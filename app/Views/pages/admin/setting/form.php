<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>
<div class="col-xl-12">
<?php
                if (session()->getFlashdata('Pesan')) {
                    echo '<div class="col-12">';
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . session()->getFlashdata('Pesan');
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button </div>';
                    echo '</div>';
                }
                ?>
    <!-- Default Card -->
    <div class="card">

        <div class="card-body">
            
            <div class="row d-flex justify-content-center">
                
                <form method="post" action="<?= base_url('setting/update') ?>" id="form" class="col-md-12">
                    <div class="row">
                        <div class="col-12 mt-4">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingnama_masjid" name="nama_masjid" value="<?= $setting['nama_masjid'] ?>">
                                    <label for="floatingnama_masjid">Nama Masjid </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="lokasi" name="id_kota">
                                    <option selected>Pilih Kab / Kota</option>
                                    <?php foreach ($kota as $key => $kota) { ?>
                                        <option value="<?= $kota['id'] ?>" <?= $kota['id'] == $setting['id_kota'] ? 'selected' : '' ?>><?= $kota['lokasi'] ?></option>
                                    <?php } ?>
                                </select>
                                <label for="floatingSelect">Kab / Kota</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="alamat" id="floatingTextarea" style="height: 100px;"><?= $setting['alamat'] ?></textarea>
                                <label for="floatingTextarea">Alamat</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mx-2" id="btnkirim">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>