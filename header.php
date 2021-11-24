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
    <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico"
        rel="apple-touch-icon-precomposed">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N9624FG5S0"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-N9624FG5S0');
    </script>



    <!-- 18/11/2021 Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WBS4PBM');
    </script>
    <!-- End Google Tag Manager -->

    <?php wp_head(); ?>
</head>
<style>
#navbar {
    background-color: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    display: block;
    transition: top 0.3s;
    z-index: 100;
}
</style>
<!-- an hien main menu -->
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-130px";
    }
    prevScrollpos = currentScrollPos;
}
</script>


<body <?php body_class(); ?> <?php if (is_page('about') || is_home()) {
                                    echo "onload='initialize()'";
                                } ?>>

    <!-- 18/11/2021 Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBS4PBM" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="wrapper" class="hfeed">
        <header id="header">
            <div id="navbar" style="border-bottom: rgb(235, 235, 235) solid 1px;">
                <div class="row">
                    <div class=" col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4">
                        <div style="margin-left: 0.5rem;">
                            <a href="<?php echo home_url(); ?>">
                                <img class="company-logo" src="<?php echo PART_IMAGES . 'logo.png' ?>"
                                    style="margin: .5rem; " />
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8 col-8">
                        <h1 class=" company-name">
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