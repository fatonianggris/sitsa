<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Potenza - Job Application Form Wizard with Resume upload and Branch feature">
        <meta name="author" content="Ansonika">
        <title>SITS-A | <?php echo $home_kuisioner[0]->nama_kuisioner; ?></title>
        <!-- Favicons-->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>main_assets/landing_page_asset/img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url(); ?>main_assets/landing_page_asset/img/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url(); ?>main_assets/landing_page_asset/img/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url(); ?>main_assets/landing_page_asset/img/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url(); ?>main_assets/landing_page_asset/img/apple-touch-icon-144x144-precomposed.png">
        <!-- GOOGLE WEB FONT -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
        <!-- BASE CSS -->
        <link href="<?php echo base_url(); ?>main_assets/landing_page_asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main_assets/landing_page_asset/css/menu.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main_assets/landing_page_asset/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>main_assets/landing_page_asset/css/vendors.css" rel="stylesheet">
        <!-- YOUR CUSTOM CSS -->
        <link href="<?php echo base_url(); ?>main_assets/landing_page_asset/css/custom.css" rel="stylesheet">
        <style>
            .row-login {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                /* margin-left: -15px; */
            }
            .text-desc{
                font-size: 12px;
            }

            .margin_40_35 {
                padding-top: 40px;
                padding-bottom: 35px;
            }
        </style>
        <!-- MODERNIZR MENU -->
        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/modernizr.js"></script>
    </head>
    <body>
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div><!-- /Preload -->
        <div id="loader_form">
            <div data-loader="circle-side-2"></div>
        </div><!-- /loader_form -->
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <a href="index.html"><img src="<?php echo base_url() . $home_kuisioner[0]->logo_kuisioner; ?>" alt="" width="45" height="45"></a>
                    </div>
                    <div class="col-9">
                        <div id="social">
                        </div>
                        <!-- /social -->
                        <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
                        <!-- /menu button -->
                        <nav>
                            <ul class="cd-primary-nav">
                                <li><a href="index.html" class="animated_link">Version 1</a></li>
                                <li><a href="index-2.html" class="animated_link">Version 2</a></li>
                                <li><a href="index-3.html" class="animated_link">Version 3</a></li>
                                <li><a href="about.html" class="animated_link">About Us</a></li>
                                <li><a href="contacts.html" class="animated_link">Contact Us</a></li>                              
                            </ul>
                        </nav>
                        <!-- /menu -->
                    </div>
                </div>
            </div>
            <!-- /container -->
        </header>
        <!-- /Header -->
        <main id="general_page">
            <div class="container_styled_1">
                <div class="container margin_40_35">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="nomargin_top"><?php echo strtoupper($home_kuisioner[0]->judul_kuisioner); ?></h2>
                            <p class="text-desc">
                                <?php echo $home_kuisioner[0]->deskripsi_kuisioner; ?>
                            </p>
                        </div>
                        <div class="col-lg-6 add_top_60 text-center">
                            <?php echo $this->session->flashdata('flash_message'); ?>
                            <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/img/about.svg" alt="" class="img-fluid" width="500" height="360">
                            <p class="lead  add_top_30">Login Alumni</p>
                            <form id="wrapped" class="col-lg-12" action="<?php echo base_url(); ?>home/login" method="post" enctype="multipart/form-data">
                                <div class="form-group col-lg-12 ml-lg-12">
                                    <label for="name">NIM Mahasiswa</label>
                                    <input type="number" name="nim_mhs" id="name" class="form-control required">
                                </div>
                                <div class="form-group col-lg-12 ml-lg-12">
                                    <label for="email">Password</label>
                                    <input type="password" name="password_mhs" id="email" class="form-control required" >
                                </div>
                                <div class="form-group col-lg-12 pull-right">								
                                    <button type="submit" name="process" class="submit">Submit</button>
                                </div>
                                <div class="form-group col-lg-12 pull-right">								
                                    <small>jika mengalami kendala, silahkan <a href="#laporan" data-toggle="modal">klik disini.</a></small>
                                </div>
                            </form>		
                        </div>									
                    </div>
                    <div class=" add_top_30 text-center">					

                    </div>
                    <!-- End row -->
                </div>
            </div>
            <!-- End container -->
        </main>

        <footer class="clearfix">
            <div class="container">
                <p>© 2020 UIN Maliki Malang</p>               
            </div>
        </footer>
        <!-- end footer-->
        <div class="cd-overlay-nav">
            <span></span>
        </div>
        <!-- /cd-overlay-nav -->
        <div class="cd-overlay-content">
            <span></span>
        </div>
        <!-- Modal terms -->
        <div class="modal fade " id="laporan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="termsLabel">Laporan & Keluhan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo site_url('home/post_laporan_mahasiswa'); ?>" enctype="multipart/form-data"  method="post" id="contactform">
                        <div class="modal-body">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="name_contact">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" id="name_contact" name="nama_mhs" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="lastname_contact">NIM Mahasiswa</label>
                                            <input type="number" class="form-control" id="lastname_contact" name="nim_mhs" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="lastname_contact">Email Mahasiswa</label>
                                            <input type="email" class="form-control" id="lastname_contact" name="email_mhs" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="subjek">Subjek Laporan</label>
                                            <div class="styled-select clearfix">
                                                <select class="form-control required" name="subjek_laporan" id="subjek" required="">
                                                    <option value="">Pilih Subjek Laporan</option>
                                                    <option value="Login Halaman">Login Halaman</option>
                                                    <option value="Kesalahan Biodata">Kesalahan Biodata</option>
                                                    <option value="Lainnya">Lainnya</option>                                                  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="fakultasmhs">Fakultas</label>
                                            <div class="styled-select clearfix">
                                                <select class="form-control required" name="id_fakultas_mhs" id="fakultasmhs" required="">
                                                    <option value="">Pilih Fakultas</option>
                                                    <?php
                                                    if (!empty($data_fakultas)) {
                                                        foreach ($data_fakultas as $key => $value) {
                                                            ?> 
                                                            <option value="<?php echo $value->id_fakultas; ?>"><?php echo strtoupper($value->nama_fakultas); ?></option>
                                                            <?php
                                                        }  //ngatur nomor urut
                                                    }
                                                    ?>     
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="prodimhs">Prodi</label>
                                            <div class="styled-select clearfix">
                                                <select class="form-control required" name="id_prodi_mhs" id="prodimhs" required="">
                                                    <option value="">Pilih Prodi</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message_contact">Pesan</label>
                                            <textarea rows="5" id="message_contact" name="isi_laporan" class="form-control" style="height:200px;" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn_1" >Kirim</button>                       
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /cd-overlay-content -->
        <!-- COMMON SCRIPTS -->

        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/jquery-3.2.1.min.js"></script>
        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/common_scripts.min.js"></script>
        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/velocity.min.js"></script>
        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/common_functions.js"></script>
        <!-- SPECIFIC SCRIPTS -->
        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/parallax.min.js"></script>
        <script src="<?php echo base_url(); ?>main_assets/landing_page_asset/js/owl-carousel.js"></script>
        <script>
            $(document).ready(function () {
                var id_fak;
                $("#fakultasmhs").change(function () {
                    id_fak = $(this).val();
                    var url = "<?php echo site_url('home/add_ajax_prodi'); ?>/" + id_fak;
                    $('#prodimhs').load(url);
                    return false;
                });
            });
        </script>
    </body>
</html>