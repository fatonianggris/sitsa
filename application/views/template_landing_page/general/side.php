<?php
$user = $this->session->userdata('sitsa-client');
$template = $this->db->get_where('home_kuisioner', array('id_home_kuisioner' => 1))->result();
?>
<div class="content-left-wrapper">
    <a href="index.html" id="logo"><img src="<?php echo base_url() . $template[0]->logo_kuisioner; ?>" alt="" width="50" height="50"></a>
    <div id="social">
        <ul>
        </ul>
    </div>
    <!-- /social -->
    <div>
        <figure>
            <img src="<?php echo base_url(); ?>main_assets/landing_page_asset/img/info_graphic_1.svg" alt="" class="img-fluid" width="270" height="270">
        </figure>
        <h2>Selamat Datang</h2>
        <p style="font-size: 1.2rem;">
            <b class="text-yellow"><?php echo strtoupper(strtolower($user['nama_mhs'])); ?></b>
            <br>
            <b class="text-yellow"><?php echo $user['nim_mhs']; ?></b>
            <br>
            <b class="text-yellow"><?php echo strtoupper(strtolower($user['nama_fakultas'])); ?></b>
            <br>
            <b class="text-yellow"><?php echo strtoupper(strtolower($user['nama_prodi'])); ?></b>
        </p>
        <p>Silahkan mengisi kuisioner yang sesuai. Jawaban Anda sangat berpengaruh untuk mengidentifikasi profil alumni dan mengetahui relevansi kurikulum yang ditetapkan dengan kebutuhan pasar kerja.</p>    
        <p>Terima Kasih.</p>

    </div>
    <div class="copy">© 2020 UIN Maliki</div>
</div>
<!-- /content-left-wrapper -->