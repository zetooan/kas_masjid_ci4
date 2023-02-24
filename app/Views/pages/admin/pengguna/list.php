<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <div class="row">

        <div class=" col-md-12 d-flex justify-content-end">
            <a class=" btn btn-primary m-3 justify-content-end" href="<?= base_url('datapengguna/new') ?>">Tambah Penguna</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (session()->getFlashdata('message_succees')) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . session()->getFlashdata('message_succees');
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button </div>';
            }
            if (session()->getFlashdata('message_fail')) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . session()->getFlashdata('message_fail');
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button </div>';
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="isi-modal">
                    Apakah anda yakin menghapus data ini?
                </div>
                <div class="modal-footer" id="footer-modal-action">
                    <script>
                        function hapusPengguna(id, username) {
                            document.getElementById("isi-modal").innerHTML = 'Apakah anda yakin menghapus akun <b>@' + username + '</b>?';
                            document.getElementById("footer-modal-action").innerHTML = `
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method="post" action="<?= base_url('datapengguna') ?>/` + id + `" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger m-1">Delete</button>
                            </form>`;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <!-- Default Card -->
        <div class="card">
            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table table-hover datatable mt-3">
                    <thead>
                        <tr>
                            <th class="text-center px-3">No</th>
                            <th class="text-center px-3">Username</th>
                            <th class="text-center px-3">Nama</th>
                            <th class="text-center px-3">Sebagai</th>
                            <th class="text-center px-3">Profil</th>
                            <th class="text-center px-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $datapengguna) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td>@<?= $datapengguna->username; ?></td>
                                <td><?= $datapengguna->nama; ?></td>
                                <td><?= $datapengguna->akses; ?></td>
                                <td><img src="/img/<?= $datapengguna->profil; ?>" alt="" class="gambarpp rounded-circle"></td>
                                <td class="text-center">
                                    <a class="btn btn-warning m-1" href="<?= base_url('datapengguna/' . $datapengguna->id . '/edit'); ?>">Edit</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="hapusPengguna('<?= $datapengguna->id; ?>','<?= $datapengguna->username; ?>')">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- End Table with stripped rows -->

</div>
<?= $this->endSection(''); ?>