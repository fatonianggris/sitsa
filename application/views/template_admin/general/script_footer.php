<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/multiselect/js/jquery.multi-select.js"></script> 
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/jasny-bootstrap.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/validator.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<!-- Magnific popup JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js"></script>
<!-- Treeview Plugin JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-treeview-master/dist/bootstrap-treeview.min.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/jquery.mask.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.custom.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script>

    $('#pesanan tfoot th').each(function () {
        $(this).html('<input type="text"/>');
    });
// DataTable
    var table = $('#pesanan').DataTable();
// Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });

    $('#pelanggan tfoot th').each(function () {
        $(this).html('<input type="text"/>');
    });
// DataTable
    var table = $('#pelanggan').DataTable();
// Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });

</script>
<script>
    $('#produk tfoot th').each(function () {
        $(this).html('<input type="text"/>');
    });
// DataTable
    var table = $('#produk').DataTable({
        order: []
    });
// Apply the search
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change clear', function () {
            if (that.search() !== this.value) {
                that.search(this.value)
                        .draw();
            }
        });
    });
    $('#fakultas').DataTable({
        "order": []
    });

    $('#prodi').DataTable({
        "order": []
    });
    $('#mhs_kusi').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ],
        "order": []
    });
    $('#kisi_jamak').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ],
        "order": []
    });
    $('#kisi_tunggal').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ],
        "order": []
    });
    $('#mhs_dup').DataTable({
        "order": []
    });
</script>

<script>
    jQuery('.mydatepicker, #datepicker').datepicker(
            {
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();
    });
</script>

<script>

    $('#kuisioner_desc').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": true, //Button to insert a link.
        "image": false, //Button to insert an image.      
    });
    $('#petunjuk').wysihtml5({
        "font-styles": false, //Font styling, e.g. h1, h2, etc.
        "emphasis": true, //Italics, bold, etc.
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.     
        "link": false, //Button to insert a link.
        "image": false, //Button to insert an image.      
    });

</script>


