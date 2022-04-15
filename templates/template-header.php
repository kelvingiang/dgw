<div id="wrapper" class="hfeed">
    <header id="header">
        <div id="navbar" style="border-bottom: rgb(235, 235, 235) solid 1px;">
            <div class="row">
                <div class=" col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4">
                    <div style="margin-left: 0.5rem;">
                        <a href="<?php echo home_url(); ?>">
                            <img class="company-logo" src="<?php echo PART_IMAGES . 'logo.png' ?>" style="margin: .5rem; " />
                        </a>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 col-8">
                    <h1 class="company-name">
                        <?php echo get_post_meta(1, '_info_name_' . $_SESSION['languages'], true) ?></h1>
                </div>
                <div class="mobile-space col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div>
                        <?php get_template_part('templates/template', 'main_mobile') ?>
                    </div>
                    <div class="company-language">
                        <?php get_template_part('templates/template', 'languages'); ?>
                    </div>
                </div>
            </div>
            <div>
                <?php get_template_part('templates/template', 'main_menu') ?>
            </div>
        </div>
    </header>
    <div class="my-content">
        <?php
        // kiem tra window su dung ngon ngu gi 
        //$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); 


        ?>