<?php $this->load->view('template/head'); ?>
<?php $this->load->view('admin/template/nav'); ?>
<?php $this->load->view('admin/template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active"><a href="<?= site_url('admin/barang_masuk'); ?>">Barang Masuk</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
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
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-plus mr-2"></i>Tambah Transaksi Barang Masuk
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
                            <table id="examplejk1" class="table table-bordered text-sm" style="text-align: center;">
                                <tbody>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th style="width :13%">Qty</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <form action="<?= site_url('admin/add_brg_msk'); ?>" method="post" role="form">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <select name="id_barang" id="id_barang" class="form-control" required>
                                                        <option value="">-- Pilih Nama Barang--</option>
                                                        <?php foreach ($brg_msk as $d) { ?>
                                                            <option value="<?= $d->id_barang ?>"><?= $d->nama_barang ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <!-- <input type="number" name="jenis_perbaikan" class="form-control" id="jenis_perbaikan" placeholder="" required> -->
                                                    <input type="text" name="qty_masuk" class="form-control" id="qty_masuk" placeholder="" required onkeypress='return (event.charCode > 47 && event.charCode < 58)'>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon">Rp</span>
                                                        </div>
                                                        <input type="text" name="harga_beli" class="form-control" id="harga_beli" readonly>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-default">Add</button>
                                                </div>
                                            </td>
                                            <!-- </div> -->
                                        </tr>
                                    </form>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row tengah">
                <div class="col-md-12">
                    <div class="card text-sm">
                        <div class="card-body">
                            <?php //foreach ($data_valid as $dv) { 
                            ?>
                            <form action="<?= site_url('admin/proses_brg_msk'); ?>" method="post" role="form">

                                <input type="hidden" name="id_u_sewa" value="#">
                                <div class="form-group row">
                                    <label for="id_transaksi" class="col-sm-3 col-form-label">No. Transaksi</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="id_barang_masuk" id="id_barang_masuk" class="form-control" readonly value="<?= $id_BM; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_keluar" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                                    <div class="col-sm-5">
                                        <input type="date" name="tgl_transaksi_bm" class="form-control form_datetime" id="tgl_transaksi_bm" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nopol_mobil" class="col-sm-3 col-form-label">Supplier</label>
                                    <div class="col-sm-5">
                                        <select name="id_supplier" id="nopol" class="form-control" required>
                                            <option value="">-- Pilih Supplier--</option>
                                            <?php foreach ($spl as $s) { ?>
                                                <option value="<?= $s->id_supplier ?>"><?= $s->nama_supplier ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- </div> -->
                                <table id="examplejk" class="table table-bordered text-sm" style="width:100%;text-align: center;">
                                    <thead>
                                        <tr>
                                            <th colspan="7">Barang yang dibeli</th>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Barang</th>
                                            <th style="width :10%">Qty</th>
                                            <th>Satuan</th>
                                            <th>Harga Satuan</th>
                                            <th>Harga Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $no = 1;
                                            foreach ($list_data as $d) { ?>
                                                <td><?= $d->id_barang; ?></td>
                                                <td><?= $d->nama_barang; ?></td>
                                                <td><?= $d->unit; ?></td>
                                                <td>Rp&nbsp;<?= number_format($d->harga_beli); ?></td>
                                                <td> </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5" style="text-align: right;">
                                            Total:
                                        </td>
                                        <td style="text-align: left;">
                                            Rp&nbsp;
                                            <?php // 
                                            ?>
                                        </td>
                                        <td>
                                        </td>
                                        <!-- </div> -->
                                    </tr>
                                    </tbody>
                                </table>
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
<script type="text/javascript">
    $(function() {
        $('#examplejk').DataTable({
            // 'paging': true,
            // 'lengthChange': false,
            // 'searching': faslse,
            // 'ordering': false,
            // 'info': true,
            'responsive': true,
            'autoWidth': false
        })
    }); //* Script untuk memuat datatable
</script>
<script type="text/javascript">
    $(function() {
        $('#examplejk1').DataTable({
            // 'paging': true,
            // 'lengthChange': false,
            // 'searching': faslse,
            // 'ordering': false,
            // 'info': true,
            'responsive': true,
            'autoWidth': false
        })
    }); //* Script untuk memuat datatable
</script>
<script type="text/javascript">
    //* Script untuk memuat data barang
    $("#id_barang").change(function() {
        let id_barang = $(this).val();
        // let stok_gd = document.getElementById("stok_gd");

        <?php foreach ($brg_msk as $s) { ?>
            if (id_barang == "<?php echo $s->id_barang ?>") {

                $("#harga_beli").val("<?php echo number_format($s->harga_beli) ?>");
            }
        <?php } ?>
    })
</script>
</body>

</html>