<h2 class="h2-home-title"><?php _e('Specialize in the industry') ?></h2>
<div id="industry-home">
    <?php
    //$arr = getCategories('industries_category');
    if ($_SESSION['languages'] == 'vn') {
        //$ID_arr = array(369, 205, 368);
        $ID_arr = array(4043, 3201, 3204);
    } else {
        //$ID_arr = array(206, 299, 135);
        $ID_arr = array(206, 299, 135);
    }

    $args = array(
        'post_type' => 'industries',
        'post__in' => $ID_arr,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
    );

    $posts = get_posts($args);

    foreach ($posts as $val) {
    ?>
        <div class="industry-home-item">

            <a href="<?php echo get_permalink($val->ID); ?>" class="my-link">
                <div class="industry-item-img ">
                    <!-- icon cua cac chu de duoc dinh tai getIndustryImage   -->
                    <img src="<?php echo getIndustryImage($val->ID) ?>" />
                </div>
                <div class="industry-item-content">
                    <?php echo $val->post_title; ?>
                </div>
            </a>
        </div>
    <?php } ?>
</div>