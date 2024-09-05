<?php 
// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

// Register the settings page in the WordPress admin

function wsp_add_settings_page() {
  add_options_page(
    'Plugin Name Settings',    // Page title displayed on page in admin
    'Plugin Name',             // Menu title in admin
    'manage_options',          // Capability required to access the page
    'wsp-plugin-settings',     // Menu slug in admin for plugin settings page
    'wsp_render_settings_page' // Callback function to render the page
  );
}

add_action('admin_menu', 'wsp_add_settings_page');

// Callback function to render the plugin settings page

function wsp_render_settings_page(){ ?>
<div class="wrap">

  <!-- <h1><?php echo esc_html__('Plugin Name Settings', 'plugin-name'); ?></h1>
  <p><?php echo esc_html__('This is the settings page for Plugin Name.', 'plugin-name'); ?></p> -->

  <!-- <h1><?php echo esc_html('Plugin Name Settings'); ?></h1>
  <p><?php echo esc_html('This is the settings page for Plugin Name.'); ?></p> -->

  <h1>Plugin Name Settings</h1>
  <p>This is the settings page for Plugin Name.</p>

</div>
<?php }