<?php
require_once DIR_MODEL . 'model-popup-function.php';
$model = new Model_Popup_Function();
$data = $model->getActive();
if (!empty($data)) :
?>
    <div class="dgw-popup">
        <div class="dgw-popup-space">
            <div class="dgw-popup-close"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
            <a class="popup-link" href="<?php echo $data['link_' . $_SESSION['languages']] ?>">
                <img class="img-computer" src=" <?php echo PART_IMAGES . 'pop-up/' . $data['img_' . $_SESSION['languages']] ?>"></img>
                <img class="img-mobile" src=" <?php echo PART_IMAGES . 'pop-up/' . $data['img_mobile_' . $_SESSION['languages']] ?>"></img>
            </a>
        </div>
    </div>
    <script>
        jQuery(document).ready(function() {
            jQuery(".dgw-popup-close, .dgw-popup").on("click", function() {
                jQuery(this).closest(".dgw-popup").css("display", "none");
                document.body.style.overflowY = "auto";
            });

        });
        document.body.style.overflowY = "hidden";
        document.body.style.overflowX = "hidden";
    </script>
<?php endif ?>