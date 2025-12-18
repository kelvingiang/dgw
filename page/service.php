<?php /*  Template Name: Services Page */ ?>
<?php get_header(); ?>

<div>
    <?php pageImg($post->ID); ?>
</div>

<div class="menu-sub">
    <?php
    $menu_category = 'services_category';
    $menu_page = 'services';
    menuSub($menu_category, $menu_page);
    ?>
</div>
<div class="container-fluid">
    <div class='data-list'>
        <?php
        global $wp;
        $param = $wp->query_vars;
        $postCount = get_option('first_load');

        $tag  = isset($param['tag']) ? $param['tag'] : '';
        $cate = isset($param['cate']) ? $param['cate'] : '';

        $postType = 'services';
        $tax = 'services_category';
        if (empty($param['tag']) && empty($param['cate'])) {
            getCustomsPost('services', $postCount);
        } else {
            // neu TAG ton tai thi lay value la TAG con khong thi lay CATE
            if (empty($param['tag'])) {
                $cate = $param['cate'];
            } else {
                $cate = $param['tag'];
            }
            $postType = 'services';
            $tax = 'services_category';
            $wp_query = getCustomsPostByCate($postType, $cate, $postCount, $tax);
        }
        wp_reset_postdata();
        wp_reset_query();
        ?>
    </div>

    <div id="load-more">
        <i class="fa fa-angle-double-down" aria-hidden="true"></i>
    </div>
</div>
<script>
    jQuery(document).ready(function() {

        //=========================================================================================================
        jQuery('#load-more').click(function() {

            var lastID = jQuery(".data-list > div:last-child").attr("data-id");
            var post = 'services';
            var cateID = '<?php echo $cate ?>';
            var count = '<?php echo get_option('more_load') ?>';
            var cate = 'services_category';

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
                            .html('<i class="fa fa-angle-double-down" aria-hidden="true"></i>');
                        var currentScroll = jQuery(window).scrollTop();
                        jQuery('html, body').animate({
                            scrollTop: currentScroll + 200
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