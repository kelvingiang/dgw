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
                <div id="branding">
                    <i class="fab fa-apple"></i>
                    <i class="fab fa-affiliatetheme"></i>
                    <div id="site-title">
                        <?php
                        if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '<h1>';
                        }
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home"><?php echo esc_html(get_bloginfo('name')); ?></a>
                        <?php
                        if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '</h1>';
                        }
                        ?>
                    </div>
                    <div id="site-description"><?php bloginfo('description'); ?></div>
                </div>
                <nav id="menu">
                    <div id="search"><?php get_search_form(); ?></div>
                    <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
                </nav>
            </header>
            <div id="container">
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