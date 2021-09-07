<div class="menu-mobile">
    <h1 class="menu-mobile-icon"><i class="fas fa-bars"></i></h1>
    <div class="menu-mobile-ui">
        <?php foreach (menu_mobile_list() as $key => $val) { ?>
            <div class="menu-mobile-item">
                <a href="<?php echo home_url($key) ?>"> <?php _e($val); ?></a>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.menu-mobile-icon').click(function() {
            jQuery('.menu-mobile-ui').toggle(300);
        });
    });
</script>