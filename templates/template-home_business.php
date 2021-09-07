<h2 class="h2-home-title"><?php  _e('Corporate management focus')?></h2>
<div id ="business-home">
    <?php
    $wp_query = getPostCategory('business', -1);
//   echo "<pre>";
//   print_r($wp_query);
//   echo "</pre>";
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            ?>
            <div class="business-item">
                <div class="business-item-img">
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                    <?php } else { ?>
                        <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                    <?php } ?>
                </div>

                <div class="business-item-content">
                    <a class="my-link" href="<?php echo get_the_permalink() ?>"> <?php the_title(); ?></a>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div>