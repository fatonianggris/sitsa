<?php $user = $this->session->userdata("sitsa"); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Edit Akun</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('akun/daftar_data_akun'); ?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list m-r-5"></i> Daftar Data Akun</a>
            <ol class="breadcrumb">
                <li><a href="#">Akun</a></li>             
                <li class="active">Edit Akun</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-md-12">
            <div class="white-box col-md-12">
                <form class="form" data-toggle="validator" action="<?php echo site_url('akun/update_data_akun/' . $edit_data_akun[0]->id_user); ?>" enctype="multipart/form-data" method="post">
                    <h3 class="box-title m-b-0">Formulir Edit Data Akun "<?php echo strtoupper($edit_data_akun[0]->nama_akun); ?>"</h3>
                    <p class="text-muted m-b-20"> Silahkan Isi Kriteria Akun Disini..</p>
                    <hr>
                    <div class="col-md-12 ">                                      
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <div class="form-group" > 
                                    <label for="namaakun" class="control-label">Nama Akun *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>                                                        
                                        <input type="text" name="nama_akun" value="<?php echo strtoupper($edit_data_akun[0]->nama_akun); ?>" class="form-control" id="namaakun" placeholder="Inputkan Nama Akun" required>
                                    </div>                           
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Admin Fakultas Informatika"</small>  
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="emailakun" class="control-label">Email Akun *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        <input type="email" name="email_akun" value="<?php echo $edit_data_akun[0]->email_akun; ?>" class="form-control" id="emailakun" placeholder="Inputkan Email" required>
                                    </div>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b> diisi</small> 
                                </div>
                            </div>                    
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="roleakn" class="control-label">Role Admin *</label>
                                    <div class="help-block with-errors"></div>
                                    <select class="form-control required" name="role_akun" required>
                                        <option value="<?php echo $edit_data_akun[0]->role_akun; ?>">
                                            <?php if ($edit_data_akun[0]->role_akun == 2) { ?>
                                                Admin Prodi
                                            <?php } elseif ($edit_data_akun[0]->role_akun == 1) {
                                                ?>
                                                Admin Fakultas
                                            <?php } else {
                                                ?>
                                                Super Admin
                                            <?php }
                                            ?>
                                        </option>                                
                                        <?php if ($user['role_akun'] == 2) { ?>                                            
                                            <option value="2">Admin Prodi</option>
                                        <?php } elseif ($user['role_akun'] == 1) {
                                            ?>
                                            <option value="1">Admin Fakultas</option>
                                            <option value="2">Admin Prodi</option>
                                        <?php } else {
                                            ?>
                                            <option value="0">Super Admin</option>
                                            <option value="1">Admin Fakultas</option>
                                            <option value="2">Admin Prodi</option>
                                        <?php }
                                        ?>
                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi </small> 
                                </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group" id="fak">
                                    <label for="fakultasakun" class="control-label">Fakultas *</label>
                                    <div class="help-block with-errors"></div>
                                    <select class="form-control required" name="id_fakultas_akun" id="fakultasakun" required >

                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada silahkan tambahkan di menu Fakultas)</small> 
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group" id="pro">
                                    <label for="prodiakun" class="control-label">Prodi*</label>
                                    <div class="help-block with-errors"></div>
                                    <select class="form-control required" name="id_prodi_akun" id="prodiakun" required>  

                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada silahkan tambahkan di menu Prodi)</small> 
                                </div>
                            </div> 

                        </div>   
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nohpmhs" class="control-label">Nomor Handphone Akun *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-android"></i></div>
                                        <input type="number" name="no_telepon_akun" value="<?php echo $edit_data_akun[0]->no_telepon_akun; ?>" class="form-control" id="nohpmhs" placeholder="inputkan Nomor Handphone">
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small> 
                                </div>
                                <div col-md-12>
                                    <div class="col-md-6">
                                        <div class="form-group">          
                                            <div class="input-group">
                                                <input type="checkbox" class="ubahpass" data-size="medium" name="ubah_password" value="0" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                            </div> 
                                            <small class="form-text"><b class="text-danger">*ubah password?</b></small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">                                           
                                            <div class="help-block with-errors"></div>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-link"></i></div>
                                                <input type="password" name="password_lama" class="form-control" id="passold" placeholder="Password lama" required>
                                            </div>
                                            <small class="form-text"><b class="text-danger">*inputkan password lama</b></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pass" class="control-label">Password Baru *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-link"></i></div>
                                        <input type="password" minlength="5"  name="password_akun" class="form-control" id="pass" placeholder="Inputkan Password" required>
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi</small> 
                                </div>
                                <div class="form-group">
                                    <label for="konfpass" class="control-label">Konfirmasi Password Baru *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-link"></i></div>
                                        <input type="password"  minlength="5" name="cf_passwd_akun" class="form-control" id="konfpass" data-match="#pass" placeholder="inputkan Konfirmasi Password" required>
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi</small> 
                                </div>
                            </div>  
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-2 col-form-label">Foto Akun</label>
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input type="text" name="image" value="<?php echo $edit_data_akun[0]->foto_akun ?>" style="display:none" />
                                            <input type="text" name="image_thumb" value="<?php echo $edit_data_akun[0]->foto_akun_thumb; ?>" style="display:none" />
                                            <input type="file" name="foto_akun" class="dropify" data-max-file-size="3M" data-height="315" data-allowed-file-extensions="jpg png jpeg ico" data-default-file="<?php echo base_url() . $edit_data_akun[0]->foto_akun ?>"/>
                                        </div>
                                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb"</small>  
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group pull-right ">
                                <button type="submit" class="btn btn-success uploadfiles"><i class="fa fa-send m-r-5"></i>Submit</button>
                                <button type="reset" class="btn btn-warning"><i class="fa fa-close m-r-5"></i>Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script src="<?php echo base_url(); ?>main_assets/admin_asset/assets/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.js"></script>
<script>
    $(".ubahpass").bootstrapSwitch();
    var pass_old = $('input[name="password_lama"]');
    var pass_awal = $('input[name="password_akun"]');
    var pass_konf = $('input[name="cf_passwd_akun"]');
    pass_old.prop('disabled', true);
    pass_awal.prop('disabled', true);
    pass_konf.prop('disabled', true);

    $(".ubahpass").on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            pass_old.prop('disabled', false);
            pass_awal.prop('disabled', false);
            pass_konf.prop('disabled', false);
        } else {
            pass_old.prop('disabled', true);
            pass_awal.prop('disabled', true);
            pass_konf.prop('disabled', true);
            pass_old.val("");
            pass_awal.val("");
            pass_konf.val("");
        }
    });
</script>
<script>

    $(function () {
        fakultas();
        if (<?php echo $edit_data_akun[0]->role_akun; ?> == '2') {
            document.getElementById("fak").hidden = false;
            document.getElementById("pro").hidden = false;
        } else if (<?php echo $edit_data_akun[0]->role_akun; ?> == '1') {
            document.getElementById("pro").hidden = true;
        } else if (<?php echo $edit_data_akun[0]->role_akun; ?> == '0') {
            document.getElementById("fak").hidden = true;
            document.getElementById("pro").hidden = true;
        }

        var fak = $('select[name="id_fakultas_akun"]');
        var pro = $('select[name="id_prodi_akun"]');

        $('select[name="role_akun"]').change(function () {
            if ($(this).val() == 0) {

                document.getElementById("fak").hidden = true;
                document.getElementById("pro").hidden = true;
                fakultas();
            } else if ($(this).val() == 1) {

                document.getElementById("fak").hidden = false;
                document.getElementById("pro").hidden = true;
                fakultas();
                if (<?php echo $user['role_akun'] ?> == 0) {
                    var url = "<?php echo site_url('master/mahasiswa/add_ajax_fakultas'); ?>";
                    $('#fakultasakun').load(url);
                }

            } else if ($(this).val() == 2) {

                document.getElementById("fak").hidden = false;
                document.getElementById("pro").hidden = false;
                fakultas();
                if (<?php echo $user['role_akun'] ?> == 0) {
                    var url = "<?php echo site_url('master/mahasiswa/add_ajax_fakultas'); ?>";
                    $('#fakultasakun').load(url);
                    var id_fak = $(this).val();
                    var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi'); ?>/" + id_fak;
                    $('#prodiakun').load(url2);
                }
            }
        });
    });

    function fakultas() {
        if (<?php echo $user['role_akun'] ?> == 2) {
            var url = "<?php echo site_url('master/mahasiswa/add_ajax_fakultas_sub/') . $user['id_fakultas'] ?>";
            $('#fakultasakun').load(url);
            var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi_sub/') . $user['id_fakultas'] . '/' . $user['id_prodi'] ?>";
            $('#prodiakun').load(url2);
        } else if (<?php echo $user['role_akun'] ?> == 1) {
            var url1 = "<?php echo site_url('master/mahasiswa/add_ajax_fakultas_sub/') . $user['id_fakultas'] ?>";
            $('#fakultasakun').load(url1);

            var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi/') . $user['id_fakultas'] ?>";
            $('#prodiakun').load(url2);

<?php if ($edit_data_akun[0]->id_prodi != '') { ?>
                var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi_edit'); ?>/" + <?php echo $edit_data_akun[0]->id_fakultas ?> + '/' +<?php echo $edit_data_akun[0]->id_prodi ?>;
                $('#prodiakun').load(url2);
<?php } ?>
        } else if (<?php echo $user['role_akun'] ?> == 0) {

<?php if ($edit_data_akun[0]->role_akun == 2) { ?>
                var url = "<?php echo site_url('master/mahasiswa/add_ajax_fakultas_edit'); ?>/" + <?php echo $edit_data_akun[0]->id_fakultas ?>;
                $('#fakultasakun').load(url);
                var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi_edit'); ?>/" + <?php echo $edit_data_akun[0]->id_fakultas ?> + '/' +<?php echo $edit_data_akun[0]->id_prodi ?>;
                $('#prodiakun').load(url2);
<?php } else if ($edit_data_akun[0]->role_akun == 1) { ?>
                var url = "<?php echo site_url('master/mahasiswa/add_ajax_fakultas_edit'); ?>/" + <?php echo $edit_data_akun[0]->id_fakultas ?>;
                $('#fakultasakun').load(url);
<?php } ?>

            $("#fakultasakun").change(function () {
                var id_fak = $(this).val();
                var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi'); ?>/" + id_fak;
                $('#prodiakun').load(url2);
            });
        }
    }

</script>



