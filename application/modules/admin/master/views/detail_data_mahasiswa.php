<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Halaman Detail Produk</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="<?php echo site_url('produk/add_produk'); ?>" class="btn btn-info pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus m-r-5"></i>Tambah Produk </a>
            <ol class="breadcrumb">               
                <li><a href="#">Produk</a></li>
                <li class="active">Detail Produk</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Foto Produk "<?php echo $detail_produk[0]->nama_produk; ?>"</div>
                <div class="panel-wrapper p-b-10 collapse in">
                    <div id="owl-demo2" class="owl-carousel owl-theme">
                        <?php
                        if (!empty($foto_produk)) {
                            foreach ($foto_produk as $key => $value) {
                                ?> 
                                <div class="item">
                                    <a href="<?php echo base_url() . $value->gambar_produk_thumb; ?>" class="image-popup-fit-width" title="Deskripsi: <?php echo ucwords($detail_produk[0]->nama_produk); ?>">                         
                                        <img src="<?php echo base_url() . $value->gambar_produk_thumb; ?>" alt="Owl Image">
                                    </a>
                                </div>
                                <?php
                            }  //ngatur nomor urut
                        } else {
                            ?> 
                            <div class="item">
                                <a href="<?php echo base_url() . "uploads/data/no_image.jpg"; ?>" class="image-popup-fit-width" title="Deskripsi: <?php echo ucwords($detail_produk[0]->nama_produk); ?>">                         
                                    <img src="<?php echo base_url() . "uploads/data/no_image.jpg"; ?>" alt="Owl Image">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="white-box">
                <h4 class="">Detail Produk "<?php echo ucwords($detail_produk[0]->nama_produk); ?>"</h4>
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Produk</strong>
                        <br>
                        <p class="text-muted"><?php echo ucwords($detail_produk[0]->nama_produk); ?></p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Rekomendasi?</strong>
                        <br>
                        <?php if ($detail_produk[0]->status_rekomendasi == 1) { ?>
                            <span class="label label-success label-detail">YA</span>
                        <?php } else { ?>
                            <span class="label label-danger label-detail">TIDAK</span>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Bahan Produk</strong>
                        <br>
                        <p class="text-muted"><?php echo $detail_produk[0]->bahan_produk; ?></p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Minimal Pembelian</strong>
                        <br>
                        <p class="text-muted"><?php echo $detail_produk[0]->minimal_pembelian; ?> item</p>
                    </div>
                </div>   
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Stok Barang</strong>
                        <br>
                        <p class="text-muted"><?php echo $detail_produk[0]->stok_barang; ?> item</p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Status Promo</strong>
                        <br>
                        <?php if ($detail_produk[0]->status_promo == 1) { ?>
                            <span class="label label-success label-detail">YA</span>
                        <?php } else { ?>
                            <span class="label label-danger label-detail">TIDAK</span>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Berat Barang</strong>
                        <br>
                        <p class="text-muted"><?php echo $detail_produk[0]->berat_barang; ?> gram</p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Kondisi Barang</strong>
                        <br>
                        <?php if ($detail_produk[0]->kondisi_barang == 1) { ?>
                            <span class="label label-success label-detail">BARU</span>
                        <?php } else if ($detail_produk[0]->kondisi_barang == 2) { ?>
                            <span class="label label-danger label-detail">BEKAS</span>
                        <?php } else { ?>
                            <p class="text-muted">
                                <b>TIDAK ADA KONDISI PRODUK</b>
                            </p>
                        <?php } ?>
                    </div>
                </div>  
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Merek</strong>
                        <br>
                        <p class="text-muted">
                            <?php if ($detail_produk[0]->nama_merek != '' or $detail_produk[0]->nama_merek != NULL) { ?>                               
                                <b><?php echo strtoupper($detail_produk[0]->nama_merek); ?></b>
                            <?php } else { ?>
                                <b>TIDAK ADA MEREK PRODUK</b>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Asal Produk</strong>
                        <br>
                        <?php if ($detail_produk[0]->asal_produk == 1) { ?>
                            <span class="label label-success label-detail">LOKAL</span>
                        <?php } else if ($detail_produk[0]->asal_produk == 2) { ?>
                            <span class="label label-danger label-detail">IMPOR</span>
                        <?php } else { ?>
                            <p class="text-muted">
                                <b>TIDAK ADA ASAL PRODUK</b>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Nama Kategori</strong>
                        <br>
                        <p class="text-muted"><b><?php echo ucwords($detail_produk[0]->nama_kategori); ?></b></p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Tag Barang</strong>
                        <br>
                        <p class="text-muted">
                            <?php
                            $id_array_tag = explode(',', $detail_produk[0]->tag_barang);
                            if (!empty($id_array_tag)) {
                                foreach ($id_array_tag as $key) {
                                    ?>
                                    <span class="label label-info label-detail"><?php echo strtolower($key); ?></span> 
                                    <?php
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>  
                <hr>
                <div class="row">
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Ukuran Barang</strong>
                        <br>
                        <p class="text-muted">
                            <?php if ($detail_produk[0]->ukuran_barang == 0) { ?>
                                <b>TIDAK ADA UKURAN</b>
                            <?php } else { ?>
                                <?php
                                $id_ukuran = $detail_produk[0]->ukuran_barang;
                                $id_array_ukuran = explode(',', $id_ukuran);
                                if (!empty($size)) {
                                    foreach ($size as $key => $value) {
                                        if (in_array($value->id_size, $id_array_ukuran)) {
                                            ?>
                                            <span class="label label-info label-detail"><?php echo strtoupper($value->nama_size); ?></span> 
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Warna Barang</strong>
                        <br>
                        <p class="text-muted">
                            <?php if ($detail_produk[0]->warna_barang == 0) { ?>
                                <b>TIDAK ADA WARNA</b>
                            <?php } else { ?>
                                <?php
                                $id_warna = $detail_produk[0]->warna_barang;
                                $id_array_warna = explode(',', $id_warna);
                                if (!empty($warna)) {
                                    foreach ($warna as $key => $value) {
                                        if (in_array($value->id_warna, $id_array_warna)) {
                                            ?>
                                            <span class="label label-info label-detail"> <?php echo strtoupper($value->nama_warna); ?></span> 
                                            <?php
                                        }
                                    }
                                }
                                ?>    
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6 b-r"> <strong>Voucher </strong>
                        <br>
                        <p class="text-muted">
                            <?php if ($detail_produk[0]->voucher == 0) { ?>
                                <b>TANPA VOUCHER</b>
                            <?php } else { ?>
                                <b><?php echo ucwords($detail_produk[0]->kode_voucher); ?> (<?php echo $detail_produk[0]->potongan; ?>%)</b>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-6"> <strong>Potongan </strong>
                        <br>
                        <?php if ($detail_produk[0]->potongan_harga != "" or $detail_produk[0]->potongan_harga != NULL) { ?>
                            <p class="text-muted"><b><?php echo $detail_produk[0]->potongan_harga; ?> %</b></p>
                        <?php } else { ?>
                            <p class="text-muted"><b>Tidak Ada</b></p>
                        <?php } ?>
                    </div>
                </div>  
                <hr>
                <div class="row">
                    <div class="col-md-12 col-xs-12"> <strong>Spesifikasi Barang</strong>
                        <br>
                        <p class="text-muted"><?php echo $detail_produk[0]->spesifikasi_barang; ?></p>
                    </div>
                </div>  
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xs-6 b-r"> <strong>Link Shopee</strong>
                        <br>
                        <p class="text-muted"><a href="<?php echo $detail_produk[0]->link_shopee; ?>" target="_blank"><?php echo $detail_produk[0]->link_shopee; ?></a></p>
                    </div>
                    <div class="col-md-6 col-xs-6"> <strong>Link Lazada</strong>
                        <br>
                        <p class="text-muted"><a href="<?php echo $detail_produk[0]->link_lazada; ?>" target="_blank"><?php echo $detail_produk[0]->link_lazada; ?></a></p>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xs-6 b-r"> <strong>Link Tokopedia</strong>
                        <br>
                        <p class="text-muted"><a href="<?php echo $detail_produk[0]->link_tokopedia; ?>" target="_blank"><?php echo $detail_produk[0]->link_tokopedia; ?></a></p>
                    </div>
                    <div class="col-md-6 col-xs-6"> <strong>Link Bukalapak</strong>
                        <br>
                        <p class="text-muted"><a href="<?php echo $detail_produk[0]->link_bukalapak; ?>" target="_blank"><?php echo $detail_produk[0]->link_bukalapak; ?></a></p>
                    </div>
                </div>               
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Harga Produk</h3>
                        <hr> 
                        <?php if ($detail_produk[0]->status_promo == 1) { ?>
                            <small>Harga Utama</small>
                            <h4>Rp. <strike><?php echo $detail_produk[0]->harga_barang; ?></strike></h4>
                            <small class="text-danger"><strong>Harga Promo (diskon)</strong></small>
                            <h2><strong>Rp. <?php echo str_replace(",", ".", number_format($detail_produk[0]->harga_promo)); ?></strong></h2>
                        <?php } else { ?>
                            <small>Harga Utama</small>
                            <h2><strong>Rp. <?php echo $detail_produk[0]->harga_barang; ?></strong></h2>
                        <?php } ?>
                        <hr>
                        <button type="submit" onclick="window.history.back();" class="btn btn-default uploadfiles"><i class="fa fa-arrow-left m-r-5"></i> Kembali</button>                       
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- /.row -->
</div>