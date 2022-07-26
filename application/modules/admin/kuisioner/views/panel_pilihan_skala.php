<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"> Panel Pilihan Pertanyaan Skala</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="act_back();" class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>

            <ol class="breadcrumb">               
                <li><a href="#"> Panel</a></li>
                <li class="active">Pilihan Pertanyaan Skala</li>
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
            <form class="form" data-toggle="" action="<?php echo site_url('kuisioner/post_panel_skala/' . $get_kuisioner[0]->id_kuisioner . '/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data" method="post">
                <div class="col-md-3 col-lg-3 col-sm-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="white-box">       
                                <input type="text" name="nama_panel" class="form-control m-b-10" value="<?php echo $get_panel[0]->nama_panel; ?>" placeholder="Inputkan Nama Panel Disini" required>
                                <div class="col-md-12 col-xs-12 col-lg-12"> 
                                    <img src="<?php echo base_url('/uploads/data/pil_skala.gif') ?>" alt="user" class="m-t-5 m-b-20 col-md-12 col-xs-12 col-lg-12">                    
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
                            <h3 class="box-title m-b-0">Formulir Pertanyaan Pilihan Skala</h3>
                            <p class="text-muted m-b-20"> Silahkan Isi Formulir Pertanyaan Pilihan Skala Disini..</p>
                            <hr>
                            <div class="col-md-12 ">  
                                <div class="col-md-12">
                                    <div class="form-group" > 
                                        <label for="namamhs" class="control-label">Isi Pertanyaan *</label>
                                        <div class="help-block with-errors"></div>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="ti-comment"></i></div>    
                                            <input type="hidden" name="id_unique" value="<?php echo $get_panel[0]->id_unique; ?>" >
                                            <input type="text" name="pertanyaan" class="form-control"  value="<?php echo $get_panel[0]->pertanyaan; ?>" id="namamhs" placeholder="Inputkan Pertanyaan anda disini" required>
                                        </div>                           
                                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Kenapa Anda Memilih UIN?"</small>  
                                    </div>
                                </div>
                                <?php
                                if (!empty($get_skala)) {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="table-content form-group">
                                            <label for="namamhs" class="control-label">Atur Rentang *</label>
                                            <input type="hidden" name="ukuran_rentang" id="ukuran" value="<?php echo $get_skala[0]->ukuran_rentang; ?>" >
                                            <a class="btn btn-danger remove-col pull-right m-b-10 m-l-10"><i class="fa fa-minus m-r-5"></i>HAPUS</a>
                                            <a class="btn btn-info add-col pull-right m-b-10"><i class="fa fa-plus m-r-5"></i>KOLOM</a>                                        
                                            <table class="table table-responsive text-center" id="table1">
                                                <thead>
                                                    <tr>                                                        
                                                        <th class="text-center">Awal</th>
                                                        <?php for ($x = 1; $x <= $get_skala[0]->ukuran_rentang; $x++) { ?>
                                                            <th class="text-center"> 
                                                                <h4 class="text-center row-limit-skala pull-left font-bold"><?php echo $x; ?></h4>                                                                  
                                                            </th>
                                                        <?php } ?>
                                                        <th  class="text-center">Akhir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>                                                        
                                                        <td>
                                                            <input type="text" name="nama_awal" id="baris" value="<?php echo $get_skala[0]->nama_rentang_awal; ?>" onkeyup="checkValueRealTimeBaris()" class="form-control row-limit " placeholder="Isi Awal" required/>      
                                                        </td>
                                                        <?php for ($x = 1; $x <= $get_skala[0]->ukuran_rentang; $x++) { ?>
                                                            <td>
                                                                <input type="radio" name="1">
                                                            </td>
                                                        <?php } ?>
                                                        <td>
                                                            <input type="text" name="nama_akhir" id="baris" value="<?php echo $get_skala[0]->nama_rentang_akhir; ?>" onkeyup="checkValueRealTimeBaris()" class="form-control row-limit " placeholder="Isi Akhir" required/>      
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="table-content form-group">
                                            <label for="namamhs" class="control-label">Atur Rentang *</label>
                                            <input type="hidden" name="ukuran_rentang" id="ukuran" value="1" >
                                            <a class="btn btn-danger remove-col pull-right m-b-10 m-l-10"><i class="fa fa-minus m-r-5"></i>HAPUS</a>
                                            <a class="btn btn-info add-col pull-right m-b-10"><i class="fa fa-plus m-r-5"></i>KOLOM</a>                                        
                                            <table class="table table-responsive text-center" id="table1">
                                                <thead>
                                                    <tr>                                                        
                                                        <th class="text-center">Awal</th>
                                                        <th class="text-center"> 
                                                            <h4 class="text-center row-limit-skala pull-left font-bold">1</h4>                                                                  
                                                        </th>
                                                        <th  class="text-center">Akhir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>                                                        
                                                        <td>
                                                            <input type="text" name="nama_awal" id="baris"  onkeyup="checkValueRealTimeBaris()" class="form-control row-limit " placeholder="Isi Awal" required/>      
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="1">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="nama_akhir" id="baris" onkeyup="checkValueRealTimeBaris()" class="form-control row-limit " placeholder="Isi Akhir" required/>      
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

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
                                        <button type="submit" id="btn_submit" class="btn btn-success uploadfiles  pull-right "><i class="fa fa-send m-r-5"></i>Simpan</button>
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
    function checkIfArrayIsUnique(myArray) {
        return myArray.length === new Set(myArray).size;
    }

    function checkValueRealTimeBaris() {
        var values = $("input[id='baris']").map(function () {
            return $(this).val().toLowerCase().replace(/ /g, '');
        }).get();

        if (checkIfArrayIsUnique(values)) {
            $('#btn_submit').prop('disabled', false); //TO ENABLE
        } else {
            swal({
                title: "Peringatan!",
                text: "INPUTAN yang diisi TIDAK BOLEH sama",
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

    var count = document.getElementById("ukuran").value;
// add column
    count++;
    $(document).on('click', '.add-col', function () {
        $(this).parent().find('.table thead tr th:nth-child(' + count + ')').after('<th><h4 class="text-center row-limit-skala pull-left font-bold">' + count + '</h4></th>');
        $(this).parent().find('.table tbody tr td:nth-child(' + count + ')').after('<td><input type="radio" name="1"></td>');
        document.getElementById("ukuran").value = count;
        count++;
    });

// remove column
    $(document).on('click', '.remove-col', function (event) {
        // Get index of parent TD among its siblings (add one for nth-child)
        if (count == 2) {
            swal({
                title: "Peringatan!",
                text: "Jumlah KOLOM TIDAK BOLEH kurang dari satu",
                type: "error",
                showCancelButton: false,
                showConfirmButton: true,
                closeOnConfirm: true
            });
        } else {
            // Find all TD elements with the same index

            $('th', event.delegateTarget).remove(':nth-child(' + count + ')');
            $('td', event.delegateTarget).remove(':nth-child(' + count + ')');
            count -= 1;
            document.getElementById("ukuran").value = count - 1;
        }
    });
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
