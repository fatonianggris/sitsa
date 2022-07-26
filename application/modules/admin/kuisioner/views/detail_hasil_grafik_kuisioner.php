<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Diagarm Kuisioner</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a onclick="window.history.back();"  class="btn btn-warning pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-arrow-left m-r-5"></i> Kembali </a>
            <ol class="breadcrumb">               
                <li><a href="#"> Kuisioner</a></li>
                <li class="active">Diagarm Kuisioner</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php echo $this->session->flashdata('flash_message'); ?>
        </div>
        <div class="alert alert-success alert-dismissable col-lg-12 col-md-12 text-center">
            <h1 class="text-white bold"><b> HASIL GRAFIK <?php echo strtoupper($get_kuisioner[0]->nama_kuisioner) ?></b></h1>
            <h4 class="text-white uppercase"><?php echo ucwords(strtolower($get_kuisioner[0]->deskripsi_kuisioner)) ?></h4>
        </div>
        <!-- row -->
        <?php
        $i = 1;
        if (!empty($get_all_panel)) {
            foreach ($get_all_panel as $key => $value) {
                ?> 
                <?php if ($value->tipe_panel == 1) { ?>
                    <div class="col-lg-6 col-md-12">            
                        <div class="white-box">              
                            <div class="weather-info">                    
                                <table id="hasil_essai<?php echo $value->id_panel; ?>" class="display nowrap dataTable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>                                
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Jawaban</th>                                            
                                        </tr>
                                    </thead>                       
                                    <tbody>                                                               
                                    </tbody>
                                </table>
                            </div>
                            <div class="weather-box">
                                <div class="weather-top">
                                    <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                    </h2>     
                                    <br>
                                    <div class="m-t-25">
                                        <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if ($value->tipe_panel == 8) { ?>
                    <div class="col-lg-6 col-md-12">            
                        <div class="white-box">              
                            <div class="weather-info">                    
                                <table id="hasil_upload<?php echo $value->id_panel; ?>" class="display nowrap dataTable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>                                
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>File</th>                                            
                                        </tr>
                                    </thead>                       
                                    <tbody>                                                             
                                    </tbody>
                                </table>
                            </div>
                            <div class="weather-box">
                                <div class="weather-top">
                                    <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                    </h2>     
                                    <br>
                                    <div class="m-t-25">
                                        <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                <?php } else if ($value->tipe_panel == 5) { ?>
                    <div class="col-lg-12 col-md-12">            
                        <div class="white-box">     
                            <button class="pull-right btn btn-info btn-sm" onclick="DownloadImage<?php echo $value->id_panel; ?>()"><i class="fa fa-picture-o m-r-5"></i>Save Image</button>
                            <ul class="nav nav-tabs" role="tablist">                             
                                <li role="presentation" class="active nav-item"><a href="#chart<?php echo $value->id_panel; ?>" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Bar Chart</span></a></li>
                            </ul>
                            <div class="tab-content">                               
                                <div role="tabpanel" class="tab-pane active" >
                                    <div class="weather-info">                    
                                        <div id="kisi_tunggal<?php echo $value->id_panel; ?>" style="width:auto; height:300px;"></div>
                                    </div>
                                    <div class="weather-box">
                                        <div class="weather-top">
                                            <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                            </h2>     
                                            <br>
                                            <div class="m-t-25">
                                                <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if ($value->tipe_panel == 6) { ?>
                    <div class="col-lg-12 col-md-12">            
                        <div class="white-box">         
                            <button class="pull-right btn btn-info btn-sm" onclick="DownloadImage<?php echo $value->id_panel; ?>()"><i class="fa fa-picture-o m-r-5"></i>Save Image</button>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active nav-item"><a href="#chart<?php echo $value->id_panel; ?>" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Bar Chart</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" >
                                    <div class="weather-info">                    
                                        <div id="kisi_jamak<?php echo $value->id_panel; ?>" style="width:auto; height:300px;"></div>
                                    </div>
                                    <div class="weather-box">
                                        <div class="weather-top">
                                            <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                            </h2>     
                                            <br>
                                            <div class="m-t-25">
                                                <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if ($value->tipe_panel == 9) { ?>
                    <div class="col-lg-6 col-md-6">            
                        <div class="white-box">         
                            <button class="pull-right btn btn-info btn-sm" onclick="DownloadImage<?php echo $value->id_panel; ?>()"><i class="fa fa-picture-o m-r-5"></i>Save Image</button>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="nav-item"><a href="#table<?php echo $value->id_panel; ?>" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Table</span></a></li>
                                <li role="presentation" class="active nav-item"><a href="#chart<?php echo $value->id_panel; ?>" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Pie Chart</span></a></li>    
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane " id="table<?php echo $value->id_panel; ?>">
                                    <div class="weather-info">                    
                                        <table id="hasil_singkat<?php echo $value->id_panel; ?>" class="display nowrap dataTable" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>                                
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Jawaban</th>                                            
                                                </tr>
                                            </thead>                       
                                            <tbody>                                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="weather-box">
                                        <div class="weather-top">
                                            <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                            </h2>     
                                            <br>
                                            <div class="m-t-25">
                                                <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane active" id="chart<?php echo $value->id_panel; ?>">
                                    <div class="weather-info">                    
                                        <div id="pie_chart<?php echo $value->id_panel; ?>" style="width:auto; height:300px;"></div>
                                    </div>
                                    <div class="weather-box">
                                        <div class="weather-top">
                                            <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                            </h2>     
                                            <br>
                                            <div class="m-t-25">
                                                <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>     

                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-6 col-md-12">            
                        <div class="white-box">    
                            <button class="pull-right btn btn-info btn-sm" onclick="DownloadImage<?php echo $value->id_panel; ?>()"><i class="fa fa-picture-o m-r-5"></i>Save Image</button>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active nav-item"><a href="#chart<?php echo $value->id_panel; ?>" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Pie Chart</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="chart<?php echo $value->id_panel; ?>">
                                    <div class="weather-info">                    
                                        <div id="pie_chart<?php echo $value->id_panel; ?>" style="width:auto; height:300px;"></div>
                                    </div>
                                    <div class="weather-box">
                                        <div class="weather-top">
                                            <h2 class="pull-left">PANEL <?php echo $i; ?>: <?php echo strtoupper($value->nama_panel); ?> <br>
                                            </h2>     
                                            <br>
                                            <div class="m-t-25">
                                                <small><?php echo ucwords(strtolower($value->pertanyaan)); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php
                $i++;
            }  //ngatur nomor urut
        } else {
            ?>
            <div class="text-center center col-md-12">
                <div class="white-box">
                    <h1>ANDA BELUM MEMBUAT PANEL PERTANYAAN</h1>
                    <h4 class="text-uppercase">Silahkan Klik Tombol Dibawah Ini Untuk Menambahkan/Membuat Panel Di Menu Panel.</h4>
                    <a href="<?php echo site_url('kuisioner/detail_kuisioner/' . $get_kuisioner[0]->id_kuisioner); ?>" class="m-t-30 btn btn-info btn-rounded waves-effect waves-light m-b-40">Buat Panel</a> 
                </div> 
            </div>     
        <?php }
        ?>          
    </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

                    function getJSON(url) {
                        var resp;
                        var xmlHttp;
                        resp = '';
                        xmlHttp = new XMLHttpRequest();

                        if (xmlHttp != null)
                        {
                            xmlHttp.open("GET", url, false);
                            xmlHttp.send(null);
                            resp = xmlHttp.responseText;
                        }

                        return resp;
                    }
</script>
<?php
if (!empty($get_all_panel)) {
    foreach ($get_all_panel as $key => $value) {
        ?>
        <?php if ($value->tipe_panel == 1) { ?>
            <script>
                var hasil<?php echo $value->id_panel; ?> = $('#hasil_essai<?php echo $value->id_panel; ?>').DataTable({
                    "searchable": true,
                    "processing": true,
                    "pageLength": 5,
                    "lengthMenu": [[5, 10], [5, 10]],
                    //"serverSide": true,
                    "ajax": {
                        "url": '<?php echo site_url('datatable/datatable/get_essai/' . $value->id_panel); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "id_mahasiswa", "name": "number"},
                        {"data": "nama_mhs", "name": "nama_mhs"},
                        {"data": "jawaban", "name": "jawaban"}
                    ],
                    'columnDefs': [
                        {
                            orderable: false,
                            targets: 0,
                        }
                    ],

                    "order": [[1, 'asc']]
                });
                hasil<?php echo $value->id_panel; ?>.on('order.dt search.dt', function () {
                    hasil<?php echo $value->id_panel; ?>.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            </script>
        <?php } elseif ($value->tipe_panel == 2) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;
                var json_pil_tunggal_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_pilihan_tunggal/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_pil_tunggal_<?php echo $value->id_panel; ?>);

                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);

                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        chartArea: {left: 20, right: 20, bottom: 20, top: 40, width: "100%"}
                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.PieChart(document.getElementById('pie_chart<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);

                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'select', selectHandler);

                    function selectHandler() {
                        var selection = chart<?php echo $value->id_panel; ?>.getSelection();
                        if (selection.length) {
                            var pieSliceLabel = data<?php echo $value->id_panel; ?>.getValue(selection[0].row, 0);

                        }
                    }
                }

                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }

            </script>
        <?php } elseif ($value->tipe_panel == 3) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;

                var json_pil_jamak_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_pilihan_jamak/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_pil_jamak_<?php echo $value->id_panel; ?>);
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);
                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        chartArea: {left: 20, right: 20, bottom: 20, top: 40, width: "100%"}

                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.PieChart(document.getElementById('pie_chart<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);

                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'select', selectHandler);

                    function selectHandler() {
                        var selection = chart<?php echo $value->id_panel; ?>.getSelection();
                        if (selection.length) {
                            var pieSliceLabel = data<?php echo $value->id_panel; ?>.getValue(selection[0].row, 0);

                        }
                    }
                }
                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }
            </script>
        <?php } elseif ($value->tipe_panel == 4) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;

                var json_pil_dropdown_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_pilihan_dropdown/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_pil_dropdown_<?php echo $value->id_panel; ?>);
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);
                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        chartArea: {left: 20, right: 20, bottom: 20, top: 40, width: "100%"}
                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.PieChart(document.getElementById('pie_chart<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);

                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'select', selectHandler);

                    function selectHandler() {
                        var selection = chart<?php echo $value->id_panel; ?>.getSelection();
                        if (selection.length) {
                            var pieSliceLabel = data<?php echo $value->id_panel; ?>.getValue(selection[0].row, 0);

                        }
                    }
                }
                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }

            </script>
        <?php } elseif ($value->tipe_panel == 5) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;

                var json_kisi_tunggal_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_kisi_tunggal/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_kisi_tunggal_<?php echo $value->id_panel; ?>);
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);
                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        bar: {groupWidth: "90%"},
                        titleTextStyle: {
                            bold: true,
                            fontSize: 12
                        },
                        chartArea: {left: 60, right: 140, bottom: 50, top: 50, width: "100%"}
                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.ColumnChart(document.getElementById('kisi_tunggal<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);
                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'ready', function () {
                        download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                    });

                }
                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }
            </script>
        <?php } elseif ($value->tipe_panel == 6) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;

                var json_kisi_jamak_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_kisi_jamak/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_kisi_jamak_<?php echo $value->id_panel; ?>);
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);
                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        bar: {groupWidth: "90%"},
                        titleTextStyle: {
                            bold: true,
                            fontSize: 12
                        },
                        chartArea: {left: 60, right: 140, bottom: 50, top: 50, width: "100%"}
                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.ColumnChart(document.getElementById('kisi_jamak<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);
                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'ready', function () {
                        download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                    });

                }
                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }
            </script>
        <?php } elseif ($value->tipe_panel == 7) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;

                var json_pil_skala_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_pilihan_skala/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_pil_skala_<?php echo $value->id_panel; ?>);
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);
                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        chartArea: {left: 20, right: 20, bottom: 20, top: 40, width: "100%"}
                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.PieChart(document.getElementById('pie_chart<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);

                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'select', selectHandler);

                    function selectHandler() {
                        var selection = chart<?php echo $value->id_panel; ?>.getSelection();
                        if (selection.length) {
                            var pieSliceLabel = data<?php echo $value->id_panel; ?>.getValue(selection[0].row, 0);

                        }
                    }
                }

                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }
            </script>
        <?php } elseif ($value->tipe_panel == 8) { ?>
            <script>
                var upload<?php echo $value->id_panel; ?> = $('#hasil_upload<?php echo $value->id_panel; ?>').DataTable({
                    "searchable": true,
                    "processing": true,
                    "pageLength": 5,
                    "lengthMenu": [[5, 10], [5, 10]],
                    //"serverSide": true,
                    "ajax": {
                        "url": '<?php echo site_url('datatable/datatable/get_upload/' . $value->id_panel); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "id_mahasiswa", "name": "number"},
                        {"data": "nama_mhs", "name": "nama_mhs"},
                        {"data": "jawaban", "render": function (data, type, row) {
                                var exp = '<a href="<?php echo base_url() . '/'; ?>' + data + '" target="_blank"><span class="label label-success"><i class="fa fa-download m-r-5"></i> download file</span></a>';
                                return exp;
                            }, "name": "jawaban"},
                    ],
                    'columnDefs': [
                        {
                            orderable: false,
                            targets: 0,
                        }
                    ],
                    "order": [[1, 'asc']]
                });
                upload<?php echo $value->id_panel; ?>.on('order.dt search.dt', function () {
                    upload<?php echo $value->id_panel; ?>.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            </script>
        <?php } elseif ($value->tipe_panel == 9) { ?>
            <script type="text/javascript">
                var chart<?php echo $value->id_panel; ?>;

                var json_pil_singkat_<?php echo $value->id_panel; ?> = getJSON('<?php echo site_url('kuisioner/get_ajax_pilihan_singkat/' . $value->id_kuisioner . '/' . $value->id_panel); ?>');
                var duce_<?php echo $value->id_panel; ?> = jQuery.parseJSON(json_pil_singkat_<?php echo $value->id_panel; ?>);
                google.charts.load("current", {packages: ["corechart"]});
                google.charts.setOnLoadCallback(drawChart<?php echo $value->id_panel; ?>);
                function drawChart<?php echo $value->id_panel; ?>() {
                    var data<?php echo $value->id_panel; ?> = google.visualization.arrayToDataTable(duce_<?php echo $value->id_panel; ?>);
                    var options<?php echo $value->id_panel; ?> = {
                        title: '<?php echo $value->pertanyaan; ?>',
                        chartArea: {left: 0, right: 20, bottom: 20, top: 40, width: "100%"}
                    };
                    chart<?php echo $value->id_panel; ?> = new google.visualization.PieChart(document.getElementById('pie_chart<?php echo $value->id_panel; ?>'));
                    chart<?php echo $value->id_panel; ?>.draw(data<?php echo $value->id_panel; ?>, options<?php echo $value->id_panel; ?>);

                    google.visualization.events.addListener(chart<?php echo $value->id_panel; ?>, 'select', selectHandler);

                    function selectHandler() {
                        var selection = chart<?php echo $value->id_panel; ?>.getSelection();
                        if (selection.length) {
                            var pieSliceLabel = data<?php echo $value->id_panel; ?>.getValue(selection[0].row, 0);
                        }
                    }
                }
                function DownloadImage<?php echo $value->id_panel; ?>() {
                    download(chart<?php echo $value->id_panel; ?>.getImageURI(), '<?php echo $value->pertanyaan; ?>.png', "image/png");
                }

            </script>
            <script>
                var hasil<?php echo $value->id_panel; ?> = $('#hasil_singkat<?php echo $value->id_panel; ?>').DataTable({
                    "searchable": true,
                    "processing": true,
                    "pageLength": 5,
                    "lengthMenu": [[5, 10], [5, 10]],
                    //"serverSide": true,
                    "ajax": {
                        "url": '<?php echo site_url('datatable/datatable/get_singkat/' . $value->id_panel); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "id_mahasiswa", "name": "number"},
                        {"data": "nama_mhs", "name": "nama_mhs"},
                        {"data": "jawaban", "name": "jawaban"}
                    ],
                    'columnDefs': [
                        {
                            orderable: false,
                            targets: 0,
                        }
                    ],

                    "order": [[1, 'asc']]
                });
                hasil<?php echo $value->id_panel; ?>.on('order.dt search.dt', function () {
                    hasil<?php echo $value->id_panel; ?>.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
            </script>

        <?php }
        ?>
        <?php
    }  //ngatur nomor urut
}
?>
<script>
    function download(data, strFileName, strMimeType) {

        var self = window, // this script is only for browsers anyway...
                u = "application/octet-stream", // this default mime also triggers iframe downloads
                m = strMimeType || u,
                x = data,
                D = document,
                a = D.createElement("a"),
                z = function (a) {
                    return String(a);
                },
                B = self.Blob || self.MozBlob || self.WebKitBlob || z,
                BB = self.MSBlobBuilder || self.WebKitBlobBuilder || self.BlobBuilder,
                fn = strFileName || "download",
                blob,
                b,
                ua,
                fr;

        //if(typeof B.bind === 'function' ){ B=B.bind(self); }

        if (String(this) === "true") { //reverse arguments, allowing download.bind(true, "text/xml", "export.xml") to act as a callback
            x = [x, m];
            m = x[0];
            x = x[1];
        }
        //go ahead and download dataURLs right away
        if (String(x).match(/^data\:[\w+\-]+\/[\w+\-]+[,;]/)) {
            return navigator.msSaveBlob ? // IE10 can't do a[download], only Blobs:
                    navigator.msSaveBlob(d2b(x), fn) :
                    saver(x); // everyone else can save dataURLs un-processed
        } //end if dataURL passed?

        try {

            blob = x instanceof B ?
                    x :
                    new B([x], {
                        type: m
                    });
        } catch (y) {
            if (BB) {
                b = new BB();
                b.append([x]);
                blob = b.getBlob(m); // the blob
            }

        }

        function d2b(u) {
            var p = u.split(/[:;,]/),
                    t = p[1],
                    dec = p[2] == "base64" ? atob : decodeURIComponent,
                    bin = dec(p.pop()),
                    mx = bin.length,
                    i = 0,
                    uia = new Uint8Array(mx);

            for (i; i < mx; ++i)
                uia[i] = bin.charCodeAt(i);

            return new B([uia], {
                type: t
            });
        }

        function saver(url, winMode) {
            if ('download' in a) { //html5 A[download] 			
                a.href = url;
                a.setAttribute("download", fn);
                a.innerHTML = "downloading...";
                D.body.appendChild(a);
                setTimeout(function () {
                    a.click();
                    D.body.removeChild(a);
                    if (winMode === true) {
                        setTimeout(function () {
                            self.URL.revokeObjectURL(a.href);
                        }, 250);
                    }
                }, 66);
                return true;
            }

            //do iframe dataURL download (old ch+FF):
            var f = D.createElement("iframe");
            D.body.appendChild(f);
            if (!winMode) { // force a mime that will download:
                url = "data:" + url.replace(/^data:([\w\/\-\+]+)/, u);
            }


            f.src = url;
            setTimeout(function () {
                D.body.removeChild(f);
            }, 333);

        } //end saver 


        if (navigator.msSaveBlob) { // IE10+ : (has Blob, but not a[download] or URL)
            return navigator.msSaveBlob(blob, fn);
        }

        if (self.URL) { // simple fast and modern way using Blob and URL:
            saver(self.URL.createObjectURL(blob), true);
        } else {
            // handle non-Blob()+non-URL browsers:
            if (typeof blob === "string" || blob.constructor === z) {
                try {
                    return saver("data:" + m + ";base64," + self.btoa(blob));
                } catch (y) {
                    return saver("data:" + m + "," + encodeURIComponent(blob));
                }
            }

            // Blob but not URL:
            fr = new FileReader();
            fr.onload = function (e) {
                saver(this.result);
            };
            fr.readAsDataURL(blob);
        }
        return true;
    } /* end download() */
</script>

