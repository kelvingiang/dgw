<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="single-space">
                        <h2 class="single-space-title">
                            <?php the_title() ?>
                        </h2>
                        <?php //if (has_post_thumbnail()) : 
                        ?>
                        <!-- <img class="single-space-img" src="<?php //the_post_thumbnail_url() 
                                                                ?>" srcset="<?php //the_post_thumbnail_url() 
                                                                            ?>" /> -->
                        <?php //endif; 
                        ?>
                        <div class="single-space-content">
                            <?php the_content(); ?>

                        </div>
                    </div>

            <?php
                endwhile;
            endif;
            ?>
        </div>
        <!-- <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">

            <div class="side-list" style="margin-top: 3rem;">
                <?php
                //getCustomsPost('services', $postCount);
                //$wp_querys = getCustomPostAtSide('services', '-1');
                // if ($wp_querys->have_posts()) {
                // while ($wp_querys->have_posts()) {
                //  $wp_querys->the_post(); 
                ?>
                        <a href='<?php //echo get_the_permalink(); 
                                    ?>'>
                            <div class="side-list-item">
                                <div class="side-list-item-title">
                                    <?php // the_title(); 
                                    ?>
                                </div>
                                <!-- <div class="side-list-item-img"> -->
        <!-- <?php // if (has_post_thumbnail()) { 
                ?> -->
        <!-- <img src="<?php //the_post_thumbnail_url() 
                        ?>" srcset="<?php //the_post_thumbnail_url() 
                                    ?>" /> -->
        <!-- <?php //} else { 
                ?> -->
        <!-- <img src="<?php // echo PART_IMAGES . 'no-image.jpg' 
                        ?>" srcset="<?php // echo PART_IMAGES . 'no-image.jpg' 
                                    ?>" /> -->
        <!-- <?php // } 
                ?> -->
        <!-- </div> -->
    </div>

    <?php
    //  }
    // }
    ?>
    <!-- </div> -->

</div>

<div>
    <?php
    //  $GroupPostType = "industries";
    //  $groupCategory = "industries_category";
    // -1 se khong show phan load more
    //  $postMun = -1;
    //  inGroup($GroupPostType, $groupCategory, $postMun); 
    ?>
</div>
</div>
<?php get_footer(); ?>