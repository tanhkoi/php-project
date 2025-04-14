<?php

/**
 * ajax -> admin -> design
 * Handles AJAX requests for updating design settings in the admin panel
 * 
 * 
 * 
 */

// Fetch bootstrap file to initialize the application
require('../../../bootstrap.php');

// Check if the request is an AJAX request
is_ajax();

// Verify if the user has admin or moderator permissions
if (!$user->_is_admin) {
  modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}

// Prevent demo accounts from making changes
if ($user->_data['user_demo']) {
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
}

// Handle design settings update
try {
  /* Prepare input data */
  // Enable fluid design if checkbox is selected, otherwise disable
  $_POST['fluid_design'] = (isset($_POST['fluid_design'])) ? '1' : '0';
  // Enable night theme if checkbox is selected
  $_POST['system_theme_night_on'] = (isset($_POST['system_theme_night_on'])) ? '1' : '0';
  // Allow users to select theme mode if enabled
  $_POST['system_theme_mode_select'] = (isset($_POST['system_theme_mode_select'])) ? '1' : '0';
  // Use default favicon if selected, clear custom favicon
  $_POST['system_favicon_default'] = (isset($_POST['system_favicon_default'])) ? '1' : '0';
  $_POST['system_favicon'] = ($_POST['system_favicon_default']) ? '' : $_POST['system_favicon'];
  // Use default Open Graph image if selected, clear custom image
  $_POST['system_ogimage_default'] = (isset($_POST['system_ogimage_default'])) ? '1' : '0';
  $_POST['system_ogimage'] = ($_POST['system_ogimage_default']) ? '' : $_POST['system_ogimage'];
  // Enable Play Store badge if checkbox is selected
  $_POST['play_store_badge_enabled'] = (isset($_POST['play_store_badge_enabled'])) ? '1' : '0';
  // Enable AppGallery badge if checkbox is selected
  $_POST['appgallery_badge_enabled'] = (isset($_POST['appgallery_badge_enabled'])) ? '1' : '0';
  // Enable App Store badge if checkbox is selected
  $_POST['app_store_badge_enabled'] = (isset($_POST['app_store_badge_enabled'])) ? '1' : '0';
  // Enable custom CSS if checkbox is selected
  $_POST['css_customized'] = (isset($_POST['css_customized'])) ? '1' : '0';

  /* Update system options with sanitized inputs */
  update_system_options([
    'fluid_design' => secure($_POST['fluid_design']), // Fluid layout setting
    'system_theme_night_on' => secure($_POST['system_theme_night_on']), // Night mode activation
    'system_theme_mode_select' => secure($_POST['system_theme_mode_select']), // Theme mode selection
    'system_logo' => secure($_POST['system_logo']), // Custom logo for light mode
    'system_logo_dark' => secure($_POST['system_logo_dark']), // Custom logo for dark mode
    'system_favicon_default' => secure($_POST['system_favicon_default']), // Default favicon usage
    'system_favicon' => secure($_POST['system_favicon']), // Custom favicon
    'system_ogimage_default' => secure($_POST['system_ogimage_default']), // Default OG image usage
    'system_ogimage' => secure($_POST['system_ogimage']), // Custom OG image
    'play_store_badge_enabled' => secure($_POST['play_store_badge_enabled']), // Play Store badge visibility
    'appgallery_badge_enabled' => secure($_POST['appgallery_badge_enabled']), // AppGallery badge visibility
    'appgallery_store_link' => secure($_POST['appgallery_store_link']), // AppGallery store URL
    'play_store_link' => secure($_POST['play_store_link']), // Play Store URL
    'app_store_badge_enabled' => secure($_POST['app_store_badge_enabled']), // App Store badge visibility
    'app_store_link' => secure($_POST['app_store_link']), // App Store URL
    'css_customized' => secure($_POST['css_customized']), // Custom CSS activation
    'css_background' => secure($_POST['css_background']), // Background color
    'css_link_color' => secure($_POST['css_link_color']), // Link color
    'css_header' => secure($_POST['css_header']), // Header background color
    'css_header_search' => secure($_POST['css_header_search']), // Search bar background
    'css_header_search_color' => secure($_POST['css_header_search_color']), // Search bar text color
    'css_btn_primary' => secure($_POST['css_btn_primary']), // Primary button color
    'css_header_icons' => secure($_POST['css_header_icons']), // Header icons color (light mode)
    'css_header_icons_night' => secure($_POST['css_header_icons_night']), // Header icons color (night mode)
    'css_main_icons' => secure($_POST['css_main_icons']), // Main icons color (light mode)
    'css_main_icons_night' => secure($_POST['css_main_icons_night']), // Main icons color (night mode)
    'css_action_icons' => secure($_POST['css_action_icons']), // Action icons color (light mode)
    'css_action_icons_night' => secure($_POST['css_action_icons_night']), // Action icons color (night mode)
    'css_custome_css' => secure($_POST['css_custome_css']), // Custom CSS code
    'custome_js_header' => secure($_POST['custome_js_header']), // Custom JavaScript in header
    'custome_js_footer' => secure($_POST['custome_js_footer']) // Custom JavaScript in footer
  ]);

  /* Return success response and reload the page */
  return_json(array('callback' => 'window.location.reload();'));
} catch (Exception $e) {
  /* Return error response with exception message */
  return_json(array('error' => true, 'message' => $e->getMessage()));
}
?>