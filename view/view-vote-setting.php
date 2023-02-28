<form name="f-info" id="f-info" method="post">
    <div class="row-two-column">
        <div class="col">
            <div class="cell-title">
                <label>總股數</label>
            </div>
            <div class="cell-text">
                <input type="text" id="txt_stock_total" name="txt_stock_total" class="my-input type-number" 
                value="<?php echo number_format(get_option('_stack_total')) ?>" />
            </div>
        </div>
    </div>
    <div class="button-row">
        <input type="submit" name="btn-submit" id="btn-submit" class="button button-primary button-large" value="<?php echo _e('Submit') ?>" />
    </div>
</form>
<script>

const input = document.getElementById("txt_stock_total");

input.addEventListener("input", function() {
  const value = parseInt(input.value.replace(/,/g, "")); // remove existing commas and parse the input as an integer
  if (!isNaN(value)) {
    const formattedValue = value.toLocaleString(); // format the integer with commas
    input.value = formattedValue; // update the input value with the formatted value
  }
});

    jQuery(document).ready(function() {
    //     jQuery('#txt_stock_total').number( true, 2 );
    // //     jQuery('#txt_stock_total').click(function() {
    // //         console.log("sssss");
    // //         TESTCURRENCY = jQuery('#value').val().toString().match(/(?=[\s\d])(?:\s\.|\d+(?:[.]\d+)*)/gmi);
    // //         if (TESTCURRENCY.length <= 1) {
    // //             jQuery('#valueshow').val( parseFloat(TESTCURRENCY.toString().match(/^\d+(?:\.\d{0,2})?/)));
    // //         } else {
    // //             jQuery('#valueshow').val('Invalid a value!');
    // //         }
    // //     });
});
</script>