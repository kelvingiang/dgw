<?php /*  Template Name: Industry Page */ ?>
<?php get_header(); ?>
<?php
global $wp;
$param = $wp->query_vars;
?>

<div>
    <?php pageImg($post->ID); ?>
</div>

<div class="menu-sub">

</div>
<div class="container-fluid">
    <div>
        <div class='data-list'>
            <?php
            $postCount = get_option('first_load');
            getCustomsPost('industries', $postCount);
            wp_reset_postdata();
            wp_reset_query();
            ?>
        </div>

        <div id="load-more">
            <i class="fa fa-angle-double-down"
                aria-hidden="true"></i>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('#load-more').click(function() {

            var lastID = jQuery(".data-list > div:last-child").attr("data-id");
            var post = 'industries';
            var cateID = '<?php echo $cate ?>';
            var count = '<?php echo get_option('more_load') ?>';
            var cate = 'industries_category';

            jQuery.ajax({
                url: '<?php echo get_template_directory_uri() . '/ajax/load-more.php' ?>', // lay doi tuong chuyen sang dang array
                type: 'post', //                data: $(this).serialize(),
                data: {
                    lastID: lastID,
                    post: post,
                    cate: cate,
                    cateID: cateID,
                    count: count,
                },
                dataType: 'json',
                success: function(
                    data) { // set ket qua tra ve  data tra ve co thanh phan status va message
                    if (data.status === 'done') {
                        jQuery(".data-list").append(data.html);
                        jQuery('#load-more')
                            .prop('disabled', false)
                            .html('<i class="fa fa-angle-double-down" aria-hidden="true"></i>');
                        var currentScroll = jQuery(window).scrollTop();
                        jQuery('html, body').animate({
                            scrollTop: currentScroll + 200
                        }, 1000);
                    } else if (data.status === 'empty') {
                        jQuery("#load-more").hide();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.reponseText);
                    //console.log(data.status);
                }
            });
        });
    });
</script>

<?php get_footer(); ?>