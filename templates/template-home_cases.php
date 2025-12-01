<h2 class="h2-home-title"><?php _e('Enterprise model success case') ?></h2>
<div id="casestudies-slider">
    <div class="owl-carousel owl-theme">
        <?php
        $wp_query = getCustomPostAtHome('casestudies', -1);

        if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) :
                $wp_query->the_post();
        ?>
                <div class="item" data-id="<?php echo $stt ?>"
                    data-link="<?php echo get_the_permalink(); ?>"
                    data-post="<?php echo get_the_ID(); ?>">
                    <div class="item-img">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php the_post_thumbnail_url() ?>"
                                srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php } else { ?>
                            <img src="<?php echo PART_IMAGES . 'no-image.jpg' ?>"
                                srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                        <?php } ?>
                    </div>
                    <div class="item-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
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
            autoplayTimeout: 30000,
            dots: false,
            autoplayHoverPause: true,
            items: count,
            nav: true,
            navText: ["<i class='fa fa-angle-left sli-left'></i>",
                "<i class='fa fa-angle-right sli-right'></i>"
            ],
            onInitialized: setEqualHeight, // ← Owl 初始化後
            onResized: setEqualHeight, // ← Owl resize 後
            onTranslated: setEqualHeight // ← Owl 動畫切換後

        });

        function setEqualHeight() {
            var maxHeight = 0;

            // 先清除高度，避免之前套過的造成錯誤
            jQuery('#casestudies-slider .item').css('height', 'auto');

            // 找出最高 item
            jQuery('#casestudies-slider .item').each(function() {
                var h = $(this).outerHeight();
                if (h > maxHeight) maxHeight = h;
            });

            // 套用到所有 item
            jQuery('#casestudies-slider .item').css('height', maxHeight + 'px');
        }
    });
</script>