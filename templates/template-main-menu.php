<div>
    <h2>main menu</h2>
    <nav class="menu-main">
        <?php
        foreach (menu_main_list() as $key_main => $val_main) {

            echo "<div class= '" . __($val_main['class']) . "' >"
                . "<a href='#' class='menu-main-item-link'>" . __($val_main['name']) . "</a>"
                . "<div class='menu-main-item-bg'></div>";

            if (!empty($val_main['sub'])) {
                echo "<div class='" . $val_main['subClass'] . "'>";
                foreach ($val_main['sub'] as $key_sub => $val_sub) {
                    echo "<div class=" . __($val_sub['class']) . " > "
                        . "<a href='#' class='menu-main-sub-1-item-link '>" . __($val_sub['name']) . "</a>"
                        . "<div class='menu-main-sub-1-item-bg'></div>"
                        . "</div>";
                }
                echo "</div>";
            }

            echo "</div>";
        }
        ?>
    </nav>
    <div style="clear: both"></div>
</div>
&#160;&#160;
<script>



</script>