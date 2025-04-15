<?php

/**
 * notifications
 * 
 * 
 * 
 * Trang quản lý thông báo của người dùng.
 */

// fetch bootloader
require('bootloader.php');  // Nạp file bootloader.php để khởi tạo cấu hình, session, kết nối database
// Ghi chú thêm: bootloader chịu trách nhiệm load môi trường làm việc, cấu hình, autoload class, mở kết nối database, và bảo đảm session hợp lệ.

// user access
user_access();  // Kiểm tra quyền truy cập, nếu chưa đăng nhập thì sẽ điều hướng sang trang login
// Ghi chú thêm: Hàm này đảm bảo rằng chỉ người dùng đã đăng nhập mới được phép truy cập trang thông báo, nếu không sẽ bị chuyển hướng.

// page header
page_header(__("Notifications"));  // Thiết lập tiêu đề trang là "Notifications"
// Ghi chú thêm: Dùng để set tiêu đề trang trên trình duyệt (SEO), đồng thời có thể truyền vào giao diện để render tên trang.

try {

  // reset real-time counters
  $user->reset_realtime_counters('notifications');  
  // Ghi chú thêm: Reset bộ đếm thông báo thời gian thực của người dùng, đánh dấu rằng thông báo đã được xem.
  // Mục đích là cập nhật database về trạng thái đã đọc khi người dùng mở trang này.

  // get ads campaigns
  $ads_campaigns = $user->ads_campaigns();  // Lấy danh sách các chiến dịch quảng cáo
  /* assign variables */
  $smarty->assign('ads_campaigns', $ads_campaigns);  // Truyền dữ liệu quảng cáo chiến dịch vào template
  // Ghi chú thêm: ads_campaigns có thể dùng cho banner hoặc quảng cáo ngẫu nhiên hiển thị trong trang thông báo.

  // get ads
  $ads = $user->ads('notifications');  // Lấy danh sách quảng cáo dành riêng cho trang thông báo
  /* assign variables */
  $smarty->assign('ads', $ads);  // Truyền dữ liệu quảng cáo vào template
  // Ghi chú thêm: Có thể là những quảng cáo khác nhau tuỳ vị trí hiển thị trong giao diện notification.

  //get data user
  // get widgets
  $widgets = $user->widgets('notifications');  // Lấy danh sách widget dùng cho trang thông báo
  /* assign variables */
  $smarty->assign('widgets', $widgets);  // Truyền dữ liệu widget vào template
  // Ghi chú thêm: widgets có thể là các block nhỏ như gợi ý bạn bè, nhóm, trang, hoặc một tiện ích nào đó tuỳ cấu hình.

} catch (Exception $e) {
  _error(__("Error"), $e->getMessage());  // Nếu có lỗi, hiển thị thông báo lỗi ra giao diện
  // Ghi chú thêm: Toàn bộ khối try-catch giúp đảm bảo trang không bị crash nếu có lỗi database hoặc logic xử lý.
}

// page footer
page_footer('notifications');  // Hiển thị phần footer cho trang thông báo
// Ghi chú thêm: Đóng file HTML, load JavaScript, CSS hoặc các đoạn mã cần thiết cho footer của giao diện.

?>
