
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"> Panel Pilihan Pertanyaan Tunggal</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="act_back();" class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>

            <ol class="breadcrumb">               
                <li><a href="#"> Panel</a></li>
                <li class="active">Pilihan Pertanyaan Tunggal</li>
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
            <form class="form" data-toggle="" action="<?php echo site_url('kuisioner/post_panel_pilihan_tunggal/' . $get_kuisioner[0]->id_kuisioner . '/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data" method="post">
                <div class="col-md-3 col-lg-3 col-sm-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">       
                                <input type="text" name="nama_panel" class="form-control m-b-10" value="<?php echo $get_panel[0]->nama_panel; ?>"  placeholder="Inputkan Nama Panel Disini" required>
                                <div class="col-md-12 col-xs-12 col-lg-12"> 
                                    <img src="<?php echo base_url('/uploads/data/pil_tunggal.gif') ?>" alt="user" class="m-t-5 m-b-20 col-md-12 col-xs-12 col-lg-12">                    
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
                            <h3 class="box-title m-b-0">Formulir Pertanyaan Pilihan Tunggal</h3>
                            <p class="text-muted m-b-20"> Silahkan Isi Formulir Pertanyaan Pilihan Tunggal Disini..</p>
                            <hr>
                            <div class="col-md-12 ">  
                                <div class="col-md-12 ">  
                                    <div class="col-md-12">
                                        <div class="form-group" > 
                                            <label for="namamhs" class="control-label">Isi Pertanyaan *</label>
                                            <div class="help-block with-errors"></div>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-comment"></i></div>   
                                                <input type="hidden" name="id_unique" value="<?php echo $get_panel[0]->id_unique; ?>" >
                                                <input type="text" name="pertanyaan" class="form-control" value="<?php echo $get_panel[0]->pertanyaan; ?>" placeholder="Inputkan Pertanyaan anda disini" required>
                                            </div>                           
                                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Kenapa Anda Memilih UIN?"</small>  
                                        </div>
                                    </div>  
                                </div> 
                                <div id="dynamic_field">
                                    <?php
                                    $i = 1;
                                    $len = count($get_opsi_tunggal);
                                    if (!empty($get_opsi_tunggal)) {
                                        foreach ($get_opsi_tunggal as $key => $value) {
                                            ?> 
                                            <div id="row<?php echo $i; ?>">
                                                <div class="col-md-12">
                                                    <div class="col-md-8">
                                                        <div class="form-group" > 
                                                            <?php if ($key == 0) { ?>
                                                                <label for="namamhs" class="control-label">Isi Opsi *</label>
                                                            <?php } ?>
                                                            <div class="help-block with-errors"></div>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><input type="radio" name="radio" id="radio"></div>                                                        
                                                                <input type="text" name="opsi[]" onkeyup="checkValueRealTime()" value="<?php echo $value->opsi; ?>" class="form-control" id="namamhs" placeholder="Inputkan Opsi anda disini" required>
                                                            </div>                           
                                                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Universitas Islami."</small>  
                                                        </div>
                                                    </div>     
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <?php if ($key == 0) { ?>
                                                                <label for="fakultasmhs" class="control-label">Pilih Panel Tujuan</label>
                                                            <?php } ?>
                                                            <div class="help-block with-errors"></div>
                                                            <select class="form-control required" disabled name="panel_tujuan[]" required>
                                                                <option value="">Pilih Panel</option>
                                                                <?php if ($value->panel_tujuan == '0') { ?>
                                                                    <option selected value="0">*NANTI SAJA</option>
                                                                <?php } else { ?>
                                                                    <option value="0">*NANTI SAJA</option>
                                                                <?php } ?>
                                                                <?php
                                                                if (!empty($get_all_panel_excpt)) {
                                                                    foreach ($get_all_panel_excpt as $keys => $all_panel) {
                                                                        if ($all_panel->id_panel == $value->panel_tujuan) {
                                                                            ?> 
                                                                            <option selected value="<?php echo $all_panel->id_panel; ?>"><?php echo strtoupper($all_panel->nama_panel); ?></option>    
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $all_panel->id_panel; ?>"><?php echo strtoupper($all_panel->nama_panel); ?></option>    
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                            <small class="form-text"><b class="text-danger">*WAJIB </b>dipilih</small> 
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-1"> 
                                                        <?php if ($key == 0) { ?>
                                                            <div class="form-group m-t-20">
                                                                <label class="control-label"></label>
                                                                <button type="button" name="add" id="add" class="btn btn-success m-t-7"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="form-group">
                                                                <label class="control-label"></label>
                                                                <button type="button" name="remove" id="<?php echo $i ?>" class="btn btn-danger btn_remove m-t-2"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $i++;
                                        }  //ngatur nomor urut
                                    } else {
                                        ?>
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <div class="form-group" > 
                                                    <label for="namamhs" class="control-label">Isi Opsi *</label>
                                                    <div class="help-block with-errors"></div>
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><input type="radio" name="radio" id="radio"></div>                                                        
                                                        <input type="text" name="opsi[]" class="form-control" id="namamhs" placeholder="Inputkan Opsi anda disini" required>
                                                    </div>                           
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Universitas Islami."</small>  
                                                </div>
                                            </div>     
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="fakultasmhs" class="control-label">Pilih Panel Tujuan</label>
                                                    <div class="help-block with-errors"></div>
                                                    <select class="form-control required" disabled name="panel_tujuan[]" id="tujuan" required>
                                                        <option value="">Pilih Panel</option>                                       
                                                    </select>
                                                    <small class="form-text"><b class="text-danger">*WAJIB </b>dipilih</small> 
                                                </div>
                                            </div> 
                                            <div class="col-md-1"> 
                                                <div class="form-group m-t-20">
                                                    <label class="control-label"></label>
                                                    <button type="button" name="add" id="add" class="btn btn-success m-t-7"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>     
                                </div>
                                <div id="panel_opsi_lainnya">
                                    <div class="col-md-12">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon"><input type="radio" name="radio" id="radio"></div>                                                        
                                                    <input type="text" name="opsi[]" value="Lainnya" class="form-control" id="opsi_tujuan_lanjutan1" placeholder="Inputkan Opsi anda disini" readonly="">
                                                </div>   
                                            </div>   
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">                                            
                                                <select class="form-control required" disabled name="panel_tujuan[]" id="opsi_tujuan_lanjutan2" required>
                                                    <option value="">Pilih Panel</option>                                                    
                                                    <?php if ($get_tujuan_lainnya_tunggal[0]->panel_tujuan == '0') { ?>
                                                        <option selected value="0">*NANTI SAJA</option>
                                                    <?php } else { ?>
                                                        <option value="0">*NANTI SAJA</option>
                                                    <?php } ?>
                                                    <?php
                                                    if (!empty($get_all_panel_excpt)) {
                                                        foreach ($get_all_panel_excpt as $keys => $all_panel) {
                                                            if ($all_panel->id_panel == $get_tujuan_lainnya_tunggal[0]->panel_tujuan) {
                                                                ?> 
                                                                <option selected value="<?php echo $all_panel->id_panel; ?>"><?php echo strtoupper($all_panel->nama_panel); ?></option>    
                                                            <?php } else { ?>
                                                                <option value="<?php echo $all_panel->id_panel; ?>"><?php echo strtoupper($all_panel->nama_panel); ?></option>    
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <small class="form-text"><b class="text-danger">*WAJIB </b>dipilih</small> 
                                            </div>
                                        </div> 
                                    </div>
                                </div>
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
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <b class="m-l-20">JAWABAN SEBAGAI TUJUAN:</b> 
                                                <?php if ($get_panel[0]->status_jawaban_panel == 1) { ?>
                                                    <input type="checkbox" class="jawaban" checked data-toggle="switch" name="status_jawaban" data-size="small" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                <?php } else { ?>
                                                    <input type="checkbox" class="jawaban" data-toggle="switch" name="status_jawaban" data-size="small" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <b>AKTIFKAN OPSI LAINNYA:</b>
                                                    <?php if ($get_panel[0]->opsi_lainnya == '1') { ?>
                                                        <input type="checkbox" class="opsi_lainnya pull-left" checked data-toggle="switch" name="opsi_lainnya" data-size="small" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                    <?php } else { ?>
                                                        <input type="checkbox" class="opsi_lainnya pull-left" data-toggle="switch" name="opsi_lainnya" data-size="small" data-on-text="YA" data-off-text="TIDAK" data-on-color="success" data-off-color="default">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <b class="">PANEL BERIKUTNYA KE:</b>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
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
                                    <div class="form-group">                                     
                                        <button type="submit" id="btn_submit" class="btn btn-success uploadfiles m-t-10 pull-right"><i class="fa fa-send m-r-5"></i>Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.row -->
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
<script type="text/javascript">
    $(document).ready(function () {
        get_panel();
        function get_panel() {
            var url = "<?php echo site_url('kuisioner/get_panel_ajax/' . $get_panel[0]->id_panel . "/" . $get_kuisioner[0]->id_kuisioner); ?>";
            $('[id=tujuan]').load(url);
            $('#add_select').load(url);
        }
        get_panel_add();
        function get_panel_add(no) {
            var url = "<?php echo site_url('kuisioner/get_panel_ajax/' . $get_panel[0]->id_panel . "/" . $get_kuisioner[0]->id_kuisioner); ?>";
            $('.add_' + no).load(url);
        }

        var opsi_jawaban_panel = $('select[name="panel_tujuan[]"]');
        var opsi_panel_lanjutan = $('select[name="panel_lanjutan"]');

        if (<?php echo $get_panel[0]->status_jawaban_panel ?> == 1) {
            var disable_opsi = '';
            opsi_jawaban_panel.prop('disabled', false);
            opsi_panel_lanjutan.prop('disabled', true);
        } else {
            var disable_opsi = 'disabled';
            opsi_jawaban_panel.prop('disabled', true);
            opsi_panel_lanjutan.prop('disabled', false);
        }

        var i = <?php echo $len ?>;

        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<div id="row' + i + '"><div class="col-md-12"><div class="col-md-8"><div class="form-group"><div class="help-block with-errors"></div><div class="input-group"><div class="input-group-addon"><input type="radio" name="radio" id="radio"></div> <input type="text" name="opsi[]" onkeyup="checkValueRealTime()" class="form-control" id="namamhs" placeholder="Inputkan Opsi anda disini" required></div><small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Universitas Islami"</small></div></div><div class="col-md-3"><div class="form-group"><div class="help-block with-errors"></div><select class="form-control required add_' + i + '" name="panel_tujuan[]" id="add_select" required ' + disable_opsi + '><option value="">Pilih Panel</option></select><small class="form-text"><b class="text-danger">*WAJIB</b> dipilih</small> </div></div> <div class="col-md-1"> <div class="form-group"><label class="control-label"></label><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove m-t-2"><i class="fa fa-trash"></i></button></div></div></div></div>');
            get_panel_add(i);
        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            swal({
                title: "Apakah anda yakin?",
                text: "Apakah anda yakin ingin menghapus OPSI ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batal!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    $('#row' + button_id + '').remove();
                    $('#' + button_id + '').remove();
                    swal("Berhasil!", "Opsi Anda telah dihapus.", "success");
                } else {
                    swal("Dibatalkan", "Opsi Anda batal dihapus.", "error");
                }
            });
        });

        var jwb = $(".jawaban").bootstrapSwitch();
        jwb.on("switchChange.bootstrapSwitch", function (event, state) {
            if (state == true) {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Apakah anda yakin ingin menjadikan OPSI sebagai PANEL TUJUAN?",
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
                            url: "<?php echo site_url("kuisioner/edit_status_jawaban_panel") ?>",
                            data: {id: '<?php echo $get_panel[0]->id_panel; ?>', value: '1'},
                            dataType: 'html',
                            success: function (result) {
                                opsi_jawaban_panel.prop('disabled', false);
                                opsi_panel_lanjutan.prop('disabled', true);
                                opsi_panel_lanjutan.val("");
                                $('[id=add_select]').val("");
                                disable_opsi = '';
                                $('[id=add_select]').slice(0).prop("disabled", false);
                                jwb.bootstrapSwitch('state', true);
                                swal("Berhasil!", "Opsi sebagai PANEL TUJUAN telah diaktifkan.", "success");

                            },
                            error: function (result) {
                                swal("Opsss!", "No Network connection.", "error");
                            }
                        });
                    } else {
                        jwb.bootstrapSwitch('state', false);
                        swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                    }

                });
            } else {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Apakah anda yakin ingin menonaktifkan OPSI sebagai PANEL TUJUAN?",
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
                            url: "<?php echo site_url("kuisioner/edit_status_jawaban_panel") ?>",
                            data: {id: '<?php echo $get_panel[0]->id_panel; ?>', value: '0'},
                            dataType: 'html',
                            success: function (result) {
                                opsi_jawaban_panel.prop('disabled', true);
                                opsi_panel_lanjutan.prop('disabled', false);
                                opsi_jawaban_panel.val("");
                                $('[id=add_select]').val("");
                                disable_opsi = 'disabled';
                                $('[id=add_select]').slice(0).prop("disabled", true);
                                jwb.bootstrapSwitch('state', false);
                                swal("Berhasil!", "Opsi sebagai PANEL TUJUAN telah dinonaktifkan.", "success");
                            },
                            error: function (result) {
                                swal("Opsss!", "No Network connection.", "error");
                            }
                        });
                    } else {
                        jwb.bootstrapSwitch('state', true);
                        swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                    }
                });
            }
        });
    });

</script>

<script>
    function checkIfArrayIsUnique(myArray) {
        return myArray.length === new Set(myArray).size;
    }

    function checkValueRealTime() {
        var values = $("input[name='opsi[]']").map(function () {
            return $(this).val().toLowerCase().replace(/ /g, '');
        }).get();

        if (checkIfArrayIsUnique(values)) {
            $('#btn_submit').prop('disabled', false); //TO ENABLE
        } else {
            swal({
                title: "Peringatan!",
                text: "Kolom OPSI yang diisi TIDAK BOLEH sama",
                type: "error",
                showCancelButton: false,
                showConfirmButton: true,
                closeOnConfirm: true
            });
            $('#btn_submit').prop('disabled', true); //TO DISABLED 
        }
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

<script>
    var panel_opsi_lainnya = $('#panel_opsi_lainnya');

    var opsi1 = $('#opsi_tujuan_lanjutan1');
    var opsi2 = $('#opsi_tujuan_lanjutan2');

    if (<?php echo $get_panel[0]->opsi_lainnya ?> == 1) {
        panel_opsi_lainnya.prop('disabled', false);
        panel_opsi_lainnya.show();
    } else {
        panel_opsi_lainnya.prop('disabled', true);
        panel_opsi_lainnya.hide();
    }

    var opsi = $(".opsi_lainnya").bootstrapSwitch();
    opsi.on("switchChange.bootstrapSwitch", function (event, state) {
        if (state == true) {
            swal({
                title: "Apakah anda yakin?",
                text: "Apakah anda yakin ingin menambahkan OPSI LAINNYA?",
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
                        url: "<?php echo site_url("kuisioner/edit_opsi_lainnya") ?>",
                        data: {id: '<?php echo $get_panel[0]->id_panel; ?>', status: '1', value: 'Lainnya', tipe: '<?php echo $get_panel[0]->tipe_panel; ?>'},
                        dataType: 'html',
                        success: function (result) {
                            panel_opsi_lainnya.show();
                            opsi1.prop('disabled', false);

                            opsi.bootstrapSwitch('state', true);
                            swal("Berhasil!", "Opsi Lainnya telah ditambahkan.", "success");
                        },
                        error: function (result) {
                            swal("Opsss!", "No Network connection.", "error");
                        }
                    });
                } else {
                    opsi.bootstrapSwitch('state', false);
                    swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                }

            });
        } else {
            swal({
                title: "Apakah anda yakin?",
                text: "Apakah anda yakin ingin menghapus OPSI LAINNYA?",
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
                        url: "<?php echo site_url("kuisioner/edit_opsi_lainnya") ?>",
                        data: {id: '<?php echo $get_panel[0]->id_panel; ?>', status: '0', value: 'Lainnya', tipe: '<?php echo $get_panel[0]->tipe_panel; ?>'},
                        dataType: 'html',
                        success: function (result) {
                            opsi.bootstrapSwitch('state', false);
                            opsi1.prop('disabled', true);
                            opsi2.prop('disabled', true);
                            panel_opsi_lainnya.hide();
                            swal("Berhasil!", "Opsi Lainnya telah dihapus.", "success");
                        },
                        error: function (result) {
                            swal("Opsss!", "No Network connection.", "error");
                        }
                    });
                } else {
                    opsi.bootstrapSwitch('state', true);
                    swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                }
            });
        }
    });
</script>