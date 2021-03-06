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
            'value' => $_SESSION['languages'],
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
                $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        ?>

                <div class="item">
                    <a href="<?php echo get_post_meta($post->ID, '_metabox_link', true); ?>">
                        <img src="<?php echo $url[0] ?>" alt="<?php echo the_title(); ?>">
                        <!-- <div class="owl-slider-title">  <h2>tittle</h2> </div> -->
                        <div class="owl-slider-content">
                            <?php the_content(); ?>
                        </div>
                    </a>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        wp_reset_query();
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
            auotplayTimeout: 30000,
            dots: false,
            autoplayHoverPause: true,
            items: 1,

        })
    });
</script>