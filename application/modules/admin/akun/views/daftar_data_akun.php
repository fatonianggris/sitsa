<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Akun</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('akun/add_data_akun'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Akun </a>
            <ol class="breadcrumb">               
                <li><a href="#">Akun</a></li>
                <li class="active">Daftar Akun</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Akun</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-user text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_akun[0]->total_akun; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Akun Fakultas</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-user text-purple"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_akun[0]->total_akun_fakultas; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Akun Prodi</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-user text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data_akun[0]->total_akun_prodi; ?></span> data</li>
                </ul>
            </div>
        </div>       
    </div>
    <!-- /.row -->
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Akun</h3>
                <p class="text-muted m-b-30">Berikut ini merupakan daftar akun admin yang dibuat</p>
                <div class="table-responsive">
                    <table id="produk" class="display nowrap " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Akun</th>
                                <th>Role Akun</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>    
                                <th>Email Akun</th>
                                <th>Nomor Handphone</th>    
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!empty($data_akun)) {
                                $i = 1;
                                foreach ($data_akun as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><b><?php echo strtoupper($value->nama_akun); ?></b></td>                                        
                                        <td>
                                            <?php if ($value->role_akun == 0) { ?>
                                                <span class="label label-danger font-weight-200">Super Admin</span>
                                            <?php } elseif ($value->role_akun == 1) { ?>
                                                <span class="label label-warning font-weight-200">Admin Fakultas</span>
                                            <?php } elseif ($value->role_akun == 2) { ?>
                                                <span class="label label-success font-weight-200">Admin Prodi</span>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo strtoupper($value->nama_fakultas); ?></td>
                                        <td><?php echo strtoupper($value->nama_prodi); ?></td>
                                        <td><?php echo $value->email_akun; ?></td>
                                        <td><?php echo $value->no_telepon_akun; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('akun/edit_data_akun/' . $value->id_user); ?>"><button class="btn btn-outline btn-info btn-sm waves-effect waves-light"><i class="fa fa-pencil"></i></button></a>
                                            <a onclick="act_delete_akun(<?php echo $value->id_user; ?>, '<?php echo strtoupper($value->nama_akun); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-remove"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
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
<script>

    function act_delete_akun(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Akun " + name + "!",
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
                    url: "<?php echo site_url("akun/delete_data_akun") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Akun " + name + " telah terhapus.", "success");
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
                swal("Dibatalkan", "Akun " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
