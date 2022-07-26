<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Mahasiswa</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('master/mahasiswa/add_data_mahasiswa'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Mahasiswa </a>
            <ol class="breadcrumb">               
                <li><a href="#">Master</a></li>
                <li class="active">Daftar Mahasiswa</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Mahasiswa</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-user text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_mahasiswa[0]->mahasiswa; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Kuisioner</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-files text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_mahasiswa[0]->kuisioner; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Fakultas</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-home text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_mahasiswa[0]->fakultas; ?></span> data</li>
                </ul>
            </div>
        </div>   
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Prodi</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-tag text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_mahasiswa[0]->prodi; ?></span> data</li>
                </ul>
            </div>
        </div>  
    </div>
    <!-- /.row -->
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Mahasiswa</h3>
                <p class="text-muted m-b-20">Berikut ini merupakan daftar Mahasiswa</p>
                <a data-target=".import" data-toggle="modal" > 
                    <button type="button" class="btn waves-effect waves-light btn-sm btn-info m-b-15"><i class="fa fa-download"></i> Import Data</button>
                </a>
                <form class="pull-right" id="frm-delete" enctype="application/x-www-form-urlencoded" onsubmit="return false" method="POST">  
                    <input type="text" id="id_check_delete" class="form-control" value="" name="data_check" style="display:none">                         
                    <div>
                        <button type="submit" class="btn waves-effect waves-light btn-sm btn-danger m-b-15 m-l-30"><i class="fa fa-close"></i> Hapus Data</button>
                    </div>
                </form>
                <form class="pull-right" id="frm-email" enctype="application/x-www-form-urlencoded" onsubmit="return false" method="POST">  
                    <input type="text" id="id_check_email" class="form-control" value="" name="data_check" style="display:none">                         
                    <div>
                        <button type="submit" class="btn waves-effect waves-light btn-sm btn-info m-b-15 m-l-10"><i class="fa fa-envelope"></i> Kirim Email</button>
                    </div>
                </form>

                <form class="pull-right" id="frm-excel" target="_blank" action="<?php echo site_url('laporan/export_data_mahasiwa'); ?>" method="POST">  
                    <input type="text" id="id_check_excel" class="form-control" value="" name="data_check" style="display:none">                         
                    <div>
                        <button type="submit" class="btn waves-effect waves-light btn-sm btn-success m-b-15 " ><i class="fa fa-file-text"></i> Export Excel</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="table_mhs" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 40px;"></th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM Mahasiswa</th>                               
                                <th>Nomor HP</th>                               
                                <th>Tahun Lulus</th>
                                <th>Status Kuisioner</th>
                                <th>Email Terkirim</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 40px; visibility:hidden;"></th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM Mahasiswa</th>                                            
                                <th>Nomor HP</th>                               
                                <th>Tahun Lulus</th>
                                <th>Status Kuisioner</th>
                                <th>Email Terkirim</th>
                                <th class="clear-td">Aksi</th>                                
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<div class="modal bs-example-modal-lg  fade import" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content  modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Import Data Mahasiswa</h4>
                <small>Silahkan Menambahkan/Import Data Mahasiswa</small>
            </div>
            <form class="form" action="<?php echo site_url('master/mahasiswa/import_data_mahasiwa'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">    
                    <div class="form-group col-12 row text-center">
                        <h4 class="text-danger text-center">SEBELUM MENGUPLOAD DIHARAPKAN MENGEDIT FILE .CSV SESUAI CONTOH FORMAT HEADER & ISI CSV DIBAWAH INI  !!!</h4>
                        <img class="m-t-10 m-b-10 m-l-20 text-center" src="<?php echo base_url() . 'uploads/data/excel_format.png'; ?>" alt="user" height="75" width="700">
                        <p class="m-t-5 text-center">Silahkan <b>MENGOSONGKAN ISI</b> header kolom pada daftar .csv Mahasiswa, jika header <b>TIDAK SESUAI</b> dengan file anda</p>                    
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Fakultas, Prodi & Password</label>
                        <div class="col-4">
                            <select class="form-control required" name="id_fakultas_mhs" id="fakultasmhs" required>
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
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada, silahkan tambah Fakultas)</small> 
                        </div>
                        <div class="col-4">
                            <select class="form-control required" name="id_prodi_mhs" id="prodimhs" required>
                                <option value="">Pilih Prodi</option>

                            </select>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada, silahkan tambah Prodi)</small> 
                        </div>
                        <div class="col-2">                           
                            <input type="text" name="password_mhs" class="form-control" id="passmhs" placeholder="Password" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (Password Sementara)</small> 
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">File Import</label>
                        <div class="col-10">
                            <div class="input-group">
                                <input type="file" id="input-file-now" name="import_data_mhs" class="dropify" data-max-file-size="10M" data-allowed-file-extensions="xls csv xlsx"/>
                            </div>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berextensi csv, xls, xlsx dan berukuran dibawah 10Mb"</small>  
                        </div>
                    </div>                                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(function () {

        $('#table_mhs tfoot th').each(function () {
            $(this).html('<input type="text" placeholder="Filter Data" />');
        });

        var table = $('#table_mhs').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value)
                                    .draw();
                        }
                    });
                });
            },
            "searchable": true,
            "processing": true,
            //"serverSide": true,
            "ajax": {
                "url": '<?php echo site_url('datatable/datatable/mahasiswa'); ?>',
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columns": [
                {"data": "id_mhs", "name": "id_mhs"},
                {"data": "nama_mhs", "name": "nama_mhs"},
                {"data": "nim_mhs", "name": "nim_mhs"},
                {"data": "nomor_hp_mhs", "render": function (data, type, row) {
                        var exp = '0' + data;
                        return exp;
                    }, "name": "nomor_hp_mhs"},
                {"data": "tahun_lulus_mhs", "name": "tahun_lulus_mhs"},
                {"data": "status_isian_kuisioner", "render": function (data, type, row) {
                        var exp = '';
                        if (data == '1') {
                            exp = '<span class="label label-warning"><b>PROSES MENGISI</b></span>';
                        } else if (data == '2') {
                            exp = '<span class="label label-success"><b>SUDAH MENGISI</b></span>';
                        } else {
                            exp = '<span class="label label-danger"><b>BELUM MENGISI</b></span>';
                        }
                        return exp;
                    }, "name": "status_isian_kuisioner"},
                {"data": "tanggal_kirim_email", "render": function (data, type, row) {
                        var hasil = convertDate(data);
                        var exp = '';
                        if (data == null) {
                            exp = '<span class="label label-danger"><b>BELUM TERKIRIM</b></span>';
                        } else {
                            if (hasil > 0) {
                                exp = '<span class="label label-warning"><b>' + hasil + '</b> HARI LALU</span>';
                            } else if (hasil == 0) {
                                exp = '<span class="label label-success"><b>HARI INI</b></span>';
                            }
                        }
                        return exp;
                    }, "name": "tanggal_kirim_email"},
                {"data": "view_button", "name": "id_mhs"}
            ],
            'columnDefs': [
                {
                    orderable: false,
                    targets: 0,
                    checkboxes: {
                        'selectRow': false
                    }
                }
            ],
            order: []
        });

        $('#frm-excel').on('submit', function (e) {
            var rows_selected = table.column(0).checkboxes.selected();
            // Iterate over all selected checkboxes           
            document.getElementById('id_check_excel').value = rows_selected.join(",");
            log.e(rows_selected.join(","));
            e.preventDefault();
        });


        $('#frm-email').on('submit', function (e) {
            var rows_selected = table.column(0).checkboxes.selected();
            // Iterate over all selected checkboxes           
            document.getElementById('id_check_email').value = rows_selected.join(",");
            if (rows_selected.join(",") == '' || rows_selected.join(",") == null) {
                swal("Pemberitahuan!", "Anda belum memilih data, silahkan pilih data terlebih dahulu.", "error");
                //swal.close();
            } else {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Apakah anda yakin ingin mengirim Email untuk Mahasiswa yang Anda pilih?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, kirim!",
                    cancelButtonText: "Tidak, batal!",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    showLoaderOnConfirm: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo site_url('mailer/mail/send_email'); ?>',
                            data: $('#frm-email').serialize(),
                            success: function (result) {
                                swal("Terkirim!", "Email telah dikirimkan kepada Mahasiswa yang dipilih.", "success");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            },
                            error: function (result) {
                                swal("Opsss!", "No Network connection.", "error");
                            }
                        });

                    } else {
                        swal("Dibatalkan", "Pengiriman email ke Mahasiswa telah dibatalkan.", "error");
                    }
                });
            }
        });

        $('#frm-delete').on('submit', function (e) {
            var rows_selected = table.column(0).checkboxes.selected();
            // Iterate over all selected checkboxes           
            document.getElementById('id_check_delete').value = rows_selected.join(",");

            if (rows_selected.join(",") == '' || rows_selected.join(",") == null) {
                swal("Pemberitahuan!", "Anda belum memilih data, silahkan pilih data terlebih dahulu.", "error");
            } else {
                swal({
                    title: "Apakah anda yakin?",
                    text: "Apakah anda yakin ingin menghapus data Mahasiswa yang terpilih ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batal!",
                    showLoaderOnConfirm: false,
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            type: 'post',
                            url: '<?php echo site_url('master/mahasiswa/delete_data_mahasiswa_terpilih'); ?>',
                            data: $('#frm-delete').serialize(),
                            success: function (result) {
                                swal("Terhapus!", "Data Mahasiswa yang terpilih telah terhapus.", "success");
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            },
                            error: function (result) {
                                swal("Opsss!", "No Network connection.", "error");
                            }
                        });

                    } else {
                        swal("Dibatalkan", "Hapus data Mahasiswa telah dibatalkan.", "error");
                    }
                });
            }
        });
    });

    function convertDate(date_string) {

        var expiration = moment(date_string).format("YYYY-MM-DD");
        var current_date = moment().format("YYYY-MM-DD");
        var days = moment(expiration).diff(current_date, 'days');
        return days *= -1;
    }
</script>

<script>

    function act_delete_mahasiswa(object) {
        var name = $('#' + object).val();
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Mahasiswa atas nama " + name.toUpperCase() + " ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Tidak, batal!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: "<?php echo site_url("master/mahasiswa/delete_data_mahasiswa") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Mahasiswa atas nama " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        console.log(result);
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Mahasiswa atas nama " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        var id_fak;
        $("#fakultasmhs").change(function () {
            id_fak = $(this).val();
            var url = "<?php echo site_url('master/mahasiswa/add_ajax_prodi'); ?>/" + id_fak;
            $('#prodimhs').load(url);
            return false;
        })
    });
</script>