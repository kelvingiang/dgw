<h2 class="h2-home-title"><?php _e('Enterprise model success case') ?></h2>
<div class="case-logo">
    <?php
    $wp_query = getCustomPostAtHome('casestudies', -1);

    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <div class="case-logo-item">
                <a href='<?php echo get_the_permalink() ?>'>
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                    <?php } else { ?>
                        <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                    <?php } ?>
                </a>
            </div>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>
</div>
<script>
    jQuery(document).ready(function() {

    });
</script>