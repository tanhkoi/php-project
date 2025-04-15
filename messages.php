<?php

/**
 * messages
 * 
 * Trang quản lý tin nhắn giữa các người dùng.
 * Cho phép xem tin nhắn cũ hoặc tạo tin nhắn mới.
 */

// fetch bootloader
require('bootloader.php');  // Nạp file bootloader.php để khởi tạo cấu hình, session, kết nối database
//Ghi chú thêm: bootloader có nhiệm vụ load toàn bộ môi trường hoạt động, ví dụ: kết nối database, kiểm tra cài đặt, session, autoload class.

// user access
user_access();  // Kiểm tra quyền truy cập, nếu chưa đăng nhập thì sẽ điều hướng sang trang login
//Ghi chú thêm: user_access() thường sẽ chặn khách chưa đăng nhập vào và redirect họ về trang đăng nhập.

// page header
page_header(__("Messages"));  // Thiết lập tiêu đề trang là "Messages" (Tin nhắn)
//Ghi chú thêm: page_header thiết lập tiêu đề trang, dùng để SEO hoặc hiển thị tên tab trình duyệt.

try {

  // check the view
  $view = (!isset($_GET['view'])) ? 'message' : 'new';  // Nếu không có view, mặc định là 'message', nếu có thì là 'new'
  //Ghi chú thêm: `view` quyết định trang sẽ hiển thị nội dung gì. 'message' là xem hội thoại có sẵn, 'new' là mở khung chat mới.

  // get view content
  if ($view == 'message') {  // Nếu view là message (trò chuyện đã có)

    if (!isset($_GET['cid'])) {  // Nếu không có cid (conversation_id) nào được gửi lên URL
      if ($user->_data['conversations']) {  // Kiểm tra nếu người dùng có cuộc trò chuyện nào
        $conversation = $user->_data['conversations'][0];  // Lấy cuộc trò chuyện đầu tiên
        $conversation['messages'] = $user->get_conversation_messages($conversation['conversation_id']);  // Lấy tin nhắn của cuộc trò chuyện này
      }
    } else {  // Nếu URL có cid

      /* check cid is valid */
      if (is_empty($_GET['cid']) || !is_numeric($_GET['cid'])) {  // Kiểm tra cid có hợp lệ không, nếu không thì trả về lỗi 404
        _error(404);
      }

      $conversation = $user->get_conversation($_GET['cid']);  // Lấy thông tin cuộc trò chuyện theo cid
      $conversation['messages'] = $user->get_conversation_messages($conversation['conversation_id']);  // Lấy tin nhắn của cuộc trò chuyện
    }

    // assign variables
    $smarty->assign('conversation', $conversation);  // Gán cuộc trò chuyện vào template để hiển thị
    //Ghi chú thêm: Dữ liệu $conversation sẽ được file .tpl trong Smarty dùng để render nội dung chat.

  } elseif ($view == 'new') {  // Nếu view là 'new' (tạo cuộc trò chuyện mới)

    /* get recipient */
    if (isset($_GET['uid'])) {  // Nếu URL có gửi user_id người nhận
      $get_recipient = $db->query(sprintf(
        "SELECT user_id, user_name, CONCAT(users.user_firstname,' ',users.user_lastname) as user_fullname FROM users WHERE user_id = %s",
        secure($_GET['uid'], 'int')
      )) or _error('SQL_ERROR_THROWEN');  // Truy vấn thông tin người nhận từ cơ sở dữ liệu, kiểm tra lỗi SQL
      //Ghi chú thêm: Dùng `secure()` để tránh lỗi SQL Injection, kiểm tra chặt chẽ dữ liệu `uid` nhận vào.

      if ($get_recipient->num_rows > 0) {  // Nếu tìm thấy user
        $recipient = $get_recipient->fetch_assoc();  // Lấy dữ liệu user

        $recipient["user_fullname"] = ($system['show_usernames_enabled'])
          ? $recipient['user_name']
          : $recipient['user_fullname'];  // Nếu cấu hình bật "show usernames", hiển thị username, ngược lại hiển thị fullname
        //Ghi chú thêm: Cho phép hiển thị tên thật hoặc username tùy cấu hình của hệ thống.

        /* assign variables */
        $smarty->assign('recipient', $recipient);  // Gán thông tin người nhận vào template
        //Ghi chú thêm: Dùng cho khung chat mới, hiển thị tên người nhận ngay khi mở khung chat.
      }
    }
  }

  //check
  /* assign variables */
  $smarty->assign('view', $view);  // Gán biến 'view' cho template, để template biết đang hiển thị giao diện nào (message hoặc new)
  //Ghi chú thêm: Biến `view` sẽ được file giao diện .tpl sử dụng để quyết định hiển thị nội dung phù hợp.

} catch (Exception $e) {
  _error(__("Error"), $e->getMessage());  // Nếu có lỗi, hiển thị thông báo lỗi ra giao diện
  //Ghi chú thêm: Dùng try-catch để bắt lỗi trong quá trình truy xuất dữ liệu, tránh sập trang web khi lỗi SQL hoặc logic.
}

// page footer
page_footer('messages');  // Hiển thị phần footer cho trang tin nhắn
//Ghi chú thêm: `page_footer()` sẽ đóng các thẻ HTML, nạp JavaScript hoặc hiển thị thanh footer mặc định.

?>
