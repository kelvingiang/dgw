<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="single-space">
                        <h2 class="single-space-title">
                            <?php the_title() ?>
                        </h2>
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="single-space-img" src="<?php the_post_thumbnail_url() ?>" srcset="<?php the_post_thumbnail_url() ?>" />
                        <?php endif; ?>
                        <div class="single-space-content">
                            <?php the_content(); ?>

                        </div>
                    </div>

            <?php
                endwhile;
            endif;
            ?>
            <div class="group-list">
                <?php
                global $wp;
                $param = $wp->query_vars;

                $arr = array(
                    'post_type' => "slider",
                    'posts_per_page' => -1,
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'meta_key' => '_metabox_order',
                    // get cac bai trong category

                    'meta_query'    => array(
                        array(
                            'key'       => '_metabox_langguage',
                            'value'     =>  $_SESSION['languages'],
                            'compare'   => '=',
                        ),
                    ),
                );
                $wp_query = new WP_Query($arr);
                if ($wp_query->have_posts()) {
                    $stt = 1;
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                        if ($post->post_name == $param['name']) {
                            continue;
                        }
                ?>
                        <div class="item">
                            <div class="col-lg-10">
                                <div class="group-list-item-title">
                                    <a class="my-link " href="<?php echo get_the_permalink() ?>">
                                        <h3><?php the_title() ?></h3>
                                    </a>
                                </div>
                                <div>
                                    <?php
                                    if ($postName == 'solutions') {
                                        echo mySubContent(get_post_meta($post->ID, '_solution_value', true));
                                    } else {
                                        the_content();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div style="margin-top: 3rem;">
                <?php get_template_part('templates/template', 'side_cases'); ?>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>