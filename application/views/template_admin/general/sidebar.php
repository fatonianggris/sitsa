<ul class="nav" id="side-menu">
    <li><a href="<?php echo site_url('dashboard/'); ?>" class="waves-effect"><i class="linea-icon linea-ecommerce fa-fw" data-icon="S"></i> <span class="hide-menu">Dashboard <span class="fa arrow"></span> </span></a>
    </li>                      
    <li><a href="<?php echo site_url('kuisioner/'); ?>" class="waves-effect"><i data-icon="&#xe01a;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Kuisioner <span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo site_url('kuisioner/daftar_kuisioner'); ?>">Daftar Kuisioner</a></li>
            <li><a href="<?php echo site_url('kuisioner/hasil_kuisioner'); ?>">Daftar Hasil Kuisioner</a> </li>            
        </ul>
    </li>  
    <li> <a href="<?php echo site_url('master/'); ?>" class="waves-effect"><i data-icon="&#xe001;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Data Master </span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('master/mahasiswa/daftar_data_mahasiswa'); ?>">Data Mahasiswa</a> </li>
            <li> <a href="<?php echo site_url('master/fakultasprodi/daftar_data_fakultas_prodi'); ?>">Data Fakultas & Prodi</a> </li>  
        </ul>
    </li>
    <li> <a href="<?php echo site_url('akun/'); ?>" class="waves-effect"><i data-icon="5" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Data Akun </span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('akun/daftar_data_akun'); ?>">Daftar Akun</a> </li>           
        </ul>
    </li>
    <li> <a href="<?php echo site_url('kontak/'); ?>" class="waves-effect"><i data-icon="V" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Laporan & Saran </span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('kontak/daftar_laporan_mahasiswa'); ?>">Daftar Laporan</a> </li>
            <li> <a href="<?php echo site_url('kontak/daftar_saran_mahasiswa'); ?>">Daftar Saran</a> </li>  
        </ul>
    </li>
    <li> <a href="<?php echo site_url('pengaturan/'); ?>" class="waves-effect"><i data-icon="&#xe005;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Pengaturan </span></a> 
        <ul class="nav nav-second-level">
            <li> <a href="<?php echo site_url('pengaturan/setting_kuisioner_page'); ?>">Atur Halaman Kuisioner</a> </li>
            <li> <a href="<?php echo site_url('pengaturan/setting_login_page'); ?>">Atur Halaman Login</a> </li>  
            <li> <a href="<?php echo site_url('mailer/mail/setting_mailer'); ?>">Atur Mailer</a> </li>  
        </ul>
    </li>
</ul>