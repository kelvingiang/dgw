<div class="side-list">
    <div class="side-list-title">
        <h2><?php _e('Cases Tudies') ?></h2>
    </div>
    <?php
    $wp_query = getCustomPostAtSide('casestudies', 5);
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="side-list-item">
                    <div class="side-list-item-title">
                        <?php the_title(); ?>
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
            </a>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>
</div>