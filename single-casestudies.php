<?php get_header(); ?>
<div class="container-fluid">
    <div class="menu-sub">
        <?php
        $menu_category = 'casestudies_category';
        $menu_page = 'cases';
        menuSub($menu_category, $menu_page);
        ?>
    </div>
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <div class="single-space">
                        <h2 class="single-space-title">
                            <?php the_title() ?>
                        </h2>
                        <?php get_template_part('templates/template', 'view_like'); ?>
                        <div class="single-space-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 computer-side">
            <?php get_template_part('templates/template', 'side_cases');  ?>
            <?php get_template_part('templates/template', 'side_active'); ?>
            <?php get_template_part('templates/template', 'side_articles'); ?>
        </div>
    </div>

    <div class="mobile-side">
        <div style="margin-top: 2rem;">
            <?php get_template_part('templates/template', 'side_cases');  ?>
            <?php get_template_part('templates/template', 'side_active'); ?>
            <?php get_template_part('templates/template', 'side_articles'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>