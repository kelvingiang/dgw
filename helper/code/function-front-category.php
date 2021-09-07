<?php
function getCategories($cate)
{
    $arr = array();
    $argsCate = array(
        'type' => 'post',
        'posts_per_page' => -1,
        'taxonomy' => $cate,
        'hide_empty' => 0,
        'parent' => 0,
    );
    $categories = get_categories($argsCate);

    if ($categories) {
        foreach ($categories as $key => $value) {
            $option = get_option("option_" . $cate . "_" . $value->term_id . "");
            /*  echo "option_" . $cate . "_" . $value->term_id . "";
            echo "<pre>";
            print_r($option);
            echo "</pre>";*/
            $arr[$value->term_id] = array(
                'ID' => $value->term_id,
                'name' => $option['cate_' . $_SESSION['languages']],
                'class' => 'menu-main-sub-1-item',
                'order' => $option['cate_order'],
                'sub' => '',
            );
        }
    }

    usort($arr, "cmp");

    return $arr;
}

function getAllCategories($cate, $parent, $page)
{
    $arr = array();
    $argsCate = array(
        'type' => 'post',
        'posts_per_page' => -1,
        'taxonomy' => $cate,
        'hide_empty' => 0,
        'parent' => $parent,
    );

    $categories = get_categories($argsCate);

    if ($categories) {
        foreach ($categories as $key => $value) {
            $option = get_option("option_" . $cate . "_" . $value->term_id . "");
            $arr[$value->term_id] = array(
                'ID' => $value->term_id,
                'name' => $option['cate_' . $_SESSION['languages']],
                'class' => "",
                'order' => $option['cate_order'],
                'page' => $page,
                'sub' => '',
            );
        }
    }

    usort($arr, "cmp");

    return $arr;
}
