</div>
<div id="back-top-wrapper">
    <a id="back-top">
        <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
    </a>
</div>
<?php if (!is_page('about')) { ?>
<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <h3><?php _e('Office') ?> </h3>
                <ul class='footer-list'>
                    <li><label><?php echo get_post_meta(1, '_info_address_' . $_SESSION['languages'], true) ?></label>
                    </li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <h3><?php _e('Contact Us') ?> </h3>
                <ul class='footer-list'>
                    <li> <label> <strong> Phone :</strong> <?php echo get_post_meta(1, '_info_phone', true) ?></label>
                    </li>
                    <li><label><strong> Fax :</strong> <?php echo get_post_meta(1, '_info_fax', true) ?></label></li>
                    <li><label><strong>Email :</strong> <?php echo get_post_meta(1, '_info_email', true) ?></label></li>
                </ul>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <h3><?php _e('link') ?> </h3>
                <ul class='footer-list'>

                    <li>
                        <a href="<?php echo $_SESSION['languages'] == 'vn' ? "https://www.facebook.com/Digiwinsoftvn" : "https://www.facebook.com/Digiwinsoftware" ?>"
                            target="_blank"> Facebook </a>

                        | <a href="https://lin.ee/80E5J8d" target="_blank"> Line </a>

                        | <a href="https://zalo.me/2873315813915643766" target="_blank"> Zalo </a>

                        | <a href="https://www.youtube.com/channel/UC5wPn6YNU6KHkrgAjCIojVA/?sub_confirmation=1"
                            target="_blank"> Youtube </a>

                        | <a href="https://www.linkedin.com/company/digiwinsoft-asean/" target="_blank"> Linkedin </a>

                    </li>
                    <li>
                        <a href="https://digiwin.com.my" target="_blank"> Digiwinsoft Malaysia </a>
                    </li>

                </ul>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 copy-right">
                <p>&copy; <?php echo esc_html(date_i18n(__('Y', 'blankslate'))); ?>
                    <?php echo esc_html(get_bloginfo('name')); ?></p>
            </div>
        </div>
    </div>
</footer>
<?php } ?>
</div>