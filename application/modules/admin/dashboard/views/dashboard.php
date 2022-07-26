<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Dashboard Kuisioner</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">Statistik Kuisioner</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="row row-in">
                <div class="col-lg-2 col-sm-6 row-in-br">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="f" class="linea-icon linea-basic"></i>
                            <h5 class="text-muted vb">TOTAL MAHASISWA</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-danger"><?php echo $jumlah[0]->mahasiswa; ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->mahasiswa; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 row-in-br  b-r-none">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="f"></i>
                            <h5 class="text-muted vb">TOTAL KUISIONER</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-megna"><?php echo $jumlah[0]->kuisioner; ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->kuisioner; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 row-in-br">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="f"></i>
                            <h5 class="text-muted vb">TOTAL FAKULTAS</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-primary"><?php echo $jumlah[0]->fakultas; ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->fakultas; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6  b-0">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="f"></i>
                            <h5 class="text-muted vb">TOTAL PRODI</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-success"><?php echo $jumlah[0]->prodi; ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->prodi; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6  b-0">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="f"></i>
                            <h5 class="text-muted vb">TOTAL LAPORAN</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-warning"><?php echo $jumlah[0]->laporan; ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->laporan; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6  b-0">
                    <div class="col-in row">
                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="f"></i>
                            <h5 class="text-muted vb">TOTAL SARAN</h5>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3 class="counter text-right m-t-15 text-info"><?php echo $jumlah[0]->saran; ?></h3>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $jumlah[0]->saran; ?>" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Mahasiswa Duplikat</h3>
                <p class="text-muted m-b-15">Berikut merupakan daftar data mahasiswa yang terduplikat</p>
                <div class="table-responsive">
                    <table id="mhs_dup" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <th>NIM Mahasiswa</th>
                                <th>Nomor Ijazah</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th>Tahun Lulus</th>
                                <th>Status Kuisioner</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($duplikat_nim)) {
                                foreach ($duplikat_nim as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->nama_mhs; ?></td>
                                        <td><?php echo $value->nim_mhs; ?></td>
                                        <td><?php echo $value->nomor_ijazah_mhs; ?></td>
                                        <td><?php echo $value->email_mhs; ?></td>
                                        <td><?php echo $value->nomor_hp_mhs; ?></td>
                                        <td><?php echo $value->tahun_lulus_mhs; ?></td>
                                        <td>
                                            <?php if ($value->status_isian_kuisioner == 0) { ?>
                                                <span class="label label-danger"><b>BELUM DIISI</b></span>
                                            <?php } else { ?>
                                                <span class="label label-success"><b>SUDAH DIISI</b></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a onclick="act_delete_mahasiswa(<?php echo $value->id_mhs; ?>, '<?php echo strtoupper($value->nama_mhs); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                    </tr>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
</div>
<div class="modal fade bs-example-modal-lg modal-list-visitor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Daftar Visitor Website</h4>
                <small>Tabel Berikut Merupakan Rekap Semua Visitor</small>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="pesanan" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>IP Address</th>
                                <th>User Agent</th>
                                <th>Requested URL</th>
                                <th>Time Visit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>IP Address</th>
                                <th>User Agent</th>
                                <th>Requested URL</th>
                                <th>Time Visit</th>
                                <th class="clear-td">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (!empty($list_visitor)) {
                                foreach ($list_visitor as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><span class="label label-info"><?php echo $value->ip_address; ?></span></td>
                                        <?php
                                        $words = explode(" ", strtoupper($value->user_agent));
                                        $limit_word = implode(" ", array_splice($words, 0, 3));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td><?php echo $value->requested_url; ?></td>
                                        <td><?php echo $value->access_date; ?></td>
                                        <td>
                                            <a onclick="act_delete_mahasiswa(<?php echo $value->track_visitor_id; ?>, '<?php echo strtoupper($value->ip_address); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                    </tr>
                                    <?php
                                }  //ngatur nomor urut
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--<div class="modal fade bs-example-modal-lg modal-visitor-hariini" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Satatistik Visitor Hari Ini</h4>
                <small>Berikut Merupakan Statistik Visitor Hari Ini</small>
            </div>
            <div class="modal-body">
                <canvas id="chart2" height="150"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
            </div>
        </div>
         /.modal-content
    </div>
     /.modal-dialog
</div>
 /.modal -->
<script>

    function act_delete_mahasiswa(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Nama Mahasiswa " + name + "!",
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
                    url: "<?php echo site_url("dashboard/delete_data_mahasiswa") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Nama Mahasiswa " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Nama Mahasiswa " + name + " batal dihapus.", "error");
            }
        });
    }
</script>