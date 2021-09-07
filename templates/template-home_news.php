<h2 class="h2-home-title"><?php _e('Latest News') ?></h2>
<div id="news-home">
    <div class="news-home-title">
        <div class="title-event title-select" onclick=" ChangSelect('.title-event', '.content-event')">
            <h3><?php _e('Latest Event') ?></h3>
        </div>
        <div class="title-news" onclick="ChangSelect('.title-news', '.content-news')">
            <h3><?php _e('News Center') ?></h3>
        </div>
        <div class="title-article" onclick="ChangSelect('.title-article', '.content-article')">
            <h3><?php _e('Column Article') ?></h3>
        </div>
        <div class="title-cases" onclick="ChangSelect('.title-cases', '.content-cases')">
            <h3><?php _e('Classic Case') ?></h3>
        </div>
        <div class="title-download" onclick="ChangSelect('.title-download', '.content-download')">
            <h3><?php _e('Information Request') ?></h3>
        </div>
    </div>
    <div class="news-home-content">
        <div class="content-event content-select">
            <ul class="content-list">
                <?php
                // LAY CUSTOMPOST
                $wp_query = getcCustomPostAtSide('active', 5);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                ?>
                        <li class="row">
                            <span class="col-3"><label> <?php echo get_the_date('Y-m-d', get_the_ID()) ?></label></span>
                            <span class="col-9"><a class="my-link" href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></span>
                        </li>
                <?php
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </ul>
            <a class="content-more my-link" href="<?php echo home_url('actives') ?>"><i class="fas fa-chevron-circle-right"></i> <?php _e('Read More') ?></a>
        </div>
        <div class="content-news">
            <ul class="content-list">
                <?php
                // LAY CATAGORY CUA POST
                $wp_query = getPostCategory(news, 5);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                ?>
                        <li class="row">
                            <span class="col-3"><label> <?php echo get_the_date('Y-m-d', get_the_ID()) ?></label></span>
                            <span class="col-9"><a class="my-link" href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></span>
                        </li>
                <?php
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </ul>
            <a class="content-more my-link" href="<?php echo home_url('news') ?>"><i class="fas fa-chevron-circle-right"></i> <?php _e('Read More') ?></a>
        </div>
        <div class="content-article">
            <ul class="content-list">
                <?php
                // LAY CATAGORY CUA POST
                $wp_query = getPostCategory(article, 5);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                ?>
                        <li class="row">
                            <span class="col-3"> <label> <?php echo get_the_date('Y-m-d', get_the_ID()) ?></label></span>
                            <span class="col-9"> <a class="my-link" href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></span>
                        </li>
                <?php
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </ul>
            <a class="content-more my-link" href="<?php echo home_url('article') ?>"><i class="fas fa-chevron-circle-right"></i> <?php _e('Read More') ?></a>

        </div>
        <div class="content-cases">
            <ul class="content-list">
                <?php
                // LAY CUSTOMPOST
                $wp_query = getcCustomPostAtSide('casestudies', 5);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                ?>
                        <li class="row">
                           <span class="col-3"><label> <?php echo get_the_date('Y-m-d', get_the_ID()) ?></label></span> 
                            <span class="col-9"><a class="my-link" href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></span>
                        </li>
                <?php
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </ul>
            <a class="content-more my-link" href="<?php echo home_url('cases') ?>"><i class="fas fa-chevron-circle-right"></i> <?php _e('Read More') ?></a>

        </div>
        <div class="content-download">
            <ul class="content-list">
                <?php
                // LAY CUSTOMPOST
                $wp_query = getcCustomPostAtSide('resources', 5);
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) {
                        $wp_query->the_post();
                ?>
                        <li class="row">
                         <span class="col-3">   <label> <?php echo get_the_date('Y-m-d', get_the_ID()) ?></label></span>
                         <span class="col-9">   <a class="my-link" href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></span>
                        </li>
                <?php
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </ul>
            <a class="content-more my-link" href="<?php echo home_url('resource') ?>"><i class="fas fa-chevron-circle-right"></i> <?php _e('Read More') ?></a>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {});


    function ChangSelect(titleSelect, contentSelect) {
        jQuery(titleSelect).parents().siblings('.news-home-content').children().removeClass('content-select');

        jQuery(titleSelect).siblings().removeClass('title-select');

        jQuery(titleSelect).addClass('title-select');

        jQuery(titleSelect).parents().siblings('.news-home-content').children(contentSelect).addClass('content-select');

    }
</script>