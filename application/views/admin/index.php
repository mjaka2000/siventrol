<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard <small>Control Panel</small></h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div id="loading" class="tengah">
            <img src="<?= base_url(); ?>assets/style/loading.gif" alt="loading" width="50%">
        </div>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <h2 align="center">Selamat Datang, <strong><?= $this->session->userdata('nama_lengkap') ?></strong> sebagai Administrator!</h2>
            <div class="row">




                <!-- ./col -->






                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <?php //foreach ($pendapatan as $pd) { 
                    ?>
                    <div class="small-box bg-info">
                        <div class="inner">

                        </div>
                        <div class="icon">
                            <i class="fa fa-download"></i>
                        </div>
                        <a href="<?= site_url('admin/tabel_pemasukan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    <?php //} 
                    ?>
                </div>

                <!-- ./col -->
            </div>

        </div>
</div><!-- /.container-fluid -->
</section>
</div>
<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('template/script') ?>
<script>
    //* Script untuk menampilkan loading
    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            document.querySelector(
                "body").style.visibility = "hidden";
            document.querySelector(
                "#loading").style.visibility = "visible";
        } else {
            document.querySelector(
                "#loading").style.display = "none";
            document.querySelector(
                "body").style.visibility = "visible";
        }
    };
</script>

</body>

</html>