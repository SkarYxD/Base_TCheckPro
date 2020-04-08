<script src="js/popper.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
<script src="vendor/pacejs/pace.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>
<script src="vendor/flot/jquery.flot.min.js"></script>
<script src="vendor/flot/jquery.flot.resize.min.js"></script>
<script src="vendor/flot/jquery.flot.spline.js"></script>
<script src="vendor/datatables/datatables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/slimscroll/jquery.slimscroll.min.js"></script>
<script src="scripts/luna.js"></script>
<script>
    $(document).ready(function () {

        $('#tablaAcc').DataTable({
            "dom": "t",
            "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
            "iDisplayLength": 5,
        });
    });
</script>