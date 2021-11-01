<div class="side-tab">
    <?php
    $cate = 'active_category';
    $page = 'actives';
    $data = getAllCategories($cate, 0, $page);
    $stt = 1;
    foreach ($data as $val) { ?>
        <div class="title-tab-<?php echo $val['ID'] ?> <?php echo  $stt == 1 ? 'tab-select"' : ''; ?> " onclick=" ChangSelect('.title-tab-<?php echo $val['ID'] ?>', '.content-tab-<?php echo $val['ID'] ?>' )">
            <h3><?php echo $val['name']; ?></h3>
        </div>
    <?php
        $stt = $stt + 1;
    } ?>
 </div>

<div class="side-tab-content">
    <div class="side-list content-tab-5">
        <?php
        $tax = 'active_category';
        $tax_id = 5;
        $wp_query = getCustomPostAtSideCate('active', -1, $tax, $tax_id);
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
        ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="side-list-item">
                    <div class="side-list-item-title">
                        <?php the_title(); ?>aaaa
                    </div>
                    <!-- <div class="side-list-item-img">
                        <?php //if (has_post_thumbnail()) { 
                        ?>
                            <img src="<?php //the_post_thumbnail_url() 
                                        ?>" srcset="<?php //the_post_thumbnail_url() 
                                                    ?>" />
                        <?php //} else { 
                        ?>
                            <img src="<? php // echo PART_IMAGES . 'no-image.jpg' 
                                        ?>" srcset="<? php // echo PART_IMAGES . 'no-image.jpg' 
                                                    ?>" />
                        <?php // } 
                        ?>
                    </div> -->
                </div>
            </a>
        <?php
        }

        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>

    <!-- // ===========================================================  -->

    <div class="side-list content-tab-6 content-select">
        <?php
        $tax = 'active_category';
        $tax_id = 6;
        $wp_query = getCustomPostAtSideCate('active', 5, $tax, $tax_id);
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
        ?>
            <a href='<?php echo get_the_permalink(); ?>'>
                <div class="side-list-item">
                    <div class="side-list-item-title">
                        <?php the_title(); ?>
                    </div>
                    <!-- <div class="side-list-item-img">
                        <?php //if (has_post_thumbnail()) { 
                        ?>
                            <img src="<?php //the_post_thumbnail_url() 
                                        ?>" srcset="<?php //the_post_thumbnail_url() 
                                                    ?>" />
                        <?php //} else { 
                        ?>
                            <img src="<? php // echo PART_IMAGES . 'no-image.jpg' 
                                        ?>" srcset="<? php // echo PART_IMAGES . 'no-image.jpg' 
                                                    ?>" />
                        <?php // } 
                        ?>
                    </div> -->
                </div>
            </a>
        <?php
        }

        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>
</div>

<script>
    function ChangSelect(titleSelect, contentSelect) {

        jQuery(titleSelect).siblings().removeClass('tab-select');
        jQuery(titleSelect).addClass('tab-select');

        jQuery('.side-tab-content').children().removeClass('content-select');
        jQuery(contentSelect).addClass('content-select');

    }
</script>