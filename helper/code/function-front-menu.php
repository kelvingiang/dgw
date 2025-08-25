<?php
$contact = 'contact-' . $_SESSION['languages'];
$about   =  'about-' . $_SESSION['languages'];


function menu_home_list()
{
    $arr = array(
        "industry" => "Industries",
        "solution" => "Solutions",
        "service" => "Service",
        "activities" => "Active",
    );
    return $arr;
}

function menu_mobile_list()
{
    $arr = array(
        $GLOBALS['about'] => "About",
        "cases" => "Cases Tudies",
        // "industry" => "Industries",
        "solution" => "Solutions",
        // "service" => "Service",
        "resource" => "Resources",
        "activities" => "Active",
        "join-digiwin/cate/97/tag/" => "Join Digiwin",
        "join-digiwin/cate/98/tag/" => "Distribution",
        $GLOBALS['contact'] => "Contact Digiwin"
    );
    return $arr;
}

function menu_main_list()
{
    // THIS ARRAY KEY APPLY LINK OF WEB 
    $arr = array(
        $GLOBALS['about'] => array(
            'name' => "About",
            'class' => 'menu-main-item', // neu co sub menu phai them sub Class
            // 'subClass' => 'menu-main-sub-1',
            // 'sub' => array(),
            //'sub' => $homeArr,
        ),
        'cases' => array(
            'name' => "Cases Tudies",
            'class' => 'menu-main-item ',
            //'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            // 'sub' => array(),
            //'sub' => getCategories('casestudies_category'),
        ),
        // 'industry' => array(
        //     'name' => "Industries",
        //     'class' => 'menu-main-item ',
        //     'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
        //     // 'sub' => 'getCategories('industries_category')',
        //     'sub' => array(),
        // ),
        'solution' => array(
            'name' => "Solutions",
            'class' => 'menu-main-item ',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('solutions_category'),
        ),
        // 'service' => array(
        //     'name' => "Service",
        //     'class' => 'menu-main-item',
        //     'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
        //     'sub' => getCategories('services_category'),
        // ),
        'resource' => array(
            'name' => "Resources",
            'class' => 'menu-main-item',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('resources_category'),
        ),
        'activities' => array(
            'name' => "Active",
            'class' => 'menu-main-item',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('active_category'),
        ),
        // 'join-digiwin' => array(
        //     'name' => "Join Digiwin",
        //     'class' => 'menu-main-item',
        //     'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
        //     'sub' => getCategories('joinus_category'),
        // ),
        'join-digiwin/cate/97/tag/' => array(
            'name' => "Join Digiwin",
            'class' => 'menu-main-item ',
            //'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            // 'sub' => array(),
            //'sub' => getCategories('casestudies_category'),
        ),
        'join-digiwin/cate/98/tag/' => array(
            'name' => "Distribution",
            'class' => 'menu-main-item ',
            //'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            // 'sub' => array(),
            //'sub' => getCategories('casestudies_category'),
        ),

        $GLOBALS['contact'] => array(
            'name' => "Contact Digiwin",
            'class' => 'menu-main-item',
            // 'sub' => array()
        ),
    );
    return $arr;
}
