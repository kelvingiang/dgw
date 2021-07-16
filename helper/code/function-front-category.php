<?php
function getCategories()
{
    $arr = array();
    $argsCate = array(
        'type' => 'post',
        'posts_per_page' => -1,
        'taxonomy' => 'solutions_category',
        'hide_empty' => 0,
        'parent' => 0,
    );
    $categories = get_categories($argsCate);

    if ($categories) {
        foreach ($categories as $key => $value) {
            $option = get_option("option_category_solution_$value->term_id");
            $arr[$value->term_id] = array(
                'ID' => $value->term_id,
                'name' => $option['cate_solution_' . $_SESSION['languages']],
                'class' => 'menu-main-sub-1-item',
                'order' => $option['cate_solution_order'],
                'sub' => '',
            );
        }
    }

    usort($arr, "cmp");

    return $arr;
}
