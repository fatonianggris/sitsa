<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Kuisioner</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="" data-toggle="modal" data-target=".modal-kuisioner" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Kuisioner </a>
            <ol class="breadcrumb">               
                <li><a href="#"> Kuisioner</a></li>
                <li class="active">Daftar Kuisioner</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row re">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Jumlah Kuisioner</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-tag text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data[0]->kuisioner; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Mahasiswa Jumlah Belum Mengisi</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-pencil text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data[0]->kuisioner_belum_terisi; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>     
        <div class="col-lg-4 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Mahasiswa Jumlah Sudah Mengisi</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-pencil text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_data[0]->kuisioner_terisi; ?> </span><b>data</b></li>
                </ul>
            </div>
        </div>  
    </div>
    <!--row -->
    <!-- /row -->
    <div class="row">
        <?php
        if (!empty($kuisioner)) {
            foreach ($kuisioner as $key => $value) {
                if ($value->status_kuisioner == 1) {
                    $color = "success";
                } else {
                    $color = "default";
                }
                ?> 
                <div class="col-lg-4 col-sm-4">
                    <div class="panel panel-<?php echo $color ?>">
                        <div class="panel-heading"> 
                            <?php
                            $words_judul = explode(" ", strip_tags($value->nama_kuisioner));
                            $limit_word_judul = implode(" ", array_splice($words_judul, 0, 3));
                            ?>
                            <?php echo ucwords(strtolower($limit_word_judul)) . "..."; ?>
                            <div class="pull-right">
                                <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> 
                                <a href="#" onclick="act_delete_kuisioner(<?php echo $value->id_kuisioner; ?>, '<?php echo strtoupper($value->nama_kuisioner); ?>')" ><i class="ti-close"></i></a>
                            </div>
                            <?php if ($value->tipe_kuisioner == 1) { ?>
                                <span class="pull-right label label-info m-l-5">BERURUT</span>
                            <?php } else { ?>
                                <span class="pull-right label label-warning m-l-5">BERANTAI</span>
                            <?php } ?>
                        </div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <p>
                                    <?php
                                    $words = explode(" ", strip_tags($value->deskripsi_kuisioner));
                                    $limit_word = implode(" ", array_splice($words, 0, 15));
                                    ?>
                                    <?php echo ucwords(strtolower($limit_word)) . "..."; ?>
                                </p>
                            </div>
                            <div class="panel-footer">
                                <?php if ($value->status_kuisioner == 1) { ?>
                                    <input type="checkbox" class="stats<?php echo $value->id_kuisioner; ?>" checked data-toggle="switch" name="status_kuisioner" data-size="small" data-on-text="AKTIF" data-off-text="MATI" data-on-color="success" data-off-color="default">
                                <?php } else { ?>
                                    <input type="checkbox" class="stats<?php echo $value->id_kuisioner; ?>" data-toggle="switch" name="status_kuisioner" data-size="small" data-on-text="AKTIF" data-off-text="MATI" data-on-color="success" data-off-color="default">
                                <?php } ?>
                                <a href="<?php echo site_url('kuisioner/detail_kuisioner/' . $value->id_kuisioner); ?>"> <button class="btn btn-success waves-effect btn-rounded waves-light pull-right m-l-5" type="button"  data-toggle="tooltip" data-placement="top" data-original-title="Lihat Kuisioner"> <i class="fa fa-eye"></i> </button></a>
                                <a href="" data-toggle="modal" data-target=".modal-edit-kuisioner<?php echo $value->id_kuisioner; ?>" ><button class="btn btn-info waves-effect btn-rounded waves-light pull-right m-l-5" type="button"  data-toggle="tooltip" data-placement="top" data-original-title="Edit Kuisioner"> <i class="fa fa-pencil"></i> </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }  //ngatur nomor urut
        } else {
            ?>
            <div class="text-center center col-md-12">
                <div class="white-box">
                    <h1>KUISIONER MASIH KOSONG</h1>
                    <h4 class="text-uppercase">Silahkan Klik Tombol Dibawah Ini Untuk Menambahkan/Membuat Kuisioner.</h4>
                    <a data-toggle="modal" data-target=".modal-kuisioner" class="m-t-30 btn btn-info btn-rounded waves-effect waves-light m-b-40">Buat Kuisioner</a> 
                </div> 
            </div>     
        <?php }
        ?>          
    </div>
    <!-- /.row -->
</div>
<div class="modal fade modal-tambah-kuisioner-berantai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Konten Kuisioner Berantai</h4>
                <small>Silahkan Isi Konten Kuisioner Berantai Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('kuisioner/post_kuisioner'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">    
                    <div class="col-md-5 col-xs-5 col-lg-5 "> 
                        <img src="<?php echo base_url('/uploads/data/kuisioner.png') ?>" alt="user" class="m-l-20 col-md-10 col-xs-10 col-lg-10">  
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">  
                        <div class="form-group row">
                            <label for="namakat" class="col-2 col-form-label">Judul</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="nama_kuisioner" placeholder="Inputkan Judul Kuisioner" id="namakat" required>
                                <input class="form-control" type="hidden" name="tipe_kuisioner"  value="2" required>
                                <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Kuisioner Mahasiswa Angkatan 2018"</small>  
                            </div>
                        </div>                   
                        <div class="form-group row">
                            <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" rows="5" name="deskripsi_kuisioner" id="desckat"></textarea>
                                <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade modal-tambah-kuisioner-berurutan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Konten Kuisioner Berurutan</h4>
                <small>Silahkan Isi Konten Kuisioner Berurutan Anda</small>
            </div>
            <form class="form" action="<?php echo site_url('kuisioner/post_kuisioner'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">    
                    <div class="col-md-5 col-xs-5 col-lg-5 "> 
                        <img src="<?php echo base_url('/uploads/data/kuisioner.png') ?>" alt="user" class="m-l-20 col-md-10 col-xs-10 col-lg-10">  
                    </div>
                    <div class="col-md-7 col-xs-7 col-lg-7">  
                        <div class="form-group row">
                            <label for="namakat" class="col-2 col-form-label">Judul</label>
                            <div class="col-10">
                                <input class="form-control" type="text" name="nama_kuisioner" placeholder="Inputkan Judul Kuisioner" id="namakat" required>
                                <input class="form-control" type="hidden" name="tipe_kuisioner"  value="1" required>
                                <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Kuisioner Mahasiswa Angkatan 2018"</small>  
                            </div>
                        </div>                   
                        <div class="form-group row">
                            <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                            <div class="col-10">
                                <textarea class="form-control" type="text" rows="5" name="deskripsi_kuisioner" id="desckat"></textarea>
                                <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Batal</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade modal-kuisioner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">PILIHAN TAMBAH KUISIONER</h4>
                <small>Silahkan Tambah Kuisioner Anda Sesuai Kebutuhan</small>
            </div>
            <div class="modal-body">           
                <div class="col-sm-12 col-md-12 col-xs-12">                   
                    <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-warning">BERURUTAN</h4>
                                    <img src="<?php echo base_url('/uploads/data/berurutan.png') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">                               
                                    <p class="uppercase m-r-5 m-l-5">
                                        Kuisioner Berurutan digunakan ketika Anda ingin melakukan survei tanpa memperhatikan hasil jawaban Responden, Responden akan ditampilkan soal Pertanyaan secara berurutan sesuai urutan Pertanyaan.
                                    </p>
                                </div>
                                <div class="price-table-content">                                                                     
                                    <div class="price-row">
                                        <button data-dismiss="modal" data-toggle="modal" data-target=".modal-tambah-kuisioner-berurutan" class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-check m-r-5"></i>Buat Kuisioner</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-info">BERANTAI</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/berantai.png') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">
                                        Kuisioner Berantai digunakan ketika Anda ingin melakukan survei dimana hasil jawaban Responden sebagai tujuan pertanyaan selanjutnya, Responden akan ditampilkan Pertanyaan kuisioner sesuai jawaban Responden.
                                    </p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <button data-dismiss="modal" data-toggle="modal" data-target=".modal-tambah-kuisioner-berantai" class="btn btn-lg btn-info waves-effect waves-light "><i class="fa fa-check m-r-5"></i>Buat Kuisioner</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">               
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Batal</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
if (!empty($kuisioner)) {
    foreach ($kuisioner as $key => $value) {
        ?> 
        <div class="modal fade modal-edit-kuisioner<?php echo $value->id_kuisioner; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">EDIT KUISIONER</h4>
                        <small>Silahkan Edit Konten Kuisioner Anda</small>
                    </div>
                    <form class="form" action="<?php echo site_url('kuisioner/update_kuisioner/' . $value->id_kuisioner); ?>" enctype="multipart/form-data" method="post">
                        <div class="modal-body">    
                            <div class="col-md-5 col-xs-5 col-lg-5 "> 
                                <img src="<?php echo base_url('/uploads/data/edit.png') ?>" alt="user" class="m-l-30 col-md-9 col-xs-9 col-lg-9">  
                            </div>
                            <div class="col-md-7 col-xs-7 col-lg-7">  
                                <div class="form-group row">
                                    <label for="namakat" class="col-2 col-form-label">Judul</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" name="nama_kuisioner" value="<?php echo $value->nama_kuisioner; ?>" placeholder="Inputkan Judul Kuisioner" id="namakat" required>                                      
                                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Kuisioner Mahasiswa Angkatan 2018"</small>  
                                    </div>
                                </div>                   
                                <div class="form-group row">
                                    <label for="desckat" class="col-2 col-form-label">Deskripsi</label>
                                    <div class="col-10">
                                        <textarea class="form-control" type="text" rows="5" name="deskripsi_kuisioner" id="desckat"><?php echo $value->deskripsi_kuisioner; ?></textarea>
                                        <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                                    </div>
                                </div>   
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Kirim</button>
                            <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Batal</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php
    }  //ngatur nomor urut
}
?>         

<?php
if (!empty($kuisioner)) {
    foreach ($kuisioner as $key => $value) {
        ?> 
        <script>
            var rek<?php echo $value->id_kuisioner; ?> = $(".stats<?php echo $value->id_kuisioner; ?>").bootstrapSwitch();
            rek<?php echo $value->id_kuisioner; ?>.on("switchChange.bootstrapSwitch", function (event, state) {
                if (state == true) {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Apakah anda yakin ingin mengaktifkan Kuisioner ( <?php echo strtoupper($value->nama_kuisioner); ?> )!",
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
                                url: "<?php echo site_url("kuisioner/edit_status_kuisioner") ?>",
                                data: {id: '<?php echo $value->id_kuisioner; ?>', value: 1},
                                dataType: 'html',
                                success: function (result) {
                                    rek<?php echo $value->id_kuisioner; ?>.bootstrapSwitch('state', true);
                                    swal("Berhasil!", "Kuisioner anda telah diaktifkan.", "success");
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                },
                                error: function (result) {
                                    swal("Opsss!", "No Network connection.", "error");
                                }
                            });
                        } else {
                            rek<?php echo $value->id_kuisioner; ?>.bootstrapSwitch('state', false);
                            swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                        }

                    });
                } else {
                    swal({
                        title: "Apakah anda yakin?",
                        text: "Apakah anda yakin ingin nonaktifkan Kuisioner ( <?php echo strtoupper($value->nama_kuisioner); ?> )!",
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
                                url: "<?php echo site_url("kuisioner/edit_status_kuisioner") ?>",
                                data: {id: '<?php echo $value->id_kuisioner; ?>', value: 0},
                                dataType: 'html',
                                success: function (result) {
                                    rek<?php echo $value->id_kuisioner; ?>.bootstrapSwitch('state', false);
                                    swal("Berhasil!", "Kuisioner Anda dinonaktifkan.", "success");
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                },
                                error: function (result) {
                                    swal("Opsss!", "No Network connection.", "error");
                                }
                            });
                        } else {
                            rek<?php echo $value->id_kuisioner; ?>.bootstrapSwitch('state', true);
                            swal("Dibatalkan", "Anda membatalkan pilihan.", "error");
                        }
                    });
                }
            });
        </script>
        <?php
    }  //ngatur nomor urut
}
?>         
<script>
    function act_delete_kuisioner(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus KUISIONER " + name + " ?",
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
                    url: "<?php echo site_url("kuisioner/delete_kuisioner") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Kuisioner " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });
            } else {
                swal("Dibatalkan", "Kuisioner " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
