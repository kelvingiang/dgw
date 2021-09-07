<h2 class="h2-home-title"><?php  _e('Specialize in the industry')?></h2>
<div id ="industry-home">
    <?php
    $arr = getCategories('industries_category');
    foreach ($arr as $val) {
//       echo '<pre>';
//       print_r($val);
//       echo '</1pre>';
        ?>
        <div class="industry-home-item">
            <div  class="industry-item-img ">
                <img src="<?php echo getIndustryImage($val['ID']) ?>"/>
            </div>
            <div class="industry-item-content">
                <a href="<?php echo home_url('industry'). '/cate/' . $val['ID'] . '/tag/' ?>" class="my-link"><?php echo $val['name']; ?></a> 
            </div>
        </div>
    <?php } ?>
</div>