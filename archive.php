<?php get_header(); ?>
<div style="height: 50px;"></div>
<div class="container-fluid">
    <div>
        <div class='data-list'>
            <?php
            $stt = 1;
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $post_type = get_post_type(get_the_ID());
                    $cate = $post_type.'_category';
                    get_template_part('entry', null, array('stt' => $stt));

                    $stt++;
                endwhile;
            endif; ?>
        </div>

        <div id="load-more">
            <i class="fa fa-angle-double-down"
                aria-hidden="true"></i>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('#load-more').click(function() {
            var lastID = jQuery(".data-list > div:last-child").attr("data-id");
            var post = '<?php echo $post_type ?>';
            var cateID = '';
            var count = '<?php echo get_option('more_load') ?>';
            var cate = '<?php echo $cate ?>';

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