<?php
function admin_enqueue()
{
  wp_enqueue_style('customPlugin-admin-css', plugin_dir_url(CUSTOM_PLUGIN_URL) . '/includes/assets/css/style.css');
  wp_enqueue_script('customPlugin-admin', plugin_dir_url(CUSTOM_PLUGIN_URL) . '/includes/assets/js/main.js', array('jquery'), '', true);
}
