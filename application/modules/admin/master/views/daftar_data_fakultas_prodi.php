<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Fakultas & Prodi</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-prodi" class="btn btn-success pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Prodi </a>        
            <a href="" data-toggle="modal" data-target=".modal-fakultas" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Fakultas </a>
            <ol class="breadcrumb">               
                <li><a href="#"> Master</a></li>
                <li class="active">Daftar Fakultas & Prodi</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Fakultas</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-home text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_fakultas_prodi[0]->fakultas; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Prodi</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-tag text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_fakultas_prodi[0]->prodi; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>       
    </div>
    <!--row -->

    <!-- /row -->
    <div class="row">
        <div class="col-sm-6">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target=".modal-struktur" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-eye m-r-5"></i>Struktur Kategori </a>        
                <h3 class="box-title m-b-0">Daftar Fakultas </h3>
                <p class="text-muted m-b-30">Berikut ini merupakan daftar Fakultas</p>
                <div class="table-responsive">
                    <table id="fakultas" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>No.</th>
                                <th>Nama Fakultas</th>
                                <th>Kode Fakultas</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($data_fakultas)) {
                                $i = 1;
                                foreach ($data_fakultas as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td><?php echo strtoupper($value->nama_fakultas); ?></td>
                                        <td>
                                            <span class="label label-info"><?php echo strtoupper($value->kode_fakultas); ?></span>
                                        </td>
                                        <td>
                                            <a href="#edit_fakultas<?php echo $value->id_fakultas; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_fakultas(<?php echo $value->id_fakultas; ?>, '<?php echo strtoupper($value->nama_fakultas); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>                                  
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Prodi</h3>
                <p class="text-muted m-b-30">Berikut ini merupakan daftar Prodi</p>
                <div class="table-responsive">
                    <table id="prodi" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>No.</th>
                                <th>Nama Prodi</th>
                                <th>Kode Prodi</th> 
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($data_prodi)) {
                                $i = 1;
                                foreach ($data_prodi as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td><?php echo strtoupper($value->nama_prodi); ?></td>
                                        <td>
                                            <span class="label label-success"><?php echo strtoupper($value->kode_prodi); ?></span>
                                        </td>
                                        <td>
                                            <a href="#edit_prodi<?php echo $value->id_prodi; ?>" data-toggle="modal" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_prodi(<?php echo $value->id_prodi; ?>, '<?php echo strtoupper($value->nama_prodi); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
                                    </tr>                                          
                                    </tr>                                      
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<div class="modal fade modal-fakultas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Fakultas</h4>
                <small>Silahkan Menambahkan Fakultas</small>
            </div>
            <form class="form" action="<?php echo site_url('master/fakultasprodi/post_data_fakultas'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label for="namafal" class="col-2 col-form-label">Nama Fakultas</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_fakultas" placeholder="Inputkan Nama Fakultas" id="namafal" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Ilmu Komputer"</small>  
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label for="kodefal" class="col-2 col-form-label">Kode Fakultas</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="kode_fakultas" placeholder="Inputkan Kode Fakultas" id="kodefal">
                            <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi, <b class="text-danger">Contoh :</b> "ILKOM001"</small>  
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
<div class="modal fade modal-prodi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Prodi</h4>
                <small>Silahkan Menambahkan Prodi</small>
            </div>
            <form class="form" action="<?php echo site_url('master/fakultasprodi/post_data_prodi'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">           
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Fakultas</label>
                        <div class="col-10">
                            <select class="form-control required" name="id_fakultas" id="kat_lvl" required>
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
                    </div>
                    <div class="form-group row">
                        <label for="namaprodi" class="col-2 col-form-label">Nama Prodi</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_prodi" placeholder="Inputkan Nama Prodi" id="namaprodi" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b> wajib diisi, <b class="text-danger">Contoh :</b> "Teknik Informatika"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kodeprodi" class="col-2 col-form-label">Kode Prodi</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="kode_prodi" placeholder="Inputkan Kode Prodi" id="kodeprodi">
                            <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi, <b class="text-danger">Contoh :</b> "TK008"</small>  
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
<!-- /.modal -->
<!-- sample modal tag -->
<div class="modal fade modal-struktur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Detail Struktur Fakultas & Prodi</h4>
                <small>Detail Treeview struktur Fakultas & Prodi</small>
            </div>
            <div class="modal-body">           
                <div class="col-sm-12 col-xs-12">                   
                    <div id="treeview_json" class=""></div>
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
<?php
if (!empty($data_fakultas)) {
    foreach ($data_fakultas as $key => $value) {
        ?>       
        <div id="edit_fakultas<?php echo $value->id_fakultas; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Fakultas "<?php echo strtoupper($value->nama_fakultas); ?>"</h4>
                        <small>Silahkan Mengedit Fakultas</small>
                    </div>
                    <form class="form" action="<?php echo site_url('master/fakultasprodi/update_data_fakultas/' . $value->id_fakultas); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">           
                            <div class="modal-body">           
                                <div class="form-group row">
                                    <label for="namafal" class="col-2 col-form-label">Nama Fakultas</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="<?php echo $value->nama_fakultas; ?>" name="nama_fakultas" placeholder="Inputkan Nama Fakultas" id="namafal" required>
                                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Ilmu Komputer"</small>  
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label for="kodefal" class="col-2 col-form-label">Kode Fakultas</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" value="<?php echo $value->kode_fakultas; ?>" name="kode_fakultas" placeholder="Inputkan Kode Fakultas" id="kodefal">
                                        <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi, <b class="text-danger">Contoh :</b> "ILKOM001"</small>  
                                    </div>
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
        <?php
    }
}
?>	
<?php
if (!empty($data_prodi)) {
    foreach ($data_prodi as $key => $value) {
        ?>       
        <div id="edit_prodi<?php echo $value->id_prodi; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Edit Prodi "<?php echo strtoupper($value->nama_prodi); ?>"</h4>
                        <small>Silahkan Mengedit Prodi</small>
                    </div>
                    <form class="form" action="<?php echo site_url('master/fakultasprodi/update_data_prodi/' . $value->id_prodi); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">          
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Fakultas</label>
                                <div class="col-10">
                                    <select class="form-control required" name="id_fakultas" id="kat_lvl" required>
                                        <option value="<?php echo $value->id_fakultas; ?>">
                                            <?php
                                            if (!empty($data_fakultas)) {
                                                foreach ($data_fakultas as $key => $val) {
                                                    if ($value->id_fakultas == $val->id_fakultas) {
                                                        ?> 
                                                        <?php echo $val->nama_fakultas; ?>
                                                        <?php
                                                    }
                                                }  //ngatur nomor urut
                                            }
                                            ?>    
                                        </option>
                                        <?php
                                        if (!empty($data_fakultas)) {
                                            foreach ($data_fakultas as $key => $val) {
                                                ?> 
                                                <option value="<?php echo $val->id_fakultas; ?>"><?php echo $val->nama_fakultas; ?></option>
                                                <?php
                                            }  //ngatur nomor urut
                                        }
                                        ?>          
                                    </select>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b>diisi (jika belum ada, silahkan tambah Fakultas)</small> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaprodi" class="col-2 col-form-label">Nama Prodi</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="nama_prodi" value="<?php echo $value->nama_prodi; ?>" placeholder="Inputkan Nama Prodi" id="namaprodi" required>
                                    <small class="form-text"><b class="text-danger">*WAJIB </b> wajib diisi, <b class="text-danger">Contoh :</b> "Teknik Informatika"</small>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kodeprodi" class="col-2 col-form-label">Kode Prodi</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="kode_prodi" value="<?php echo $value->kode_prodi; ?>" placeholder="Inputkan Kode Prodi" id="kodeprodi">
                                    <small class="form-text"><b class="text-danger">*TIDAK </b> wajib diisi, <b class="text-danger">Contoh :</b> "TK008"</small>  
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
        <?php
    }
}
?>

<script type="text/javascript">
    $(document).ready(function () {

        $.ajax({
            type: "GET",
            url: "<?php echo site_url("kategorimerek/get_struktur_kategori") ?>",
            dataType: "json",
            success: function (response)
            {
                initTree(response)
            }
        });

        function initTree(treeData) {
            $('#treeview_json').treeview({
                levels: 99,
                expandIcon: 'ti-angle-right',
                onhoverColor: "rgba(0, 0, 0, 0.05)",
                selectedBackColor: "#03a9f3",
                collapseIcon: 'ti-angle-down',
                nodeIcon: 'glyphicon glyphicon-bookmark',
                data: treeData
            });
        }

    });
</script>
<script>

    function act_delete_fakultas(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Fakultas " + name + " ?",
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
                    url: "<?php echo site_url("master/fakultasprodi/delete_data_fakultas") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Fakultas " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });
            } else {
                swal("Dibatalkan", "Fakultas " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
<script>

    function act_delete_prodi(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Prodi " + name + " ?",
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
                    url: "<?php echo site_url("master/fakultasprodi/delete_data_prodi") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Prodi " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Prodi " + name + " batal dihapus.", "error");
            }
        });
    }
</script>