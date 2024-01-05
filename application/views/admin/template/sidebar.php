<!--  -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="position:fixed ;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <!-- <img src="<?= base_url(); ?>assets/style/logo/ws-w.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light"><b>SIVENTROL</b>Web</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
        <div class="image">

        </div>
        <div class="info">
            <!-- <a href="#" class="d-block"><strong><?= $this->session->userdata('nama_lengkap') ?></strong></a> -->
        </div>
        <!-- </div> -->
        <!-- Sidebar Menu -->
        <nav class="mt-2 text-sm">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">MAIN MENU</li>
                <li class="nav-item">
                    <a href="<?= site_url('admin') ?>" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>

                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url(); ?>admin/data_barang" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= site_url(); ?>admin/data_supplier" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url(); ?>admin/data_pelanggan" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pelanggan</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item">
                    <a href="<?= site_url(); ?>admin/barang_masuk" class="nav-link">
                        <i class="far fa-calendar-alt nav-icon"></i>
                        <p>Barang Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url(); ?>admin/#" class="nav-link">
                        <i class="fas fa-chart-bar nav-icon"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url(); ?>admin/#" class="nav-link">
                        <i class="fas fa-file nav-icon"></i>
                        <p>Data Stok</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url(); ?>admin/laporan" class="nav-link">
                        <i class="fas fa-clipboard nav-icon"></i>
                        <p>Laporan Data</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= site_url(); ?>admin/email" class="nav-link">
                        <i class="fas fa-envelope nav-icon"></i>
                        <p>Email</p>
                    </a>
                </li> -->
                <!-- <li class="nav-header">LAPORAN DATA</li> -->
                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Menu User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= site_url(); ?>admin/profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url(); ?>admin/data_users" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url(''); ?>admin/logout" class="nav-link btn-logout">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>