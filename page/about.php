<?php /*  Template Name: About Page */ ?>
<?php get_header(); ?>
<div>
  <h1> this is about page </h1>
  <a href="#operating">operating</a>
  <a href="#location">location</a>
  <div>
    <?php echo get_post_meta(1, "_info_summary_" . $_SESSION['languages'], true) ?>

  </div>
  <div id='operating'>
    <?php echo get_post_meta(1, "_info_operating_" . $_SESSION['languages'], true) ?>
  </div>
  <div id='location'>
    <?php echo get_post_meta(1, "_info_location_" . $_SESSION['languages'], true) ?>
  </div>
</div>
<?php get_footer(); ?>