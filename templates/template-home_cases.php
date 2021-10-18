<h2 class="h2-home-title"><?php _e('Enterprise model success case') ?></h2>
<div id="casestudies-slider">
    <div class="owl-carousel owl-theme">
        <?php
        $wp_query = getCustomPostAtHome('casestudies', -1);

        if ($wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
        ?>
                <a href='<?php echo get_the_permalink() ?>'>
                    <div class="multi-item">
                        <div class="slider-multi-title">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="slider-multi-img">
                            <?php if (has_post_thumbnail()) { ?>
                                <img class="llimg" src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                            <?php } else { ?>
                                <img class="llimg" src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
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
</div>
<script>
    jQuery(document).ready(function() {
        // set so luong hien thi thong qua responsive
        var count = 0;
        bsContainerWidth = jQuery("body").width()
        if (bsContainerWidth <= 500) {
            var count = 1;
        } else if (bsContainerWidth <= 950) {
            var count = 2;
        } else if (bsContainerWidth <= 1170) {
            var count = 3;
        } else {
            var count = 3;
        }


        jQuery('#casestudies-slider .owl-carousel').owlCarousel({

            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            auotplayTimeout: 50000,
            dots: false,
            autoplayHoverPause: true,
            items: count,
            nav: true,
            navText: ["<i class='fa fa-angle-left sli-left'></i>", "<i class='fa fa-angle-right sli-right'></i>"]

        })
    });
</script>