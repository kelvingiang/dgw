<?php

class Controler_vote_setting
{
    private $action;
    private $model;

    public function __construct()
    {
        require_once DIR_MODEL . 'model-vote-shareholder-function.php';

        add_action('admin_menu', array($this, 'create'));
        $this->action = getParams('action');
        $this->model = new Model_Vote_Shareholder_Function();
    }

    public function Create()
    {
        $parent_slug = 'vote_page';
        $page_title = __('股票設定');
        $menu_title = __('股票設定');
        $capability = 'manage_categories';
        $menu_slug = 'vote_setting';
        $position = 17;
        //$icon = PART_ICON . '/staff-icon.png';  // THAM SO THU 6 LA LINK DEN ICON DAI DIEN
        add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, array($this, 'dispatchActive'), $position);
    }

    public function dispatchActive()
    {

        switch ($this->action) {
          
            default:
                $this->displayPage();
                break;
        }
    }

    public function createUrl()
    {
        echo $url = 'admin.php?page=' . getParams('page');

        if (getParams('filter_category') != '0') {
            $url .= '&filter_category=' . getParams('filter_category');
        }

        if (mb_strlen(getParams('s'))) {
            $url .= '&s=' . getParams('s');
        }
        return $url;
    }

    public function displayPage()
    {
        if (getParams('action') == -1) {
            $url = $this->createUrl();
            wp_redirect($url);
        }

          if (isPost()) {
            update_option( '_stack_total', str_replace(',','',$_POST['txt_stock_total']));
        }
        require_once(DIR_VIEW . 'view-vote-setting.php');
    }


}
