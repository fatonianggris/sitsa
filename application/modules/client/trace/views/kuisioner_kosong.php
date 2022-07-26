<?php $client = $this->session->userdata("sitsa-client"); ?>
<div id="wizard_container_700">
    <!-- Leave for security protection, read docs for details -->
    <?php echo $this->session->flashdata('flash_message'); ?>
    <div id="middle-wizard">	                       
        <!-- /step-->
        <div class="submit step" id="end">
            <div class="summary">
                <div class="">
                    <h2 >MOHON MAAF KUISIONER MASIH PROSES PENGERJAAN<br><span id="name_field"></span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a gallery</p>
                </div>
                <div class="text-center add_top_30">
                    <figure>
                        <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/img/sorry.png" alt="" class="img-fluid" width="400" height="370">
                    </figure>
                </div>
                <div class="add_top_20">
                    <h5>FAKULTAS HUMANIORA UIN MALANG</h5>                    
                </div>
                <a href="<?php echo site_url('home/logout'); ?>" class="btn_1 rounded green add_top_30">KELUAR</a>
            </div>
        </div>
        <!-- /step last-->
    </div>
</div>
<!-- /Wizard container -->