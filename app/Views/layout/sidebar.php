<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('rekap'); ?>">
                <i class="bi bi-grid"></i>
                <span>Beranda</span>
            </a>
        </li>
        <?php
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'bendahara')) {

        ?>
            <li class="nav-heading">Kas</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('pemasukan'); ?>">
                    <i class="bi bi-clipboard-plus"></i>
                    <span>Pemasukan Kas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('pengeluaran'); ?>">
                    <i class="bi bi-clipboard-minus"></i>
                    <span>Pengeluaran Kas</span>
                </a>
            </li>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota') {
        ?>
            <li class="nav-heading">Postingan</li>

        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
        ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('kegiatan'); ?>">
                    <i class="bi bi-calendar2-week"></i>
                    <span>Kegiatan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('artikel-management'); ?>">
                    <i class="bi bi-collection""></i>
                    <span>Artikel Management</span>
                </a>
            </li>
            
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['akses']) && ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'anggota')) {
        ?>  
            <li class=" nav-item">
                        <a class="nav-link collapsed" href="<?= base_url('artikel'); ?>">
                            <i class="bi bi-calendar2-x"></i>
                            <span>Artikel</span>
                        </a>
            </li>

        <?php
        }
        ?>
        <li class="nav-heading">Admin</li>
        <?php
        if (isset($_SESSION['akses']) && $_SESSION['akses'] == 'admin') {
        ?>
            <!-- <li class="nav-heading">Admin</li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('datapengguna'); ?>">
                    <i class="bi bi-people"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('setting'); ?>">
                    <i class="bi bi-gear"></i>
                    <span>Setting</span>
                </a>
            </li>

            <!-- End Tentang Page Nav -->
        <?php
        }
        ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('tentang'); ?>">
                <i class="bi bi-info-square"></i>
                <span>Tentang</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->