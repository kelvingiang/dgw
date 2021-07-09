<?php

class Controler_Main {

    private $_controler_name = 'main_controler_options';
    private $_controler_options = array();

    public function __construct() {

        $defaultoption = array(
            'controler_active' => true,
            'controler_industries' => true,
            'controler_solutions' => true,
            'controler_services' => true,
            'controler_information' => true,
            'controler_member' => true,
            'controler_slider' => true,
        );

        $this->_controler_options = get_option($this->_controler_name, $defaultoption);
        $this->page_information();
        $this->page_member();

        $this->post_slider();
        $this->post_solutions();
        $this->post_services();
        $this->post_industries();
        $this->post_active();


        add_action('admin_init', array($this, 'do_output_buffer'));
    }

    public function page_information() {
        if ($this->_controler_options['controler_information']) {
            require_once (DIR_CONTROLER . 'controler-information.php');
            new Controler_Company_Information();
        }
    }

    public function page_member() {
        if ($this->_controler_options['controler_member'] == true) {
            require_once(DIR_CONTROLER . 'controler-member.php');
            new Controler_Member();
        }
    }

    public function post_active() {
        if ($this->_controler_options['controler_active'] == true) {
            require_once(DIR_CONTROLER . 'controler-active.php');
            new Controler_Active();
        }
    }

    public function post_industries() {
        if ($this->_controler_options['controler_industries'] == true) {
            require_once(DIR_CONTROLER . 'controler-industries.php');
            new Controler_Industries();
        }
    }

    public function post_solutions() {
        if ($this->_controler_options['controler_solutions'] == true) {
            require_once(DIR_CONTROLER . 'controler-solutions.php');
            new Controler_Solutions();
        }
    }

    public function post_services() {
        if ($this->_controler_options['controler_services'] == true) {
            require_once(DIR_CONTROLER . 'controler-services.php');
            new Controler_Services();
        }
    }

    public function post_slider() {
        if ($this->_controler_options['controler_slider'] == true) {
            require_once(DIR_CONTROLER . 'controler-slider.php');
            new Controler_Slider();
        }
    }

    //=== FUNCTION NAY GIAI QUYET CHUYEN TRANG BI LOI 
    public function do_output_buffer() {
        ob_start();
    }

}
