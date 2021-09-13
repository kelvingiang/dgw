<?php



function getCustomsPost($postType, $postCount)
{
    $arr = array(
        'post_type' => $postType,
        'posts_per_page' => $postCount,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
        // get cac bai trong category

        'meta_query'    => array(
            array(
                'key'       => '_metabox_langguage',
                'value'     =>  $_SESSION['languages'],
                'compare'   => '=',
            ),
            /*
            array(
                'key'       => '_metabox_home',
                'value'     =>  true,
                'compare'   => '=',
            ),
            */
        ),
    );

    $wp_query = new WP_Query($arr);

    if ($wp_query->have_posts()) {
        $stt = 1;
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $tags = wp_get_post_terms(get_the_ID(), 'casestudies_tags');
?>
            <div class="item" data-id="<?php echo $stt ?>">

                <?php if (has_post_thumbnail()) { ?>
                    <img class="item-img" src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                <?php } else { ?>
                    <img class="item-img" src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                <?php } ?>

                <div class="item-title">
                    <a href="<?php echo get_the_permalink() ?>">
                        <?php the_title() ?>
                    </a>
                </div>
                <!--
                <div>
                    <ul>
                        <?php //foreach ($tags as $k => $v) { 
                        ?>
                            <li> <?php //echo $v->name 
                                    ?></li>
                        <?php  //} 
                        ?>
                    </ul>
                </div>
                        -->
            </div>
    <?php
            $stt++;
        }
    }
}

function getCustomsPostByCate($postType, $cate, $postCount, $taxonomy)
{

    $arr = array(
        'post_type' => $postType,
        'posts_per_page' => $postCount,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
        // get cac bai trong category
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,   // taxonomy name
                'field' => 'term_id',  // term_id, slug or name
                'terms' => $cate, // term id, term slug or term name
            )
        ),

        'meta_query'    => array(
            array(
                'key'       => '_metabox_langguage',
                'value'     =>  $_SESSION['languages'],
                'compare'   => '=',
            ),
        ),
    );

    $wp_query = new WP_Query($arr);

    return $wp_query;
}

function getCustomsPostCate($param)
{
    $arr = array();
    $argsCate = array(
        'type' => 'post',
        'posts_per_page' => -1,
        'taxonomy' => 'casestudies_category',
        'hide_empty' => 0,
        'parent' => $param['cate'],
    );
    $categories = get_categories($argsCate);

    if ($categories) {
        foreach ($categories as $key => $value) {
            $option = get_option("option_casestudies_category_$value->term_id");
            $arr[$value->term_id] = array(
                'ID' => $value->term_id,
                'name' => $option['cate_' . $_SESSION['languages']],
                'class' => 'menu-main-sub-1-item',
                'order' => $option['cate_order'],
                'sub' => '',
            );
        }
    }
    ?>
    <nav class="menu-cate-list">
        <?php foreach ($arr as $key => $val) { ?>
            <div class="<?php echo $param['tag'] == $key ? 'menu-cate-list-active' : '' ?>">
                <?php if ($param['tag'] == $key) { ?>
                    <label><?php echo $val['name']; ?></label>
                <?php } else { ?>
                    <a href="<?php echo home_url($param['pagename']) . '/cate/' .  $param['cate'] . '/tag/' . $val['ID'] ?>">
                        <?php echo $val['name']; ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
    </nav>
<?php
}

function getCustomPostAtHome($postType, $postCount)
{
    $arr = array(
        'post_type' => $postType,
        'posts_per_page' => $postCount,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
        // get cac bai trong category

        'meta_query'    => array(
            array(
                'key'       => '_metabox_langguage',
                'value'     =>  $_SESSION['languages'],
                'compare'   => '=',
            ),

            array(
                'key'       => '_metabox_home',
                'value'     =>  true,
                'compare'   => '=',
            ),

        ),
    );

    $wp_query = new WP_Query($arr);
    return $wp_query;
}



function getCustomPostAtSideCate($postType, $postCount, $taxonomy, $cate)
{
    $arr = array(
        'post_type' => $postType,
        'posts_per_page' => $postCount,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
        // get cac bai trong category
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,   // taxonomy name
                'field' => 'term_id',  // term_id, slug or name
                'terms' => $cate, // term id, term slug or term name
            )
        ),

        'meta_query'    => array(
            array(
                'key'       => '_metabox_langguage',
                'value'     =>  $_SESSION['languages'],
                'compare'   => '=',
            ),
        ),
    );

    $wp_query = new WP_Query($arr);
    return $wp_query;
}

function getCustomPostAtSide($postType, $postCount)
{
    $arr = array(
        'post_type' => $postType,
        'posts_per_page' => $postCount,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
 
        'meta_query'    => array(
            array(
                'key'       => '_metabox_langguage',
                'value'     =>  $_SESSION['languages'],
                'compare'   => '=',
            ),
        ),
    );

    $wp_query = new WP_Query($arr);
    return $wp_query;
}

function getPostCategory($cate, $postCount)
{
    $arr = array(
        'post_type' => 'post',
        'category_name' => $cate,
        'posts_per_page' => $postCount,
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => '_metabox_order',
        // get cac bai trong category

        'meta_query'    => array(
            array(
                'key'       => '_metabox_langguage',
                'value'     =>  $_SESSION['languages'],
                'compare'   => '=',
            ),

            //            array(
            //                'key'       => '_metabox_home',
            //                'value'     =>  true,
            //                'compare'   => '=',
            //            ),

        ),
    );

    $wp_query = new WP_Query($arr);
    return $wp_query;
}
