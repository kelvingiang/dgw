<?php
require_once DIR_MODEL . 'model-member-function.php';
$mode = new Model_Member_Function();

$params = getParams();
if ($params['action'] == 'add') {
    $title = 'Add New';
    $btn_text = 'Submmit';
} elseif ($params['action'] == 'edit') {
    $title = 'Edit';
    $btn_text = 'Update';
}



if ($params['id'] !== ' ') {
    $item = $mode->getItem(getParams('id'));
}
?>
<form name="f-pro" id="f-pro" method="post">
    <input type="hidden" name="hid-id" id="hid-id" value="<?php echo getParams('id') ?>" />
    <div style="width: 98%">
        <div class="main-title">
            <h2> <?php _e($title) ?> </h2>
            <?php
            // LAY THONG TIN U USER DANG NHAP
            global $current_user;
            ?>
        </div>
        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label><?php _e('Company') ?></label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_company" name="txt_company" class="my-input" value="<?php echo $item['company'] ?>" />
                </div>
            </div>
        </div>

        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label> <?php _e('Software') ?> </label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_soft" name="txt_soft" class="my-input" value="<?php echo $item['use_soft'] ?>" />
                </div>
            </div>
        </div>

        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label> <?php _e('Career') ?></label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_career" name="txt_career" class="my-input" value="<?php echo $item['career'] ?>" />
                </div>
            </div>
        </div>

        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label><?php _e('Show Order') ?></label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_order" name="txt_order" class="my-input type-number" placeholder="<?php _e('The larger the number will show in front') ?>" value="<?php echo $item['is_order'] ?>" />
                </div>
            </div>
        </div>
        <hr>



        <!-- =-== FUNCTION THEM HINH ANH  TRONG MEDIA CAU WP  PHAI THEM wp_editor ====================================================================-->
        <?php // _add_wp_media($item['img']);  
        ?>
        <div class="row">
            <?php wp_editor($item['description'], 'txt_description', array('wpautop' => false, 'editor_height' => '300px')); ?>
        </div>
        <!-- =-== End ====================================================================-->
    </div>
    <div class=" clear"></div>
    <hr>
    <div class="row-two-column">
        <div class="col">
            <div class="cell-title"><?php _e('Title SEO') ?> </div>
            <div class=" cell-text">
                <input type="text" id="txt_seo_title" name="txt_seo_title" class="my-input" value="<?php echo $item['seo_title'] ?>" />
            </div>
        </div>
    </div>

    <div class="row-two-column">
        <div class="col">
            <div class=" cell-title"><?php _e('Key SEO') ?></div>
            <div class=" cell-text">
                <input type="text" id="txt_seo_key" name="txt_seo_key" class="my-input" value="<?php echo $item['seo_key'] ?>" />
            </div>
        </div>
    </div>

    <div class=" row-one-column">
        <div class=" cell-title"><?php _e('Description SEO') ?> <i style="font-size: .8rem">(<?php _e('limit 80 chars') ?>)</i></div>
        <div class=" cell-text">
            <textarea id="txt_seo_description" name="txt_seo_description" rows="3" width="100%" maxlength="80" style="width: 80%"><?php echo $item['seo_description'] ?></textarea>
        </div>
    </div>

    <div class="button-row">
        <input type="submit" name="btn-submit" id="btn-submit" class="button button-primary button-large" value="<?php echo __($btn_text) ?>" />
    </div>
</form>

<script>
    jQuery(document).ready(function() {


    });
</script>