<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container">

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
                        function hapusPengguna(id, penulis) {
                            document.getElementById("isi-modal").innerHTML = 'Apakah anda yakin menghapus data' + penulis + ' ?';
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
                            <th class="text-center px-3">Dibuat</th>
                            <th class="text-center px-3">Judul</th>
                            <th class="text-center px-3">Gambar</th>
                            <th class="text-center px-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($artikel as $data) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= date('d F Y', strtotime($data->updated_at)) ?></td>
                                <td><?= $data->judul; ?></td>
                                <td><img src="<?= base_url('assets/images/' . $data->gambar); ?>" alt="" width="100"></td>


                                <td class="text-center">
                                    <a class="btn btn-success m-1" href="<?= base_url(strtolower($page) . '/' . $data->id . '/show'); ?>">Preview</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="hapusPengguna('<?= $data->id; ?>','<?= $data->judul; ?>')">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(''); ?>