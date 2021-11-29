<?php /*  Template Name: Actives Page */ ?>
<?php get_header(); ?>

<div>
    <?php pageImg($post->ID); ?>
</div>

<div class="menu-sub">
    <?php
    $menu_category = 'active_category';
    $menu_page = 'activities';
    menuSub($menu_category, $menu_page);
    ?>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="page-title">
                <h1><?php //_e('Active') 
                    ?> </h1>
            </div>

            <div class='data-list'>
                <?php
                global $wp;
                $param = $wp->query_vars;
                $postCount = get_option('first_load');

                if (empty($param['tag']) && empty($param['cate'])) {
                    getCustomsPost('active', $postCount);
                } else {
                    // neu TAG ton tai thi lay value la TAG con khong thi lay CATE
                    if (empty($param['tag'])) {
                        $cate = $param['cate'];
                    } else {
                        $cate = $param['tag'];
                    }
                    $postType = 'active';
                    $tax = 'active_category';
                    $wp_query = getCustomsPostByCate($postType, $cate, $postCount, $tax);
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </div>

            <div id="load-more">
                <i style=" font-size: 35px; color: #999; height: 50px" class="fa fa-angle-double-down"
                    aria-hidden="true"></i>
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <?php get_template_part('templates/template', 'side_cases');  ?>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function() {
    jQuery('#load-more').click(function() {

        var lastID = jQuery(".data-list > div:last-child").attr("data-id");
        var post = 'active';
        var cateID = '<?php echo $cate ?>';
        var count = <?php echo get_option('more_load') ?>;
        var cate = 'active_category';

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
                    var $target = jQuery('html,body');
                    $target.animate({
                        scrollTop: $target.height()
                    }, 2000);
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