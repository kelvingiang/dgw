<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <!-- supppot slider  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!-- end  slider -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
        <header id="header">

        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div>
                        <img src="<?php echo PART_IMAGES . 'logo.png' ?>" style="margin: .5rem; " />
                    </div>
                </div>
                <div class="col-5">
                    <i class="fas fa-spinner fa-pulse"></i>
                </div>
                <div class="col-3">
                    <?php get_template_part('templates/template', 'languages'); ?>
                </div>
            </div>
            <div>
                <?php get_template_part('templates/template', 'main-menu') ?>
            </div>
            <div>
                <?php get_template_part('templates/template', 'slider-owl')
                ?>
            </div>