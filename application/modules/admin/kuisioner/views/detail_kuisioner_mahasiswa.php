<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Detail Kuisioner Mahasiswa</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="window.history.back();"  class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>
            <ol class="breadcrumb">
                <li><a href="#">Kuisioner</a></li>             
                <li class="active">Detail Kuisioner</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="col-md-12">
            <div class="col-md-4 col-sm-4">
                <div class="white-box ">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 text-center">
                            <img src="<?php echo base_url() . 'uploads/data/no_user.JPG'; ?>" alt="user" class="img-circle img-responsive">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3 class="box-title m-b-0"><?php echo strtoupper($get_mahasiswa[0]->nama_mhs); ?></h3> <small><?php echo $get_mahasiswa[0]->nim_mhs; ?></small>
                            <p>
                            </p>
                            <?php if ($get_mahasiswa[0]->status_isian_kuisioner == 1) { ?>
                                <span class="label label-warning">SEDANG MENGISI KUISIONER</span>
                            <?php } else { ?>
                                <span class="label label-success">TELAH MENGISI KUISIONER</span>
                            <?php } ?>
                            <address class="m-t-15">
                                <abbr title="Phone"><i class="fa fa-phone m-r-5"></i></abbr> <?php echo $get_mahasiswa[0]->nomor_hp_mhs; ?>
                            </address>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-8 ">
                <div class="white-box">
                    <div class="row"> 

                        <div class="col-md-3 col-xs-6 b-r m-t-10"> <strong>Fakultas</strong>
                            <br>
                            <p class="text-muted"><?php echo strtoupper($get_mahasiswa[0]->nama_fakultas); ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r  m-t-10"> <strong>Prodi</strong>
                            <br>
                            <p class="text-muted"><?php echo strtoupper($get_mahasiswa[0]->nama_prodi); ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r  m-t-10"> <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php echo $get_mahasiswa[0]->email_mhs; ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6  m-t-10"> <strong>Nomor Ijazah</strong>
                            <br>
                            <p class="text-muted"><?php echo strtoupper($get_mahasiswa[0]->nomor_ijazah_mhs); ?></p>
                        </div>

                        <div class="col-md-3 col-xs-6 b-r m-t-10"> <strong>Tahun Masuk</strong>
                            <br>
                            <p class="text-muted"><?php echo strtoupper($get_mahasiswa[0]->tahun_masuk_mhs); ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r  m-t-10"> <strong>Tahun Lulus</strong>
                            <br>
                            <p class="text-muted"><?php echo strtoupper($get_mahasiswa[0]->tahun_lulus_mhs); ?></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="box-title m-b-10">KUISIONER PANEL UMUM</h3>                  
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">  
                                <div class="panel panel-green">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                                                *KLIK U/ MENUTUP
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne"  class="panel-collapse expand" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <div class="col-md-12">                                              
                                                <div class="row text-center">
                                                    <?php
                                                    if (!empty($get_all_panel)) {
                                                        foreach ($get_all_panel as $key => $value) {
                                                            ?>
                                                            <?php if ($value->tipe_panel == 1) { ?> 
                                                                <?php
                                                                if (!empty($jawaban_essai)) {
                                                                    ?>
                                                                    <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php echo ucwords(strtolower($jawaban_essai[0]->jawaban)); ?></p>
                                                                    </div> 
                                                                    <?php
                                                                }
                                                                ?>       
                                                            <?php } elseif ($value->tipe_panel == 2) { ?>
                                                                <?php
                                                                if (!empty($jawaban_tunggal)) {
                                                                    if (strtolower($jawaban_tunggal[0]->jawaban) == 'lainnya') {
                                                                        ?>
                                                                        <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                            <br>
                                                                            <p class="text-muted"><?php echo (strtoupper($jawaban_tunggal[0]->opsi_lainnya)); ?></p>
                                                                        </div> 
                                                                    <?php } else { ?>
                                                                        <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                            <br>
                                                                            <p class="text-muted"><?php echo (strtoupper($jawaban_tunggal[0]->jawaban)); ?></p>
                                                                        </div> 
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>     
                                                            <?php } elseif ($value->tipe_panel == 3) { ?>
                                                                <?php
                                                                if (!empty($jawaban_jamak)) {
                                                                    if (strtolower($jawaban_jamak[0]->jawaban) == 'lainnya') {
                                                                        ?>
                                                                        <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                            <br>
                                                                            <p class="text-muted"><?php echo (strtoupper($jawaban_jamak[0]->opsi_lainnya)); ?></p>
                                                                        </div> 
                                                                    <?php } else { ?>
                                                                        <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                            <br>
                                                                            <p class="text-muted"><?php echo (strtoupper($jawaban_jamak[0]->jawaban)); ?></p>
                                                                        </div> 
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>     
                                                            <?php } elseif ($value->tipe_panel == 4) { ?>
                                                                <?php
                                                                if (!empty($jawaban_dropdown)) {
                                                                    if (strtolower($jawaban_dropdown[0]->jawaban) == 'lainnya') {
                                                                        ?>
                                                                        <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                            <br>
                                                                            <p class="text-muted"><?php echo (strtoupper($jawaban_dropdown[0]->opsi_lainnya)); ?></p>
                                                                        </div> 
                                                                    <?php } else { ?>
                                                                        <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                            <br>
                                                                            <p class="text-muted"><?php echo (strtoupper($jawaban_dropdown[0]->jawaban)); ?></p>
                                                                        </div> 
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>     
                                                            <?php } elseif ($value->tipe_panel == 7) { ?>
                                                                <?php
                                                                if (!empty($jawaban_skala)) {
                                                                    ?>
                                                                    <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php echo (strtoupper($jawaban_skala[0]->jawaban)); ?></p>
                                                                    </div> 
                                                                    <?php
                                                                }
                                                                ?>     
                                                            <?php } elseif ($value->tipe_panel == 8) { ?>
                                                                <?php
                                                                if (!empty($jawaban_upload)) {
                                                                    ?>
                                                                    <div class="col-md-3 col-xs-3 b-r m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                        <br >                                                                        
                                                                        <a href="<?php echo base_url() . $jawaban_upload[0]->jawaban; ?>" target="_blank" ><span class="label label-success "><i class="fa fa-download m-r-5"></i> download file</span></a>
                                                                    </div> 
                                                                    <?php
                                                                }
                                                                ?>     
                                                            <?php } elseif ($value->tipe_panel == 9) { ?>
                                                                <?php
                                                                if (!empty($jawaban_singkat)) {
                                                                    ?>
                                                                    <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                        <br>
                                                                        <p class="text-muted"><?php echo (strtoupper($jawaban_singkat[0]->jawaban)); ?></p>
                                                                    </div> 
                                                                    <?php
                                                                }
                                                                ?>     
                                                            <?php } ?>     
                                                            <?php
                                                        }  //ngatur nomor urut
                                                    }
                                                    ?>  

                                                </div>
                                            </div>   
                                        </div>  
                                    </div> 
                                </div>  
                            </div>      
                        </div>  
                        <?php
                        if (!empty($jawaban_kisi_jamak)) {
                            ?> 
                            <div class="col-md-12">
                                <h3 class="box-title m-b-10">KUISIONER PANEL KISI JAMAK</h3>                  
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">  
                                    <div class="panel panel-green">
                                        <div class="panel-heading" role="tab">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    *KLIK U/ MENUTUP
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo"  class="panel-collapse expand" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="col-md-12">                                              
                                                    <div class="row text-center">
                                                        <?php
                                                        foreach ($jawaban_kisi_jamak as $key => $value) {
                                                            ?>
                                                            <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo (strtoupper($value->jawaban)); ?></p>
                                                            </div>   
                                                            <?php
                                                        }  //ngatur nomor urut
                                                        ?>  
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }  //ngatur nomor urut
                        ?>  
                        <?php
                        if (!empty($jawaban_kisi_tunggal)) {
                            ?> 
                            <div class="col-md-12">
                                <h3 class="box-title m-b-10">KUISIONER PANEL KISI TUNGGAL</h3>                         
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                      
                                    <div class="panel panel-green">
                                        <div class="panel-heading" role="tab">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                                    *KLIK U/ MENUTUP
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse expand" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <div class="col-md-12">                                              
                                                    <div class="row text-center">
                                                        <?php
                                                        foreach ($jawaban_kisi_tunggal as $key => $value) {
                                                            ?>
                                                            <div class="col-md-3 col-xs-3 b-r  m-t-10"> <strong class="m-t-15"><?php echo ucwords(strtolower($value->pertanyaan)); ?></strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo (strtoupper($value->jawaban)); ?></p>
                                                            </div>   
                                                            <?php
                                                        }  //ngatur nomor urut
                                                        ?>  
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>             
                                </div>
                            </div>
                            <?php
                        }  //ngatur nomor urut
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>

