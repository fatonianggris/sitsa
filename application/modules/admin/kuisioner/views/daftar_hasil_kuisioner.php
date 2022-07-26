<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Hasil Kuisioner</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">               
                <li><a href="#">Kuisioner</a></li>
                <li class="active">Hasil Kuisioner</li>
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
                    $color = "danger";
                }
                ?> 
                <div class="col-lg-3 col-md-6">                   
                    <div class="white-box ">
                        <div class="text-muted">
                            <span class="m-r-10"><?php echo $value->tanggal; ?></span>
                            <span class="text-muted m-l-10" ><i class="fa fa-square-o"></i> <?php echo $value->total_panel; ?> Panel</span>
                            <?php if ($value->tipe_kuisioner == 1) { ?>
                                <span class="pull-right label label-info m-l-5">BERURUT</span>
                            <?php } else { ?>
                                <span class="pull-right label label-warning m-l-5">BERANTAI</span>
                            <?php } ?>
                        </div>
                        <h3 class="m-t-20 m-b-20">
                            <?php
                            $words_judul = explode(" ", strip_tags($value->nama_kuisioner));
                            $limit_word_judul = implode(" ", array_splice($words_judul, 0, 3));
                            ?>
                            <?php echo ucwords(strtolower($limit_word_judul)) . "..."; ?>
                        </h3>
                        <p> 
                            <?php
                            $words = explode(" ", strip_tags($value->deskripsi_kuisioner));
                            $limit_word = implode(" ", array_splice($words, 0, 10));
                            ?>
                            <?php echo $limit_word . "..."; ?>
                        </p>
                        <div>
                            <?php if ($value->status_kuisioner == 1) { ?>
                                <span class="pull-right text-<?php echo $color; ?> m-l-5"><b>AKTIF</b></span>
                            <?php } else { ?>
                                <span class="pull-right text-<?php echo $color; ?> m-l-5"><b>NON AKTIF</b></span>
                            <?php } ?>
                        </div>
                        <div class="text-muted">
                            <a href="<?php echo site_url('kuisioner/detail_hasil_data_kuisioner/' . $value->id_kuisioner); ?>"> <button class="btn btn-success btn-rounded waves-effect waves-light m-t-20"><i class="fa fa-eye"></i> Data</button></a>
                            <a href="<?php echo site_url('kuisioner/detail_hasil_grafik_kuisioner/' . $value->id_kuisioner); ?>"> <button class="btn btn-warning btn-rounded waves-effect waves-light m-t-20"><i class="fa fa-eye"></i> Grafik</button></a>
                        </div>
                    </div>
                </div>

                <?php
            }  //ngatur nomor urut
        } else {
            ?>
            <div class="text-center center col-md-12">
                <div class="white-box">
                    <h1>HASIL KUISIONER MASIH KOSONG</h1>
                    <h4 class="text-uppercase">Silahkan Klik Tombol Dibawah Ini Untuk Menambahkan/Membuat Di Menu Daftar Kuisioner.</h4>
                    <a href="<?php echo site_url('kuisioner/daftar_kuisioner'); ?>" class="m-t-30 btn btn-info btn-rounded waves-effect waves-light m-b-40">Buat Kuisioner</a> 
                </div> 
            </div>     
        <?php }
        ?>          
    </div>
    <!-- /.row -->
</div>

