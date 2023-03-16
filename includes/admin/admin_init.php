<?php
include 'enqueue.php';

function change_title_text($title)
{
  // $screen = get_current_screen();
  // post type name = $screen->post_type

  $title = 'Custom post type title';
  return $title;
}

add_filter('enter_title_here', 'change_title_text');
