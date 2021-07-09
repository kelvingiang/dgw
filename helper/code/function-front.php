<?php

function ColorCode($id) {
    $color;
    switch ($id) {
        case "1":
            $color = 'black';
            break;
        case "2":
            $color = 'red';
            break;
        case "3":
            $color = 'blue';
            break;
        case "4":
            $color = 'pink';
            break;
        case "5":
            $color = 'silver';
            break;
        case "6":
            $color = 'green';
            break;
    }
    return $color;
}

function get_category_summary($id) {
    global $wpdb;
    $table = $wpdb->prefix . 'product_category';
    $sql = "SELECT summary_vn, summary_cn, img FROM  $table WHERE ID = $id ";
    $row = $wpdb->get_row($sql, ARRAY_A);
    return $row;
}

function get_product_category() {
    global $wpdb;
    $table = $wpdb->prefix . 'product_category';
    $sql = "SELECT * FROM  $table WHERE kind = 'p' ORDER BY `orders` DESC  ";
    $row = $wpdb->get_results($sql, ARRAY_A);
    return $row;
}

function get_category_by_id($ID) {
    global $wpdb;
    $table = $wpdb->prefix . 'product_category';
    $sql = "SELECT name_cn, name_vn FROM  $table WHERE  ID = $ID  ";
    $row = $wpdb->get_row($sql, ARRAY_A);
    return $row;
}

function get_show_name($kind, $val) {
    global $wpdb;
    $table = $wpdb->prefix . 'product_category';
    $sql = "SELECT * FROM  $table WHERE kind = '$kind' AND val = '$val' ";
    $row = $wpdb->get_row($sql, ARRAY_A);
    return $row;
}

function get_product($id) {
    global $wpdb;
    $table = $wpdb->prefix . 'product';
    $sql = "SELECT * FROM  $table WHERE ID = $id";
    $row = $wpdb->get_row($sql, ARRAY_A);
    return $row;
}

function get_products($cate) {
    global $wpdb;
    $table = $wpdb->prefix . 'product';
    if ($cate == '') {
        $sql = "SELECT * FROM  $table WHERE trash = 0 ORDER BY `is_order` DESC";
    } else {
        $sql = "SELECT * FROM  $table WHERE trash = 0 AND category = $cate ORDER BY `is_order` DESC";
    }
    $row = $wpdb->get_results($sql, ARRAY_A);
    return $row;
}

//echo '<pre>';
//print_r(get_product_category());
//echo '</pre>';


function menu_main_list() {
    $sub_item = array();
    foreach (get_product_category() as $val) {
        $sub_item['products/cate/' . $val['ID']] = array('vn' => $val['name_vn'], 'cn' => $val['name_cn'], 'sub' => '');
    }

    $arr = array(
        '' => array('vn' => 'Trang Chủ', 'cn' => '首 頁', 'sub' => ''),
        'about' => array('vn' => 'Giới Thiệu Công Ty', 'cn' => '公 司 簡 介', 'sub' => ''),
        'products' => array('vn' => 'Sản Phẩm', 'cn' => '產 品', 'class' => 'menu-main-sub-1',
            'sub' => $sub_item),
        'contact' => array('vn' => 'Liên Hệ', 'cn' => '聯 繫 公 司', 'sub' => ''),
    );
    return $arr;
}

function menu_mobile_list() {
    $arr = array(
        '' => array('vn' => 'Trang Chủ', 'cn' => '首 頁', 'sub' => ''),
        'about' => array('vn' => 'Giởi Thiệu Công Ty', 'cn' => '公 司 簡 介', 'sub' => ''),
        'products' => array('vn' => 'Sản Phẩm', 'cn' => '產 品', 'sub' => ''),
        'contact' => array('vn' => 'Liên Hệ', 'cn' => '聯 繫 公 司', 'sub' => ''),
    );
    return $arr;
}

function menu_main_list_defual() {
    $arr = array(
        'products' => array('vn' => 'san phan', 'cn' => '產品', 'sub' => ''),
        'page-two' => array('vn' => 'menu two vn', 'cn' => 'menu two cn', 'sub' => ''),
        'page-three' => array('vn' => 'menu three vn', 'cn' => 'menu three cn', 'class' => 'menu-main-sub-1',
            'sub' => array(
                'sub-menu-one' => array('vn' => 'menu one sub 1 tv', 'cn' => 'menu one sub 1 cn', 'sub' => ''),
                'sub-menu-tow' => array('vn' => 'menu one sub 2 tv', 'cn' => 'menu one sub 2 cn', 'sub' => ''),
                'sub-menu-three' => array('vn' => 'menu one sub 3 tv', 'cn' => 'menu one sub 3 cn', 'class' => 'menu-main-sub-2',
                    'sub' => array(
                        'sub-menu-2-one' => array('vn' => 'menu two sub 1 tv', 'cn' => 'menu two sub 1 cn', 'sub' => ''),
                        'sub-menu-2-tow' => array('vn' => 'menu two sub 2 tv', 'cn' => 'menu two sub 2 cn', 'sub' => ''),
                        'sub-menu-2-three' => array('vn' => 'menu two sub 3 tv', 'cn' => 'menu two sub 3 cn', 'sub' => '',),
                        'sub-menu-2-four' => array('vn' => 'menu two sub 4 tv', 'cn' => 'menu two sub 4 cn', 'class' => 'menu-main-sub-3',
                            'sub' => array(
                                'sub-menu-3-one' => array('vn' => 'menu three sub 1 tv', 'cn' => 'menu three sub 1 cn', 'sub' => ''),
                                'sub-menu-3-tow' => array('vn' => 'menu three sub 2 tv', 'cn' => 'menu three sub 2 cn', 'sub' => ''),
                                'sub-menu-3-three' => array('vn' => 'menu three sub 3 tv', 'cn' => 'menu three sub 3 cn', 'sub' => ''),
                                'sub-menu-3-four' => array('vn' => 'menu three sub 4 tv', 'cn' => 'menu three sub 4 cn', 'sub' => ''),
                                'sub-menu-3-five' => array('vn' => 'menu three sub 5 tv', 'cn' => 'menu three sub 5 cn', 'sub' => ''),
                                'sub-menu-3-six' => array('vn' => 'menu three sub 6 tv', 'cn' => 'menu three sub 6 cn', 'sub' => ''),
                            )
                        ),
                        'sub-menu-2-five' => array('vn' => 'menu two sub 5 tv', 'cn' => 'menu two sub 5 cn', 'sub' => ''),
                        'sub-menu-2-six' => array('vn' => 'menu two sub 6 tv', 'cn' => 'menu two sub 6 cn', 'sub' => ''),
                    )
                ),
                'sub-menu-four' => array('vn' => 'menu one sub 4 tv', 'cn' => 'menu one sub 4 cn', 'sub' => ''),
                'sub-menu-five' => array('vn' => 'menu one sub 5 tv', 'cn' => 'menu one sub 5 cn', 'sub' => ''),
                'sub-menu-six' => array('vn' => 'menu one sub 6 tv', 'cn' => 'menu one sub 6 cn', 'sub' => ''),
            )
        ),
        'page-four' => array('vn' => 'menu four vn', 'cn' => 'menu four cn', 'sub' => ''),
        'page-five' => array('vn' => 'menu five vn', 'cn' => 'menu five cn', 'sub' => ''),
        'page-six' => array('vn' => 'menu six vn', 'cn' => 'menu six cn', 'sub' => ''),
        'page-seven' => array('vn' => 'menu seven vn', 'cn' => 'menu seven cn', 'sub' => ''),
    );
    return $arr;
}
