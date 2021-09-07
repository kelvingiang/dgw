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
                    <h3> Office </h3>
                    <ul class='footer-list'>
                        <li><?php echo get_post_meta(1, '_info_address_' . $_SESSION['languages'], true) ?></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <h3> Contact Us </h3>
                    <ul class='footer-list'>
                        <li><?php echo get_post_meta(1, '_info_name_' . $_SESSION['languages'], true) ?></li>
                        <li><?php echo get_post_meta(1, '_info_phone', true) ?></li>
                        <li><?php echo get_post_meta(1, '_info_email', true) ?></li>
                       
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <h3> Link </h3>
                    <ul class='footer-list'>
                        <li> web: </li>
                        <li> FB :</li>
                   
                        
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