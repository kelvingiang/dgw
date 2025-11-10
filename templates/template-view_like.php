<div class="view_like_area">
    <div class="view_like_content">
        <div>
            <div><?php echo get_post_meta($post->ID, '_metabox_view', true) ?></div>
            <div><i class="far fa-eye"></i></div>
        </div>
        <div>
            <div class="like-count"><?php echo get_post_meta($post->ID, '_metabox_like', true) ?></div>
            <div class="like-click"><i class="far fa-thumbs-up" data-post="<?php echo $post->ID ?>"></i></div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {

        var postID = '<?php echo $post->ID ?>';

        if (!localStorage.getItem('liked_' + postID)) {
            jQuery('.like-click').children().addClass('like-post');
        }

        jQuery(document).on('click', '.like-post', function() {
            var $this = jQuery(this);
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>', // lay doi tuong chuyen sang dang array
                type: 'post', //                data: $(this).serialize(),
                data: {
                    action: 'plus_one_like', // ✅ 對應後端的 hook 名稱
                    postID: jQuery(this).attr("data-post"),
                },
                dataType: 'json',
                // khi load dữ liêu show chữ loading.....
                success: function(data) { // set ket qua tra ve  data tra ve co thanh phan status va message
                    if (data.status === 'done') {
                        jQuery('.like-count').html(data.html);
                        $this.removeClass('like-post');
                        localStorage.setItem('liked_' + postID, '1');

                    } else if (data.status === 'empty') {
                        // jQuery("#load-more").hide();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        })

    });
</script>