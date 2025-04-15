<?php

/**
 * friend_requests
 * 
 * 
 * 
 * Trang quản lý kết bạn, tìm bạn mới, xem yêu cầu đã gửi & đã nhận.
 */

// fetch bootloader
require('bootloader.php');  // Nạp file bootloader.php để khởi tạo cấu hình, session, kết nối database
//Ghi chú thêm: bootloader giúp tải sẵn config, class, và mở session cùng kết nối cơ sở dữ liệu cho user.

// user access
user_access();  // Kiểm tra quyền truy cập, nếu chưa đăng nhập thì sẽ điều hướng sang trang login
//Ghi chú thêm: Đảm bảo trang chỉ cho phép người dùng đã đăng nhập truy cập, ngăn chặn người dùng lạ hoặc chưa login.

// Xử lý logic chính
try {

  // get view content
  switch ($_GET['view']) {  // Dựa vào giá trị 'view' từ URL, xác định giao diện cần load.
    case '':
      // page header
      page_header(__("Discover People") . ' | ' . __($system['system_title']));  
      //Ghi chú thêm: Nếu view trống, thiết lập tiêu đề trang "Discover People | Tên hệ thống".

      // get new people
      $smarty->assign('people', $user->get_new_people());  // Lấy danh sách người dùng mới, gán vào template.
      //Ghi chú thêm: Dữ liệu này sẽ hiển thị danh sách user gợi ý để kết bạn.

      break;

    case 'find':
      // page header
      page_header(__("Find People"));  // Thiết lập tiêu đề trang là "Find People" khi người dùng vào mục tìm kiếm.

      // valid inputs
      if (!isset($_POST['submit'])) {
        redirect('/people');  // Nếu người dùng chưa gửi form tìm kiếm, chuyển về trang people.
      }

      // search users
      $people = $user->search_users($_POST['distance_value'], $_POST['query'], $_POST['gender'], $_POST['relationship'], $_POST['status']);
      $smarty->assign('people', $people);  // Gán danh sách người tìm được vào template.
      //Ghi chú thêm: Tìm kiếm user theo nhiều tiêu chí: khoảng cách, tên, giới tính, mối quan hệ, trạng thái.

      break;

    case 'friend_requests':
      // page header
      page_header(__("Friend Requests"));  // Thiết lập tiêu đề trang "Friend Requests".
      break;

    case 'sent_requests':
      // page header
      page_header(__("Friend Requests Sent"));  // Thiết lập tiêu đề trang "Friend Requests Sent".

      // get friend requests sent
      $user->_data['friend_requests_sent'] = $user->get_friend_requests_sent();  // Lấy danh sách yêu cầu kết bạn đã gửi.
      //Ghi chú thêm: Biến này dùng để hiển thị cho user biết mình đã gửi lời mời kết bạn đến những ai.

      break;

    default:
      _error(404);  // Nếu không khớp bất kỳ case nào, trả về lỗi 404.
      break;
  }

  /* assign variables */
  $smarty->assign('view', $_GET['view']);  // Gán biến 'view' vào template, dùng để xác định trang đang hiển thị là gì.

  //friend requests sent
  // get total friend requests sent
  $user->_data['friend_requests_sent_total'] = $user->get_friend_requests_sent_total();  // Lấy tổng số lời mời kết bạn đã gửi.
  //Ghi chú thêm: Thống kê số lượng yêu cầu kết bạn đã gửi, có thể dùng để hiển thị badge hoặc thông báo.

  // get genders
  $smarty->assign('genders', $user->get_genders());  // Lấy danh sách giới tính có trong hệ thống, gán vào template.
  //Ghi chú thêm: Dữ liệu này phục vụ cho filter tìm kiếm người dùng.

  // get custom fields
  $smarty->assign('custom_fields', $user->get_custom_fields(["get" => "search"]));  
  //Ghi chú thêm: Lấy danh sách các trường tuỳ chỉnh cho phần tìm kiếm user, ví dụ: Sở thích, Thành phố, Công việc.

  // get ads campaigns
  $smarty->assign('ads_campaigns', $user->ads_campaigns());  // Lấy các chiến dịch quảng cáo.
  //Ghi chú thêm: ads_campaigns có thể hiển thị quảng cáo cho người dùng khi duyệt friend requests.

  // get ads
  $smarty->assign('ads', $user->ads('people'));  // Lấy danh sách quảng cáo dành riêng cho trang "people".
  //Ghi chú thêm: Tối ưu hóa quảng cáo theo vị trí trang để tăng CTR (click-through rate).

  // get widgets
  $smarty->assign('widgets', $user->widgets('people'));  // Lấy danh sách widget liên quan cho trang "people".
  //Ghi chú thêm: Có thể chứa các gợi ý, liên kết hữu ích hoặc block nhỏ trên sidebar.

} catch (Exception $e) {
  _error(__("Error"), $e->getMessage());  // Nếu có lỗi, hiển thị thông báo lỗi ra giao diện.
  //Ghi chú thêm: Toàn bộ khối try-catch đảm bảo an toàn khi query database hoặc xử lý logic, tránh cho trang bị crash.
}

// page footer
page_footer('people');  // Hiển thị phần footer cho trang "people" (Kết bạn).
//Ghi chú thêm: Đóng HTML và load thêm script, JS nếu cần cho giao diện.

?>
