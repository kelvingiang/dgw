<?php

class Controler_Vote
{

    private $action;
    private $model;

    public function __construct()
    {
        require_once DIR_MODEL . 'model-vote-function.php';

        add_action('admin_menu', array($this, 'create'));
        $this->action = getParams('action');
        $this->model = new Model_Vote_Function();
    }

    public function create()
    {
        // THEM 1 NHOM MENU MOI VAO TRONG ADMIN MENU
        $page_title = __('股票投標'); // TIEU DE CUA TRANG
        $menu_title = __('股票投標');  // TEN HIEN TRONG MENU
        // CHON QUYEN TRUY CAP manage_categories DE role ADMINNITRATOR VÀ EDITOR DEU THAY DUOC
        $capability = 'manage_categories'; // QUYEN TRUY CAP DE THAY MENU NAY
        $menu_slug = 'vote_page'; // TEN slug TEN DUY NHAT KO DC TRUNG VOI TRANG KHAC GAN TREN THANH DIA CHI OF MENU
        // THAM SO THU 5 GOI DEN HAM HIEN THI GIAO DIEN TRONG MENU
        //   $icon = PART_ICON . 'icon-setting.png';  // THAM SO THU 6 LA LINK DEN ICON DAI DIEN
        $position = 12; // VI TRI HIEN THI TRONG MENU

        add_menu_page($page_title, $menu_title, $capability, $menu_slug, array($this, 'dispatchActive'), '', $position);
    }

    /* PHAN DIEN HUONG CHO  CAC ACTION ============================ */

    public function dispatchActive()
    {

        switch ($this->action) {
            case 'edit':
            case 'add':
                $this->form();
                break;
            case 'status':
                $this->status();
                break;
            case 'trash':
            case 'restore':
                $this->trash();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'detail':
                $this->detail();    
                break;
                case 'export':
               $this->export();
               break;
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
        require_once(DIR_VIEW . 'view-vote.php');
    }

    public function form()
    {
        if (isPost()) {
            $this->model->Save($_POST, $this->action);
            toBack(1);
        }

        require_once(DIR_VIEW . 'from-vote.php');
    }

    public function status()
    {
        $this->model->toStatus(getParams('id'));
        toBack(1);
    }

    public function trash()
    {
        $arrParam = getParams();
        $this->model->toTrash($arrParam, $this->action);
        toBack(1);
    }

    public function delete(){
        $arrParam = getParams();
        $this->model->toDelete($arrParam);
        toBack(1);
    }
    

    public function detail()
    {
        require_once(DIR_VIEW . 'view-vote-detail.php');
    }

    public function export(){
        $this->model->exportVoteDetails(getParams('id'));
    }
}
