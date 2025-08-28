<?php
require_once(DIR_MODEL . 'model-popup-function.php');
if (!empty(getParams('id'))) {
    $model = new Model_Popup_Function();
    $data = $model->getItem(getParams('id'));
    $id =  $data['ID'] ?? null;
    $title =  $data['title'] ?? null;
    $link_vn =  $data['link_vn'] ?? null;
    $link_cn =  $data['link_cn'] ?? null;
    $img_vn =  $data['img_vn'] ?? null;
    $img_cn =  $data['img_cn'] ?? null;
}
?>
<?php if (!empty(getParams('e'))) :
    $raw = urldecode(getParams('e'));
    $raw = stripslashes($raw);   // 🔑 把多餘的反斜線去掉
    $ee = json_decode($raw, true);

    if (!empty($ee)) :
?>
        <div class="notice notice-error notice-alt is-dismissible">
            <?php foreach ($ee as $val) : ?>
                <p><?php echo $val ?></p>
            <?php endforeach ?>
        </div>
<?php
    endif;
endif
?>

<form name="f1" id="f1" method="post" enctype="multipart/form-data">
    <input type="hidden" name="hid-id" id="hid-id" value="<?php echo $id ?>" />
    <div >

        <div class="row-one-column">
            <div class="col">
                <div class="cell-title">
                    <label>標題</label>
                </div>
                <div class="cell-text">
                    <input type="text" name="txt-title" id="txt-title" class="my-input" value="<?php echo $title ?>" required />
                </div>
            </div>
        </div>

        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label>中文連接(CN)</label>
                </div>
                <div class="cell-text">
                    <input type="text" name="txt-link-cn" id="txt-link-cn" class="my-input" value="<?php echo $link_cn ?>" required />
                </div>
            </div>

            <div class="col">
                <div class="cell-title">
                    <label>越文連接(VN)</label>
                </div>
                <div class="cell-text">
                    <input type="text" name="txt-link-vn" id="txt-link-vn" class="my-input" value="<?php echo $link_vn ?>" />
                </div>
            </div>
        </div>

        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label>中文圖片(CN)</label>
                </div>
                <div class="cell-text">
                    <input type="file" name="file-img-cn" id="file-img-cn"
                        accept="image/*" class="my-input" />
                </div>
            </div>

            <div class="col">
                <div class="cell-title">
                    <label>越文圖片(VN)</label>
                </div>
                <div class="cell-text">
                    <input type="file" name="file-img-vn" id="file-img-vn" accept="image/*" class="my-input" />
                </div>
            </div>
        </div>

        <div class="row-two-column" style="height: 410px;">
            <div class="col show-img">
                <div id="show-img-cn"
                    style=" background-image: url('<?php echo PART_IMAGES . 'pop-up/' . $img_cn ?>');">
                </div>
            </div>

            <div class="col show-img">
                <div id="show-img-vn"
                    style=" background-image: url('<?php echo PART_IMAGES . 'pop-up/' . $img_vn ?>');">
                </div>
            </div>
        </div>


        <div class="button-row" style="margin-top: 2rem;">
            <button type="submit" name="btn-save" id="btn-save" class="button button-primary button-large"> 發佈</button>
        </div>
    </div>
</form>
<style type="text/css">
    .show-img {
        width: 90%;
        height: 400px;
    }

    #show-img-cn,
    #show-img-vn {
        width: 90%;
        height: 100%;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
<script type="text/javascript">
    // show hinh anh truoc khi up len
    jQuery(function() {
        jQuery("#file-img-cn").on("change", function() {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    jQuery("#show-img-cn").css("background-image", "url(" + this.result + ")");
                };
                console.log(result);
            }
        });


        jQuery("#file-img-vn").on("change", function() {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader)
                return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    jQuery("#show-img-vn").css("background-image", "url(" + this.result + ")");
                };
                console.log(result);
            }
        });
    });
</script>