<?php

/**
 * ajax -> admin -> design
 * 
 * Xử lý Ajax cho phần cấu hình giao diện Admin
 * Bao gồm: bật/tắt thiết kế fluid, chế độ night mode, favicon, theme, link store...
 * 
 */

// fetch bootstrap
require('../../../bootstrap.php'); // Gọi file bootstrap để load cấu hình hệ thống

// check AJAX Request
is_ajax(); // Kiểm tra xem request gửi lên có phải là Ajax không, nếu không thì dừng lại

// check admin|moderator permission
if (!$user->_is_admin) {
  // Nếu người dùng không có quyền admin thì hiển thị thông báo lỗi
  modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}

// check demo account
if ($user->_data['user_demo']) {
  // Nếu là tài khoản demo, không cho phép thao tác chỉnh sửa
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
}

// handle design
try {

  /* prepare */
  // Kiểm tra các checkbox, nếu có tick thì gán '1', ngược lại '0'
  $_POST['fluid_design'] = (isset($_POST['fluid_design'])) ? '1' : '0';
  $_POST['system_theme_night_on'] = (isset($_POST['system_theme_night_on'])) ? '1' : '0';
  $_POST['system_theme_mode_select'] = (isset($_POST['system_theme_mode_select'])) ? '1' : '0';
  $_POST['system_favicon_default'] = (isset($_POST['system_favicon_default'])) ? '1' : '0';

  // Nếu người dùng chọn favicon mặc định, thì đường dẫn favicon sẽ rỗng
  $_POST['system_favicon'] = ($_POST['system_favicon_default']) ? '' : $_POST['system_favicon'];

  $_POST['system_ogimage_default'] = (isset($_POST['system_ogimage_default'])) ? '1' : '0';
  // Nếu chọn ảnh chia sẻ mặc định, thì đường dẫn ảnh sẽ rỗng
  $_POST['system_ogimage'] = ($_POST['system_ogimage_default']) ? '' : $_POST['system_ogimage'];

  $_POST['play_store_badge_enabled'] = (isset($_POST['play_store_badge_enabled'])) ? '1' : '0';
  $_POST['appgallery_badge_enabled'] = (isset($_POST['appgallery_badge_enabled'])) ? '1' : '0';
  $_POST['app_store_badge_enabled'] = (isset($_POST['app_store_badge_enabled'])) ? '1' : '0';
  $_POST['css_customized'] = (isset($_POST['css_customized'])) ? '1' : '0';

  /* update */
  // Cập nhật toàn bộ các thông số cấu hình giao diện vào database
  update_system_options([
    'fluid_design' => secure($_POST['fluid_design']),
    'system_theme_night_on' => secure($_POST['system_theme_night_on']),
    'system_theme_mode_select' => secure($_POST['system_theme_mode_select']),
    'system_logo' => secure($_POST['system_logo']),
    'system_logo_dark' => secure($_POST['system_logo_dark']),
    'system_favicon_default' => secure($_POST['system_favicon_default']),
    'system_favicon' => secure($_POST['system_favicon']),
    'system_ogimage_default' => secure($_POST['system_ogimage_default']),
    'system_ogimage' => secure($_POST['system_ogimage']),
    'play_store_badge_enabled' => secure($_POST['play_store_badge_enabled']),
    'appgallery_badge_enabled' => secure($_POST['appgallery_badge_enabled']),
    'appgallery_store_link' => secure($_POST['appgallery_store_link']),
    'play_store_link' => secure($_POST['play_store_link']),
    'app_store_badge_enabled' => secure($_POST['app_store_badge_enabled']),
    'app_store_link' => secure($_POST['app_store_link']),
    'css_customized' => secure($_POST['css_customized']),
    'css_background' => secure($_POST['css_background']),
    'css_link_color' => secure($_POST['css_link_color']),
    'css_header' => secure($_POST['css_header']),
    'css_header_search' => secure($_POST['css_header_search']),
    'css_header_search_color' => secure($_POST['css_header_search_color']),
    'css_btn_primary' => secure($_POST['css_btn_primary']),
    'css_header_icons' => secure($_POST['css_header_icons']),
    'css_header_icons_night' => secure($_POST['css_header_icons_night']),
    'css_main_icons' => secure($_POST['css_main_icons']),
    'css_main_icons_night' => secure($_POST['css_main_icons_night']),
    'css_action_icons' => secure($_POST['css_action_icons']),
    'css_action_icons_night' => secure($_POST['css_action_icons_night']),
    'css_custome_css' => secure($_POST['css_custome_css']),
    'custome_js_header' => secure($_POST['custome_js_header']),
    'custome_js_footer' => secure($_POST['custome_js_footer'])
  ]);

  /* return */
  // Trả về JSON, sau khi cập nhật thành công thì reload lại trang
  return_json(array('callback' => 'window.location.reload();'));

} catch (Exception $e) {
  // Nếu có lỗi xảy ra, trả về JSON chứa lỗi và message
  return_json(array('error' => true, 'message' => $e->getMessage()));
}
