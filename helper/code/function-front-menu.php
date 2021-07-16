<?php

function menu_ppppp()
{
    $sub_item = array();
    foreach (get_product_category() as $val) {
        $sub_item['products/cate/' . $val['ID']] = array('vn' => $val['name_vn'], 'cn' => $val['name_cn'], 'sub' => '');
    }

    $arr = array(
        '' => array('vn' => 'Trang Chủ', 'cn' => '首 頁', 'sub' => ''),
        'about' => array('vn' => 'Giới Thiệu Công Ty', 'cn' => '公 司 簡 介', 'sub' => ''),
        'products' => array(
            'vn' => 'Sản Phẩm', 'cn' => '產 品', 'class' => 'menu-main-sub-1',
            'sub' => $sub_item
        ),
        'contact' => array('vn' => 'Liên Hệ', 'cn' => '聯 繫 公 司', 'sub' => ''),
    );
    return $arr;
}

function menu_mobile_list()
{
    $arr = array(
        '' => array('vn' => 'Trang Chủ', 'cn' => '首 頁', 'sub' => ''),
        'about' => array('vn' => 'Giởi Thiệu Công Ty', 'cn' => '公 司 簡 介', 'sub' => ''),
        'products' => array('vn' => 'Sản Phẩm', 'cn' => '產 品', 'sub' => ''),
        'contact' => array('vn' => 'Liên Hệ', 'cn' => '聯 繫 公 司', 'sub' => ''),
    );
    return $arr;
}

function menu_main_list()
{
    // THIS ARRAY KEY APPLY LINK OF WEB 
    $arr = array(
        'about' => array(
            'name' => "About",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
        'solution' => array(
            'name' => "Solutions",
            'class' => 'menu-main-item ',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories(),
        ),
        'article' => array(
            'name' => "Article",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
        'schedule' => array(
            'name' => "Schedule",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
        'contact' => array(
            'name' => "Contact",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
        'download' => array(
            'name' => "Download",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
    );
    return $arr;
}
