<div id="wizard_container">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="wrapped" method="POST" action="<?php echo site_url('trace/post_jawaban_singkat/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data">
        <input name="pertanyaan" type="hidden" value="<?php echo $get_panel[0]->pertanyaan; ?>">        
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit step">
                <h2 class="section_title">Isi Kolom Berikut</h2>
                <h3 class="main_question color-green"><?php echo $get_panel[0]->pertanyaan; ?></h3>
                <div class="form-group add_top_30">
                    <label for="short_bio">Jawaban Anda</label>
                    <input type="<?php echo $get_opsi_singkat[0]->tipe_pertanyaan; ?>" name="jawaban" id="name" class="form-control <?php echo $get_panel[0]->status_required_panel; ?> fl-input valid" placeholder="Inputkan Jawaban Anda">
                    <?php
                    if ($get_opsi_singkat[0]->tipe_pertanyaan == 'number') {
                        $tipe = 'Angka';
                    } elseif ($get_opsi_singkat[0]->tipe_pertanyaan == 'text') {
                        $tipe = 'Teks';
                    } elseif ($get_opsi_singkat[0]->tipe_pertanyaan == 'email') {
                        $tipe = 'Email';
                    }
                    ?>
                    <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                        <small>* <b class="text-danger">WAJIB</b> diisi & Inputan Wajib Berupa <?php echo $tipe; ?></small>
                    <?php } else { ?>
                        <small>* <b class="text-danger">TIDAK WAJIB</b> diisi &  Inputan Wajib Berupa <?php echo $tipe; ?></small>
                    <?php } ?>
                </div>                
            </div>
        </div>
        <!-- /middle-wizard -->
        <div id="bottom-wizard">           
            <button type="submit" name="process" class="submit">Submit</button>
        </div>
        <!-- /bottom-wizard -->
    </form>
</div>
