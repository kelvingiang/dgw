<?php /*  Template Name: Actives Page */ ?>
<?php get_header(); ?>

<div>
    <?php pageImg($post->ID); ?>
</div>

<div class="menu-sub">
    <?php
    $menu_category = 'active_category';
    $menu_page = 'activities';
    menuSub($menu_category, $menu_page);
    ?>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">

            <div class='data-list'>
                <?php
                global $wp;
                $param = $wp->query_vars;
                $postCount = get_option('first_load');

                $tag  = isset($param['tag']) ? $param['tag'] : '';
                $cate = isset($param['cate']) ? $param['cate'] : '';

                $postType = 'active';
                $tax = 'active_category';

                if (empty($param['tag']) && empty($param['cate'])) {
                    // getCustomsPost($postType, $postCount);
                } else {
                    // neu TAG ton tai thi lay value la TAG con khong thi lay CATE
                    $term_slug = !empty($tag) ? $tag : $cate;
                    $wp_query = getCustomsPostByCate($postType, $cate, $postCount, $tax);
                }
                wp_reset_query();
                ?>
            </div>

            <div id="load-more">
                <i style=" font-size: 35px; color: #999; height: 50px" class="fa fa-angle-double-down"
                    aria-hidden="true"></i>
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <?php get_template_part('templates/template', 'side_cases');  ?>
            <?php get_template_part('templates/template', 'side_articles');  ?>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {

        jQuery(document).on('click', '.item', function() {
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>', // lay doi tuong chuyen sang dang array
                type: 'post', //                data: $(this).serialize(),
                data: {
                    action: 'plus_one_view', // ✅ 對應後端的 hook 名稱
                    postID: jQuery(this).attr("data-post"),
                },
                dataType: 'json',
                // khi load dữ liêu show chữ loading.....
                success: function(data) { // set ket qua tra ve  data tra ve co thanh phan status va message
                    if (data.status === 'done') {

                    } else if (data.status === 'empty') {
                        // jQuery("#load-more").hide();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        })

        jQuery('#load-more').click(function(e) {
            var lastID = jQuery(".data-list > div:last-child").attr("data-id");
            var post = 'active';
            var cateID = '<?php echo $cate ?>';
            var count = '<?php echo get_option('more_load') ?>';
            var cate = 'active_category';
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>', // lay doi tuong chuyen sang dang array
                type: 'post', //                data: $(this).serialize(),
                data: {
                    action: 'load_more_posts', // ✅ 對應後端的 hook 名稱
                    lastID: lastID,
                    post: post,
                    cate: cate,
                    cateID: cateID,
                    count: count,
                },
                dataType: 'json',
                // khi load dữ liêu show chữ loading.....
                beforeSend: function() {
                    jQuery('#load-more').prop('disabled', true).text('Loading...');
                },
                success: function(
                    data) { // set ket qua tra ve  data tra ve co thanh phan status va message
                    if (data.status === 'done') {
                        jQuery(".data-list").append(data.html);

                        // sau khi load thanh công show lại cái icon
                        jQuery('#load-more')
                            .prop('disabled', false)
                            .html('<i style="font-size:35px; color:#999; height:50px" class="fa fa-angle-double-down" aria-hidden="true"></i>');

                        jQuery('html, body').animate({
                            scrollTop: jQuery(document).height()
                        }, 1000);
                    } else if (data.status === 'empty') {
                        jQuery("#load-more").hide();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<?php get_footer(); ?>