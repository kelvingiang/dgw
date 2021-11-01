<?php

class Metabox_Home
{

    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'create'));
        add_action('save_post', array($this, 'save'));
    }

    public function create()
    {
        $id = 'admin-metabox-home';
        $title = __('Show In Home Page');
        $callback = array($this, 'display');
        add_meta_box($id, $title, $callback, array('post', 'resources', 'solutions', 'casestudies', 'active', 'services'));
    }

    public function display($post)
    {
        $action = 'admin-metabox-data';
        $name = 'admin-metabox-data-nonce';
        wp_nonce_field($action, $name);
        $checkValue = get_post_meta($post->ID, '_metabox_home', true) == 1 ? "checked" : " ";
?>
        <div class="meta-row-two">
            <div class="col">
                <div class="title-cell">
                    <label style="margin-right: 15px"><?php echo __('Show In Home Page'); ?></label>
                    <input type="checkbox" id="ckd-show" name="ckd-show" <?php echo $checkValue ?> />
                </div>
            </div>
        </div>
        <div class="clear"></div>
<?php
    }

    public function save($post_id)
    {
        // kiem thanh phan an bao mat cua wp
        // NEU HAM NAY TRA VE GIA TRI  LA TRUE THUC HIEN TIEP CAC PHAN DUOI , CON TRA VE FLASE return VE $post_id
        if (!isset($_POST['admin-metabox-data-nonce']))
            return $post_id;
        // NEU HAM NAY TRA VE GIA TRI  LA TRUE THUC HIEN TIEP CAC PHAN DUOI , CON TRA VE FLASE return VE $post_id 
        if (wp_verify_nonce('admin-metabox-data-nonce', 'admin-metabox-data'))
            return $post_id;
        // HAM TU DONG LUU KHI DE QUA LAU NEU TRA VE FLASE return $post_id
        if (define('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        if (!current_user_can('edit_post', $post_id))
            return $post_id;

        // 4 BON PHAN TREN DUNG DE BAO MAT KHI LUU METABOX TRONG WP 

        $chk = $_POST['ckd-show'] == 'on' ? "1" : "0";
        update_post_meta($post_id, '_metabox_home', $chk);
    }
}
