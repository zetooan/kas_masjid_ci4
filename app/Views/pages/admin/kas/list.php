<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <div class="row">
        <div class=" col-md-7 d-flex justify-content-start">
            <form>
                <div class="input-group my-3">
                    <span class="input-group-text">Periode</span>
                    <input class="form-control" type="date" name="dari" value="<?= $periode['awal'] ?>" required>
                    <span class="input-group-text">-</span>
                    <input class="form-control" type="date" name="sampai" value="<?= $periode['akhir'] ?>" required>
                    <button class="btn btn-primary">Sortir</button>
                </div>
            </form>
        </div>
        <div class=" col-md-5 d-flex justify-content-end">
            <a class=" btn btn-primary m-3 justify-content-end" href="<?= base_url(strtolower($page) . '/new') ?>">Tambah <?= $page; ?></a>
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
                            document.getElementById("isi-modal").innerHTML = 'Apakah anda yakin menghapus data <?= strtolower($page); ?> ' + username + ' ?';
                            document.getElementById("footer-modal-action").innerHTML = `
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method="post" action="<?= base_url(strtolower($page)); ?>/` + id + `" class="d-inline">
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
                            <th class="text-center px-3">Tanggal</th>
                            <th class="text-center px-3">Keterangan</th>
                            <th class="text-center px-3">Jumlah</th>
                            <th class="text-center px-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kas as $data) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= date("d F Y", strtotime($data->tanggal)); ?></td>
                                <td><?= $data->ket; ?></td>
                                <td class="<?= ($page == 'Pemasukan') ? 'text-success' : 'text-danger'; ?> text-end">Rp <?= number_format($data->jumlah); ?></td>
                                <td class="text-center">
                                    <a class="btn btn-warning m-1" href="<?= base_url(strtolower($page) . '/' . $data->id . '/edit'); ?>">Edit</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="hapusPengguna('<?= $data->id; ?>','<?= $data->ket; ?>')">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <table class="table">
                    <tr>
                        <th class="px-3">Jumlah <?= $page; ?></th>
                        <td class="<?= ($page == 'Pemasukan') ? 'text-success' : 'text-danger'; ?> px-3 text-end">Rp <?= isset($jumlah) ? number_format($jumlah) : 0; ?></td>
                    </tr>
                </table>

                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(''); ?>