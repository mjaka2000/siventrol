<!-- jQuery -->
<script src="<?= base_url(); ?>assets/admin32/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/admin32/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/admin32/dist/js/adminlte.min.js"></script>
<!-- addon script -->
<script src="<?= base_url(); ?>assets/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/chart.js/Chart.min.js"></script>


<script src="<?= base_url(); ?>assets/admin32/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/admin32/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<script type="text/javascript">
    // $(document).ready(function() {
    //     $('.sidebar-menu').tree()
    // })

    document.oncontextmenu = function() {
        return true;
    };
</script>
<script type="text/javascript">
    $('.btn-logout').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: 'Logout',
            text: 'Anda yakin ingin logout?',
            type: 'warning',
            confirmButtonColor: '#d9534f',
            showCancelButton: true,
        }).then(result => {
            //jika klik ya maka arahkan ke proses.php
            if (result.isConfirmed) {
                // Swal.fire({
                //     title: 'Logout',
                //     text: 'Anda telah logout',
                //     type: 'success',
                //     timer: 2500
                // })
                window.location.href = getLink
            }
        })
        return false;
    }); //* Script untuk memuat sweetalert logout
</script>
<script>
    function renderTime() {
        var currentTime = new Date();
        var h = currentTime.getHours();
        var m = currentTime.getMinutes();
        var s = currentTime.getSeconds();

        if (h == 0) {
            h = 24;
        }
        if (h < 10) {
            h = "0" + h;
        }
        if (m < 10) {
            m = "0" + m;
        }
        if (s < 10) {
            s = "0" + s;
        }
        var myClock = document.getElementById('clockDisplay');
        myClock.textContent = h + ":" + m + ":" + s + "";
        setTimeout('renderTime()', 1000)
    }
    renderTime();
</script>