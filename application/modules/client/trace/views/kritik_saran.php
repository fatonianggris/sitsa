<?php $client = $this->session->userdata("sitsa-client"); ?>
<div id="wizard_container">
    <div id="top-wizard">
        <span id="location"></span>
        <div id="progressbar"></div>
    </div>
    <!-- /top-wizard -->
    <form id="wrapped" method="POST" action="<?php echo site_url('trace/post_saran_mahasiswa'); ?>" enctype="multipart/form-data">
        <!-- Leave for security protection, read docs for details -->
        <?php echo $this->session->flashdata('flash_message'); ?>
        <div id="middle-wizard">	                       
            <!-- /Start Branch ============================== -->
            <div class="submit">
                <h2 class="section_title">Kritik & Saran</h2>
                <h3 class="main_question">Silahkan masukan kritik dan atau saran anda, terkait proses pembelajaran di Kampus selama ini.</h3>
                <div class="form-group add_top_30">
                    <label for="short_bio">Opini Anda</label>
                    <textarea name="isi_saran" id="short_bio" class="form-control required" style="height: 150px"></textarea>
                </div>
                <label class="add_top_20">Profil Mahasiswa</label>
                <div class="form-group">
                    <label for="nama_mahasiswa">Nama Mahasiswa</label>                   
                    <input type="text" name="nama_mhs" id="nama_mahasiswa" value="<?php echo strtoupper($client['nama_mhs']) ?>" class="form-control required" readonly>
                </div>
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" name="fakultas_mhs" id="fakultas" value="<?php echo strtoupper($client['nama_fakultas']) ?>" class="form-control required" readonly>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi_mhs" id="prodi"  value="<?php echo strtoupper($client['nama_prodi']) ?>" class="form-control required" readonly>
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