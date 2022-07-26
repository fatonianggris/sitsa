<?php $client = $this->session->userdata("sitsa-client"); ?>
<div id="wizard_container">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="wrapped" method="POST" action="<?php echo site_url('trace/post_jawaban_tunggal/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data">
        <input name="pertanyaan" type="hidden" value="<?php echo $get_panel[0]->pertanyaan; ?>">        
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit step" data-state="branchtype">
                <h2 class="section_title">Isi Kolom Berikut</h2>
                <h3 class="main_question color-green"><?php echo $get_panel[0]->pertanyaan; ?></h3>
                <div class="form-group">
                    <?php
                    $i = 1;
                    if (!empty($get_opsi_tunggal)) {
                        foreach ($get_opsi_tunggal as $key => $value) {
                            ?> 
                            <label class="container_radio version_2"><?php echo strtoupper($value->opsi); ?>
                                <input type="radio" name="opsi" value="<?php echo strtolower($value->opsi); ?>,<?php echo $value->panel_tujuan; ?>" class="radios <?php echo $get_panel[0]->status_required_panel; ?>">
                                <span class="checkmark"></span>
                            </label>                            
                            <?php
                            $i++;
                        }  //ngatur nomor urut
                    }
                    ?>
                    <input type="text" name="jawaban_lainnya" id="jawaban" disabled class="form-control required fl-input valid" placeholder="Input Jawaban Anda">
                </div>
                <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                    <small>* <b class="text-danger">WAJIB</b> dipilih & pilih salah satu</small>
                <?php } else { ?>
                    <small>* <b class="text-danger">TIDAK WAJIB</b> dipilih & pilih salah satu</small>
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
<script type="text/javascript">
    var jawaban = $('#jawaban');
    jawaban.hide();
    $(".radios").change(function () {
        var selValue = $("input[type='radio']:checked").val().split(',');
        if (selValue[0] == 'lainnya') {
            jawaban.prop('disabled', false);
            jawaban.show();
        } else {
            jawaban.prop('disabled', true);
            jawaban.hide();
            jawaban.val("")
        }
    });
</script>