<?php

// QUAN LY CAC PHAN CSS VA JS CHO ADMIN VA CLINET
// PHAN BIET ADD VO PHAN ADMIN HAY CLIENT
function style_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        //==== PHAN CLIENT================================================================ 
//====BOOTSTRAP  ============================================

        wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap-css');

        wp_register_style('bootstrap-grid-css', get_template_directory_uri() . '/css/bootstrap-grid.min.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap-grid-css');

        wp_register_style('bootstrap-reboot-css', get_template_directory_uri() . '/css/bootstrap-reboot.min.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap-reboot-css');

        wp_register_style('bootstrap-utilities-css', get_template_directory_uri() . '/css/bootstrap-utilities.min.css', array(), '1.0', 'all');
        wp_enqueue_style('bootstrap-utilities-css');

        wp_register_script('bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('bootstrap-script');

        wp_register_script('bootstrap-bundle-script', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'));
        wp_enqueue_script('bootstrap-bundle-script');

//===== AWEONE==================================================================
        wp_register_style('font-awesome-css', get_template_directory_uri() . '/css/aweone-all.min.css', array(), '1.0', 'all');
        wp_enqueue_style('font-awesome-css');

        wp_register_script('font-awesome-script', get_template_directory_uri() . '/js/aweone-all.min.js', array('jquery'));
        wp_enqueue_script('font-awesome-script');

// ===== TU DONG  AN HIEN THANH   MAIN ME NU ===========================================
        wp_register_script('autohidingnavbar', get_template_directory_uri() . '/js/jquery.bootstrap-autohidingnavbar.js', array('jquery'));
        wp_enqueue_script('autohidingnavbar');

//======SLICK=================================================

        wp_register_style('slick-theme-css', get_template_directory_uri() . '/js/slick/slick-theme.css', array(), '1.0', 'all');
        wp_enqueue_style('slick-theme-css');

        wp_register_script('slick-js', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('slick-js');


        //==== SLIDER ============================================
        wp_register_style('camera-css', get_template_directory_uri() . '/js/slider/camera.css', array(), '1.0', 'all');
        wp_enqueue_style('camera-css');

        wp_register_script('camera-js', get_template_directory_uri() . '/js/slider/camera.min.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('camera-js');

        wp_register_script('easing-js', get_template_directory_uri() . '/js/slider/jquery.easing.1.3.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('easing-js');

//        wp_register_script('mobile.customized-js', get_template_directory_uri() . '/js/slider/jquery.mobile.customized.min.js', array('jquery'), '1.0.0'); // Custom scripts
//        wp_enqueue_script('mobile.customized-js');
//        
//        
        //==== MULTY SLIDER============================================
        wp_register_style('flexisel-style', get_template_directory_uri() . '/js/slider-multi/flexisel.css', array(), '1.0', 'all');
        wp_enqueue_style('flexisel-style');

        wp_register_script('flexisel-js', get_template_directory_uri() . '/js/slider-multi/jquery.flexisel.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('flexisel-js');

        wp_register_script('jcarousel-js', get_template_directory_uri() . '/js/jquery.jcarousellite-1.0.1.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('jcarousel-js');


//=====  ZOOM    =\================================
        wp_register_script('prefixfree-js', get_template_directory_uri() . '/js/zoom/prefixfree.js', array('jquery'));
        wp_enqueue_script('prefixfree-js');

//====== MY STYLE ==================================================================
        wp_register_style('my-main-css', get_template_directory_uri() . '/css/style/main.css', array(), '1.0', 'all');
        wp_enqueue_style('my-main-css');
    } else {

        //====PHAN ADMIN=========================================================
        wp_register_style('admin-style', get_template_directory_uri() . '/css/admin/admin-style.css', array(), '1.0', 'all');
        wp_enqueue_style('admin-style');
        if (get_current_user_id() != 1) {
            wp_register_style('admin-denied', get_template_directory_uri() . '/css/admin/admin-denied.css', array(), '1.0', 'all');
            wp_enqueue_style('admin-denied');
        }
    }

// ==ADD CHO CA ADMIN VA CLIENT=========================================================

    wp_register_script('jquery-ui-js', get_template_directory_uri() . '/js/jquery-ui.min.js', array('jquery'), '1.0.0'); // Custom scripts
    wp_enqueue_script('jquery-ui-js');

    wp_register_style('jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1.0', 'all');
    wp_enqueue_style('jquery-ui-css');

    wp_register_script('jquery-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0'); // Custom scripts
    wp_enqueue_script('jquery-custom-js');
}

add_action('init', 'style_header_scripts');
