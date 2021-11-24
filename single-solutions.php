<?php get_header();

$cate =  wp_get_post_terms($post->ID, 'solutions_category');
$cate_ID = $cate[0]->term_id;



?>
<div class="container-fluid">
    <div class="row">
        <?php if ($cate_ID !== 54) { ?>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <?php } else { ?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php  } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="single-space">
                    <h2 class="single-space-title">
                        <?php the_title() ?>
                    </h2>
                    <div class="single-space-content">
                        <?php the_content(); ?>
                    </div>
                    <?php
                    endwhile;
                endif;
                    ?>
                </div>
            </div>

            <?php if ($cate_ID !== 54) { ?>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 computer-side">
                <div style="margin-top: 3rem;">
                    <?php get_template_part('templates/template', 'side_active'); ?>
                    <?php get_template_part('templates/template', 'side_cases');  ?>
                </div>
            </div>
            <?php } ?>
            <div>
                <?php
                    // $GroupPostType = "solutions";
                    // $groupCategory = "solutions_category";
                    // -1 se khong show phan load more
                    // $postCount = -1;
                    // inGroup($GroupPostType, $groupCategory, $postCount); 
                    ?>
            </div>
            <div class="mobile-side">
                <?php get_template_part('templates/template', 'side_active'); ?>
                <?php get_template_part('templates/template', 'side_cases');  ?>
                <?php //menuSide($menu_category, $menu_page); 
                    ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>