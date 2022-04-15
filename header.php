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
    <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="apple-touch-icon-precomposed">

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



    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '349602963704589');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=349602963704589&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


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

    /* AN TITLE MAC DINH CUA PAGE TITLE PAGE CHI TAO LINK */


    h1.entry-title {
        display: none;
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
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBS4PBM" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->


    <?php
    $paged = get_query_var('pagename', 1);

    switch ($paged) {
        case '':
        case 'about-cn':
        case 'about-vn':
        case 'cases':
        case 'industry':
        case 'solution':
        case 'service':
        case 'resource':
        case 'activities':
        case 'contact-cn':
        case 'contact-vn':
        case 'join-digiwin':
            // case 'test':
            get_template_part('templates/template', 'header');
    }


    ?>

    <!-- PHAN CHAT ZALO TRANG WEB -->
    <div class="zalo-chat-widget" data-oaid="2873315813915643766" data-welcome-message="<?php _e('So Happy can support You!') ?>" data-autopopup="0" data-width="" data-height="">
    </div>

    <script src="https://sp.zalo.me/plugins/sdk.js"></script>