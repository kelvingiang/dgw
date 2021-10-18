<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="single-space">
                        <h2 class="single-space-title">
                            <?php the_title() ?>
                        </h2>
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="single-space-img" src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php endif; ?>
                        <div class="single-space-content">
                            <?php the_content(); ?>

                            <!-- <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1"><?php //_e('Product Value') 
                                                            ?></a></li>
                                    <li><a href="#tabs-2"><?php //_e('Product Features') 
                                                            ?></a></li>
                                    <li><a href="#tabs-3"><?php //_e('Product Service') 
                                                            ?></a></li>
                                </ul>
                                <div id="tabs-1">
                                    <?php //echo get_post_meta(get_the_ID(), '_solution_value', true) 
                                    ?>
                                </div>

                                <div id="tabs-2">
                                    <?php // echo get_post_meta(get_the_ID(), '_solution_features', true) 
                                    ?>
                                </div>

                                <div id="tabs-3">
                                    <?php // echo get_post_meta(get_the_ID(), '_solution_service', true) 
                                    ?>

                                </div>
                            </div> -->

                        </div>

                <?php
                endwhile;
            endif;
                ?>
                    </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 computer-side">
            <div style="margin-top: 3rem;">
                <?php get_template_part('templates/template', 'side_active'); ?>
                <?php get_template_part('templates/template', 'side_cases');  ?>
            </div>
        </div>
        <div>
            <?php
            $GroupPostType = "solutions";
            $groupCategory = "solutions_category";
            // -1 se khong show phan load more
            $postCount = -1;
            inGroup($GroupPostType, $groupCategory, $postCount); ?>
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