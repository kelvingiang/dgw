<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="single-space">
                        <h2 class="single-space-title">
                            <?php the_title() ?>
                        </h2>
                        <div style="margin-bottom: 0.5rem;">
                            <a href="#challenge" style=" margin-right:2rem"> <?php _e('Industries Challenge') ?></a>
                            <a href="#solution"><?php _e('Industries Solution') ?></a>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="single-space-img" src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php endif; ?>
                        <div class="single-space-content">
                            <?php the_content(); ?>

                        </div>
                        <hr>
                        <div id="challenge">
                            <h3 class="article-title"><?php _e('Industries Challenge') ?></h3>
                            <?php echo get_post_meta(get_the_ID(), '_industry_challenge', true) ?>
                        </div>
                        <hr>
                        <div id="solution">
                            <h3 class="article-title"><?php _e('Industries Solution') ?></h3>
                            <?php echo get_post_meta(get_the_ID(), '_industry_solution', true) ?>
                        </div>
                    </div>

            <?php
                endwhile;
            endif;
            ?>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <?php
            $menu_category = 'industries_category';
            $memu_page = 'industry';
            menuSide($menu_category, $memu_page);
            ?>
        </div>
    </div>
    <div>
        <?php
        $GroupPostType = "industries";
        $groupCategory = "industries_category";
        $postMun = 3;
        inGroup($GroupPostType, $groupCategory, $postMun); ?>
    </div>
</div>
<?php get_footer(); ?>