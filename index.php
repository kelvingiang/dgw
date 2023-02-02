<?php get_header(); ?>
<?php //get_template_part('templates/template', 'header'); 
?>
<div class="index-space">
    <div>
        <?php
        if (!is_single()) {
            get_template_part('templates/template', 'slider_owl');
        }
        ?>
        <?php get_template_part('templates/template', 'home_menu'); ?>
    </div>


    <div>
        <?php get_template_part('templates/template', 'home_business'); ?>
    </div>

    <div>
        <?php get_template_part('templates/template', 'home_industry'); ?>
    </div>
    <div>
        <?php get_template_part('templates/template', 'home_cases'); ?>
    </div>
    <div>
        <?php get_template_part('templates/template', 'home_news'); ?>
    </div>
</div>

<?php





//get_template_part('templates/template', 'home_active');
//get_template_part('templates/template', 'home_service');
//get_template_part('templates/template', 'home_map');
//get_template_part('templates/template', 'footer');
get_footer();
