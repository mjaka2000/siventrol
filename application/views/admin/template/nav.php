<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <!-- <a href="#" class="nav-link" style="color: white;">SIVENTROL Web</a> -->
        </li>
        <!-- <iframe src="https://free.timeanddate.com/clock/i96lo508/n439/tlid38/fn3" frameborxder="0" width="57" height="18"></iframe> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <!-- <?php foreach ($avatar as $a) { ?>
                    <img src="<?= base_url('assets/upload/user/' . $a->nama_file); ?>" class="user-image img-circle elevation-2" alt="User Image">
                <?php } ?> -->
                <i class="fas fa-user"></i>&nbsp;
                <span class="hidden-xs" style="color: #;"><?= $this->session->userdata('nama_lengkap') ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header">
                    <!-- <?php foreach ($avatar as $a) { ?>
                        <img src="<?= base_url('assets/upload/user/' . $a->nama_file); ?>" class="img-circle elevation-2" alt="User Image">
                    <?php } ?> -->

                    <p>
                        <strong><?= $this->session->userdata('nama_lengkap') ?></strong> - Administrator <br>
                        <small>Last Login : <?= date('d-m-Y H:i:s', strtotime($this->session->userdata('last_login'))) ?></small><br>
                    </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="card-footer">
                    <span class="fa-pull-left">
                        <a class="btn btn-default btn-sm" type="button" href="<?= site_url('admin/profile'); ?>"><i class="fa fa-cog"></i>&nbsp;Profile</a>
                    </span>
                    <span class="fa-pull-right">
                        <a class="btn btn-default btn-sm btn-logout" type="button" href="<?= site_url('admin/logout'); ?>"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    </span>
                </li>
            </ul>
        </li>
    </ul>

</nav>