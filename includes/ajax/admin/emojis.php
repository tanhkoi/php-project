<?php

/**
 * ajax -> admin -> emojis
 * 
 * Script xử lý các yêu cầu AJAX để quản lý emoji từ phía admin.
 * Hỗ trợ thêm mới và chỉnh sửa emoji trong hệ thống.
 * 
 * NEW: Cho phép admin thêm hoặc chỉnh sửa emoji với mã Unicode và class CSS tương ứng.
 * NEW: Đảm bảo an toàn dữ liệu bằng cách sử dụng hàm secure() để ngăn chặn SQL injection.
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

// handle emojis
try {

  switch ($_GET['do']) {
    case 'add':
      /* valid inputs */
      // NEW: Kiểm tra dữ liệu đầu vào, yêu cầu phải có ít nhất một trong hai trường unicode_char hoặc class
      if (is_empty($_POST['unicode_char']) && is_empty($_POST['class'])) {
        throw new Exception(__("You must fill in all of the fields"));
      }
      /* insert */
      // NEW: Thêm emoji mới vào bảng emojis với mã Unicode và class CSS
      $db->query(sprintf("INSERT INTO emojis (unicode_char, class) VALUES (%s, %s)", secure($_POST['unicode_char']), secure($_POST['class']))) or _error('SQL_ERROR_THROWEN');
      /* return */
      // NEW: Chuyển hướng về trang quản lý emoji sau khi thêm thành công
      return_json(array('callback' => 'window.location = "' . $system['system_url'] . '/' . $control_panel['url'] . '/emojis";'));
      break;

    case 'edit':
      /* valid inputs */
      // NEW: Kiểm tra ID emoji hợp lệ (phải là số và được truyền qua GET)
      if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        _error(400);
      }
      // NEW: Kiểm tra dữ liệu đầu vào, yêu cầu phải có ít nhất một trong hai trường unicode_char hoặc class
      if (is_empty($_POST['unicode_char']) && is_empty($_POST['class'])) {
        throw new Exception(__("You must fill in all of the fields"));
      }
      /* update */
      // NEW: Cập nhật thông tin emoji (mã Unicode và class CSS) trong bảng emojis dựa trên ID
      $db->query(sprintf("UPDATE emojis SET unicode_char = %s, class = %s WHERE emoji_id = %s", secure($_POST['unicode_char']), secure($_POST['class']), secure($_GET['id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      /* return */
      // NEW: Trả về thông báo thành công qua JSON sau khi cập nhật
      return_json(array('success' => true, 'message' => __("Emoji info have been updated")));
      break;

    default:
      // NEW: Trả về lỗi 400 nếu tham số 'do' không hợp lệ
      _error(400);
      break;
  }
} catch (Exception $e) {
  // NEW: Xử lý lỗi và trả về thông báo lỗi qua JSON
  return_json(array('error' => true, 'message' => $e->getMessage()));
}