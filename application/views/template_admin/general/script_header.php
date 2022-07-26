<?php
$template = $this->db->get_where('login_kuisioner', array('id_login_kuisioner' => 1))->result();
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() . $template[0]->logo_login; ?>">
<title><?php echo $template[0]->nama_login; ?></title>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" >
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
<!-- Color picker plugins css -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
<!-- Popup CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/animate.css" rel="stylesheet">
<!-- wysihtml5 CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" rel="stylesheet"/>
<!-- Datatables -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- Menu CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- morris CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/style.css" rel="stylesheet">
<link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet"/>
<!-- color CSS -->
<link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/colors/megna.css" id="theme" rel="stylesheet">
<!-- jQuery -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<!--Morris JavaScript -->
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/morrisjs/morris.js"></script>
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        font-weight: normal;
    }
    tfoot{
        display: table-header-group;

    }
    .clear-td{
        visibility:hidden;
    }
    .m-t-7 {
        margin-top: 7px!important;
    }

    .m-t-25 {
        margin-top: 25px!important;
    }

    .m-t-2 {
        margin-top: 2px!important;
    }

    .line-kisi {
        line-height: 3;
    }

    .row-limit {
        display: inherit;
        width: 110px;
    }
    .row-limit-skala {
        display: inherit;
        width: 50px;
    }
    .borderless td, .borderless th {
        border: none;
    }
    table.dataTable tr th.select-checkbox.selected::after {
        content: "✔";
        margin-top: -11px;
        margin-left: -4px;
        text-align: center;
        text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
    }
    .modal-panel-900 {
        max-width: 900px;
    }
    .modal-blog2 {
        border-radius: 0;
        box-shadow: 0 5px 15px rgba(0,0,0,.1);
        background-color: white; 
        margin-top: 200px;
    }
    .modal-color {
        background:  #edf1f5;
    }
    .side-gabungan {
        text-align: center!important;
    }
    .span-gabungan {
        margin-top: 5px;
    }
    .a-gabungan{
        text-align: center;
    }
    .fa-fw-gab{
        width: 100%!important;
        display: block!important;
        text-align: center!important;

    }
    .btn-new-sm{
        font-weight: 500;
        line-height: 1
    }
    .select2-hidden-accessible {
        top: 50px;
    }
    .user-bg2 {
        margin: -25px;
        height: 300px;
        overflow: hidden;
        position: relative
    }
    .select2-offscreen,
    .select2-offscreen:focus {

        left: auto !important;
        top: auto !important;
    }
    .text-atur{
        margin: 0px 0;
        font-weight: 600;
    }
    .new-hr{
        margin-top: -10px;
    }
    .err-val {
        margin-bottom: 0rem;
    }
    .disabled{
        pointer-events: none;
    }
    .clear-td{
        display: none;
    }
    .label-detail{
        letter-spacing: .05em;
        border-radius: 60px;
        padding: 2px 11px 3px;
        font-weight: 500
    }
    .modal-crop{
        margin-top: 300px;
    }
    .modal-img-crop{
        height: 400px;
    }

    .pro-box .banner-img-disp{
        height: 400px;
    }
    .error-body-dev{padding-top:3%}
    .error-body-dev h1{font-size:160px;font-weight:900;line-height:135px}

    .select-chart{
        font:initial;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .panel-body-kuis {
        padding: 0px 15px 0 15px;
    }
</style>
