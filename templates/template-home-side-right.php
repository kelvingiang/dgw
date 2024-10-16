<div class="side-right">
    <div class="side-right-close">
        <i class="fas fa-angle-right"></i>
    </div>
    <div class="side-right-content">
        <div id="back-top">
            <i class="fas fa-chevron-up"></i>
        </div>
        <div class="item-hotline">
            <i class="fas fa-phone-volume"></i>
            <div class="hotline">
                <div>028-73070788</div>
            </div>
        </div>
        <div class="item-download">
            <i class="fas fa-download"></i>
        </div>
        <div class="item-zalo">
            <i class="fas fa-qrcode"></i>
            <div class="zalo-code">
                <img src="<?php echo PART_IMAGES . 'zalo-qrcode.jpg'; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="zalo-chat-widget" data-oaid="2873315813915643766" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="500"></div>


<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery('.item-hotline').on('click', function() {
            var cl = jQuery(this).children('.hotline').hasClass('show');
            if (cl) {
                jQuery('.hotline').addClass('hidden');
                jQuery('.hotline').removeClass('show');
            } else {
                jQuery('.hotline').addClass('show');
                jQuery('.hotline').removeClass('hidden');
            }
        });


        jQuery('.item-zalo').on('click', function() {
            var cl = jQuery(this).children('.zalo-code').hasClass('show');
            if (cl) {
                jQuery('.zalo-code').addClass('hidden');
                jQuery('.zalo-code').removeClass('show');
            } else {
                jQuery('.zalo-code').addClass('show');
                jQuery('.zalo-code').removeClass('hidden');
            }
        });

        jQuery('.side-right-close').on('click', function() {
            var hClass = jQuery(this).parent().hasClass('close-side');
            if (hClass) {
                jQuery('.side-right').addClass('open-side')
                jQuery('.side-right').removeClass('close-side')
            } else {
                jQuery('.side-right').addClass('close-side')
                jQuery('.side-right').removeClass('open-side')
            }
        });

    

        jQuery('.item-download').on('click', function() {
            window.location = "https://www.digiwin.com.vn/contact-vn/#infocard";
        });
    });
</script>