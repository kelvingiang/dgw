<h2 class="h2-home-title"><?php _e('Specialize in the industry') ?></h2>
<div id="industry-home">
    <?php
    $arr = getCategories('industries_category');
    foreach ($arr as $val) {
    ?>
    <div class="industry-home-item">
        <a href="<?php echo home_url('industry') . '/cate/' . $val['ID'] . '/tag/' ?>" class="my-link">
            <div class="industry-item-img ">
                <!-- icon cua cac chu de duoc dinh tai getIndustryImage   -->
                <img src="<?php echo getIndustryImage($val['ID']) ?>" />
            </div>
            <div class="industry-item-content">
                <?php echo $val['name']; ?>
            </div>
        </a>
    </div>
    <?php } ?>
</div>