<?php $client = $this->session->userdata("sitsa-client"); ?>

<div id="wizard_container_700">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="wrapped" method="POST" action="<?php echo site_url('trace/post_jawaban_skala/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data">
        <input name="pertanyaan" type="hidden" value="<?php echo $get_panel[0]->pertanyaan; ?>">           
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit step">
                <h2 class="section_title">Isi Kolom Berikut</h2>
                <h3 class="main_question color-green"><?php echo $get_panel[0]->pertanyaan; ?></h3>
                <div class="form-group radio_input text-center">
                    <?php
                    if (!empty($get_skala)) {
                        ?>
                        <label class="container_radio container_radio_edit">
                            <?php echo strtoupper($get_skala[0]->nama_rentang_awal); ?>
                        </label>
                        <label class="container_radio container_radio_edit">
                        </label>
                        <?php for ($x = 1; $x <= $get_skala[0]->ukuran_rentang; $x++) { ?>
                            <label class="container_radio container_radio_edit">
                                <?php echo $x; ?>
                            </label>
                            <label class="container_radio container_radio_edit">
                                <input type="radio" name="jawaban" value="<?php echo $x; ?>" class="<?php echo $get_panel[0]->status_required_panel; ?>">
                                <span class="checkmark"></span>
                            </label>
                        <?php } ?>
                        <label class="container_radio container_radio_edit">
                        </label>    
                        <label class="container_radio container_radio_edit">
                            <?php echo strtoupper($get_skala[0]->nama_rentang_akhir); ?>
                        </label>
                        <?php
                    }
                    ?>
                </div>
                <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                    <small>* <b class="text-danger">WAJIB</b> dipilih & pilih rentang</small>
                <?php } else { ?>
                    <small>* <b class="text-danger">TIDAK WAJIB</b> dipilih & pilih rentang</small>
                <?php } ?>
            </div>
        </div>
        <!-- /middle-wizard -->
        <div id="bottom-wizard">          
            <button type="submit" name="process" class="submit">Submit</button>
        </div>
        <!-- /bottom-wizard -->
    </form>
</div>
<!-- /Wizard container -->