<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"> Panel Upload File</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="act_back();" class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>

            <ol class="breadcrumb">               
                <li><a href="#"> Panel</a></li>
                <li class="active">Pilihan Pertanyaan Upload</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-md-12">
            <form class="form" data-toggle="" action="<?php echo site_url('kuisioner/post_panel_upload/' . $get_kuisioner[0]->id_kuisioner . '/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data" method="post">
                <div class="col-md-3 col-lg-3 col-sm-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">       
                                <input type="text" name="nama_panel" class="form-control m-b-10" value="<?php echo $get_panel[0]->nama_panel; ?>" placeholder="Inputkan Nama Panel Disini" required>
                                <div class="col-md-12 col-xs-12 col-lg-12"> 
                                    <img src="<?php echo base_url('/uploads/data/pil_upload.gif') ?>" alt="user" class="m-t-5 m-b-20 col-md-12 col-xs-12 col-lg-12">                    
                                </div>
                                <h4><i class="ti-file uppercase"></i> <?php echo strtoupper($get_kuisioner[0]->nama_kuisioner); ?></h4>
                                <?php if ($get_kuisioner[0]->tipe_kuisioner == 1) { ?>
                                    <span class="label label-warning">BERURUTAN</span> 
                                <?php } else { ?>
                                    <span class="label label-success">BERANTAI</span>
                                <?php } ?>
                                <hr>
                                <small><?php echo $get_kuisioner[0]->deskripsi_kuisioner; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9 col-sm-7">
                    <div class="row">
                        <div class="white-box col-md-12">
                            <h3 class="box-title m-b-0">Formulir Pertanyaan Upload File</h3>
                            <p class="text-muted m-b-20"> Silahkan Isi Formulir Pertanyaan Upload File Disini..</p>
                            <hr>
                            <div class="col-md-12 ">                                      
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group" > 
                                            <label for="namamhs" class="control-label">Isi Pertanyaan *</label>
                                            <div class="help-block with-errors"></div>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-comment"></i></div>   
                                                <input type="hidden" name="id_unique" value="<?php echo $get_panel[0]->id_unique; ?>" >
                                                <input type="text" name="pertanyaan" value="<?php echo $get_panel[0]->pertanyaan; ?>" class="form-control" id="namamhs" placeholder="Inputkan Pertanyaan anda disini" required>
                                            </div>                           
                                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Kenapa Anda Memilih UIN?"</small>  
                                        </div>
                                    </div> 
                                </div>
                                <?php
                                if (!empty($get_upload)) {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group"> 
                                                <label class="col-form-label">Contoh Teks Jawaban Kuisioner</label>
                                                <div class="">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-link"></i></div>                                              
                                                        <input type="text" name="format_file" value="<?php echo $get_upload[0]->format_file; ?>" class="form-control" id="namamhs" placeholder="Inputkan Tipe File disini" required>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: pdf jgp zip</small> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"> 
                                                <label for="namamhs" class="control-label">Ukuran File *</label>
                                                <div class="help-block with-errors"></div>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-link"></i></div>                                              
                                                    <input type="number" min="1" name="ukuran_file" value="<?php echo $get_upload[0]->ukuran_file; ?>" class="form-control" id="namamhs" placeholder="Inputkan Ukuran File disini" required>
                                                </div>                           
                                                <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, (Mb)</small>  
                                            </div>
                                        </div>     
                                    </div>   
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group"> 
                                                <label class="col-form-label">Contoh Teks Jawaban Kuisioner</label>
                                                <div class="">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="ti-link"></i></div>                                              
                                                        <input type="text" name="format_file" class="form-control" id="namamhs" placeholder="Inputkan Ukuran File disini" required>
                                                    </div>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, Contoh: .pdf,.jgp,.zip</small> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"> 
                                                <label for="namamhs" class="control-label">Ukuran File *</label>
                                                <div class="help-block with-errors"></div>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="ti-link"></i></div>                                              
                                                    <input type="number" min="1" name="ukuran_file" class="form-control" id="namamhs" placeholder="Inputkan Ukuran File disini" required>
                                                </div>                           
                                                <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, (Mb)</small>  
                                            </div>
                                        </div>     
                                    </div>   
                                <?php }
                                ?> 
                                <div class="col-md-12">
                                    <div class="form-group">                                                                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <b>WAJIB DIISI:</b>
                                                <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                                                    <input type="checkbox" class="inputan pull-left" checked data-toggle="switch" name="status_panel" data-size="small" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                <?php } else { ?>
                                                    <input type="checkbox" class="inputan pull-left" data-toggle="switch" name="status_panel" data-size="small" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <b class="">PANEL BERIKUTNYA KE:</b>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <select class="form-control required " name="panel_lanjutan" required>
                                                    <option value="">PILIH PANEL</option>                                              
                                                    <?php if ($get_panel[0]->panel_tujuan == '0') { ?>
                                                        <option selected value="0">*NANTI SAJA</option>
                                                    <?php } else { ?>
                                                        <option value="0">*NANTI SAJA</option>
                                                    <?php } ?>
                                                    <?php
                                                    if (!empty($get_all_panel_excpt)) {
                                                        foreach ($get_all_panel_excpt as $keys => $all_panel) {
                                                            if ($all_panel->id_panel == $get_panel[0]->panel_tujuan) {
                                                                ?> 
                                                                <option selected value="<?php echo $all_panel->id_panel; ?>"><?php echo strtoupper($all_panel->nama_panel); ?></option>    
                                                            <?php } else { ?>
                                                                <option value="<?php echo $all_panel->id_panel; ?>"><?php echo strtoupper($all_panel->nama_panel); ?></option>    
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>   
                                                    <?php if ($get_panel[0]->panel_tujuan == 'end') { ?>
                                                        <option selected value="end">AKHIRI PANEL</option>
                                                    <?php } else { ?>
                                                        <option value="end">AKHIRI PANEL</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success uploadfiles  pull-right "><i class="fa fa-send m-r-5"></i>Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<script>
    function act_back() {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin meninggalkan halaman ini? (pastikan data telah disimpan)",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, keluar!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                window.open("<?php echo site_url('kuisioner/detail_kuisioner/' . $get_kuisioner[0]->id_kuisioner); ?>", "_self")
            } else {
                swal("Dibatalkan", "Anda batal meninggalkan halaman.", "error");
            }
        });
    }
</script>
<script>
    var rek = $(".inputan").bootstrapSwitch();
    rek.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            swal({
                title: "Apakah anda yakin?",
                text: "Apakah anda yakin ingin menjadikan pertanyaaan WAJIB DIISI?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, setuju!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("kuisioner/edit_status_required_panel") ?>",
                        data: {id: '<?php echo $get_panel[0]->id_panel; ?>', value: 'required'},
                        dataType: 'html',
                        success: function (result) {
                            rek.bootstrapSwitch('state', true);
                            swal("Berhasil!", "Pertanyaan WAJIB DIISI anda telah diaktifkan.", "success");
                        },
                        error: function (result) {
                            swal("Opsss!", "No Network connection.", "error");
                        }
                    });
                } else {
                    rek.bootstrapSwitch('state', false);
                    swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                }

            });
        } else {
            swal({
                title: "Apakah anda yakin?",
                text: "Apakah anda yakin ingin menonaktifkan pertanyaaan WAJIB DIISI?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, setuju!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo site_url("kuisioner/edit_status_required_panel") ?>",
                        data: {id: '<?php echo $get_panel[0]->id_panel; ?>', value: ''},
                        dataType: 'html',
                        success: function (result) {
                            rek.bootstrapSwitch('state', false);
                            swal("Berhasil!", "Pertanyaan WAJIB DIISI anda telah dinonaktifkan.", "success");
                        },
                        error: function (result) {
                            swal("Opsss!", "No Network connection.", "error");
                        }
                    });
                } else {
                    rek.bootstrapSwitch('state', true);
                    swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                }
            });
        }
    });
</script>