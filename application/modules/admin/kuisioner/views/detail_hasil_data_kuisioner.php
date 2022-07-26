<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Daftar Mahasiswa</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="window.history.back();"  class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>
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
        <div class="alert alert-success alert-dismissable col-lg-12 col-md-12 text-center">
            <h1 class="text-white bold"><b> HASIL DATA <?php echo strtoupper($get_kuisioner[0]->nama_kuisioner) ?></b></h1>
            <h4 class="text-white uppercase"><?php echo ucwords(strtolower($get_kuisioner[0]->deskripsi_kuisioner)) ?></h4>
        </div>
    </div>
    <!-- /.row -->
    <!-- /row -->
    <div class="row">
        <?php
        if (!empty($get_all_panel)) {
            ?> 
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Daftar Pertanyaan Mahasiswa</h3>
                    <p class="text-muted m-b-15">Berikut ini merupakan daftar jawaban Kuisioner Umum Mahasiswa</p>
                    <div class="table-responsive">
                        <table id="mhs_kusi" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr> 
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <?php
                                    if (!empty($get_all_panel)) {
                                        foreach ($get_all_panel as $key => $value) {
                                            if ($value->tipe_panel != 5 && $value->tipe_panel != 6) {
                                                ?> 
                                                <?php
                                                $words_judul = explode(" ", strip_tags($value->pertanyaan));
                                                $limit_word_judul = implode(" ", array_splice($words_judul, 0, 2));
                                                ?>
                                                <th><?php echo ucwords(strtolower($limit_word_judul)) . '..'; ?></th>
                                                <?php
                                            }
                                        }  //ngatur nomor urut
                                    }
                                    ?> 
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if (!empty($jawaban_essai) || !empty($jawaban_tunggal) || !empty($jawaban_jamak) || !empty($jawaban_dropdown) || !empty($jawaban_skala) || !empty($jawaban_upload)) {
                                    for ($b = 0; $b < count($mahasiswa); $b++) {
                                        ?>
                                        <tr>
                                            <th><?php echo $i; ?></th>
                                            <th><?php echo $mahasiswa[$b]->nim_mhs; ?></th>
                                            <?php
                                            if (!empty($get_all_panel)) {
                                                foreach ($get_all_panel as $key => $value) {
                                                    ?>
                                                    <?php if ($value->tipe_panel == 1) { ?> 
                                                        <?php
                                                        if (!empty($jawaban_essai[$b])) {
                                                            ?>
                                                            <?php
                                                            $words_essai = explode(" ", strip_tags($jawaban_essai[$b]->jawaban));
                                                            $limit_word_essai = implode(" ", array_splice($words_essai, 0, 5));
                                                            ?>
                                                            <td>
                                                                <?php echo ucwords(strtolower($limit_word_essai)) . '..'; ?>
                                                            </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>           
                                                    <?php } elseif ($value->tipe_panel == 2) { ?>
                                                        <?php
                                                        if (!empty($jawaban_tunggal[$b])) {
                                                            if (strtolower($jawaban_tunggal[$b]->jawaban) == 'lainnya') {
                                                                ?>
                                                                <td>
                                                                    <?php echo strtoupper(strtolower($jawaban_tunggal[$b]->opsi_lainnya)); ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td>
                                                                    <?php echo strtoupper(strtolower($jawaban_tunggal[$b]->jawaban)); ?>
                                                                </td>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>     
                                                    <?php } elseif ($value->tipe_panel == 3) { ?>
                                                        <?php
                                                        if (!empty($jawaban_jamak[$b])) {
                                                            if (strtolower($jawaban_jamak[$b]->jawaban) == 'lainnya') {
                                                                ?>
                                                                <td>
                                                                    <?php echo strtoupper(strtolower($jawaban_jamak[$b]->opsi_lainnya)); ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td>
                                                                    <?php echo strtoupper(strtolower($jawaban_jamak[$b]->jawaban)); ?>
                                                                </td>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>          
                                                    <?php } elseif ($value->tipe_panel == 4) { ?>
                                                        <?php
                                                        if (!empty($jawaban_dropdown[$b])) {
                                                            if (strtolower($jawaban_dropdown[$b]->jawaban) == 'lainnya') {
                                                                ?>
                                                                <td>
                                                                    <?php echo strtoupper(strtolower($jawaban_dropdown[$b]->opsi_lainnya)); ?>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td>
                                                                    <?php echo strtoupper(strtolower($jawaban_dropdown[$b]->jawaban)); ?>
                                                                </td>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>          
                                                    <?php } elseif ($value->tipe_panel == 7) { ?>
                                                        <?php
                                                        if (!empty($jawaban_skala[$b])) {
                                                            ?>
                                                            <td>
                                                                <?php echo ucwords(strtolower($jawaban_skala[$b]->jawaban)); ?>
                                                            </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>        
                                                    <?php } elseif ($value->tipe_panel == 8) { ?>
                                                        <?php
                                                        if (!empty($jawaban_upload[$b])) {
                                                            ?>
                                                            <td>
                                                                <a href="<?php echo base_url() . $jawaban_upload[$b]->jawaban; ?>" target="_blank"><span class="label label-success"><i class="fa fa-download m-r-5"></i> download file</span></a>
                                                            </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>        
                                                    <?php } elseif ($value->tipe_panel == 9) { ?>
                                                        <?php
                                                        if (!empty($jawaban_singkat[$b])) {
                                                            ?>
                                                            <td>
                                                                <?php echo ucwords(strtolower($jawaban_singkat[$b]->jawaban)); ?>
                                                            </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                        <?php }
                                                        ?>        
                                                    <?php } ?>
                                                    <?php
                                                }  //ngatur nomor urut
                                            }
                                            ?>  
                                            <th>
                                                <a href="<?php echo site_url('kuisioner/detail_kuisioner_mahasiswa/' . $mahasiswa[$b]->id_mhs . '/' . $get_kuisioner[0]->id_kuisioner); ?>" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Mahsisiwa"><i class="fa fa-pencil"></i></button></a>
                                            </th>
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
            <?php
            if (!empty($get_pertanyaan_jamak)) {
                ?> 
                <div class="col-sm-12 col-lg-6 col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Daftar Kisi Jamak Mahasiswa</h3>
                        <p class="text-muted m-b-15">Berikut ini merupakan daftar jawaban Kuisioner Jamak Mahasiswa</p>
                        <div class="table-responsive">
                            <table id="kisi_jamak" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>                                 
                                        <th>NIM</th>
                                        <?php
                                        if (!empty($get_pertanyaan_jamak)) {
                                            foreach ($get_pertanyaan_jamak as $key => $value) {
                                                ?> 
                                                <?php
                                                $words_judul = explode(" ", strip_tags($value->pertanyaan));
                                                $limit_word_judul = implode(" ", array_splice($words_judul, 0, 2));
                                                ?>
                                                <th><?php echo ucwords(strtolower($limit_word_judul)) . '..'; ?></th>
                                                <?php
                                            }  //ngatur nomor urut
                                        }
                                        ?> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($jawaban_kisi_jamak)) {
                                        for ($b = 0; $b < count($mahasiswa); $b++) {
                                            ?>
                                            <tr>                                       
                                                <th><?php echo $mahasiswa[$b]->nim_mhs; ?></th>
                                                <?php
                                                if (!empty($jawaban_kisi_jamak)) {
                                                    foreach ($jawaban_kisi_jamak as $key => $value) {
                                                        if ($value->id_mahasiswa == $mahasiswa[$b]->id_mhs) {
                                                            ?>
                                                            <td>
                                                                <?php echo (strtoupper($value->jawaban)); ?>
                                                            </td>
                                                        <?php } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>   
                                                <th>
                                                    <a href="<?php echo site_url('kuisioner/detail_kuisioner_mahasiswa/' . $mahasiswa[$b]->id_mhs . '/' . $get_kuisioner[0]->id_kuisioner); ?>" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Mahsisiwa"><i class="fa fa-pencil"></i></button></a>
                                                </th>
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
                <?php
            }  //ngatur nomor urut
            ?> 
            <?php
            if (!empty($get_pertanyaan_tunggal)) {
                ?> 
                <div class="col-sm-12 col-lg-6 col-md-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Daftar Kisi Tunggal Mahasiswa</h3>
                        <p class="text-muted m-b-15">Berikut ini merupakan daftar jawaban Kuisioner Tunggal Mahasiswa</p>
                        <div class="table-responsive">
                            <table id="kisi_tunggal" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr> 
                                        <th>NIM</th>
                                        <?php
                                        if (!empty($get_pertanyaan_tunggal)) {
                                            foreach ($get_pertanyaan_tunggal as $key => $value) {
                                                ?> 
                                                <?php
                                                $words_judul = explode(" ", strip_tags($value->pertanyaan));
                                                $limit_word_judul = implode(" ", array_splice($words_judul, 0, 2));
                                                ?>
                                                <th><?php echo ucwords(strtolower($limit_word_judul)) . '..'; ?></th>
                                                <?php
                                            }  //ngatur nomor urut
                                        }
                                        ?> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($jawaban_kisi_tunggal)) {
                                        for ($b = 0; $b < count($mahasiswa); $b++) {
                                            ?>
                                            <tr>                                       
                                                <th><?php echo $mahasiswa[$b]->nim_mhs; ?></th>
                                                <?php
                                                if (!empty($jawaban_kisi_tunggal)) {
                                                    foreach ($jawaban_kisi_tunggal as $key => $value) {
                                                        if ($value->id_mahasiswa == $mahasiswa[$b]->id_mhs) {
                                                            ?>
                                                            <td>
                                                                <?php echo (strtoupper($value->jawaban)); ?>
                                                            </td>
                                                        <?php } else {
                                                            ?>
                                                            <td>
                                                                KOSONG
                                                            </td>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>   
                                                <th>
                                                    <a href="<?php echo site_url('kuisioner/detail_kuisioner_mahasiswa/' . $mahasiswa[$b]->id_mhs . '/' . $get_kuisioner[0]->id_kuisioner); ?>" ><button class="btn btn-outline btn-info btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" data-original-title="Lihat Mahsisiwa"><i class="fa fa-pencil"></i></button></a>
                                                </th>
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
                <?php
            }  //ngatur nomor urut
            ?> 
        </div>
        <?php
    } else {
        ?> 
        <div class="text-center center col-md-12">
            <div class="white-box">
                <h1>ANDA BELUM MEMBUAT PANEL PERTANYAAN</h1>
                <h4 class="text-uppercase">Silahkan Klik Tombol Dibawah Ini Untuk Menambahkan/Membuat Panel Di Menu Panel.</h4>
                <a href="<?php echo site_url('kuisioner/detail_kuisioner/' . $get_kuisioner[0]->id_kuisioner); ?>" class="m-t-30 btn btn-info btn-rounded waves-effect waves-light m-b-40">Buat Panel</a> 
            </div> 
        </div>   
        <?php
    }
    ?> 
    <!-- /.row -->
</div>

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
