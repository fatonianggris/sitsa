<?php $client = $this->session->userdata("sitsa-client"); ?>
<div id="wizard_container">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="" method="POST" action="<?php echo site_url('trace/post_jawaban_upload/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data">
        <input name="pertanyaan" type="hidden" value="<?php echo $get_panel[0]->pertanyaan; ?>">        
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit">
                <h2 class="section_title">Isi Kolom Berikut</h2>
                <h3 class="main_question color-green"><?php echo $get_panel[0]->pertanyaan; ?></h3>
                <div class="form-group add_top_30 add_bottom_30">
                    <label for="short_bio">Upload File Anda</label>
                    <input type="file" name="file_upload" class="dropify" data-max-file-size="<?php echo $get_upload[0]->ukuran_file; ?>M" data-allowed-file-extensions="<?php echo $get_upload[0]->format_file; ?>"  <?php echo $get_panel[0]->status_required_panel; ?>/>             
                    <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                        <small class="form-text"><b class="text-danger">*WAJIB </b>diisi, "Berformat <?php echo $get_upload[0]->format_file; ?>, dan berukuran dibawah <?php echo $get_upload[0]->ukuran_file; ?>Mb"</small>  
                    <?php } else { ?>
                        <small class="form-text"><b class="text-danger">*TIDAK WAJIB </b>diisi, "Berformat <?php echo $get_upload[0]->format_file; ?>, dan berukuran dibawah <?php echo $get_upload[0]->ukuran_file; ?>Mb"</small>  
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
<!-- /Wizard container -->