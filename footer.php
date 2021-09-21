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
                        <li><?php echo get_post_meta(1, '_info_address_' . $_SESSION['languages'], true) ?></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <h3><?php _e('Contact Us') ?> </h3>
                    <ul class='footer-list'>
                        <li> <strong> Phone :</strong> <?php echo get_post_meta(1, '_info_phone', true) ?></li>
                        <li><strong> Fax :</strong> <?php echo get_post_meta(1, '_info_fax', true) ?></li>
                        <li><strong>Email :</strong> <?php echo get_post_meta(1, '_info_email', true) ?></li>

                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <h3><?php _e('link') ?> </h3>
                    <ul class='footer-list'>
                        <li><strong> web :</strong> </li>
                        <li><strong> FB :</strong> </li>

                    </ul>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 copy-right">
                    <p>&copy; <?php echo esc_html(date_i18n(__('Y', 'blankslate'))); ?> <?php echo esc_html(get_bloginfo('name')); ?></p>
                </div>
            </div>
        </div>
    </footer>
<?php } ?>
</div>
<?php wp_footer(); ?>
</body>

</html>