<h2 class="h2-home-title"><?php _e('Specialize in the industry') ?></h2>
<div id="industry-home">
    <?php
    $stt = 1;
    $wp_query = getCustomPostAtHome('industries', 3);
    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) :
            $wp_query->the_post();
    ?>
            <div class="item" data-id="<?php echo $stt ?>"
                data-link="<?php echo get_the_permalink(); ?>"
                data-post="<?php echo get_the_ID(); ?>">
                <div class="item-img ">
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url() ?>"
                            srcset="<?php the_post_thumbnail_url() ?>" />
                    <?php } else { ?>
                        <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>"
                            srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                    <?php } ?>
                </div>
                <div class="item-content">
                    <?php the_title(); ?>
                </div>
                </a>
            </div>
    <?php
            $stt++;
        endwhile;
    endif;
    ?>
</div>