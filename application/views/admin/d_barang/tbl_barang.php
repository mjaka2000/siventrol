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
                        <li class="breadcrumb-item active">Barang</li>
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
                            Data Barang
                        </div>
                        <div class="card-body">

                            <?php if ($this->session->flashdata('msg_gagal')) { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                                    <strong>Gagal!</strong><br> <?= $this->session->flashdata('msg_gagal'); ?>
                                </div>
                            <?php } ?>
                            <button onclick="window.location.href='<?= site_url('admin/tambah_barang'); ?>'" style="margin-bottom:10px;" type="button" class="btn btn-sm btn-primary" name="tambah_data"><i class="fa fa-plus"></i>&nbsp;Tambah Data</button>

                            <table id="examplejk" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width :10px">No.</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Unit</th>
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Diskon</th>
                                        <th style="width:10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (is_array($list_data)) { ?>
                                        <?php foreach ($list_data as $d) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $d->id_barang; ?></td>
                                                <td><?= $d->nama_barang; ?></td>
                                                <td><?= $d->unit; ?></td>
                                                <td>Rp&nbsp;<?= number_format($d->harga_beli); ?></td>
                                                <td>Rp&nbsp;<?= number_format($d->harga_jual); ?></td>
                                                <td><?= $d->diskon; ?> %</td>
                                                <td>
                                                    <!-- <a href="<?= site_url('admin/detail_barang/' . $d->id_barang); ?>" title="Lihat Detail" type="button" class="btn btn-sm btn-warning" name="btn_edit"><i class="fa fa-eye"></i></a> -->
                                                    <a href="<?= site_url('admin/update_barang/' . $d->id_barang); ?>" title="Ubah" type="button" class="btn btn-sm btn-info" name="btn_edit"><i class="fa fa-edit"></i></a>
                                                    <a href="<?= site_url('admin/hapus_barang/' . $d->id_barang); ?>" title="Hapus" type="button" class="btn btn-sm btn-danger btn-delete" name="btn_delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php } ?>
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
            Swal.fire({
                title: "Berhasil!",
                text: '<?= $this->session->flashdata('msg_sukses'); ?>',
                icon: "success"
            })
        })
        return false;
    }); //* Script untuk memuat sweetalert hapus data
</script>
<?php if ($this->session->flashdata('msg_sukses')) { ?>
    <script type="text/javascript">
        Swal.fire({
            title: "Berhasil!",
            text: '<?= $this->session->flashdata('msg_sukses'); ?>',
            icon: "success"
        })
    </script>
<?php } ?>
</body>

</html>