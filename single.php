<?php get_header(); ?>
<div class="container-fluid row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <main id="content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="single-space">
                <h2 class="single-space-title">
                    <?php the_title() ?>
                </h2>
                <?php //if (has_post_thumbnail()) : 
                        ?>
                <!-- <img class="single-space-img" src="<?php //the_post_thumbnail_url() 
                                                                ?>" srcset="<?php //the_post_thumbnail_url() 
                                                                                                                ?>" /> -->
                <?php //endif; 
                        ?>
                <div class="single-space-content">
                    <?php the_content(); ?>

                </div>
            </div>

            <?php //get_template_part('entry'); 
                    ?>

            <?php
                endwhile;
            endif;
            ?>
            <footer class="footer">
                <?php //get_template_part( 'nav', 'below-single' );    
                ?>
            </footer>
        </main>
    </div>
    <!-- <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div style="margin-top: 3rem;">
            <div class="menu-side">
                <?php
                // GET CATAGORY OF POST
                // $cat = get_the_category(get_the_ID());
                // $title = get_the_title();

                // $wp_query = getPostCategory($cat[0]->slug, -1);
                // if ($wp_query->have_posts()) {
                //     while ($wp_query->have_posts()) {
                //         $wp_query->the_post();
                //         if ($title == get_the_title()) {
                //             continue;
                //         }
                ?>
                        <div class="item has-sub">
                            <div class="menu-side-main">
                                <a class="menu-side-main-link" href="<?php //echo get_the_permalink() 
                                                                        ?>">
                                    <?php //the_title(); 
                                    ?>
                                </a>
                            </div>
                        </div>

                <?php
                // }
                //  }
                ?>
            </div>
        </div>
    </div> -->
</div>
<?php //get_sidebar(); 
?>
<?php get_footer(); ?>