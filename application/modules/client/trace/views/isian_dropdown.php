<?php $client = $this->session->userdata("sitsa-client"); ?>
<div id="wizard_container">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="wrapped" method="POST" action="<?php echo site_url('trace/post_jawaban_dropdown/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data">
        <input name="pertanyaan" type="hidden" value="<?php echo $get_panel[0]->pertanyaan; ?>">        
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit">
                <h2 class="section_title">Isi Kolom Berikut</h2>
                <h3 class="main_question color-green"><?php echo $get_panel[0]->pertanyaan; ?></h3>
                <div class="form-group add_bottom_30 add_top_30">                  
                    <label for="ui_designer_experience_1">Pilih Jawaban</label>
                    <div class="styled-select clearfix add_top_10">
                        <select class="form-control <?php echo $get_panel[0]->status_required_panel; ?>" name="opsi" id="ui_designer_experience_1">
                            <option value="">Pilih Jawaban</option>
                            <?php
                            $i = 1;
                            if (!empty($get_opsi_dropdown)) {
                                foreach ($get_opsi_dropdown as $key => $value) {
                                    ?> 
                                    <option value="<?php echo strtolower($value->opsi); ?>,<?php echo $value->panel_tujuan; ?>"><b><?php echo strtoupper($value->opsi); ?></b></option>
                                    <?php
                                    $i++;
                                }  //ngatur nomor urut
                            }
                            ?>
                        </select>
                        <input type="text" name="jawaban_lainnya" id="jawaban" disabled class="form-control fl-input add_top_20" required placeholder="Input Jawaban Anda">
                    </div>
                    <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                        <small>* <b class="text-danger">WAJIB</b> dipilih & pilih salah satu</small>
                    <?php } else { ?>
                        <small>* <b class="text-danger">TIDAK WAJIB</b> dipilih & pilih salah satu</small>
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
<script type="text/javascript">
    var jawaban = $('#jawaban');
    jawaban.hide();
    $("#ui_designer_experience_1").change(function () {
        var selValue = this.value.split(',');
        if (selValue[0] == 'lainnya') {
            jawaban.prop('disabled', false);
            jawaban.show();
        } else {
            jawaban.prop('disabled', true);
            jawaban.hide();
            jawaban.val("");
        }
    });
</script>