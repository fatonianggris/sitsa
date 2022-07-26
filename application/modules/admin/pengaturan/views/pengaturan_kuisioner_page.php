<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Kuisioner</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">               
                <li><a href="#"> Kuisioner</a></li>
                <li class="active">Konfigurasi Halaman Kuisioner</li>
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
                <h3 class="box-title">Total Kuisioner</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-check text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_kuisioner[0]->kuisioner_terisi; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Kuisioner Kosong</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-close text-danger"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_kuisioner[0]->kuisioner_belum_terisi; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->
    <div>
        <div class="col-sm-12">
            <div class="white-box">
                <a href="" data-toggle="modal" data-target="#edit_generalpage" class="btn btn-warning pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-pencil m-r-5"></i>Edit Kuisioner Page </a>
                <div class="tab-pane" id="profile">                    
                    <h3 class="box-title m-b-0">Detail Halaman Kuisioner</h3>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-4 col-xs-4 b-r"> <strong>Logo Kuisioner</strong>
                            <br>
                            <a href="<?php echo base_url() . $kuisioner_page[0]->logo_kuisioner; ?>" class="image-popup-fit-width" title="">                         
                                <img src="<?php echo base_url() . $kuisioner_page[0]->logo_kuisioner; ?>" alt="Owl Image" width="120" height="120">
                            </a>
                        </div>   
                        <div class="col-md-4 col-xs-4 b-r"> <strong>Nama Kuisioner</strong>
                            <br>
                            <p class="text-muted"><?php echo $kuisioner_page[0]->nama_kuisioner; ?></p>
                        </div>
                        <div class="col-md-4 col-xs-4 b-r"> <strong>Judul Kuisioner</strong>
                            <br>
                            <p class="text-muted"><?php echo $kuisioner_page[0]->judul_kuisioner; ?></p>
                        </div>                                                                  
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 b-r"> <strong>Deskripsi Kuisioner</strong>
                            <br>
                            <p class="text-muted"><?php echo $kuisioner_page[0]->deskripsi_kuisioner; ?></p>
                        </div>                       
                    </div>
                    <hr>                   
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /.modal -->
<div id="edit_generalpage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Kuisioner</h4>
                <small>Silahkan Edit Halaman Kuisioner </small>
            </div>
            <form class="form" action="<?php echo site_url('pengaturan/update_kuisioner_page/'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">     
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nama Kuisioner</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama_kuisioner" value="<?php echo $kuisioner_page[0]->nama_kuisioner; ?>" placeholder="Inputkan Nama Kuisioner" id="tanya" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Judul Kuisioner</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="judul_kuisioner" value="<?php echo $kuisioner_page[0]->judul_kuisioner; ?>" placeholder="Inputkan Judul Kuisioner" required>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi</small>  
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Logo Website</label>
                        <div class="col-10">
                            <?php if ($kuisioner_page[0]->logo_kuisioner == true) {
                                ?>
                                <input type="text" name="image" value="<?php echo $kuisioner_page[0]->logo_kuisioner; ?>" style="display:none" />
                                <input type="text" name="image_thumb" value="<?php echo $kuisioner_page[0]->logo_kuisioner_thumb; ?>" style="display:none" />
                                <input type="file" id="input-file-now" name="logo_kuisioner" data-default-file="<?php echo base_url() . $kuisioner_page[0]->logo_kuisioner_thumb; ?>" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png" />
                            <?php } else { ?>          
                                <input type="text" name="image" value="" style="display:none" />
                                <input type="text" name="image_thumb" value="" style="display:none" />
                                <input type="file" id="input-file-now" name="logo_kuisioner" data-default-file="<?php echo base_url() . "uploads/data/no_image.jpg"; ?>" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpeg jpg png" />
                            <?php } ?>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat jpg, png, jpeg, dan berukuran dibawah 2Mb"</small>  
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Deskripsi Kuisioner</label>
                        <div class="col-10">
                            <textarea class="form-control" id="kuisioner_desc" rows=9 name="deskripsi_kuisioner"><?php echo $kuisioner_page[0]->deskripsi_kuisioner; ?></textarea>
                            <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, <b class="text-danger">Contoh :</b> Yang Terhormat
                                Para Alumni S-1 Program Studi Bahasa dan Sastra Arab Fakultas Humaniora UIN Maulana Malik Ibrahim Malang Tahun Lulus 2018.</small>  
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect text-left"><i class="fa fa-send m-r-5"></i>Simpan</button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal"><i class="fa fa-close m-r-5"></i>Close</button>
                </div>
            </form>                    
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
