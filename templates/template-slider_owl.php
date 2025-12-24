<?php
$args = array(
    'post_type' => 'slider',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'meta_key' => '_metabox_order',
    'meta_query' => array(
        array(
            'key' => '_metabox_langguage',
            'value' => dgw_get_lang(),
            'compare' => '='
        )
    )
);
$wp_query = new WP_Query($args);
?>
<div id="slider">
    <div class="owl-carousel owl-theme">

        <?php if ($wp_query->have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();
                $link = get_post_meta($post->ID, '_metabox_link', true);
                $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        ?>
                <div class="item"
                    <?php if (!empty($link)) : ?>
                    data-link="<?php echo esc_url($link); ?>"
                    <?php endif; ?>>
                    <img src="<?php echo esc_url($url[0]); ?>" alt="<?php the_title_attribute(); ?>">
                    <div class="owl-slider-content">
                        <?php the_content(); ?>
                    </div>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        // wp_reset_query();
        ?>
    </div>
</div>

<style>
    #slider {
        border-bottom: 2px solid rgba(208, 228, 247, 0.5);
    }
</style>
<script>
    jQuery(document).ready(function() {
        jQuery('#slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000, // 3秒间隔切换幻灯片
            autoplaySpeed: 500,
            dots: true,
            autoplayHoverPause: true,
            items: 1,

        });

        // ⭐ 正確的 click 寫法
        jQuery('#slider').on('click', '.item', function() {
            const link = $(this).data('link');
            if (link) {
                window.location.href = link;
            }
        });
    });
</script>