<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pelanggan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/data_pelanggan'); ?>">Pelanggan</a></li>
                        <li class="breadcrumb-item active">Ubah Data </li>
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
                            <i class="fa fa-edit mr-2"></i>Ubah Data Pelanggan
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
                            <?php foreach ($edit_data as $ed) : ?>
                                <form action="<?= site_url('admin/proses_updatepelanggan'); ?>" method="post" role="form">

                                    <div class="form-group">
                                        <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>

                                        <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan" placeholder="" readonly required value="<?= $ed->id_pelanggan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_barang" class="form-label">Nama Pelanggan</label>

                                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" required value="<?= $ed->nama_pelanggan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="daya" class="form-label">Alamat Pelanggan</label>

                                        <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan" placeholder="Masukkan Alamat Pelanggan" required value="<?= $ed->alamat_pelanggan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-label">Kota Pelanggan</label>
                                        <input type="text" name="kota_pelanggan" class="form-control" id="kota_pelanggan" placeholder="Masukkan Kota Pelanggan" required value="<?= $ed->kota_pelanggan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-label">Email Pelanggan</label>
                                        <input type="email" name="email_pelanggan" class="form-control" id="email_pelanggan" placeholder="Masukkan Email Pelanggan" required value="<?= $ed->email_pelanggan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga" class="form-label">Kontak Pelanggan</label>
                                        <input type="text" name="kontak_pelanggan" maxlength="13" class="form-control" id="kontak_pelanggan" placeholder="Masukkan Kontak Pelanggan" value="<?= $ed->kontak_pelanggan; ?>" required onkeypress='return (event.charCode > 47 && event.charCode < 58)'>
                                    </div>

                                    <hr>
                                    <div class="form-group" align="center">
                                        <button onclick="history.back(-1)" type="button" class="btn btn-sm btn-default" name="btn_kembali"></i>Kembali</button>
                                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
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