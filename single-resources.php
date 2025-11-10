<?php get_header(); ?>

<?php
$cate =  wp_get_post_terms($post->ID, 'resources_category');
$cate_ID = $cate[0]->term_id;

?>
<div class="container-fluid" style="margin-top: 60px;">
    <div class="row">
        <!--  IF CATEGORY IS NEWS OR CATE_ID IS 69 WILL SHOW TWO COLUMN -->
        <?php if ($cate_ID == '69') { ?>
            <div class='col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12'>
            <?php } else { ?>
                <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                <?php } ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="single-space">
                            <h2 class="single-space-title">
                                <?php the_title(); ?>
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

                <?php if ($cate_ID == '69') { ?>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" style="margin-top: 3rem;">
                        <?php
                        $menu_category = 'resources_category';
                        $menu_page = 'resource';
                        menuSide($menu_category, $menu_page);
                        ?>
                        <div>
                            <?php get_template_part('templates/template', 'side_articles'); ?>
                        </div>
                    </div>

                <?php  } ?>

            </div>
            <div>
                <?php
                // $GroupPostType = "resources";
                //  $groupCategory = "resources_category";
                // -1 se khong show phan load more
                //  $postCount = -1;
                //  inGroup($GroupPostType, $groupCategory, $postCount); 
                ?>
            </div>

    </div>

    <?php get_footer();
