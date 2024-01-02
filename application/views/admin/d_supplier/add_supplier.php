<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Supplier</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/data_supplier'); ?>">Supplier</a></li>
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
                            <i class="fa fa-plus mr-2"></i>Tambah Data Supplier
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

                            <form action="<?= site_url('admin/proses_tambahsupplier'); ?>" method="post" role="form">

                                <div class="form-group">
                                    <label for="kode_supplier" class="form-label">Kode Supplier</label>

                                    <input type="text" name="id_supplier" class="form-control" id="id_supplier" placeholder="" readonly required value="<?= $kd_spl; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama_barang" class="form-label">Nama Supplier</label>

                                    <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" placeholder="Masukkan Nama Supplier" required>
                                </div>
                                <div class="form-group">
                                    <label for="daya" class="form-label">Alamat Supplier</label>

                                    <input type="text" name="alamat_supplier" class="form-control" id="alamat_supplier" placeholder="Masukkan Alamat Supplier" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="form-label">Kota Supplier</label>
                                    <input type="text" name="kota_supplier" class="form-control" id="kota_supplier" placeholder="Masukkan Kota Supplier" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="form-label">Email Supplier</label>
                                    <input type="email" name="email_supplier" class="form-control" id="email_supplier" placeholder="Masukkan Email Supplier" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="form-label">Kontak Supplier</label>
                                    <input type="text" name="kontak_supplier" maxlength="13" class="form-control" id="kontak_supplier" placeholder="Masukkan Kontak Supplier" required onkeypress='return (event.charCode > 47 && event.charCode < 58)'>
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