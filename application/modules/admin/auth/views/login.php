<?php
$template = $this->db->get_where('login_kuisioner', array('id_login_kuisioner' => 1))->result();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/images/favicon.png">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main_assets/admin_asset/assets//plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
        <!-- animation CSS -->
        <link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="<?php echo base_url(); ?>main_assets/admin_asset/assets/css/colors/blue.css" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <!-- Preloader -->
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <section id="wrapper" class="login-register" style="background:url(<?php echo base_url() . $template[0]->foto_background; ?>)center center/cover no-repeat!important;">
            <div class="login-box login-sidebar">
                <div class="white-box">
                    <?php echo $this->session->flashdata('flash_message'); ?>
                    <form class="form-horizontal form-material" id="loginform" action="<?php echo base_url(); ?>auth/login" method="post">
                        <a href="javascript:void(0)" class="text-center db"><img src="<?php echo base_url() . $template[0]->logo_login; ?>" height="55" alt="Home" />
                            <br/>
                            <img src="<?php echo base_url() . $template[0]->gambar_nama_login; ?>" alt="Home" height="55"/></a>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" type="email" required="" placeholder="Inputkan Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="Inputkan Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>                                             
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/js/custom.min.js"></script>
        <!--Style Switcher -->
        <script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    </body>
</html>
