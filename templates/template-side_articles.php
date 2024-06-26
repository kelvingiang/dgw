<div id="article-side-list">
    <?php
    $wp_query = getCustomPostShowSidebar('resources');
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="article-side-list-item">
                    <div class="article-side-list-item-img">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php } else {  ?>
                            <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                        <?php } ?>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>


    <?php
    $wp_query = getCustomPostShowSidebar('active');
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="article-side-list-item">
                    <div class="article-side-list-item-img">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php } else {  ?>
                            <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                        <?php } ?>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>


    <?php
    $wp_query = getCustomPostShowSidebar('casestudies');
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="article-side-list-item">
                    <div class="article-side-list-item-img">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php } else {  ?>
                            <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                        <?php } ?>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>


    <?php
    $wp_query = getCustomPostShowSidebar('joinus');
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="article-side-list-item">
                    <div class="article-side-list-item-img">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php } else {  ?>
                            <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                        <?php } ?>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>



<?php
    $wp_query = getCustomPostShowSidebar('solutions');
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
    ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="article-side-list-item">
                    <div class="article-side-list-item-img">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php } else {  ?>
                            <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                        <?php } ?>
                    </div>
                </div>
            </a>
    <?php
        }
    }
    wp_reset_postdata();
    wp_reset_query();
    ?>
</div>