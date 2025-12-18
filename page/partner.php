<?php /*  Template Name: Partner Page */ ?>
<?php get_header(); ?>

<div>
    <?php pageImg($post->ID); ?>
</div>

<div class="menu-sub">
    <?php
    // $menu_category = 'joinus_category';
    // $menu_page = 'join-digiwin';
    // menuSub($menu_category, $menu_page);
    ?>
</div>

<div class="container-fluid">
    <div class='data-list'>
        <?php
        global $wp;
        $postCount = get_option('first_load');
        $cate = '98';
        $postType = 'joinus';
        $tax = 'joinus_category';
        $wp_query = getCustomsPostByCate($postType, $cate, $postCount, $tax);
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
        jQuery('#load-more').click(function() {

            var lastID = jQuery(".data-list > div:last-child").attr("data-id");
            var post = 'joinus';
            var cateID = '<?php echo $cate ?>';
            var count = '<?php echo get_option('more_load') ?>';
            var cate = 'joinus_category';

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
                    console.log(xhr.reponseText);
                    //console.log(data.status);
                }
            });
        });
    });
</script>
<?php get_footer(); ?>