<?php /*  Template Name: Article Page */ ?>
<?php get_header(); ?>
<div>
    <?php pageImg($post->ID); ?>
</div>
<div style="height: 3rem;"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            <div class="page-title">
                <h1><?php // _e('News') 
                    ?> </h1>
            </div>

            <div class='data-list'>
                <?php
                global $wp;
                
                $wp_query = getPostCategory('article', get_option('first_load'));

                if ($wp_query->have_posts()) {
                    $stt = 1;
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                ?>
                        <div class="item" data-id="<?php echo $stt ?>">
                            <?php if (has_post_thumbnail()) { ?>
                                <img class="item-img" src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                            <?php } else { ?>
                                <img class="item-img" src="<?php echo PART_IMAGES . 'no-image.jpg' ?>" srcset="<?php echo PART_IMAGES . 'no-image.jpg' ?>" />
                            <?php } ?>
                            <div class="item-title">
                                <a href="<?php echo get_the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </div>
                        </div>
                <?php
                        $stt++;
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </div>
            <div id="load-more">
                <i style=" font-size: 35px; color: #999; height: 50px" class="fa fa-angle-double-down" aria-hidden="true"></i>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <?php get_template_part('templates/template', 'side_active');  ?>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        jQuery('#load-more').click(function() {

            var lastID = jQuery(".data-list > div:last-child").attr("data-id");
            var post = 'post';
            var count = <?php echo get_option('more_load') ?>;
            var cate = 'article';

            jQuery.ajax({
                url: '<?php echo get_template_directory_uri() . '/ajax/load-more-post.php' ?>', // lay doi tuong chuyen sang dang array
                type: 'post', //                data: $(this).serialize(),
                data: {
                    lastID: lastID,
                    post: post,
                    cate: cate,
                    count: count,
                },
                dataType: 'json',
                success: function(data) { // set ket qua tra ve  data tra ve co thanh phan status va message
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