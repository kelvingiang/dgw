<?php /*  Template Name: Vote Page */ ?>
<?php get_header(); ?>
<div>
    <?php
    if ($_SESSION['vote-login'] == '' || !isset($_SESSION['vote-login'])) {
        get_template_part('templates/template', 'vote-login');
    } else {
        get_template_part('templates/template', 'vote');
    }
    ?>
</div>