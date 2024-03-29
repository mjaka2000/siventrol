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
                        <li class="breadcrumb-item active">Detail Barang Masuk</li>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Detail Data Barang Masuk
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('msg_sukses')) { ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                    <strong>Berhasil!</strong><br> <?= $this->session->flashdata('msg_sukses'); ?>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('msg_gagal')) { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                    <strong>Gagal!</strong><br> <?= $this->session->flashdata('msg_gagal'); ?>
                                </div>
                            <?php } ?>
                            <table id="examplejk" class="table">
                                <tbody>
                                    <?php foreach ($det_data as $d) { ?>
                                        <tr>
                                            <th class="col-sm-2" style="vertical-align: middle;">No. Transaksi</th>
                                            <td style="vertical-align: middle;">
                                                :&nbsp;<?= $d->id_brg_msk; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle;">Tanggal Transaksi</th>
                                            <td style="vertical-align: middle;">
                                                :&nbsp;<?= date('d-m-Y', strtotime($d->tgl_transaksi_bm)); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="vertical-align: middle;">Nama Supplier</th>
                                            <td style="vertical-align: middle;">
                                                :&nbsp;<?= $d->nama_supplier; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <table id="examplejk" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th colspan="7" style="text-align: center;">Barang yang dibeli</th>
                                    </tr>
                                    <tr>
                                        <!-- <th style="width :10px">No.</th> -->
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th style="width :10%">Qty</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; ?>
                                    <?php foreach ($list_data as $d) { ?>
                                        <tr>
                                            <!-- <td><?= $no++; ?></td> -->
                                            <td><?= $d->id_barang; ?></td>
                                            <td><?= $d->nama_barang; ?></td>
                                            <td><?= $d->qty_masuk; ?></td>
                                            <td><?= $d->unit; ?></td>
                                            <td>Rp&nbsp;<?= number_format($d->harga_beli); ?></td>
                                            <td>Rp&nbsp;<?= number_format($d->qty_masuk * $d->harga_beli); ?></td>
                                        </tr>
                                        <?php $total = $total + ($d->qty_masuk * $d->harga_beli); ?>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5" style="text-align: right;">Total Keseluruhan:</td>
                                        <td style="text-align: left;">Rp&nbsp;<?php echo number_format($total); ?></td>
                                        <!-- </div> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


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
    $('.btn-delete').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: 'Hapus Data',
            text: 'Yakin ingin menghapus data?',
            type: 'warning',
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        }).then(result => {
            //jika klik ya maka arahkan ke proses.php
            if (result.isConfirmed) {
                window.location.href = getLink
            }
        })
        return false;
    }); //* Script untuk memuat sweetalert hapus data
</script>
</body>

</html>