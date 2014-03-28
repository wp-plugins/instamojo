<?php

/**
 * Plugin Name: Instamojo button
 * Plugin URI: https://www.instamojo.com
 * Description: Embed your Instamojo items directly into your WordPress site.
 * Version: 0.1.0
 * Author: Instamojo
 * Author URI: https://www.instamojo.com
 */

if(!defined('ABSPATH'))
  exit;

define('PLUGIN_VERSION', '0.1.0');
define('PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN_NAME', 'INSTAMOJO');

define('APPLICATION_ID', '');

// Register the widget and the shortcodes
register_activation_hook(__FILE__, 'instamojo_activation_hook');
add_action('plugins_loaded', 'instamojo_plugin_loaded');

function instamojo_activation_hook()
{
  add_option('instamojo_version', PLUGIN_VERSION);
}

function instamojo_plugin_loaded()
{
  require_once(PLUGIN_DIR.'shortcode.php');
  add_action('widgets_init', 'instamojo_widgets_init');
}

function instamojo_widgets_init()
{
  require_once(PLUGIN_DIR.'widget.php');
  register_widget('instamojo_widget');
}

?>