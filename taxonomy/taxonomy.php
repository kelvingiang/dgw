<?php

class Taxonomy_Main
{

    private $_taxonomy_name = 'main_taxonomy_options';
    private $_taxonomy_options = array();

    public function __construct()
    {
        $defaultoption = array(
            'tags_advertising' => false,
            'tags_solution' => true,
            'taxonomy_advertising' => true,
            'taxonomy_industries' => true,
            'taxonomy_solution' => true,
            'taxonomy_resource' => true,
            'taxonomy_active' => true,
        );

        $this->_taxonomy_options = get_option($this->_taxonomy_name, $defaultoption);
        $this->taxonomy_advertising();
        $this->taxonomy_industries();
        $this->taxonomy_solution();
        $this->taxonomy_resource();
        $this->taxonomy_active();

        $this->tags_advertising();
        $this->tags_solution();
        // add_action('admin_init', array($this, 'do_output_buffer'));
    }

    public function tags_solution()
    {
        if ($this->_taxonomy_options['tags_solution'] == true) {
            require_once(DIR_TAXONOMY . 'tag-solution.php');
            new Tags_solution();
        }
    }

    public function tags_advertising()
    {
        if ($this->_taxonomy_options['tags_advertising'] == true) {
            require_once(DIR_TAXONOMY . 'tag-advertising.php');
            new Tags_Advertising();
        }
    }

    public function taxonomy_advertising()
    {
        if ($this->_taxonomy_options['taxonomy_advertising'] == true) {
            require_once(DIR_TAXONOMY . 'taxonomy-advertising.php');
            new Taxonomy_Advertising();
        }
    }

    public function taxonomy_industries()
    {
        if ($this->_taxonomy_options['taxonomy_industries'] == true) {
            require_once(DIR_TAXONOMY . 'taxonomy-industries.php');
            new Taxonomy_Industries();
        }
    }

    public function taxonomy_solution()
    {
        if ($this->_taxonomy_options['taxonomy_solution'] == true) {
            require_once(DIR_TAXONOMY . 'taxonomy-solution.php');
            new Taxonomy_Solution();
        }
    }

    public function taxonomy_resource()
    {
        if ($this->_taxonomy_options['taxonomy_resource'] == true) {
            require_once(DIR_TAXONOMY . 'taxonomy-resource.php');
            new Taxonomy_Resource();
        }
    }

    public function taxonomy_active()
    {
        if ($this->_taxonomy_options['taxonomy_active'] == true) {
            require_once(DIR_TAXONOMY . 'taxonomy-active.php');
            new Taxonomy_Active();
        }
    }

    //=== FUNCTION NAY GIAI QUYET CHUYEN TRANG BI LOI 
    //    public function do_output_buffer() {
    //        ob_start();
    //    }
}
