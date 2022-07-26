<?php
$user = $this->session->userdata('sitsa');
$template = $this->db->get_where('login_kuisioner', array('id_login_kuisioner' => 1))->result();
?>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part"><a class="logo" href="index.html"><b><img src="<?php echo base_url() . $template[0]->logo_login; ?>" alt="home" width="39" /></b><span class="hidden-xs">
                    <img src="<?php echo base_url() . $template[0]->gambar_nama_login; ?>" height="40" alt="home" /></span></a></div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo base_url() . $user['foto_akun']; ?>" alt="user-img" width="36"  height="36" class="img-circle"><b class="hidden-xs"><?php echo ucwords($user['nama_akun']); ?></b> </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">               
                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>                      
            <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
</nav>