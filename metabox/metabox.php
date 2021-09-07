<?php

class Metabox_Main
{

    private $_controler_name = 'main_controler_options';
    private $_controler_options = array();

    public function __construct()
    {
        $defaultoption = array(
            'metabox_web' => TRUE,
            'metabox_download' => TRUE,
            'metabox_langguage' => TRUE,
            'metabox_industries' => TRUE,
            'metabox_service' => FALSE,
            'metabox_solution' => TRUE,
            'metabox_active' => FALSE,
            'metabox_product' => FALSE,
            'metabox_seo' => FALSE,
            'metabox_order' => TRUE,
            'metabox_home' => TRUE,
        );

        $this->_controler_options = get_option($this->_controler_name, $defaultoption);
        $this->metabox_web();
        $this->metabox_download();
        $this->metabox_langguage();
        $this->metabox_industries();
        $this->metabox_service();
        $this->metabox_solution();
        $this->metabox_active();
        $this->metabox_product();
        $this->metabox_home();
        $this->metabox_order();
        $this->metabox_seo();
        add_action('admin_init', array($this, 'do_output_buffer'));
    }

    public function metabox_web()
    {
        if ($this->_controler_options['metabox_web']) {
            require_once(DIR_METABOX . 'metabox-web.php');
            new Metabox_Web_FreeBook();
        }
    }

    public function metabox_langguage()
    {
        if ($this->_controler_options['metabox_langguage']) {
            require_once(DIR_METABOX . 'metabox-langguage.php');
            new Metabox_Langguage();
        }
    }

    public function metabox_download()
    {
        if ($this->_controler_options['metabox_download']) {
            require_once(DIR_METABOX . 'metabox-downloads.php');
            new Metabox_Download();
        }
    }

    public function metabox_industries()
    {
        if ($this->_controler_options['metabox_industries']) {
            require_once(DIR_METABOX . 'metabox-industries.php');
            new Metabox_Industries();
        }
    }

    public function metabox_service()
    {
        if ($this->_controler_options['metabox_service']) {
            require_once(DIR_METABOX . 'metabox-service.php');
            new Metabox_Service();
        }
    }

    public function metabox_solution()
    {
        if ($this->_controler_options['metabox_solution']) {
            require_once(DIR_METABOX . 'metabox-solution.php');
            new Metabox_Solution();
        }
    }

    public function metabox_active()
    {
        if ($this->_controler_options['metabox_active'] == true) {
            require_once(DIR_METABOX . 'metabox-active.php');
            new Metabox_Active();
        }
    }

    public function metabox_product()
    {
        if ($this->_controler_options['metabox_product'] == true) {
            require_once(DIR_METABOX . 'metabox-product.php');
            new Metabox_Product();
        }
    }

    public function metabox_home()
    {
        if ($this->_controler_options['metabox_home'] == true) {
            require_once(DIR_METABOX . 'metabox-home.php');
            new Metabox_Home();
        }
    }

    public function metabox_seo()
    {
        if ($this->_controler_options['metabox_seo'] == true) {
            require_once(DIR_METABOX . 'metabox-seo.php');
            new Metabox_Seo();
        }
    }

    public function metabox_order()
    {
        if ($this->_controler_options['metabox_order'] == true) {
            require_once(DIR_METABOX . 'metabox-order.php');
            new Metabox_Order();
        }
    }

    //=== FUNCTION NAY GIAI QUYET CHUYEN TRANG BI LOI 
    public function do_output_buffer()
    {
        ob_start();
    }
}
