<?php $client = $this->session->userdata("sitsa-client"); ?>
<div id="wizard_container_700">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="wrapped" method="POST" action="<?php echo site_url('trace/post_jawaban_kisi_jamak/' . $get_panel[0]->id_panel); ?>" enctype="multipart/form-data">
        <input name="pertanyaan" type="hidden" value="<?php echo $get_panel[0]->pertanyaan; ?>">           
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit">
                <h2 class="section_title">Isi Kolom Berikut</h2>
                <h3 class="main_question color-green"><?php echo $get_panel[0]->pertanyaan; ?></h3>
                <table class="table table-borderless" id="table1">
                    <thead>
                        <tr>
                            <th></th>
                            <?php foreach ($get_kolom as $key => $value_k) { ?>
                                <th class="text-center">
                                    <?php echo ucwords(strtolower($value_k->opsi_kolom)); ?>
                                </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_baris as $keys => $value_b) { ?>
                            <tr>
                                <td>
                                    <label class="container_check container_radio_kisi">
                                        <?php echo ucwords(strtolower($value_b->opsi_baris)); ?>
                                        <input name="opsi_baris[]" type="hidden" value="<?php echo $value_b->opsi_baris; ?>">           
                                    </label>
                                </td>
                                <?php foreach ($get_kolom as $keyz => $value_k) { ?>
                                    <td class="text-center">
                                        <label class="container_check container_radio_kisi ">
                                            <input type="checkbox" name="opsi_kolom<?php echo $keys; ?>[]" value="<?php echo $value_k->opsi_kolom; ?>" class="<?php echo $get_panel[0]->status_required_panel; ?>">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>

                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if ($get_panel[0]->status_required_panel == 'required') { ?>
                    <small>* <b class="text-danger">WAJIB</b> dipilih & pilih satu atau lebih</small>
                <?php } else { ?>
                    <small>* <b class="text-danger">TIDAK WAJIB</b> dipilih & pilih satu atau lebih</small>
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