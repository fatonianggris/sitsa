<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Detail Kuisioner</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="window.history.back();"  class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>
            <a href="" data-toggle="modal" data-target=".modal-panel" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Panel </a>
            <ol class="breadcrumb">               
                <li><a href="#"> Kuisioner</a></li>
                <li class="active">Detail Kuisioner</li>
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
            <div class="col-md-3 col-lg-3 col-sm-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Judul Kuisioner</h3>
                            <div class="col-md-12 col-xs-12 col-lg-12"> 
                                <?php if ($get_kuisioner[0]->tipe_kuisioner == 1) { ?>
                                    <img src="<?php echo base_url('/uploads/data/berurutan.png') ?>" alt="user" class="m-t-20 m-b-40 col-md-12 col-xs-12 col-lg-12">                    
                                <?php } else { ?>
                                    <img src="<?php echo base_url('/uploads/data/berantai.png') ?>" alt="user" class="m-t-20 m-b-40 col-md-12 col-xs-12 col-lg-12">  
                                <?php } ?>
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
                <?php
                $i = 1;
                if (!empty($get_all_panel)) {
                    foreach ($get_all_panel as $key => $value) {
                        ?> 
                        <div class="panel panel-info">
                            <div class="panel-heading"> PANEL <?php echo $i; ?>: <?php echo $value->nama_panel; ?>
                                <div class="pull-right">
                                    <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> 
                                    <a href="#" onclick="act_delete_panel(<?php echo $value->id_panel; ?>, <?php echo $value->tipe_panel; ?>, '<?php echo strtoupper($value->nama_panel); ?>')" ><i class="ti-close"></i></a>
                                </div>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body-kuis">
                                    <div class="table-responsive">
                                        <table class="table product-overview">                                    
                                            <tbody>
                                                <tr>
                                                    <td width="150">
                                                        <?php if ($value->tipe_panel == 1) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_essai.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 2) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_tunggal.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">                                                         
                                                        <?php } else if ($value->tipe_panel == 3) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_jamak.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 4) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_dropdown.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 5) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/kisi_tunggal.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 6) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/kisi_jamak.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 7) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_skala.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 8) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_upload.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } else if ($value->tipe_panel == 9) { ?>
                                                            <img src="<?php echo base_url('/uploads/data/pil_jwb_singkat.gif') ?>" alt="user" class=" m-l-12 col-md-12 col-xs-12 col-lg-12">  
                                                        <?php } ?>
                                                    </td>
                                                    <td width="550">
                                                        <h5 class="font-600">Pertanyaan: </h5>
                                                        <p><?php echo $value->pertanyaan; ?></p>
                                                    </td>
                                                    <td> <span class="label label-info">
                                                            <?php if ($value->tipe_panel == 1) { ?>
                                                                ESSAI
                                                            <?php } else if ($value->tipe_panel == 2) { ?>
                                                                PILIHAN TUNGGAL
                                                            <?php } else if ($value->tipe_panel == 3) { ?>
                                                                PILIHAN JAMAK
                                                            <?php } else if ($value->tipe_panel == 4) { ?>
                                                                PILIHAN DROPDOWN
                                                            <?php } else if ($value->tipe_panel == 5) { ?>
                                                                PILIHAN KISI TUNGGAL
                                                            <?php } else if ($value->tipe_panel == 6) { ?>
                                                                PILIHAN KISI JAMAK
                                                            <?php } else if ($value->tipe_panel == 7) { ?>
                                                                PILIHAN SKALA
                                                            <?php } else if ($value->tipe_panel == 8) { ?>
                                                                UPLOAD FILE
                                                            <?php } else if ($value->tipe_panel == 9) { ?>
                                                                JAWABAN SINGKAT
                                                            <?php } ?>                                                    
                                                        </span>
                                                    </td>
                                                    <td width="70">
                                                        <?php if ($value->status_required_panel == 'required') { ?>
                                                            <span class="label label-success">WAJIB DIISI</span>
                                                        <?php } else { ?>
                                                            <span class="label label-warning">TIDAK WASIB DIISI</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td width="70" align="center" class="font-500">
                                                        <?php if ($value->status_jawaban_panel) { ?>
                                                            <span class="label label-success">JAWABAN SEBAGAI TUJUAN</span>
                                                        <?php } else { ?>
                                                            <span class="label label-warning">PANEL SEBAGAI TUJUAN</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php if ($value->tipe_panel == 1) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_essai/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 2) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_tunggal/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 3) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_jamak/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 4) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_dropdown/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 5) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_kisi_tunggal/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 6) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_kisi_jamak/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 7) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_skala/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 8) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_upload/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } else if ($value->tipe_panel == 9) { ?>
                                                            <a href="<?php echo site_url('kuisioner/get_pilihan_jawaban_singkat/' . $get_kuisioner[0]->id_kuisioner . '/' . $value->id_unique); ?>" class="text-inverse " title="" data-toggle="tooltip" data-original-title="Edit"><i class="ti-pencil text-dark"></i></a>
                                                        <?php } ?>          
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }  //ngatur nomor urut
                } else {
                    ?>
                    <div class="text-center center col-md-12">
                        <div class="white-box">
                            <h1>PANEL MASIH KOSONG</h1>
                            <h4 class="text-uppercase">Silahkan Klik Tombol Dibawah Ini Untuk Menambahkan/Membuat Panel.</h4>
                            <a data-toggle="modal" data-target=".modal-panel" class="m-t-30 btn btn-info btn-rounded waves-effect waves-light m-b-40">Buat Panel</a> 
                        </div> 
                    </div>     
                <?php }
                ?>          
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>

<div class="modal fade modal-panel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-panel-900 ">
        <div class="modal-content modal-panel-900 ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">TAMBAH PANEL PERTANYAAN</h4>
                <small>Silahkan Tambah Panel Pertanyaan Anda Sesuai Kebutuhan</small>
            </div>
            <div class="modal-body">           
                <div class="col-sm-12 col-md-12 col-xs-12">                   
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">PILIHAN ESSAI</h4>
                                    <img src="<?php echo base_url('/uploads/data/pil_essai.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">                               
                                    <p class="uppercase m-r-5 m-l-5">Responden menjawab bersifat essai</p>
                                </div>
                                <div class="price-table-content">                                                                     
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_essai/' . $get_kuisioner[0]->id_kuisioner); ?>" >  <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">PILIHAN TUNGGAL</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/pil_tunggal.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Memilih salah satu jawaban</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_tunggal/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">PILIHAN JAMAK</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/pil_jamak.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Memilih lebih dari satu jawaban</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_jamak/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                 
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12 m-t-20">                   
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">PILIHAN DROPDOWN</h4>
                                    <img src="<?php echo base_url('/uploads/data/pil_dropdown.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">                               
                                    <p class="uppercase m-r-5 m-l-5">Memilih salah satu jawaban dropdown</p>
                                </div>
                                <div class="price-table-content">                                                                     
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_dropdown/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">KISI TUNGGAL</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/kisi_tunggal.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Memilih salah satu jawaban dari beberapa pertanyaan</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/kisi_tunggal/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">KISI JAMAK</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/kisi_jamak.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Memilih lebih dari satu jawaban dari beberapa pertanyaan</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/kisi_jamak/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-xs-12 m-t-20">   
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">PILIHAN SKALA</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/pil_skala.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Memilih salah satu jawaban bersifat rentang</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_skala/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">UPLOAD FILE</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/pil_upload.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Mengupload file dengan format tertentu</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_upload/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 col-sm-3 no-padding">
                        <div class="pricing-box featured-plan">
                            <div class="pricing-body">
                                <div class="pricing-header">
                                    <h4 class="price-lable text-white bg-primary">JAWABAN SINGKAT</h4>                                    
                                    <img src="<?php echo base_url('/uploads/data/pil_jwb_singkat.gif') ?>" alt="user" class="col-md-12 col-xs-12 m-b-20 m-t-40">
                                    <p class="uppercase m-r-5 m-l-5">Menjawab dengan tipe jawaban tertentu</p>
                                </div>
                                <div class="price-table-content">                                                            
                                    <div class="price-row">
                                        <a href="<?php echo site_url('kuisioner/pilihan_jawaban_singkat/' . $get_kuisioner[0]->id_kuisioner); ?>" > <button class="btn btn-lg btn-warning waves-effect waves-light "><i class="fa fa-pencil m-r-5"></i>Buat Panel</button></a> 
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
<script>
    function act_delete_panel(object, type_id, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus PANEL " + name + " ?",
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
                    url: "<?php echo site_url("kuisioner/delete_panel") ?>",
                    data: {id: object, type: type_id},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Panel " + name + " telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });
            } else {
                swal("Dibatalkan", "Panel " + name + " batal dihapus.", "error");
            }
        });
    }
</script>
