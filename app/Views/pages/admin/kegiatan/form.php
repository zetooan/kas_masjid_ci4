<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="row d-flex justify-content-center">
    <form method="post" action="<?= (isset($isi)) ? base_url(strtolower($url[2]) . '/' . $isi['id']) : base_url(strtolower($url[2])); ?>" id="form" class="col-md-6">
        <?php
        if (isset($isi)) {
            echo '<input type="hidden" name="_method" value="PUT">';
        }
        csrf_field();
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="tanggal" class="col-form-label"> Tanggal: <span class="text-danger">*</span> </label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal', isset($isi['tanggal']) ? $isi['tanggal'] : date('Y-m-d')); ?>" placeholder="Tanggal" minlength="0" required>
                    <div class="invalid-feedback"><?= $validation->getError('tanggal'); ?></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="keterangan" class="col-form-label"> Keterangan: <span class="text-danger">*</span> </label>
                    <input type="text" id="keterangan" name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" value="<?= old('keterangan', isset($isi['keterangan']) ? $isi['keterangan'] : ''); ?>" placeholder="Keterangan" minlength="0">
                    <div class="invalid-feedback"><?= $validation->getError('keterangan'); ?></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="pj" class="col-form-label"> Penanggung Jawab: <span class="text-danger">*</span> </label>
                    <input type="text" id="pj" name="pj" class="form-control <?= ($validation->hasError('pj')) ? 'is-invalid' : ''; ?>" value="<?= old('pj', isset($isi['pj']) ? $isi['pj'] : ''); ?>" placeholder="Penanggung Jawab" minlength="0">
                    <div class="invalid-feedback"><?= $validation->getError('pj'); ?></div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-secondary mx-2" id="btnreset">Hapus</button>
                <button type="submit" class="btn btn-primary mx-2" id="btnkirim">Simpan</button>
            </div>
    </form>
</div>
<?= $this->endSection(); ?>