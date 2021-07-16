<?php /*  Template Name: Solutions Page */ ?>
<?php get_header(); ?>
<div class="row">
  <div class=" col-lg-6">
    <h1> this is solutions Page </h1>
    <hr>
    <?php

    global $wp;
    $param = $wp->query_vars;
    echo '<pre>';
    print_r($param);
    echo '</pre>';

    if (!empty($param['cate'])) {
      echo $param['cate'];
      $arr = array();
      $argsCate = array(
        'type' => 'post',
        'posts_per_page' => -1,
        'taxonomy' => 'solutions_category',
        'hide_empty' => 0,
        'parent' => $param['cate'],
      );
      $categories = get_categories($argsCate);

      if ($categories) {
        foreach ($categories as $key => $value) {
          $option = get_option("option_category_solution_$value->term_id");
          $arr[$value->term_id] = array(
            'ID' => $value->term_id,
            'name' => $option['cate_solution_' . $_SESSION['languages']],
            'class' => 'menu-main-sub-1-item',
            'order' => $option['cate_solution_order'],
            'sub' => '',
          );
        }
      }

    ?>
      <ul>
        <?php foreach ($arr as $key => $val) { ?>
          <li>
            <a href="<?php echo home_url($param['pagename']) . '/cate/' . $param['cate'] . '/tag/' . $val['ID'] ?>">
              <?php echo $val['name']; ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    <?php
      echo '<pre>';
      print_r($arr);
      echo '</pre>';
    } else {
      echo 'sssssss';
    }
    ?>

  </div>
  <div class=" col-lg-6">
    <h2>post</h2>
    <?php
    $arr = array(
      'post_type' => 'solutions',
      'showposts' => -1,
      'orderby' => 'meta_value',
      'order' => 'DESC',
      'meta_key' => '_metabox_order',
      'tax_query' => array(
        array(
          'taxonomy' => 'solutions_category', //double check your taxonomy name in you dd 
          'field'    => 'id',
          'terms'    => $param['tag'],
        ),
      ),

      //'meta_query' => array(array('key' => 'special_show', 'value' => '1',))
    );
    $wp_query = new WP_Query($arr);
    if ($wp_query->have_posts()) :
      while ($wp_query->have_posts()) :
        $wp_query->the_post();
    ?>
        <?php $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
        <div class="hospital-space">
          <div class="hospital-box">
            <div class="hospital-title">
              <a href="<?php the_permalink(); ?>">
                <?php echo the_title(); ?>
              </a>
            </div>
            <div class="hospital-content">
              <?php echo the_content(); ?>
            </div>
          </div>
        </div>
    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
  </div>
</div>
<?php get_footer(); ?>