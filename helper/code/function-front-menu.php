<?php
function menu_home_list()
{
    $arr = array(
        "industry" => "Industries",
        "solution" => "Solutions",
        "service" => "Service",
        "actives" => "Active",
    );
    return $arr;
}

function menu_mobile_list()
{
    $arr = array(
        "about" => "About",
        "cases" => "Cases Tudies",
        "industry" => "Industries",
        "solution" => "Solutions",
        "service" => "Service",
        "resource" => "Resources",
        "actives" => "Active",
        "download" => "Download"
    );
    return $arr;
}

function menu_main_list()
{
    $homeArr = array(

        'operating' =>  array(
            'ID' => '#operating',
            'name' => 'Operating',
            'class' => 'menu-main-sub-1-item',
            'order' => '01',
            'local' => 'true',
            'sub' => '',
        ),

        'location' => array(
            'ID' => '#location',
            'name' => 'Location',
            'class' => 'menu-main-sub-1-item',
            'order' => '02',
            'local' => 'true',
            'sub' => '',
        ),

        'contact' => array(
            'ID' => '#contact',
            'name' => 'Contact Us',
            'class' => 'menu-main-sub-1-item',
            'order' => '03',
            'local' => 'true',
            'sub' => '',
        )

    );
    // THIS ARRAY KEY APPLY LINK OF WEB 
    $arr = array(
        'about' => array(
            'name' => "About",
            'class' => 'menu-main-item', // neu co sub menu phai them sub Class
            'subClass' => 'menu-main-sub-1',
            'sub' => $homeArr,
        ),
        'cases' => array(
            'name' => "Cases Tudies",
            'class' => 'menu-main-item ',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('casestudies_category'),
        ),
        'industry' => array(
            'name' => "Industries",
            'class' => 'menu-main-item ',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('industries_category'),
        ),
        'solution' => array(
            'name' => "Solutions",
            'class' => 'menu-main-item ',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('solutions_category'),
        ),
        'service' => array(
            'name' => "Service",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
        'resource' => array(
            'name' => "Resources",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
        'actives' => array(
            'name' => "Active",
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
