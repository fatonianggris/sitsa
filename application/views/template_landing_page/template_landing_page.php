<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $this->load->view('template_landing_page/general/script_header');
        ?>
    </head>

    <body>
        <!--        <div id="preloader">
                    <div data-loader="circle-side"></div>
                </div> /Preload 
                <div id="loader_form">
                    <div data-loader="circle-side-2"></div>
                </div> /loader_form -->
        <nav>
            <?php
            $this->load->view('template_landing_page/general/header');
            ?>
        </nav>
        <!-- /menu -->
        <div class="container-fluid">
            <div class="row row-height">
                <div class="col-xl-4 col-lg-4 content-left">
                    <?php
                    $this->load->view('template_landing_page/general/side');
                    ?>
                </div>
                <!-- /content-left -->
                <div class="col-xl-8 col-lg-8 content-right" id="start">
                    <div id="pjax-container">
                        <?php
                        echo $contents;
                        ?>
                    </div>
                </div>
                <!-- /content-right-->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-fluid -->

        <div class="cd-overlay-nav">
            <span></span>
        </div>
        <!-- /cd-overlay-nav -->

        <div class="cd-overlay-content">
            <span></span>
        </div>
        <!-- /cd-overlay-content -->

        <a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
        <!-- /menu button -->
        <?php
        $this->load->view('template_landing_page/general/footer');
        ?>
        <!-- COMMON SCRIPTS -->
        <?php
        $this->load->view('template_landing_page/general/script_footer');
        ?>
    </body>
</html>