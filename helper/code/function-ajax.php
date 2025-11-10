<?php
add_action('wp_ajax_load_more_posts', 'ajax_load_more_posts');          // 已登入使用者
add_action('wp_ajax_nopriv_load_more_posts', 'ajax_load_more_posts');  // 未登入使用者

function ajax_load_more_posts()
{
    // 🔒 安全清理輸入資料
    $lastID = isset($_POST['lastID']) ? intval($_POST['lastID']) : 0;
    $post = isset($_POST['post']) ? sanitize_text_field($_POST['post']) : 'post';
    $cateID = isset($_POST['cateID']) ? intval($_POST['cateID']) : 0;
    $count = isset($_POST['count']) ? intval($_POST['count']) : 5;
    $cate = isset($_POST['cate']) ? sanitize_text_field($_POST['cate']) : '';

    // ✅ 基本查詢參數
    $args = array(
        'post_type'      => $post,
        'posts_per_page' => $count,
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'meta_key'       => '_metabox_order',
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'     => '_metabox_langguage',
                'value'   => isset($_SESSION['languages']) ? $_SESSION['languages'] : '',
                'compare' => '=',
            ),
        ),
    );

    // ✅ 若有分類
    if (!empty($cateID)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $cate,
                'field'    => 'term_id',
                'terms'    => $cateID,
            ),
        );
    }

    // ✅ offset / pagination 控制
    $args['offset'] = $lastID;

    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) {
        $html = '';
        $stt = $lastID + 1;

        while ($wp_query->have_posts()) : $wp_query->the_post();
            $html .= "<div class='item' data-id='" . esc_attr($stt) . "' data-post='" . get_the_ID() . "'>";
            $html .= "<div><a href='" . esc_url(get_the_permalink()) . "'>";

            if (has_post_thumbnail()) {
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $html .= "<img class='item-img' src='" . esc_url($thumb) . "' alt='" . esc_attr(get_the_title()) . "' />";
            } else {
                $html .= "<img class='item-img' src='" . esc_url(PART_IMAGES . 'no-image.jpg') . "' alt='No image' />";
            }
            // 取得 template part 的輸出（用 buffer 捕獲）
            $html .= "</a>";
            ob_start();
            get_template_part('templates/template', 'view_comment');
            $comment_html = ob_get_clean();
            $html .= $comment_html;
            $html .= "</div>";

            $html .= "<div>";
            $html .= "<div class='item-title'> <a href='" . esc_url(get_the_permalink()) . "'>" . esc_html(get_the_title()) . "</a></div>";
            $html .= "</div> </div>";

            $stt++;
        endwhile;

        wp_reset_postdata();

        wp_send_json(array(
            'status' => 'done',
            'html'   => $html,
        ));
    } else {
        wp_send_json(array('status' => 'empty'));
    }

    wp_die();
}


//=====================================================================================================
add_action('wp_ajax_plus_one_view', 'plus_one_view');          // 已登入使用者
add_action('wp_ajax_nopriv_plus_one_view', 'plus_one_view');

function plus_one_view()
{
    $postID = isset($_POST['postID']) ? intval($_POST['postID']) : 0;
    $view = get_post_meta($postID, '_metabox_view', true) ? intval(get_post_meta($postID, '_metabox_view', true)) : 0;
    update_post_meta($postID, '_metabox_view', $view + 1);
    wp_send_json(array(
        'status' => 'done',
        'html'   => $view + 1,
    ));
}

//=====================================================================================================
add_action('wp_ajax_plus_one_like', 'plus_one_like');          // 已登入使用者
add_action('wp_ajax_nopriv_plus_one_like', 'plus_one_like');

function plus_one_like()
{
    $postID = isset($_POST['postID']) ? intval($_POST['postID']) : 0;
    $view = get_post_meta($postID, '_metabox_like', true) ? intval(get_post_meta($postID, '_metabox_like', true)) : 0;
    update_post_meta($postID, '_metabox_like', $view + 1);
    wp_send_json(array(
        'status' => 'done',
        'html'   => $view + 1,
    ));
}

// lấy IP của mạng =========================
// function getUserIP() {
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         // 可能有多個IP，用第一個
//         $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
//     } else {
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return trim($ip);
// }