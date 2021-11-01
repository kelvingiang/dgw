<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="single-space">
                        <h2 class="single-space-title">
                            <?php the_title() ?>
                        </h2>
                        <?php //if (has_post_thumbnail()) : ?>
                            <!-- <img class="single-space-img" src="<?php //the_post_thumbnail_url() ?>" srcset="<?php //the_post_thumbnail_url() ?>" /> -->
                        <?php //endif; ?>
                        <div class="single-space-content">
                            <?php the_content(); ?>

                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
        <!-- <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 computer-side">
            <div style="margin-top: 3rem;">
                <?php // get_template_part('templates/template', 'side_cases'); ?>
            </div>
        </div> -->
    </div>
    <div>
        <?php
       // $GroupPostType = "active";
       // $groupCategory = "active_category";
        // -1 se khong show phan load more
        //$postCount = -1;
       // inGroup($GroupPostType, $groupCategory, $postCount); ?>
    </div>
    <div class="mobile-side">
        <?php get_template_part('templates/template', 'side_active'); ?>
        <?php get_template_part('templates/template', 'side_cases');  ?>
        <?php //menuSide($menu_category, $menu_page); 
        ?>
    </div>
</div>
<?php get_footer(); ?>