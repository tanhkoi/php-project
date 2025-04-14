<?php

/**
 * ajax -> admin -> design
 * 
 * Script xử lý các yêu cầu AJAX để cập nhật cài đặt thiết kế giao diện từ phía admin.
 * Cho phép tùy chỉnh logo, favicon, màu sắc, CSS, và các tùy chọn giao diện khác.
 * 
 * NEW: Cập nhật các tùy chọn thiết kế như chế độ tối, giao diện fluid, badge cửa hàng ứng dụng, v.v.
 * NEW: Đảm bảo an toàn dữ liệu với hàm secure() để ngăn chặn SQL injection.
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();

// check admin|moderator permission
if (!$user->_is_admin) {
  modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}

// check demo account
if ($user->_data['user_demo']) {
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
}

// handle design
try {

  /* prepare */
  // NEW: Chuẩn bị dữ liệu đầu vào, chuyển các checkbox thành 1 hoặc 0
  $_POST['fluid_design'] = (isset($_POST['fluid_design'])) ? '1' : '0';
  $_POST['system_theme_night_on'] = (isset($_POST['system_theme_night_on'])) ? '1' : '0';
  $_POST['system_theme_mode_select'] = (isset($_POST['system_theme_mode_select'])) ? '1' : '0';
  $_POST['system_favicon_default'] = (isset($_POST['system_favicon_default'])) ? '1' : '0';
  // NEW: Nếu sử dụng favicon mặc định, bỏ qua favicon tùy chỉnh
  $_POST['system_favicon'] = ($_POST['system_favicon_default']) ? '' : $_POST['system_favicon'];
  $_POST['system_ogimage_default'] = (isset($_POST['system_ogimage_default'])) ? '1' : '0';
  // NEW: Nếu sử dụng hình ảnh OG mặc định, bỏ qua hình ảnh OG tùy chỉnh
  $_POST['system_ogimage'] = ($_POST['system_ogimage_default']) ? '' : $_POST['system_ogimage'];
  $_POST['play_store_badge_enabled'] = (isset($_POST['play_store_badge_enabled'])) ? '1' : '0';
  $_POST['appgallery_badge_enabled'] = (isset($_POST['appgallery_badge_enabled'])) ? '1' : '0';
  $_POST['app_store_badge_enabled'] = (isset($_POST['app_store_badge_enabled'])) ? '1' : '0';
  $_POST['css_customized'] = (isset($_POST['css_customized'])) ? '1' : '0';

  /* update */
  // NEW: Cập nhật tất cả tùy chọn thiết kế vào cơ sở dữ liệu
  update_system_options([
    'fluid_design' => secure($_POST['fluid_design']), // NEW: Bật/tắt giao diện fluid (full-width)
    'system_theme_night_on' => secure($_POST['system_theme_night_on']), // NEW: Kích hoạt chế độ tối
    'system_theme_mode_select' => secure($_POST['system_theme_mode_select']), // NEW: Cho phép người dùng chọn chế độ sáng/tối
    'system_logo' => secure($_POST['system_logo']), // NEW: Logo chính của hệ thống
    'system_logo_dark' => secure($_POST['system_logo_dark']), // NEW: Logo dùng cho chế độ tối
    'system_favicon_default' => secure($_POST['system_favicon_default']), // NEW: Sử dụng favicon mặc định
    'system_favicon' => secure($_POST['system_favicon']), // NEW: Favicon tùy chỉnh
    'system_ogimage_default' => secure($_POST['system_ogimage_default']), // NEW: Sử dụng hình ảnh OG mặc định
    'system_ogimage' => secure($_POST['system_ogimage']), // NEW: Hình ảnh OG tùy chỉnh cho SEO
    'play_store_badge_enabled' => secure($_POST['play_store_badge_enabled']), // NEW: Hiển thị badge Google Play
    'appgallery_badge_enabled' => secure($_POST['appgallery_badge_enabled']), // NEW: Hiển thị badge Huawei AppGallery
    'appgallery_store_link' => secure($_POST['appgallery_store_link']), // NEW: Link đến Huawei AppGallery
    'play_store_link' => secure($_POST['play_store_link']), // NEW: Link đến Google Play Store
    'app_store_badge_enabled' => secure($_POST['app_store_badge_enabled']), // NEW: Hiển thị badge App Store
    'app_store_link' => secure($_POST['app_store_link']), // NEW: Link đến Apple App Store
    'css_customized' => secure($_POST['css_customized']), // NEW: Bật/tắt CSS tùy chỉnh
    'css_background' => secure($_POST['css_background']), // NEW: Màu nền giao diện
    'css_link_color' => secure($_POST['css_link_color']), // NEW: Màu liên kết
    'css_header' => secure($_POST['css_header']), // NEW: Màu header
    'css_header_search' => secure($_POST['css_header_search']), // NEW: Màu nền thanh tìm kiếm
    'css_header_search_color' => secure($_POST['css_header_search_color']), // NEW: Màu chữ thanh tìm kiếm
    'css_btn_primary' => secure($_POST['css_btn_primary']), // NEW: Màu nút chính
    'css_header_icons' => secure($_POST['css_header_icons']), // NEW: Màu biểu tượng header (chế độ sáng)
    'css_header_icons_night' => secure($_POST['css_header_icons_night']), // NEW: Màu biểu tượng header (chế độ tối)
    'css_main_icons' => secure($_POST['css_main_icons']), // NEW: Màu biểu tượng chính (chế độ sáng)
    'css_main_icons_night' => secure($_POST['css_main_icons_night']), // NEW: Màu biểu tượng chính (chế độ tối)
    'css_action_icons' => secure($_POST['css_action_icons']), // NEW: Màu biểu tượng hành động (chế độ sáng)
    'css_action_icons_night' => secure($_POST['css_action_icons_night']), // NEW: Màu biểu tượng hành động (chế độ tối)
    'css_custome_css' => secure($_POST['css_custome_css']), // NEW: CSS tùy chỉnh do admin nhập
    'custome_js_header' => secure($_POST['custome_js_header']), // NEW: JavaScript tùy chỉnh ở header
    'custome_js_footer' => secure($_POST['custome_js_footer']) // NEW: JavaScript tùy chỉnh ở footer
  ]);

  /* return */
  // NEW: Trả về JSON với lệnh reload trang để áp dụng thay đổi
  return_json(array('callback' => 'window.location.reload();'));

} catch (Exception $e) {
  // NEW: Xử lý lỗi và trả về thông báo lỗi qua JSON
  return_json(array('error' => true, 'message' => $e->getMessage()));
}