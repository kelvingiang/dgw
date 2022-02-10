<?php get_header(); ?>
<?php //get_template_part('templates/template', 'header'); 
?>
<div>
    <?php


    if (!is_single()) {
        get_template_part('templates/template', 'slider_owl');
    }
    ?>
    <?php get_template_part('templates/template', 'home_menu'); ?>
</div>
<div style="height: 2rem;"></div>

<?php
get_template_part('templates/template', 'home_business');
get_template_part('templates/template', 'home_industry');
get_template_part('templates/template', 'home_cases');
get_template_part('templates/template', 'home_news');
//get_template_part('templates/template', 'home_active');
//get_template_part('templates/template', 'home_service');
//get_template_part('templates/template', 'home_map');
//get_template_part('templates/template', 'footer');
get_footer();