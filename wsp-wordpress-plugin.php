<?php
/**
 * Plugin Name
 *
 * Plugin Name: Plugin Name
 * Plugin URI:  https://www.webstylepress.com/wsp-wordpress-plugin/
 * Description: Plugin description
 * Version:     1.0.0
 * Author:      WebStylePress
 * Author URI:  https://www.webstylepress.com
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Requires at least: 4.9
 * Requires PHP: 5.2.4
 *
 */

// Exit if accessed directly

if (!defined('ABSPATH')) {
  exit;
}

// Include necessary files and functions ///////////////////////////////////////////////////////
// Plugin settings page
include(plugin_dir_path(__FILE__) . 'includes/wsp-plugin-settings.php');
// Plugin display page
include(plugin_dir_path(__FILE__) . 'includes/wsp-plugin-display.php');

// Enqueue styles and script for the plugin // for frontend /////////////////////////////////////
function wsp_enqueue_assets() {
  // Enqueue the CSS file
  wp_enqueue_style('wsp-styles', plugin_dir_url(__FILE__) . 'css/styles.css', array(), '1.0.0');
  // or 
  // wp_enqueue_style('wsp-styles', plugin_dir_url(__FILE__) . 'css/styles.css');

  // Enqueue the JavaScript file
  wp_enqueue_script('wsp-scripts', plugin_dir_url(__FILE__) . 'js/scripts.js', array('jquery'), '1.0.0', true);
  // or
  // wp_enqueue_script('wsp-scripts', plugin_dir_url(__FILE__) . 'js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'wsp_enqueue_assets');

// Enqueue styles and script for the plugin // for backend /////////////////////////////////////
function wsp_enqueue_admin_assets($hook) {
  // Check if we are on the plugin's settings page to avoid loading scripts unnecessarily
  if ($hook !== 'settings_page_wsp-plugin-settings') {
      return;
  }
  // Enqueue admin CSS
  wp_enqueue_style('wsp-admin-styles', plugin_dir_url(__FILE__) . 'css/admin-styles.css', array(), '1.0.0');
  // Enqueue admin JavaScript
  wp_enqueue_script('wsp-admin-scripts', plugin_dir_url(__FILE__) . 'js/admin-scripts.js', array('jquery'), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'wsp_enqueue_admin_assets');