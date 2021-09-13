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
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <?php
            $menu_category = 'active_category';
            $menu_page = 'actives';
            menuSide($menu_category, $menu_page);
            ?>
        </div>
    </div>
    <div>
        <?php
        $GroupPostType = "active";
        $groupCategory = "active_category";
        // -1 se khong show phan load more
        $postCount = -1;
        inGroup($GroupPostType, $groupCategory, $postCount); ?>
    </div>
</div>
<?php get_footer(); ?>