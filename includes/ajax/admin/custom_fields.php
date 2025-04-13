<?php

/**
 * ajax -> admin -> custom fields
 * 
 * Script xử lý các yêu cầu AJAX liên quan đến quản lý trường tùy chỉnh (custom fields) trong bảng điều khiển quản trị.
 * 
 * @author [Your Name]
 * @version 1.0
 * @since [Date]
 */

// NEW: Bao gồm tệp bootstrap để khởi tạo môi trường ứng dụng
require('../../../bootstrap.php');

// NEW: Kiểm tra xem yêu cầu có phải là AJAX không
is_ajax();

// NEW: Kiểm tra quyền quản trị viên hoặc người kiểm duyệt
if (!$user->_is_admin) {
  modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
}

// NEW: Chặn tài khoản demo thực hiện hành động này
if ($user->_data['user_demo']) {
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
}

// NEW: Xử lý các tác vụ liên quan đến trường tùy chỉnh
try {

  switch ($_GET['do']) {
    case 'edit':
      /* NEW: Chỉnh sửa trường tùy chỉnh hiện có */
      /* valid inputs */
      // NEW: Kiểm tra ID hợp lệ
      if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        _error(400);
      }
      // NEW: Kiểm tra giá trị field_for hợp lệ
      if (!in_array($_POST['field_for'], ['user', 'page', 'group', 'event', 'product', 'job', 'offer'])) {
        throw new Exception(__("You have to select a valid field for value"));
      }
      // NEW: Kiểm tra nhãn trường không được để trống
      if (is_empty($_POST['label'])) {
        throw new Exception(__("You have to enter the field label"));
      }
      // NEW: Kiểm tra loại trường hợp lệ
      if (!in_array($_POST['type'], ['textbox', 'textarea', 'selectbox', 'multipleselectbox'])) {
        throw new Exception(__("You have to select a valid type"));
      }
      // NEW: Kiểm tra tùy chọn cho selectbox/multipleselectbox
      if ($_POST['type'] == "selectbox" || $_POST['type'] == "multipleselectbox") {
        if (is_empty($_POST['select_options'])) {
          throw new Exception(__("You have to enter the select options"));
        }
      }
      // NEW: Kiểm tra vị trí trường hợp lệ
      if (!in_array($_POST['place'], ['basic', 'work', 'location', 'education', 'other'])) {
        throw new Exception(__("You have to select a valid place"));
      }
      // NEW: Đặt vị trí mặc định là 'basic' nếu không phải người dùng
      $_POST['place'] = ($_POST['field_for'] == "user") ? $_POST['place'] : "basic";
      // NEW: Kiểm tra độ dài trường hợp lệ
      if (is_empty($_POST['length']) || !is_numeric($_POST['length'])) {
        throw new Exception(__("You have to enter valid field length"));
      }
      // NEW: Kiểm tra giới hạn độ dài
      if ($_POST['length'] <= 0 || $_POST['length'] > 1000) {
        throw new Exception(__("The field minimum length is 1 and maximum 1000 characters"));
      }
      // NEW: Kiểm tra thứ tự trường hợp lệ
      if (is_empty($_POST['field_order']) || !is_numeric($_POST['field_order'])) {
        throw new Exception(__("You have to enter valid field order"));
      }
      /* prepare */
      // NEW: Chuẩn bị các giá trị boolean
      $_POST['is_link'] = (isset($_POST['is_link'])) ? '1' : '0';
      $_POST['mandatory'] = (isset($_POST['mandatory'])) ? '1' : '0';
      $_POST['in_registration'] = (isset($_POST['in_registration']) || in_array($_POST['field_for'], ['product', 'job', 'offer'])) ? '1' : '0';
      $_POST['in_profile'] = (isset($_POST['in_profile']) || in_array($_POST['field_for'], ['product', 'job', 'offer'])) ? '1' : '0';
      $_POST['in_search'] = (!isset($_POST['in_search']) || in_array($_POST['field_for'], ['product', 'job', 'offer'])) ? '0' : '1';
      /* update */
      // NEW: Cập nhật thông tin trường tùy chỉnh vào cơ sở dữ liệu
      $db->query(sprintf("UPDATE custom_fields SET field_for = %s, type = %s, select_options = %s, label = %s, description = %s, place = %s, length = %s, field_order = %s, is_link = %s, mandatory = %s, in_registration = %s, in_profile = %s, in_search = %s WHERE field_id = %s", secure($_POST['field_for']), secure($_POST['type']), secure($_POST['select_options']), secure($_POST['label']), secure($_POST['description']), secure($_POST['place']), secure($_POST['length'], 'int'), secure($_POST['field_order'], 'int'), secure($_POST['is_link']), secure($_POST['mandatory']), secure($_POST['in_registration']), secure($_POST['in_profile']), secure($_POST['in_search']), secure($_GET['id'], 'int'))) or _error('SQL_ERROR_THROWEN');
      /* return */
      // NEW: Trả về phản hồi thành công
      return_json(array('success' => true, 'message' => __("Field info have been updated")));
      break;

    case 'add':
      /* NEW: Thêm trường tùy chỉnh mới */
      /* valid inputs */
      // NEW: Kiểm tra giá trị field_for hợp lệ
      if (!in_array($_POST['field_for'], ['user', 'page', 'group', 'event', 'product', 'job', 'offer'])) {
        throw new Exception(__("You have to select a valid field for value"));
      }
      // NEW: Kiểm tra nhãn trường không được để trống
      if (is_empty($_POST['label'])) {
        throw new Exception(__("You have to enter the field label"));
      }
      // NEW: Kiểm tra loại trường hợp lệ
      if (!in_array($_POST['type'], ['textbox', 'textarea', 'selectbox', 'multipleselectbox'])) {
        throw new Exception(__("You have to select a valid type"));
      }
      // NEW: Kiểm tra tùy chọn cho selectbox/multipleselectbox
      if ($_POST['type'] == "selectbox" || $_POST['type'] == "multipleselectbox") {
        if (is_empty($_POST['select_options'])) {
          throw new Exception(__("You have to enter the select options"));
        }
      }
      // NEW: Kiểm tra vị trí trường hợp lệ
      if (!in_array($_POST['place'], ['basic', 'work', 'location', 'education', 'other'])) {
        throw new Exception(__("You have to select a valid place"));
      }
      // NEW: Đặt vị trí mặc định là 'basic' nếu không phải người dùng
      $_POST['place'] = ($_POST['field_for'] == "user") ? $_POST['place'] : "basic";
      // NEW: Kiểm tra độ dài trường hợp lệ
      if (is_empty($_POST['length']) || !is_numeric($_POST['length'])) {
        throw new Exception(__("You have to enter valid field length"));
      }
      // NEW: Kiểm tra giới hạn độ dài
      if ($_POST['length'] <= 0 || $_POST['length'] > 1000) {
        throw new Exception(__("The field minimum length is 1 and maximum 1000 characters"));
      }
      // NEW: Kiểm tra thứ tự trường hợp lệ
      if (is_empty($_POST['field_order']) || !is_numeric($_POST['field_order'])) {
        throw new Exception(__("You have to enter valid field order"));
      }
      // NEW: Chuẩn bị các giá trị boolean
      $_POST['is_link'] = (isset($_POST['is_link'])) ? '1' : '0';
      $_POST['mandatory'] = (isset($_POST['mandatory'])) ? '1' : '0';
      $_POST['in_registration'] = (isset($_POST['in_registration']) || in_array($_POST['field_for'], ['product', 'job', 'offer'])) ? '1' : '0';
      $_POST['in_profile'] = (isset($_POST['in_profile']) || in_array($_POST['field_for'], ['product', 'job', 'offer'])) ? '1' : '0';
      $_POST['in_search'] = (!isset($_POST['in_search']) || in_array($_POST['field_for'], ['product', 'job', 'offer'])) ? '0' : '1';
      // NEW: Thêm trường tùy chỉnh mới vào cơ sở dữ liệu
      $db->query(sprintf("INSERT INTO custom_fields (field_for, type, select_options, label, description, place, length, field_order, is_link, mandatory, in_registration, in_profile, in_search) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", secure($_POST['field_for']), secure($_POST['type']), secure($_POST['select_options']), secure($_POST['label']), secure($_POST['description']), secure($_POST['place']), secure($_POST['length'], 'int'), secure($_POST['field_order'], 'int'), secure($_POST['is_link']), secure($_POST['mandatory']), secure($_POST['in_registration']), secure($_POST['in_profile']), secure($_POST['in_search']))) or _error('SQL_ERROR_THROWEN');
      // NEW: Chuyển hướng sau khi thêm thành công
      return_json(array('callback' => 'window.location = "' . $system['system_url'] . '/' . $control_panel['url'] . '/custom_fields";'));
      break;

    default:
      // NEW: Xử lý trường hợp yêu cầu không hợp lệ
      _error(400);
      break;
  }
} catch (Exception $e) {
  // NEW: Trả về lỗi nếu có ngoại lệ xảy ra
  return_json(array('error' => true, 'message' => $e->getMessage()));
}