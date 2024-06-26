<div id="header-space">
        <a href="<?php echo home_url(); ?>">
            <img class="company-logo" src="<?php echo PART_IMAGES . 'logo.png' ?>" />
        </a>
        <nav class="menu-main">
            <!-- <div class='menu-main-item'>
                <a href='<?php // echo home_url(); ?>' class='menu-main-item-link'>
                    <i class="fas fa-home"></i></a>
                <div class='menu-main-item-bg'></div>
            </div> -->
            <!-- MAIN MENU  -->
            <?php foreach (menu_main_list() as $key_main => $val_main) {  ?>
                <div class=' <?php echo $val_main['class'] ?>'>
                    <?php if (!empty($val_main['sub'])) { ?>
                        <label class='menu-main-item-link <?php echo $val_main['sub'] != '' ? 'has-sub' : '' ?> '>
                            <?php _e($val_main['name']);  ?>
                        </label>
                    <?php } else { ?>
                        <a href='<?php echo home_url($key_main); ?>' class='menu-main-item-link <?php echo $val_main['sub'] != '' ? 'has-sub' : '' ?> '>
                            <?php _e($val_main['name']);  ?>
                        </a>
                    <?php } ?>

                    <div class='menu-main-item-bg'></div>

                    <!--=========== PHAN MENU SUB =============== -->
                    <?php if (!empty($val_main['sub'])) { ?>
                        <div class=' <?php echo $val_main['subClass'] ?>'>
                            <?php foreach ($val_main['sub'] as $key_sub => $val_sub) { ?>
                                <div class=' <?php echo $val_sub['class'] ?> '>
                                    <?php if ($val_sub['local'] == 'true') { ?>
                                        <a href="<?php echo home_url($key_main) . '/' . $val_sub['ID']  ?>" class='menu-main-sub-1-item-link <?php echo $val_sub['sub'] != '' ? 'has-sub' : '' ?>'>
                                            <?php _e($val_sub['name']) ?></a>
                                    <?php   } else { ?>
                                        <a href="<?php echo home_url($key_main) . '/cate/' . $val_sub['ID'] . '/tag/' ?>" class='menu-main-sub-1-item-link <?php echo $val_sub['sub'] != '' ? 'has-sub' : '' ?>'>
                                            <?php _e($val_sub['name']) ?></a>
                                    <?php } ?>
                                    <div class='menu-main-sub-1-item-bg'></div>

                                    <!--============= PHAN MENU SUB 2 =============================-->
                                    <?php if (!empty($val_sub['sub'])) { ?>
                                        <div class='<?php echo $val_sub['subClass'] ?>'>
                                            <?php foreach ($val_sub['sub'] as $key_sub_2 => $val_sub_2) { ?>
                                                <div class=' <?php echo $val_sub_2['class'] ?> '>
                                                    <a href='<?php echo home_url($key_sub_2) ?>' class='menu-main-sub-2-item-link <?php echo $val_sub_2['sub'] != '' ? 'has-sub' : '' ?> '>
                                                        <?php _e($val_sub_2['name']) ?></a>
                                                    <div class='menu-main-sub-2-item-bg'></div>

                                                    <!--============= PHAN MENU SUB 3 =============================-->
                                                    <?php if (!empty($val_sub_2['sub'])) { ?>
                                                        <div class=' <?php echo $val_sub_2['subClass'] ?>'>
                                                            <?php foreach ($val_sub_2['sub'] as $key_sub_3 => $val_sub_3) { ?>
                                                                <div class=' <?php echo $val_sub_3['class'] ?> '>
                                                                    <a href='<?php echo home_url($key_sub_3) ?>' class='menu-main-sub-3-item-link '>
                                                                        <?php _e($val_sub_3['name']) ?>
                                                                    </a>
                                                                    <div class='menu-main-sub-3-item-bg'></div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- END MENU SUB 3 -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- END MENU SUB 2 -->
                            <?php } ?>
                        </div>
                        <!-- END MENU SUB -->
                    <?php } ?>
                </div>
                <!-- AND MENU -->
            <?php } ?>
        </nav>
        <div>
            <?php get_template_part('templates/template', 'languages') ?>
        </div>
</div>

<div id="header-scroll">
        <a href="<?php echo home_url(); ?>">
            <img class="company-logo" src="<?php echo PART_IMAGES . 'logo.png' ?>" />
        </a>
        <nav class="menu-main">
            <!-- <div class='menu-main-item'>
                <a href='<?php // echo home_url(); ?>' class='menu-main-item-link'>
                    <i class="fas fa-home"></i></a>
                <div class='menu-main-item-bg'></div>
            </div> -->
            <!-- MAIN MENU  -->
            <?php foreach (menu_main_list() as $key_main => $val_main) {  ?>
                <div class=' <?php echo $val_main['class'] ?>'>
                    <?php if (!empty($val_main['sub'])) { ?>
                        <label class='menu-main-item-link <?php echo $val_main['sub'] != '' ? 'has-sub' : '' ?> '>
                            <?php _e($val_main['name']);  ?>
                        </label>
                    <?php } else { ?>
                        <a href='<?php echo home_url($key_main); ?>' class='menu-main-item-link <?php echo $val_main['sub'] != '' ? 'has-sub' : '' ?> '>
                            <?php _e($val_main['name']);  ?>
                        </a>
                    <?php } ?>

                    <div class='menu-main-item-bg'></div>

                    <!--=========== PHAN MENU SUB =============== -->
                    <?php if (!empty($val_main['sub'])) { ?>
                        <div class=' <?php echo $val_main['subClass'] ?>'>
                            <?php foreach ($val_main['sub'] as $key_sub => $val_sub) { ?>
                                <div class=' <?php echo $val_sub['class'] ?> '>
                                    <?php if ($val_sub['local'] == 'true') { ?>
                                        <a href="<?php echo home_url($key_main) . '/' . $val_sub['ID']  ?>" class='menu-main-sub-1-item-link <?php echo $val_sub['sub'] != '' ? 'has-sub' : '' ?>'>
                                            <?php _e($val_sub['name']) ?></a>
                                    <?php   } else { ?>
                                        <a href="<?php echo home_url($key_main) . '/cate/' . $val_sub['ID'] . '/tag/' ?>" class='menu-main-sub-1-item-link <?php echo $val_sub['sub'] != '' ? 'has-sub' : '' ?>'>
                                            <?php _e($val_sub['name']) ?></a>
                                    <?php } ?>
                                    <div class='menu-main-sub-1-item-bg'></div>

                                    <!--============= PHAN MENU SUB 2 =============================-->
                                    <?php if (!empty($val_sub['sub'])) { ?>
                                        <div class='<?php echo $val_sub['subClass'] ?>'>
                                            <?php foreach ($val_sub['sub'] as $key_sub_2 => $val_sub_2) { ?>
                                                <div class=' <?php echo $val_sub_2['class'] ?> '>
                                                    <a href='<?php echo home_url($key_sub_2) ?>' class='menu-main-sub-2-item-link <?php echo $val_sub_2['sub'] != '' ? 'has-sub' : '' ?> '>
                                                        <?php _e($val_sub_2['name']) ?></a>
                                                    <div class='menu-main-sub-2-item-bg'></div>

                                                    <!--============= PHAN MENU SUB 3 =============================-->
                                                    <?php if (!empty($val_sub_2['sub'])) { ?>
                                                        <div class=' <?php echo $val_sub_2['subClass'] ?>'>
                                                            <?php foreach ($val_sub_2['sub'] as $key_sub_3 => $val_sub_3) { ?>
                                                                <div class=' <?php echo $val_sub_3['class'] ?> '>
                                                                    <a href='<?php echo home_url($key_sub_3) ?>' class='menu-main-sub-3-item-link '>
                                                                        <?php _e($val_sub_3['name']) ?>
                                                                    </a>
                                                                    <div class='menu-main-sub-3-item-bg'></div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- END MENU SUB 3 -->
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- END MENU SUB 2 -->
                            <?php } ?>
                        </div>
                        <!-- END MENU SUB -->
                    <?php } ?>
                </div>
                <!-- AND MENU -->
            <?php } ?>
        </nav>
  
        <div>
            <?php get_template_part('templates/template', 'languages') ?>
        </div>
   
</div>

<script>
            const animationElements = document.querySelector("#header-space");
            // TAO HIEU UNG KHI CUON NOI DUNG TRAN WEB
            function myCheck(element) {
                // LAY VI TRI TOP VA BOTTOM CUA ELEMENT
                var rect = element.getClientRects()[0];
                // XAC DINH DO CAO CUA MAN HINH
                var heightScreen = window.innerHeight;

                if (rect.bottom < 0) {
                    document.querySelector('#header-scroll').classList.add("start");
                    document.querySelector('#header-scroll').classList.remove("close");
                } else {
                    // kiểm tra class có tồn tại hay không bắng javascript =======
                    if (document.querySelector('#header-scroll').classList.contains("start")) {
                        document.querySelector('#header-scroll').classList.add("close");
                    }
                    document.querySelector('#header-scroll').classList.remove("start");

                }
            }

            function menuAnimation() {
                // LAY TAT CA CAC DOI TUONG CO CLASS LA .show-on-scroll
                //var animationElements = document.querySelectorAll('.show-on-scroll')
                // CHAY VONG LAP DE THEM CLASS
                //  animationElements.forEach((el) => {
                myCheck(animationElements);
                //  });
                // animationElements.myCheck();
            }
        </script>