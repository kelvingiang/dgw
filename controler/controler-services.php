<?php

class Controler_Services
{

    public function __construct()
    {
        add_action('init', array($this, 'register_custom_post'));
        add_action('manage_edit-services_columns', array($this, 'manage_columns'));
        add_action('manage_services_posts_custom_column', array($this, 'render_columns'));

        add_filter('manage_edit-services_sortable_columns', array($this, 'sortable_views_column'));
        add_filter('request', array($this, 'sort_views_column'));
    }

    public function register_custom_post()
    {
        $labels = array(
            'name' => __('Services'),
            'singular_name' => __('Services'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add Item'),
            'edit_item' => __('Edit'),
            'new_item' => __('Add Item'),
            'all_items' => __('All Item'),
            'view_item' => __('View Item'),
            'search_items' => __('Search'),
            'not_found' => __('No slides found.'),
            'not_found_in_trash' => __('No found in Trash.'),
            'parent_item_colon' => '',
            'menu_name' => __('Services')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => TRUE,
            'menu_icon' => PART_ICON . 'icon-link.png',
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 7,
            'supports' => array('thumbnail', 'editor', 'title'),
        );
        register_post_type('services', $args);
    }

    //==== QUAN LY COT HIEN THI TRON BANG   
    public function manage_columns($columns)
    {
        $date_label = __('Create Date');
        unset($columns['date']); // an cot ngay mac dinh
        unset($columns['modified']); // an cot ngay mac dinh
        unset($columns['postdate']); // an cot ngay mac dinh
        //==== THEM COT VA BAN
        $columns['content'] = __('Content');
        $columns['home'] = __('Top Page');
        $columns['langguage'] = __('Langguage');
        $columns['setorder'] = __('Show Order');
        $columns['date'] = $date_label;
        return $columns;
    }

    //==== HIEN THI NOI DUNG TRONG COT
    public function render_columns($columns)
    {
        global $post;

        switch ($columns) {
            case 'content':
                echo mySubContent(get_the_content());
                break;
            case 'home':
                if ((get_post_meta($post->ID, '_metabox_home', true))) {
                    echo "<div class='show-home'></div>";
                }
                break;
            case 'langguage':
                _e(get_post_meta($post->ID, '_metabox_langguage', true));
                break;
            case 'setorder':
                echo get_post_meta($post->ID, '_metabox_order', true);
                break;
        }
    }

    //====== SAP SEP THEO TRINH TU
    public function sortable_views_column($newcolumn)
    {
        $newcolumn['setorder'] = 'setorder';
        $newcolumn['langguage'] = 'langguage';
        return $newcolumn;
    }

    public function sort_views_column($vars)
    {
        // echo $vars['orderby'];
        // die();
        if (isset($vars['orderby']) && '_metabox_order' == $vars['orderby']) {
         
            $vars = array_merge(
                $vars,
                array(
                    'meta_key' => '_metabox_order', //Custom field key
                    'orderby' => 'meta_value_num' //Custom field value (number)
                )
            );
        }

        if (isset($vars['orderby']) && 'langguage' == $vars['orderby']) {
            $vars = array_merge(
                $vars,
                array(
                    'meta_key' => '_metabox_langguage', //Custom field key
                    'orderby' => '_metabox_langguage' //Custom field value (number)
                )
            );
        }
        return $vars;
    }
}
