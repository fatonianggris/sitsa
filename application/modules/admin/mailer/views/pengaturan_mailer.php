<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Mailer</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">               
                <li><a href="#"> Mailer</a></li>
                <li class="active">Konfigurasi Mailer</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Kuisioner Belum Terisi</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-close text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $data_email_mahasiswa[0]->belum_isi_kuisioner; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Kuisioner Terisi</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-check text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $data_email_mahasiswa[0]->sudah_isi_kuisioner; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Email Belum Terikirim</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-envelope text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $data_email_mahasiswa[0]->total_belum_mengirim_email; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->
    <div>
        <div class="col-sm-12">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#edit_mailer" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i>Edit Mailer </a>
                <div class="tab-pane" id="profile">                    
                    <h3 class="box-title m-b-0">Detail Konfigurasi Mailer</h3>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Nama Pengirim</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->nama_pengirim; ?></p>
                        </div>   
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Subjek Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->subjek_email; ?></p>
                        </div>
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Host</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->host; ?></p>
                        </div>
                        <div class="col-md-3 col-xs-3 b-r"> <strong>Email Sender</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->email_website; ?></p>
                        </div>                                                                  
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-4 col-xs-4 b-r"> <strong>Port</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->port; ?></p>
                        </div>   
                        <div class="col-md-4 col-xs-4 b-r"> <strong>SMTP Auth</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->smtp_auth; ?></p>
                        </div>
                        <div class="col-md-4 col-xs-4 b-r"> <strong>SMTP Secure</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->smtp_secure; ?></p>
                        </div>                                                                  
                    </div>
                    <hr>   
                    <div class="row text-center">
                        <div class="col-md-6 col-xs-6 b-r"> <strong>Judul Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->judul_email; ?></p>
                        </div>   
                        <div class="col-md-6 col-xs-6 b-r"> <strong>Keterangan Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $setting_mailer[0]->keterangan_email; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /.modal -->
<div id="edit_mailer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Mailer</h4>
                <small>Silahkan Edit Konfigurasi Mailer </small>
            </div>
            <form class="form" action="<?php echo site_url('mailer/mail/update_mailer'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nama Pengirim</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_pengirim" value="<?php echo $setting_mailer[0]->nama_pengirim; ?>" placeholder="Inputkan Nama Pengirim" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Subjek Email</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="subjek_email" value="<?php echo $setting_mailer[0]->subjek_email; ?>" placeholder="Inputkan Subjek Email" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: Pengisian KRS</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Host</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="host" value="<?php echo $setting_mailer[0]->host; ?>" placeholder="Inputkan Host" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: Tracer Study UIN</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email Sender</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="email_website" value="<?php echo $setting_mailer[0]->email_website; ?>" placeholder="Inputkan Email Sender" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi,  Contoh: uinmaliki@ac.id</small>  
                        </div>
                    </div>         
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Password Email Sender</label>
                        <div class="col-10">
                            <input class="form-control" type="password" name="password" value="<?php echo $setting_mailer[0]->password; ?>" placeholder="Inputkan Password Email" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi,  Contoh: uinmaliki@ac.id</small>  
                        </div>
                    </div>       
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Port</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="port" value="<?php echo $setting_mailer[0]->port; ?>" placeholder="Inputkan Port" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: 465</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">SMTP Auth</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="smtp_auth" value="<?php echo $setting_mailer[0]->smtp_auth; ?>" placeholder="Inputkan SMTP Auth" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: true/false</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">SMTP Secure</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="smtp_secure" value="<?php echo $setting_mailer[0]->smtp_secure; ?>" placeholder="Inputkan SMTP Secure" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh:SSL</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judemail" class="col-2 col-form-label">Judul Email</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="judul_email" id="judemail" required><?php echo $setting_mailer[0]->judul_email; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: Tracer Study Alumni S-1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora</small>  
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label for="ketemail" class="col-2 col-form-label">Keterangan Email</label>
                        <div class="col-10">
                            <textarea class="form-control" type="text" rows="5" name="keterangan_email" id="ketemail" required><?php echo $setting_mailer[0]->keterangan_email; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh:Kami sangat berharap kesediaan para alumni S.1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora Universitas Islam Negeri (UIN)</small>  
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Simpan</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                    
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
