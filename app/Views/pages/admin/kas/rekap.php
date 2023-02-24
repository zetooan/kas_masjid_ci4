<?= $this->extend('layout/page_layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <?php
    $jum_sblm = isset($jum_sblm) ? $jum_sblm : 0;
    $jum_masuk = isset($jum_masuk) ? $jum_masuk : 0;
    $jum_keluar = isset($jum_keluar) ? $jum_keluar : 0;
    $akhir = ($jum_sblm + $jum_masuk) - $jum_keluar;
    $chart_awal = ($akhir >= 0) ? $jum_keluar : $akhir;
    $chart_akhir = ($akhir >= 0) ? $akhir : 0;
    ?>
    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="<?= base_url('export'); ?>" class="my-3">
                <?= csrf_field(); ?>
                <input type="hidden" name="awal" value="<?= $periode['awal'] ?>">
                <input type="hidden" name="akhir" value="<?= $periode['akhir'] ?>">
                <button type="submit" class="btn btn-primary">Export</button>
            </form>
        </div>
        <div class=" col d-flex justify-content-end">
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
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body px-5">
                    <h5 class="card-title">Data Rekap</h5>
                    <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#doughnutChart'), {
                                type: 'doughnut',
                                data: {
                                    labels: [
                                        'Pengeluaran',
                                        'Pemasukan',
                                    ],
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [<?= $chart_awal . ', ' . $chart_akhir; ?>],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                    </script>
                    <!-- End Doughnut CHart -->

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!-- Default Card -->
            <div class="card">
                <div class="card-body">
                    <br>
                    <table class="table">
                        <tr>
                            <th class="px-3 col-7">Sisa Kas Sebelunya</th>
                            <td class="<?= ($jum_sblm > 0) ? 'text-success' : 'text-danger'; ?> px-3 text-end">Rp <?= number_format($jum_sblm); ?></td>
                        </tr>
                        <tr>
                            <td class="px-3" colspan="2">
                                <h5 class="chart-tittle mt-3">Data Pemasukan</h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-hover datatable mt-3">
                                    <thead>
                                        <tr>
                                            <th class="text-center px-3">No</th>
                                            <th class="text-center px-3">Tanggal</th>
                                            <th class="text-center px-3">Keterangan</th>
                                            <th class="text-center px-3">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kas_masuk as $data) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++; ?></td>
                                                <td><?= date("d F Y", strtotime($data->tanggal)); ?></td>
                                                <td><?= $data->ket; ?></td>
                                                <td class="text-success text-end">Rp +<?= number_format($data->jumlah); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-3 col-7">Jumlah Pemasukan</th>
                            <td class="<?= ($jum_masuk > 0) ? 'text-success' : 'text-danger'; ?> px-3 text-end">Rp +<?= number_format($jum_masuk); ?></td>
                        </tr>
                        <tr>
                            <td class="px-3" colspan="2">
                                <h5 class="chart-tittle mt-3">Data Pengeluaran</h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-hover datatable mt-3">
                                    <thead>
                                        <tr>
                                            <th class="text-center px-3">No</th>
                                            <th class="text-center px-3">Tanggal</th>
                                            <th class="text-center px-3">Keterangan</th>
                                            <th class="text-center px-3">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kas_keluar as $data) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i++; ?></td>
                                                <td><?= date("d F Y", strtotime($data->tanggal)); ?></td>
                                                <td><?= $data->ket; ?></td>
                                                <td class="text-danger text-end">Rp -<?= number_format($data->jumlah); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th class="px-3 col-7">Jumlah Pengeluaran</th>
                            <td class="<?= ($jum_keluar > 0) ? 'text-danger' : 'text-success'; ?> px-3 text-end">Rp -<?= number_format($jum_keluar); ?></td>
                        </tr>
                        <tr>
                            <td class="px-3" colspan="2">Jumlah Akhir = ( Sisa Kas Sebelumya + Jumlah Pemasukan ) - Jumlah Pengeluaran</td>
                        </tr>
                        <tr>
                            <th class="px-3 col-7">Jumlah Akhir</th>
                            <td class="<?= ($akhir <= 0) ? 'text-danger' : 'text-success'; ?> px-3 text-end">Rp <?= ($akhir > 0) ? '+' : ''; ?><?= number_format($akhir); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>