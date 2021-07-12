<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="wrapper" class="hfeed">
            <header id="header">

            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <?php _e('Member'); ?>
                        <i class="fas fa-clock" style="color: red;"></i>
                    </div>
                    <div class="col-5">
                        <i class="fas fa-spinner fa-pulse"></i>
                    </div>
                    <div class="col-3">
                        <?php get_template_part('templates/template', 'language'); ?>
                    </div>
                </div>
                <div>
                    <?php get_template_part('templates/template', 'main-menu') ?>
                </div>