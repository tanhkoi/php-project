<?php

/**
 * ajax -> admin -> blogs
 * 
 * Xử lý các thao tác AJAX cho quản lý blogs:
 * - Thêm category mới
 * - Chỉnh sửa category
 * 
 */

// fetch bootstrap
require('../../../bootstrap.php');

// check AJAX Request
is_ajax();  // Kiểm tra yêu cầu có phải là AJAX không, nếu không thì chặn lại

// check admin|moderator permission
if (!$user->_is_admin && !$user->_is_moderator) {
  modal("MESSAGE", __("System Message"), __("You don't have the right permission to access this"));
  // Nếu không phải admin hoặc moderator, hiển thị thông báo từ chối quyền truy cập
}

// check demo account
if ($user->_data['user_demo']) {
  modal("ERROR", __("Demo Restriction"), __("You can't do this with demo account"));
  // Nếu tài khoản là demo, chặn thao tác và báo lỗi
}

// handle blogs
try {

  switch ($_GET['do']) {  // Phân nhánh xử lý hành động dựa vào biến 'do' truyền qua URL

    case 'add_category':
      /* valid inputs */
      if (is_empty($_POST['category_name'])) {
        throw new Exception(__("Please enter a valid category name"));
        // Nếu tên danh mục trống, quăng exception
      }
      if (!is_empty($_POST['category_order']) && !is_numeric($_POST['category_order'])) {
        throw new Exception(__("Please enter a valid category order"));
        // Nếu thứ tự không phải số, quăng exception
      }

      /* insert */
      $db->query(sprintf(
        "INSERT INTO blogs_categories (category_name, category_description, category_parent_id, category_order) VALUES (%s, %s, %s, %s)",
        secure($_POST['category_name']),
        secure($_POST['category_description']),
        secure($_POST['category_parent_id'], 'int'),
        secure($_POST['category_order'], 'int')
      )) or _error('SQL_ERROR_THROWEN');
      // Thêm mới category vào database, nếu lỗi thì bắt exception

      /* return */
      return_json(array('callback' => 'window.location = "' . $system['system_url'] . '/' . $control_panel['url'] . '/blogs/categories";'));
      // Trả về JSON để load lại trang categories
      break;

    case 'edit_category':
      /* valid inputs */
      if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        _error(400);
        // Nếu không có id hoặc id không hợp lệ, trả về lỗi HTTP 400
      }
      if (is_empty($_POST['category_name'])) {
        throw new Exception(__("Please enter a valid category name"));
        // Nếu tên danh mục trống, quăng exception
      }
      if (!is_empty($_POST['category_order']) && !is_numeric($_POST['category_order'])) {
        throw new Exception(__("Please enter a valid category order"));
        // Nếu thứ tự không phải số, quăng exception
      }

      /* update */
      $db->query(sprintf(
        "UPDATE blogs_categories SET category_name = %s, category_description = %s, category_parent_id = %s, category_order = %s WHERE category_id = %s",
        secure($_POST['category_name']),
        secure($_POST['category_description']),
        secure($_POST['category_parent_id'], 'int'),
        secure($_POST['category_order'], 'int'),
        secure($_GET['id'], 'int')
      )) or _error('SQL_ERROR_THROWEN');
      // Cập nhật thông tin danh mục vào database, nếu lỗi thì bắt exception

      /* return */
      return_json(array('success' => true, 'message' => __("Category info have been updated")));
      // Trả JSON thông báo thành công cho client
      break;

    default:
      _error(400);
      // Nếu 'do' không khớp bất kỳ case nào, trả về lỗi HTTP 400
      break;
  }

} catch (Exception $e) {
  return_json(array('error' => true, 'message' => $e->getMessage()));
  // Bắt lỗi và trả về JSON cho client
}
