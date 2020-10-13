<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url(); ?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $this->session->userdata('admin_username'); ?>
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>


                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php if ($title == 'Selamat Datang di Aplikasi Pengelolaan Laundry') {
                                        echo 'active';
                                    } ?>">
                    <a href="index.php" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU</h4>
                </li>
                <li class="nav-item <?php if ($title == 'Data Pelanggan') {
                                        echo 'active';
                                    } ?>">
                    <a href="pelanggan.php">
                        <i class="fas fa-users"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Pengguna') {
                                        echo 'active';
                                    } ?>">
                    <a href="pengguna.php">
                        <i class="fas fa-users-cog"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Outlet') {
                                        echo 'active';
                                    } ?>"">
                            <a href=" outlet.php">
                    <i class="fas fa-shopping-basket"></i>
                    <p>Outlet</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Paket') {
                                        echo 'active';
                                    } ?>"">
                            <a href=" paket.php">
                    <i class="fas fa-box"></i>
                    <p>Paket</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Transaksi') {
                                        echo 'active';
                                    } ?>"">
                            <a href=" transaksi.php">
                    <i class="fas fa-hand-holding-usd"></i>
                    <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Laporan') {
                                        echo 'active';
                                    } ?>"">
                            <a href=" laporan.php">
                    <i class="fas fa-print"></i>
                    <p>Laporan</p>
                    </a>
                </li>
                <li class="mx-4 mt-2">
                    <a href="<?= base_url('ro-admin/login/logout'); ?>" onclick="return confirm('Keluar dari halaman ini?');" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fas fa-sign-out-alt"></i> </span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<div class="main-panel">
    <div class="content">