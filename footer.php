<?php
$footer = get_query_var('pagename', 1);
switch ($footer) {
    case '':
    case 'about-cn':
    case 'about-vn':
    case 'cases':
    case 'industry':
    case 'solution':
    case 'service':
    case 'resource':
    case 'activities':
    case 'contact-cn':
    case 'contact-vn':
        get_template_part('templates/template', 'footer');
}
wp_footer(); ?>
</body>

</html>