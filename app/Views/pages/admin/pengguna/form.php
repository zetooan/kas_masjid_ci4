<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="row d-flex justify-content-center">
    <form method="post" action="<?= (isset($isi)) ? base_url('datapengguna/' . $isi['id']) : base_url('datapengguna') ?>" id="form" class="col-md-6">
        <?php
        if (isset($isi)) {
            echo '<input type="hidden" name="_method" value="PUT">';
        }
        csrf_field();
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="nim" class="col-form-label"> Nama: <span class="text-danger">*</span> </label>
                    <input type="text" id="nama" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama', isset($isi['nama']) ? $isi['nama'] : ''); ?>" placeholder="Nama" minlength="0">
                    <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="username" class="col-form-label"> Username: <span class="text-danger">*</span> </label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" id="username" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username', isset($isi['username']) ? $isi['username'] : ''); ?>"" placeholder=" Username" minlength="0" maxlength="100">
                        <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="email" class="col-form-label"> Email: <span class="text-danger">*</span> </label>
                    <input type="email" id="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email', isset($isi['email']) ? $isi['email'] : ''); ?>"" placeholder=" Email" minlength="0" maxlength="100">
                    <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="role" class="col-form-label"> Sebagai: <span class="text-danger">*</span> </label>
                    <select name="role" id="role" class="form-select <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>">
                        <?php
                        foreach ($sebagai as $akses) {
                            echo '<option value ="' . $akses->id . '" ' . old('role', isset($isi['role']) ? ($akses->id == $isi['role'] ? 'selected' : '') : '') . '>' . $akses->akses . '</option>';
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback"><?= $validation->getError('role'); ?></div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-3">
                    <label for="password" class="col-form-label"> Password: <?= (isset($isi)) ? '' : '<span class="text-danger" id="ketpas">*</span>'; ?></label>
                    <input type="password" id="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="******" minlength="0" maxlength="50">
                    <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-secondary mx-2" id="btnreset">Hapus</button>
                <button type="submit" class="btn btn-primary mx-2" id="btnkirim">Simpan</button>
            </div>
    </form>
</div>
<?= $this->endSection(); ?>