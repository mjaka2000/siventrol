<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/data_barang'); ?>">Barang</a></li>
                        <li class="breadcrumb-item active">Tambah Data </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row tengah">

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus mr-2"></i>Tambah Data Barang
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                    <strong>Berhasil!</strong><br> <?= $this->session->flashdata('msg_sukses'); ?>
                                </div>
                            <?php } ?>
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                    <strong>Peringatan!</strong><br> <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>

                            <form action="<?= site_url('admin/proses_tambahbarang'); ?>" method="post" role="form">

                                <div class="form-group">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>

                                    <input type="text" name="kode_barang" class="form-control" id="kode_barang" placeholder="" readonly required value="<?= $kd_brg; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>

                                    <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukkan Nama Barang" required>
                                </div>
                                <div class="form-group">
                                    <label for="daya" class="form-label">Kategori Barang</label>

                                    <input type="text" name="unit" class="form-control" id="unit" placeholder="Kategori" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="form-label">Harga Beli</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon">Rp</span>
                                        </div>
                                        <input type="text" name="harga_beli" class="form-control" id="harga_beli" placeholder="Harga Dibeli" required onkeypress='return (event.charCode > 47 && event.charCode < 58)'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="form-label">Harga Jual</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon">Rp</span>
                                        </div>
                                        <input type="text" name="harga_jual" class="form-control" id="harga_jual" placeholder="Harga Dijual" required onkeypress='return (event.charCode > 47 && event.charCode < 58)'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="form-label">Diskon</label>
                                    <input type="text" name="diskon" class="form-control" id="diskon" placeholder="Diskon" required onkeypress='return (event.charCode > 47 && event.charCode < 58)'>
                                </div>

                                <hr>
                                <div class="form-group" align="center">
                                    <button onclick="history.back(-1)" type="button" class="btn btn-sm btn-default" name="btn_kembali"></i>Kembali</button>
                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

<?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/script') ?>



</body>

</html>