<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Kontak Saran</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <!--<a href="" data-toggle="modal" data-target=".modal-tambahkontak" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah FAQ </a>-->
            <ol class="breadcrumb">               
                <li><a href="#"> Kontak Saran</a></li>
                <li class="active">Daftar Kontak Saran</li>
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
                <h3 class="box-title">Total Produk</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-shopping-cart-full text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_produk; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Saran</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-envelope text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah[0]->total_saran; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->
    <div>
        <div class="col-sm-12">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#edit_kontak" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i>Edit Kontak Web </a>
                <div class="tab-pane" id="profile">                    
                    <h3 class="box-title m-b-0">Detail Kontak Website</h3>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-2 col-xs-6 b-r"> <strong>Jam Kerja</strong>
                            <br>
                            <p class="text-muted"><?php echo $kontak[0]->jam_kerja; ?></p>
                        </div>
                        <div class="col-md-2 col-xs-6 b-r"> <strong>Nomor Handphone</strong>
                            <br>
                            <p class="text-muted"><?php echo $kontak[0]->no_handphone; ?></p>
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> <strong>Alamat</strong>
                            <br>
                            <p class="text-muted"><?php echo $kontak[0]->alamat; ?></p>
                        </div>
                        <div class="col-md-2 col-xs-6 b-r"> <strong>Nomor Telephone</strong>
                            <br>
                            <p class="text-muted"><?php echo $kontak[0]->nomor_telephone; ?></p>
                        </div>
                        <div class="col-md-2 col-xs-6"> <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $kontak[0]->email; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-4 col-xs-6 b-r"> <strong>Link Instagram</strong>
                            <br>
                            <p class="text-muted"><a href="<?php echo $kontak[0]->akun_instagram; ?>"><?php echo $kontak[0]->akun_instagram; ?></a></p>
                        </div>
                        <div class="col-md-4 col-xs-6 b-r"> <strong>Link Facebook</strong>
                            <br>
                            <p class="text-muted"><a href="<?php echo $kontak[0]->akun_facebook; ?>"><?php echo $kontak[0]->akun_facebook; ?></a></p>
                        </div>
                        <div class="col-md-4 col-xs-6"> <strong>Link Twitter</strong>
                            <br>
                            <p class="text-muted"><a href="<?php echo $kontak[0]->akun_twitter; ?>"><?php echo $kontak[0]->akun_twitter; ?></a></p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Kontak Saran Website</h3>
                <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                <div class="table-responsive">
                    <table id="kategori" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Nama Pengirim</th>
                                <th>Email</th>                              
                                <th>No. Telephone</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>                       
                        <tbody>
                            <?php
                            if (!empty($saran)) {
                                foreach ($saran as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $value->nama_pengirim; ?></td>
                                        <td><?php echo $value->email; ?></td>
                                        <td><?php echo $value->no_telephone; ?></td>
                                        <?php
                                        $words = explode(" ", $value->isi_saran);
                                        $limit_word = implode(" ", array_splice($words, 0, 10));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td>
                                            <a href="#lihat_saran<?php echo $value->id_saran; ?>" data-toggle="modal" ><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
                                            <a onclick="act_delete_saran(<?php echo $value->id_saran; ?>, '<?php echo strtoupper($value->nama_pengirim); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
                                        </td>                                
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
    <!-- /.row -->
</div>
<!-- /.modal -->
<div id="edit_kontak" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Deskripsi Kontak</h4>
                <small>Edit Deskripsi Kontak Website Anda </small>
            </div>
            <form class="form" action="<?php echo site_url('pengaturan/kontak/update_kontak'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email" value="<?php echo $kontak[0]->email; ?>" placeholder="Inputkan Email Online Shop" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nomor Telephone</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="nomor_telephone" value="<?php echo $kontak[0]->nomor_telephone; ?>" placeholder="Inputkan Nomor Telephone" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">No. Handphone</label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="no_handphone" value="<?php echo $kontak[0]->no_handphone; ?>" placeholder="Inputkan Nomor Handphone" id="tanya" >
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi</small>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Jam Kerja</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="jam_kerja" value="<?php echo $kontak[0]->jam_kerja; ?>" placeholder="Inputkan Jam Kerja Online Shop Anda" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "Setiap MINGGU jam 10:00 pagi sampai 6:00 malam"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Alamat</label>
                        <div class="col-10">
                            <textarea class="form-control" rows="5" name="alamat"><?php echo $kontak[0]->alamat; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> "7563 St. Vicent Place, Glasgow"</small>  
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Link Akun Instagram</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="akun_instagram" value="<?php echo $kontak[0]->akun_instagram; ?>" placeholder="Inputkan Link Akun Instagram" id="tanya" >
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "https://www.instagram.com/shop/"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Link Akun Facebook</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="akun_facebook" value="<?php echo $kontak[0]->akun_facebook; ?>" placeholder="Inputkan Link Akun Facebook" id="tanya" >
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "https://web.facebook.com/LazadaIndonesia02/"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Link Akun Twitter</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="akun_twitter" value="<?php echo $kontak[0]->akun_twitter; ?>" placeholder="Inputkan Link Akun Twitter" id="tanya" >
                            <small class="form-text"><b class="text-danger">*TIDAK </b>wajib diisi, <b class="text-danger">Contoh :</b> "https://twitter.com/onlineshopping"</small>  
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
<!-- sample modal tag -->
<?php
if (!empty($saran)) {
    foreach ($saran as $key => $value) {
        ?> 
        <div id="lihat_saran<?php echo $value->id_saran; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Pesan Kontak Saran</h4>
                        <small>Lihat Pesan Kontak Saran Dari Pelanggan</small>
                    </div>
                    <div class="modal-body">          
                        <div class="col-lg-12 col-md-9 col-sm-8 col-xs-12">
                            <div class="media m-b-30 p-t-20">                              
                                <hr>
                                <a class="pull-left" href="#"> <img class="media-object thumb-sm img-circle" src="<?php echo base_url(); ?>main_assets/admin_asset/assets//plugins/images/users/pawandeep.jpg" alt=""> </a>
                                <div class="media-body"> <span class="media-meta pull-right"><?php echo $value->tanggal_post; ?></span>
                                    <h4 class="text-danger m-0"><?php echo $value->nama_pengirim; ?></h4>
                                    <small class="text-muted">From: <?php echo $value->email; ?></small> 
                                    <small class="text-muted pull-right">Hanphone: <?php echo $value->no_telephone; ?></small> 
                                </div>
                            </div>
                            <p><?php echo $value->isi_saran; ?></p>
                            <hr>                            
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
    }
}
?>	

<script>
    function act_delete_saran(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Saran (" + name + ")!",
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
                    url: "<?php echo site_url("pengaturan/kontak/delete_saran") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Saran (" + name + ") telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Saran (" + name + ") batal dihapus.", "error");
            }
        });
    }
</script>
