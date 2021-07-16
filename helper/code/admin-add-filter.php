<?php

/* ==============================================================
  THEM CHUC NANG UPLOAD FILE CHO FORM META
  =============================================================== */
add_action('post_edit_form_tag', 'post_edit_form_tag');

function post_edit_form_tag()
{
  echo ' enctype="multipart/form-data"';
}
