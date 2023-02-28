<?php
require_once DIR_MODEL . 'model-vote-function.php';
$mode = new Model_Vote_Function();

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
                    <label><?php _e('Title') ?></label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_title" name="txt_title" 
                    class="my-input" 
                    value="<?php echo $item['title'] ?>" />
                </div>
            </div>
        </div>

        <!-- <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label style="margin-right: 1rem;"><?php _e('啟動') ?></label>
                    <input type="checkbox" id="chk_status" name="chk_status" <?php echo  $item['status'] == 1 ? 'checked' : '' ?> />
                </div>
             
            </div>
            
        </div> -->
        <hr>
        <!-- =-== FUNCTION THEM HINH ANH  TRONG MEDIA CAU WP  PHAI THEM wp_editor ====================================================================-->
        <div class="row">
            <?php wp_editor($item['content'], 'txt_content', array('wpautop' => false, 'editor_height' => '300px')); ?>
        </div>
        <!-- =-== End ====================================================================-->
    </div>
    <div class=" clear"></div>
    <hr>

    <div class="button-row">
        <input type="submit" name="btn-submit" id="btn-submit" class="button button-primary button-large" value="<?php echo __($btn_text) ?>" />
    </div>
</form>

<script>
    jQuery(document).ready(function() {


    });
</script>