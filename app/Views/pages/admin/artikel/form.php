<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>
<div class="col-xl-12">
    <!-- Default Card -->
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <!-- Success Upload -->
                    <?php if (!empty(session()->getFlashdata('berhasil'))) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('berhasil'); ?>
                        </div>
                    <?php } ?>
                    <?= form_open_multipart(base_url($target)); ?>
                    <?php
                        if (isset($isi)) {
                            echo '<input type="hidden" name="_method" value="PUT">';
                        }
                            csrf_field();
                    ?>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label>Judul</label>
                            <div class="form-group">
                                <input type="text" name="judul" value="<?= old('judul', isset($isi->judul) ? $isi->judul : ''); ?>" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>">
                            </div>
                            <div class="invalid-feedback"><?= $validation->getError('judul'); ?></div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label>Gambar</label>
                            <div class="form-group">
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label>Konten</label>
                            <div class="form-group">
                                <textarea type="text" name="konten" class="form-control ckeditor"><?= old('konten', isset($isi->konten) ? $isi->konten : ''); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class=" form-group">
                                <?= form_submit('Send', 'Simpan') ?>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>