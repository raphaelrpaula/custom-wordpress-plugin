<?php
/*
  Plugin Name:       Custom WordPress Plugin
  Plugin URI:        https://github.com/raphaelrpaula
  Description:       A basic WordPress plugin
  Version:           1.0
  Author:            Raphael Rodrigues
  Author URI:        https://github.com/raphaelrpaula
  Text Domain:       customPlugin
 */

if (!function_exists('add_action')) {
  echo 'Você não tem permissão para acessar este caminho.';
  exit;
}

// Setup
define('CUSTOM_PLUGIN_URL', __FILE__);

// Includes
include('includes/activate.php');
include('includes/init.php');
include('includes/admin/admin_init.php');

// Hooks
register_activation_hook(CUSTOM_PLUGIN_URL, 'activate_plugin');
add_action('init', 'plugin_init');

// Column Functions - Admin
add_action('manage_postType_posts_custom_column', 'handle_admin_custom_columns', 10, 2);
add_filter('manage_postType_posts_columns', 'handle_admin_columns');
