<?php

require_once (DIR_MODEL . 'model-member-function.php');

class Controler_Member {

    private $model;

    public function __construct() {
        add_action('admin_menu', array($this, 'create'));
        $this->model =  new Model_Member_Function();
    }

    public function create() {
// THEM 1 NHOM MENU MOI VAO TRONG ADMIN MENU
        $page_title = __('Member'); // TIEU DE CUA TRANG 
        $menu_title = __('Member');  // TEN HIEN TRONG MENU
// CHON QUYEN TRUY CAP manage_categories DE role ADMINNITRATOR VÀ EDITOR DEU THAY DUOC
        $capability = 'manage_categories'; // QUYEN TRUY CAP DE THAY MENU NAY
        $menu_slug = 'member_page'; // TEN slug TEN DUY NHAT KO DC TRUNG VOI TRANG KHAC GAN TREN THANH DIA CHI OF MENU
// THAM SO THU 5 GOI DEN HAM HIEN THI GIAO DIEN TRONG MENU
        $icon = PART_ICON . 'icon-setting.png';  // THAM SO THU 6 LA LINK DEN ICON DAI DIEN
        $position = 6; // VI TRI HIEN THI TRONG MENU

        add_menu_page($page_title, $menu_title, $capability, $menu_slug, array($this, 'dispatchActive'), $icon, $position);
    }

    /* PHAN DIEN HUONG CHO  CAC ACTION ============================ */

    public function dispatchActive() {


        $action = getParams('action');
        switch ($action) {
            case 'add':
            case 'edit':
                $this->saveAction();
                break;
            case 'delete':
                $this->deteleAction();
                break;
            case 'restore':
            case 'trash':
                $this->trashAction();
                break;
            default :
                $this->displayPage();
                break;
        }
    }

    public function createUrl() {
        echo $url = 'admin.php?page=' . getParams('page');

        if (getParams('filter_category') != '0') {
            $url .= '&filter_category=' . getParams('filter_category');
        }
//        if(getParams('filter_position') != '0'){
//            $url .= '&filter_position=' . getParams('filter_position');
//        }
        if (mb_strlen(getParams('s'))) {
            $url .= '&s=' . getParams('s');
        }
        return $url;
    }

    public function displayPage() {
        if (getParams('action') == -1) {
            $url = $this->createUrl();
            wp_redirect($url);
        }
        require_once (DIR_VIEW . 'view-member.php');
    }

    /*  TAO BIEN STATIC DE LUU CAC LOI KHI NHAP FROM  */

    public static $error = array();

// THEM MOI ITEM
    public function saveAction() {
        if (isPost()) {
            if (getParams('id') == ' ') {
                $this->model->Save($_POST, 'add');
            } else {
                $this->model->Save($_POST, 'edit');
            }
           toBack(1);
        }
        require_once( DIR_VIEW . 'from-member.php');
    }

    public function trashAction() {
        $arrParam = getParams();
        if ($arrParam['action'] == 'trash') {
            $this->model->toTrash($arrParam, 'trash');
        } elseif ($arrParam['action']  == 'restore') {
            $this->model->toTrash($arrParam, 'restore');
        }
        toBack(1);
    }

// XOA DU LIEU
    public function deteleAction() {
        $arrParam = getParams();
        if (!is_array(getParams())) {
            $action = 'delete_id' . $arrParam['id'];
            check_admin_referer($action, 'security_code');
        } else {
            wp_verify_nonce('_wpnonce');
        }

        $this->model->deleteItem($arrParam);

        toBack(1);
    }

}
