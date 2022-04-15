<?php
$contact = 'contact-' . $_SESSION['languages'];
$about   =  'about-' . $_SESSION['languages'];

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
        $GLOBALS['about'] => "About",
        "cases" => "Cases Tudies",
        "industry" => "Industries",
        "solution" => "Solutions",
        "service" => "Service",
        "resource" => "Resources",
        "activities" => "Active",
        "join-digiwin" => "Join Digiwin",
        $GLOBALS['contact'] => "Contact Digiwin"
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
        $GLOBALS['about'] => array(
            'name' => "About",
            'class' => 'menu-main-item', // neu co sub menu phai them sub Class
            // 'subClass' => 'menu-main-sub-1',
            'sub' => '',
            //'sub' => $homeArr,
        ),
        'cases' => array(
            'name' => "Cases Tudies",
            'class' => 'menu-main-item ',
            //'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => '',
            //'sub' => getCategories('casestudies_category'),
        ),
        'industry' => array(
            'name' => "Industries",
            'class' => 'menu-main-item ',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            // 'sub' => 'getCategories('industries_category')',
            'sub' => '',
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
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('services_category'),
        ),
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
        'join-digiwin' => array(
            'name' => "Join Digiwin",
            'class' => 'menu-main-item',
            'subClass' => 'menu-main-sub-1', // neu co sub menu phai them sub Class
            'sub' => getCategories('joinus_category'),
        ),
        $GLOBALS['contact'] => array(
            'name' => "Contact Digiwin",
            'class' => 'menu-main-item',
            'sub' => ''
        ),
    );
    return $arr;
}
