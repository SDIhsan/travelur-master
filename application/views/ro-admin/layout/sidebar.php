<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?= base_url(); ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
                    <a href="<?= base_url('ro-admin/index') ?>" class="collapsed" aria-expanded="false">
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
                    <a href="<?= base_url('ro-admin/index/type_trans') ?>">
                        <i class="fas fa-users"></i>
                        <p>Tipe Transportasi</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Pelanggan') {
                                        echo 'active';
                                    } ?>">
                    <a href="<?= base_url('ro-admin/index/trans') ?>">
                        <i class="fas fa-users"></i>
                        <p>Transportasi</p>
                    </a>
                </li>
                <li class="nav-item <?php if ($title == 'Data Pelanggan') {
                                        echo 'active';
                                    } ?>">
                    <a href="<?= base_url('ro-admin/index/rute') ?>">
                        <i class="fas fa-users"></i>
                        <p>Rute</p>
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