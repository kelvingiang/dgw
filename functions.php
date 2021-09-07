<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (!isset($_SESSION)) {
    session_start();
}

define('THEME_URL', get_stylesheet_directory());  // hang lay path thu muc theme
define('THEME_PART', get_stylesheet_directory_uri());
define('DS', DIRECTORY_SEPARATOR);  // phan nay thay doi dau / theo he dieu hanh khac nhau giua window va linx
define('DIR_HELPER', THEME_URL . DS . 'helper' . DS);

require_once(DIR_HELPER . 'define.php');
require_once(DIR_HELPER . 'style.php');
require_once(DIR_HELPER . 'function.php');
require_once(DIR_HELPER . 'require.php');

require_once(DIR_CLASS . 'rewrite.class.php');
new Rewrite_Url();


if (!isset($_SESSION['languages'])) {
    $_SESSION['languages'] = 'cn';
}

/* ==============================================================
  THAY DOI FILE DATA NGON NGU THEO SESSION LANGGUAGE
  =============================================================== */
function change_translate_text($translated)
{
    if ($_SESSION['languages'] == 'cn') {
        $languages = 'zh_TW';
    } else {
        $languages = 'vi_VN';
    }

    if (is_admin()) {
        $file = dirname(dirname(dirname(__FILE__))) . "/languages/admin_languages/data.php";
        // $file = DIR_LANGUAGES . 'admin_language/data.php';
    } else {
        $file = dirname(dirname(dirname(__FILE__))) . "/languages/{$languages}/data.php";
    }
    include_once $file;

    $data = getTranslate();
    if (isset($data[$translated])) {
        return $data[$translated];
    }
    return $translated;
}

add_filter('gettext', 'change_translate_text', 20);






//
//function search_filter($query) {
//
//    if (is_admin() && $query->is_search) {
//        echo '<pre>';
//        print_r($query);
//        echo '</pre>';
//        die();
//        if ($query->is_search) {
//            $meta_args = array(
//                'relation' => 'OR',
//                array(
//                    'key' => '_metabox_langguage',
//                    'value' => getParams('langguage'),
//                    'compare' => 'LIKE',
//                ),
////                array(
////                    'key' => 'price',
////                    'value' => $s,
////                    'compare' => 'LIKE',
////                ),
//            );
//            echo '<pre>';
//            print_r($meta_args);
//            echo '</pre>';
//            die();
//
//
//            $query->set('post_type', 'solutions');
//            $query->set('meta_query', $meta_args);
//        }
//    }
//}
//
//add_action('pre_get_posts', 'search_filter');
//function save_title($post_id, $title) {
//    global $wpdb;
//    $wpdb->update($wpdb->posts, array('post_title' => 'order-#' . $post_id), array('ID' => $post_id));
//}
//
//add_action('save_post', 'save_title');
//================== CUSTOM COLUMNS ON DEFAULT POST ==========================================
// THEM COT VAO POST MAC DINH  
//$ss = get_current_screen();
//add_filter('manage_pages_columns', 'itsg_add_custom_column');
//add_filter('manage_posts_columns', 'itsg_add_custom_column');
//
//function itsg_add_custom_column($columns) {
//    $columns['modified'] = __('Prioritize Show');
//    $columns['postdate'] = __('Create Date');
//    return $columns;
//}
//
//// THEM NOI DUNG VAO COT MOI THEM
//add_action('manage_pages_custom_column', 'itsg_add_custom_column_data', 10, 2);
//add_action('manage_posts_custom_column', 'itsg_add_custom_column_data', 10, 2);
//
//function itsg_add_custom_column_data($column, $post_id) {
//    switch ($column) {
//        case 'modified' :
//            $show = get_post_meta($post_id, '_metabox_prioritize', true);
//            if ($show == 1) {
//                echo '<div class="active-style"></div>';
//            }
//            break;
//        case 'postdate' :
//            echo get_the_date();
//            break;
//    }
//}
// =====================AN DI CAC COT MAC DINH TRONG POST====================================
//if (!function_exists('wp_remove_wp_columns')):
//
//    function wp_remove_wp_columns($columns) {
//        unset($columns['tags']);
//        unset($columns['comments']);
//        unset($columns['author']);
//        unset($columns['date']);
//        return $columns;
//    }
//
//    function wp_remove_wp_columns_init() {
//        add_filter('manage_posts_columns', 'wp_remove_wp_columns');
//    }
//
//    add_action('admin_init', 'wp_remove_wp_columns_init');
//endif;
//
//function add_ourteam_columns($columns) {
//    unset($columns['title']);
//    unset($columns['tags']);
//    unset($columns['date']);
//    return array_merge($columns, array(
//        'name' => __('name'),
//        'designation' => __('Designation'),
//        'image' => __('Image'),
//        'date' => __('Date')
//    ));
//}
//
//add_filter('manage_our-team_posts_columns', 'add_ourteam_columns');
//================= SORT COT THEM VAO===========================
//function sortable_id_column($columns) {
//    $columns['modified'] = 'modified';
//    return $columns;
//}
//
//add_filter('manage_edit-post_sortable_columns', 'sortable_id_column');
////========== SORT THEO GIA TRI metapost
//add_action('pre_get_posts', 'my_modified_orderby');
//
//function my_modified_orderby($query) {
//    if (!is_admin())
//        return;
//
//    $orderby = $query->get('orderby');
//
//    if ('modified' == $orderby) {
//        $query->set('meta_key', '_metabox_prioritize');
//        $query->set('orderby', 'meta_value_num');
//        $query->set('order', 'DESC'); // them dong nay sort se ko thay doi ASC hay DESC
//    }
//}
//
//////====================if (basename($_SERVER["REQUEST_URI"]) == 'checkout' || basename($_SERVER["REQUEST_URI"]) == 'contact') {
//
//$objCaptcha = new CaptchaCls(5, true);
////}



/* =====  TAO MENU SHOW BEN NGOAI ======================================================== */
//if (!function_exists('main-menu')) {
//
//    function get_menu($slug) {
//        $menu = array(
//            'theme_location' => $slug, // chon menu dc thiet lap truoc
//            'container' => 'nav', // tap html chua menu nay
//            'container_class' => $slug, // class cua mennu
//            'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu ">%3$s</ul>'
////            'items_wrap' => '<ul id="%1$s" class="%2$s sf-menu sf-js-enabled sf-arrows">%3$s</ul>'
//        );
//        wp_nav_menu($menu);
//    }
//
//}
//
//register_nav_menu('main-menu', __('Main name', 'suite')); // goi menu de show
//register_nav_menu('cell-menu', __('Mobile name', 'suite')); // goi menu de show
//





/* =======================================  
  FUNCTION OF THIS TEMPLATE
  ======================================= */

add_action('after_setup_theme', 'blankslate_setup');

function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}

add_action('wp_enqueue_scripts', 'blankslate_load_scripts');

function blankslate_load_scripts()
{
    wp_enqueue_style('blankslate-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
}

add_action('wp_footer', 'blankslate_footer_scripts');

function blankslate_footer_scripts()
{
?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
<?php
}

add_filter('document_title_separator', 'blankslate_document_title_separator');

function blankslate_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}

add_filter('the_title', 'blankslate_title');

function blankslate_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}

add_filter('the_content_more_link', 'blankslate_read_more_link');

function blankslate_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}

add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');

function blankslate_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}

add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');

function blankslate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}

add_action('widgets_init', 'blankslate_widgets_init');

function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('wp_head', 'blankslate_pingback_header');

function blankslate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');

function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function blankslate_custom_pings($comment)
{
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

add_filter('get_comments_number', 'blankslate_comment_count', 0);

function blankslate_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
