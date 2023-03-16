<?php
function activate_plugin()
{
  if (version_compare(get_bloginfo('version'), 4.5, '<')) {
    wp_die(__('Necessário Wordpress 4.5 ou superior', 'customPlugin'));
  }
}
