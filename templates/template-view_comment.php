<div class="view_comment_area">
    <div class="view_comment_content">
        <div>
            <div><?php echo get_post_meta($post->ID, '_metabox_view', true) ?></div>
            <div><i class="far fa-eye"></i></div>
        </div>
        <div>
            <div><?php echo get_post_meta($post->ID, '_metabox_like', true) ?></div>
            <div><i class="far fa-thumbs-up"></i></div>
        </div>
        <div>
            <div><?php echo get_post_meta($post->ID, '_metabox_comment', true) ?></div>
            <div><i class="far fa-comment-dots"></i></div>
        </div>    
    
    </div>
</div>

