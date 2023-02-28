<?php
require_once DIR_MODEL . 'model-vote-shareholder-function.php';
$mode = new Model_Vote_Shareholder_Function();

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
    <input type="hidden" name="hid-pass" id="hid-pass" value="<?php echo $item['pass'] ?>" />
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
                    <label>股東代號 - Mã Cổ Đông</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_serial" name="txt_serial" class="my-input" value="<?php echo $item['serial'] ?>" required />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>工號 - Mã Nhân Viên</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_staff_code" name="txt_staff_code" class="my-input" value="<?php echo $item['staff_code'] ?>" required />
                </div>
            </div>

        </div>

        <div class="row-three-column">
            <div class="col">
                <div class="cell-title">
                    <label>姓名 - Họ & Tên (中文)</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_name_cn" name="txt_name_cn" class="my-input" required value="<?php echo $item['name_cn'] ?>" />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>姓名 - Họ & Tên（英文)</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_name_en" name="txt_name_en" class="my-input" required value="<?php echo $item['name_en'] ?>" />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>性別 - Giới Tính</label>
                </div>
                <div class="cell-text">
                    <div style="display:flex; ">
                        <div style="margin-right:20px ">
                            <input type="radio" id="male" name="rdo_gender" value="1" checked <?php echo $item['gender'] === '1' ? 'checked' : '' ?> <label>男</label>
                        </div>

                        <div>
                            <input type="radio" id="female" name="rdo_gender" value="0" <?php echo $item['gender'] === '0' ? 'checked' : '' ?>>
                            <label>女</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-four-column">
            <div class="col">
                <div class="cell-title">
                    <label>股數 - Số Cổ Phiếu</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_count" name="txt_count" class="my-input type-number" value="<?php echo number_format($item['count']) ?>" required />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>面值單價 - Mệnh Giá (VND)</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_price" name="txt_price" class="my-input type-number" value="<?php echo number_format($item['price']) ?>" required />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>面值總金額 - Tổng Mệnh Giá (VND)</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_total" name="txt_total" class="my-input" value="<?php echo number_format($item['total']) ?>" readonly />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>認股比率 - Tỷ Lệ Góp Vốn</label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_rate" name="txt_rate" class="my-input numbers" value="<?php echo $item['rate'] ?>" readonly />
                </div>
            </div>

        </div>

        <hr>
        <div row-one-column>
            <h2> 登入 - Đăng Nhập</h2>
        </div>
        <div class="row-two-column">
            <div class="col">
                <div class="cell-title">
                    <label><?php _e('E-mail') ?> <i id='email-error' class="error-style"></i></label>
                </div>
                <div class="cell-text">
                    <input type="text" id="txt_email" name="txt_email" class="my-input" value="<?php echo $item['email'] ?>" required />
                </div>
            </div>
            <div class="col">
                <div class="cell-title">
                    <label>Password</label>
                </div>
                <div class="cell-text">
                    <input type="password" id="txt_pass" name="txt_pass" class="my-input" value="<?php echo $item['pass'] ?>" required />
                </div>
            </div>
        </div>

        <hr>
        <!-- =-== End ====================================================================-->
    </div>
    <div class=" clear"></div>


    <div class="button-row">
        <input type="submit" name="btn-submit" id="btn-submit" class="button button-primary button-large" value="<?php echo __($btn_text) ?>" />
    </div>
</form>
<script>

    jQuery(document).ready(function() {
        function separator(numb) {
            var str = numb.toString().split(".");
            str[0] = str[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return str.join(".");
        }

        // jQuery.fn.digits = function() {
        //     return this.each(function() {
        //         jQuery(this).text(jQuery(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        //     })
        // }

        // starts phan them dau phan ngan cho so ====================================

        jQuery.fn.addThousandthComma = function() {
            return this.each(function() {
                const input = jQuery(this);
                input.on("input", function() {
                    const value = parseInt(input.val().replace(/,/g, "")); // remove existing commas and parse the input as an integer
                    if (!isNaN(value)) {
                        const formattedValue = value.toLocaleString(); // format the integer with commas
                        input.val(formattedValue); // update the input value with the formatted value
                    }
                });
            });
        };

        jQuery('#txt_price').addThousandthComma();
        jQuery('#txt_count').addThousandthComma();

        //end  ============================================================================

        // start kiem tra email =========================================================================

        const emailInput = jQuery('#txt_email');

        emailInput.on('blur', function() {
            const email = emailInput.val().trim();
            const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,}$/;
            if (!emailRegex.test(email)) {
                jQuery("#email-error").text('Invalid email address');
            }
        });

        // end =======================================================================



        var stack_total = '<?php echo get_option('_stack_total') ?>';
        jQuery("#txt_count").focusout(function() {
            var num = jQuery("#txt_count").val().split(',').join('');
            jQuery("#txt_rate").val((num / stack_total * 100).toFixed(3));
            var dd = separator(num);
            jQuery("#txt_count").val(dd);
        });

        jQuery("#txt_price").focusout(function() {
            var price = jQuery("#txt_price").val().split(',').join('');
            var count = jQuery("#txt_count").val().split(',').join('');
            jQuery("#txt_total").val((count * price).toLocaleString());
            var dd = separator(price);
            jQuery("#txt_price").val(dd);

        });
    });
</script>