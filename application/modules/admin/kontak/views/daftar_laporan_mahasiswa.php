<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Laporan Mahasiswa</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <!--            <a href="" data-toggle="modal" data-target=".modal-tambahfaq" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah FAQ </a>-->
            <ol class="breadcrumb">               
                <li><a href="#"> Laporan</a></li>
                <li class="active">Daftar Laporan Mahasiswa</li>
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
                <h3 class="box-title">Total Laporan</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-shopping-cart-full text-info"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_laporan_saran[0]->laporan; ?></span> data</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Total Saran</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-info-alt text-success"></i></li>
                    <li class="text-right"><span class="counter"><?php echo $jumlah_laporan_saran[0]->saran; ?></span> data</li>
                </ul>
            </div>
        </div>
    </div>
    <!--row -->

    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Daftar Laporan Mahasiswa</h3>
                <p class="text-muted m-b-30">Berikut daftar laporan masuk yang berasal dari mahasiswa</p>
                <div class="table-responsive">
                    <table id="table_laporan" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>                                
                                <th>Nama Mahasiswa</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>  
                                <th>Subjek</th>
                                <th>Isi Laporan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>      
                        <tfoot>
                            <tr>                                
                                <th>Nama Mahasiswa</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>  
                                <th>Subjek</th>
                                <th>Isi Laporan</th>
                                <th class="clear-td">Aksi</th>
                            </tr>
                        </tfoot>      
                        <tbody>
                            <?php
                            if (!empty($laporan_mahasiwa)) {
                                foreach ($laporan_mahasiwa as $key => $value) {
                                    ?> 
                                    <tr>
                                        <td><b><?php echo strtoupper($value->nama_mhs); ?></b></td>
                                        <td><?php echo strtoupper($value->nama_fakultas); ?></td>
                                        <td><?php echo strtoupper($value->nama_prodi); ?></td>
                                        <td><b><?php echo strtoupper($value->subjek_laporan); ?></b></td>                                       
                                        <?php
                                        $words = explode(" ", strip_tags($value->isi_laporan));
                                        $limit_word = implode(" ", array_splice($words, 0, 5));
                                        ?>
                                        <td><?php echo $limit_word; ?></td>
                                        <td>
                                            <a href="#lihat_laporan<?php echo $value->id_laporan; ?>" data-toggle="modal" ><button class="btn btn-outline btn-primary btn-sm waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
                                            <a onclick="act_delete_laporan(<?php echo $value->id_laporan; ?>, '<?php echo strtoupper($value->nama_mhs); ?>')" ><button class="btn btn-outline btn-danger btn-sm waves-effect waves-light"><i class="fa fa-trash"></i></button></a>
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
<!-- sample modal tag -->
<?php
if (!empty($laporan_mahasiwa)) {
    foreach ($laporan_mahasiwa as $key => $value) {
        ?> 
        <div id="lihat_laporan<?php echo $value->id_laporan; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Laporan Mahasiswa</h4>
                        <small>Detail Laporan Mahasiswa terkait Kuisioner </small>
                    </div>
                    <div class="modal-body">          
                        <div class="panel-group" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-info">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title"> <a class="collapsed font-bold" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" ><?php echo $value->nama_mhs; ?> - <?php echo $value->subjek_laporan; ?> </a> </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body"> 
                                        <?php echo $value->isi_laporan; ?>
                                    </div>
                                </div>
                            </div>
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
    $(document).ready(function () {

        $('#table_laporan tfoot th').each(function () {
            $(this).html('<input type="text" placeholder="Filter Data" />');
        });

        $('#table_laporan').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every(function () {
                    var that = this;
                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value)
                                    .draw();
                        }
                    });
                });
            },
            order: []
        });
    });
</script>
<script>
    function act_delete_laporan(object, name) {
        swal({
            title: "Apakah anda yakin?",
            text: "Apakah anda yakin ingin menghapus Laporan atas Nama (" + name + ")?",
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
                    url: "<?php echo site_url("kontak/delete_laporan_mahasiswa") ?>",
                    data: {id: object},
                    dataType: 'html',
                    success: function (result) {
                        swal("Terhapus!", "Laporan atas nama (" + name + ") telah terhapus.", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (result) {
                        swal("Opsss!", "No Network connection.", "error");
                    }
                });

            } else {
                swal("Dibatalkan", "Laporan atas nama (" + name + ") batal dihapus.", "error");
            }
        });
    }
</script>
