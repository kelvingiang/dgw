<?php
$footer = get_query_var('pagename', 1);
switch ($footer) {
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
        get_template_part('templates/template', 'footer');
}
wp_footer(); ?>

<script type="text/javascript">
    //window.onscroll = checkAnimation;
    var prevScrollPos = window.pageYOffset;
    window.onscroll = function() {
        // PHAN AN HIEN MENU 
        // KIEM TRA HEADER KHAC NONE MOI THUC HIEN
        //   if (jQuery('#header').css('display') !== 'none') {
        menuAnimation();
        //   }

        // // PHAN SHOW HINH ANH KHI RE CHUOT XUONG TOI
        // if (document.querySelector('.animation-item')) {
        //     Animation_show();
        // }


        //   if (document.querySelector('.scroll-show-horizontal')) {
        //       func_show_horizontal();
        //   }


        //   if (document.querySelector('#supervisor-slider')) {
        //       func_remove_behind_class();
        //   }

        // PHAN AN HIEN HEADER TRONG MOBILE STYLE
        var currentScrollPos = window.pageYOffset;
        //   if (prevScrollpos > currentScrollPos) {
        //       document.getElementById("mobile-header").style.top = "0";
        //   } else {
        //       document.getElementById("mobile-header").style.top = "-320px";
        //   }
        prevScrollPos = currentScrollPos;
    }
</script>

<!-- add zalo chat trực tiếp trên web 19/06/2024  -->
<div class="zalo-chat-widget" data-oaid="2873315813915643766" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="500"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
</body>


</html>