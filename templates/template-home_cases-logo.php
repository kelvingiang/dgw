<!-- <h2 class="h2-home-title"><?php //_e('Enterprise model success case') ?>22</h2> -->
<div class="case-logo">
    <?php
    require_once(DIR_MODEL . 'model-logo-function.php');
    $model = new Model_Logo_Function();
    $data = $model->getAll(0);
    if (count($data) > 0) {
        foreach ($data as $key => $value) {
            // echo '<pre>'; print_r($value); echo '</pre>';
    ?>
            <div class="case-logo-item">
                <a href='<?php echo $value['link'] ?>'>
                    <img src="<?php echo  PART_IMAGES .'logo/' . $value['img'] ?>"  />
                </a>
            </div>
    <?php
        }
    }
    ?>
</div>
<script>
    jQuery(document).ready(function() {

    });
</script>