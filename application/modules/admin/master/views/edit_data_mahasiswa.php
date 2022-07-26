<?php $user = $this->session->userdata("sitsa"); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Edit Mahasiswa</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('master/mahasiswa/daftar_data_mahasiswa'); ?>" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-list m-r-5"></i> Daftar Data Mahasiswa</a>
            <ol class="breadcrumb">
                <li><a href="#">Master</a></li>             
                <li class="active">Edit Mahasiswa</li>
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
                <form class="form" data-toggle="validator" action="<?php echo site_url('master/mahasiswa/update_data_mahasiswa/' . $edit_data_mahasiswa[0]->id_mhs); ?>" enctype="multipart/form-data" method="post">
                    <h3 class="box-title m-b-0">Formulir Edit Mahasiswa "<?php echo strtoupper($edit_data_mahasiswa[0]->nama_mhs); ?>"</h3>                   
                    <p class="text-muted m-b-20"> Silahkan Edit Kriteria Mahasiswa Disini..</p>
                    <hr>
                    <div class="col-md-12 ">                                      
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group" > 
                                    <label for="namamhs" class="control-label">Nama Mahasiswa *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>                                                        
                                        <input type="text" name="nama_mhs" value="<?php echo strtoupper($edit_data_mahasiswa[0]->nama_mhs); ?>" class="form-control" id="namamhs" placeholder="Inputkan Nama Mahasiwa" required>
                                    </div>                           
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Dita Prayoga"</small>  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" > 
                                    <label for="nimmhs" class="control-label">NIM Mahasiswa *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-id-badge"></i></div>                                  
                                        <input type="number" name="nim_mhs" value="<?php echo $edit_data_mahasiswa[0]->nim_mhs; ?>" class="form-control" id="nimmhs" placeholder="Inputkan NIM Mahasiswa" required>
                                    </div>                           
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "13110049"</small>  
                                </div>
                            </div>  
                            <div class="col-md-3">
                                <div class="form-group" > 
                                    <label for="passmhs" class="control-label">Password Mahasiswa (Sementara)*</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-lock"></i></div>                                  
                                        <input type="text" name="password_mhs" value="<?php echo $edit_data_mahasiswa[0]->password_mhs; ?>" class="form-control" id="passmhs" placeholder="Inputkan Password Mahasiswa" required>
                                    </div>                           
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, (Password Sementara Mahasiswa)</small>  
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fakultasmhs" class="control-label">Fakultas *</label>
                                    <div class="help-block with-errors"></div>
                                    <select class="form-control required" name="id_fakultas_mhs" id="fakultasmhs" required>
                                        <option value="<?php echo $edit_data_mahasiswa[0]->id_fakultas_mhs; ?>"><?php echo strtoupper($edit_data_mahasiswa[0]->nama_fakultas); ?></option>                                       
                                        <?php
                                        if ($user['role_akun'] == 0) {
                                            if (!empty($data_fakultas)) {
                                                foreach ($data_fakultas as $key => $value) {
                                                    ?> 
                                                    <option value="<?php echo $value->id_fakultas; ?>"><?php echo strtoupper($value->nama_fakultas); ?></option>
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                        }
                                        ?>     
                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada silahkan tambahkan di menu Fakultas)</small> 
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prodimhs" class="control-label">Prodi*</label>
                                    <div class="help-block with-errors"></div>
                                    <select class="form-control required" name="id_prodi_mhs" id="prodimhs" required>
                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada silahkan tambahkan di menu Prodi)</small> 
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="emailmhs" class="control-label">Email Mahasiswa *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        <input type="email" value="<?php echo $edit_data_mahasiswa[0]->email_mhs; ?>" name="email_mhs" class="form-control" id="emailmhs" placeholder="Inputkan Email" >
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi</small> 
                                </div>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nohpmhs" class="control-label">Nomor Handphone Mahasiswa *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-android"></i></div>
                                        <input type="number" name="nomor_hp_mhs" value="<?php echo $edit_data_mahasiswa[0]->nomor_hp_mhs; ?>" class="form-control" id="nohpmhs" placeholder="inputkan Nomor Handphone">
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small> 
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="noijazahmhs" class="control-label">Nomor Ijazah Mahasiswa*</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-book"></i></div>
                                        <input type="text" name="nomor_ijazah_mhs" value="<?php echo $edit_data_mahasiswa[0]->nomor_ijazah_mhs; ?>" class="form-control" id="noijazahmhs" placeholder="Inputkan Nomor Ijazah">
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi</small> 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="thnmasukmhs" class="control-label">Tahun Masuk Mahasiswa *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                        <input type="text" name="tahun_masuk_mhs" value="<?php echo $edit_data_mahasiswa[0]->tahun_masuk_mhs; ?>" class="form-control mydatepicker" id="thnmasukmhs" placeholder="Tahun Masuk" required>
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi</small> 
                                </div>
                            </div>  
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="thnlulusmhs" class="control-label">Tahun Lulus Mahasiswa *</label>
                                    <div class="help-block with-errors"></div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-calendar"></i></div>
                                        <input type="text"  name="tahun_lulus_mhs" value="<?php echo $edit_data_mahasiswa[0]->tahun_lulus_mhs; ?>" class="form-control mydatepicker" id="thnlulusmhs" placeholder="Tahun Lulus" required>
                                    </div>
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi</small> 
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

<script>

<?php if ($user['role_akun'] == 2) { ?>
        var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi_sub'); ?>/" +<?php echo $edit_data_mahasiswa[0]->id_fakultas_mhs; ?> + '/' +<?php echo $edit_data_mahasiswa[0]->id_prodi_mhs; ?>;
        $('#prodimhs').load(url2);
<?php } else if ($user['role_akun'] == 1) { ?>
        var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi_edit'); ?>/" +<?php echo $edit_data_mahasiswa[0]->id_fakultas_mhs; ?> + '/' +<?php echo $edit_data_mahasiswa[0]->id_prodi_mhs; ?>;
        $('#prodimhs').load(url2);
<?php } else if ($user['role_akun'] == 0) { ?>
        $(document).ready(function () {
            var id_fak;
            $("#fakultasmhs").change(function () {
                id_fak = $(this).val();
                var url = "<?php echo site_url('master/mahasiswa/add_ajax_prodi/'); ?>" + id_fak;
                $('#prodimhs').load(url);
                return false;
            });
        });
        var url2 = "<?php echo site_url('master/mahasiswa/add_ajax_prodi_edit'); ?>/" +<?php echo $edit_data_mahasiswa[0]->id_fakultas_mhs; ?> + '/' +<?php echo $edit_data_mahasiswa[0]->id_prodi_mhs; ?>;
        $('#prodimhs').load(url2);
<?php } ?>

</script>

