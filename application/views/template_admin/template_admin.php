
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $this->load->view('template_admin/general/script_header');
        ?>
    </head>
    <body>
        <!-- Preloader -->

        <div id="wrapper">
            <!-- Navigation -->
            <?php
            $this->load->view('template_admin/general/header');
            ?>
            <!-- Left navbar-header -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                    <?php
                    $this->load->view('template_admin/general/sidebar');
                    ?>
                </div>
            </div>
            <!-- Left navbar-header end -->
            <!-- Page Content -->
            <div id="page-wrapper">
                <?php
                echo $contents;
                ?>             
                <footer class="footer text-center"> 
                    <?php
                    $this->load->view('template_admin/general/footer');
                    ?>
                </footer>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <?php
        $this->load->view('template_admin/general/script_footer');
        ?>
    </body>
</html>
