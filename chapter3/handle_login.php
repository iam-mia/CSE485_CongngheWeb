<?php
// TODO 1: (Cực kỳ quan trọng) Khởi động session
// Phải gọi hàm này TRƯỚC BẤT KỲ output HTML nào
// Gợi ý: Dùng hàm session_...()
session_start();

// TODO 2: Kiểm tra xem người dùng đã nhấn nút "Đăng nhập" (gửi form) chưa
// Gợi ý: Dùng hàm isset() để kiểm tra sự tồn tại của $_POST['username']
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
// TODO 3: Nếu đã gửi form, lấy dữ liệu 'username' và 'password' từ $_POST
// TODO 4: (Giả lập) Kiểm tra logic đăng nhập
// Nếu $user == 'admin' VÀ $pass == '123' thì là đăng nhập thành công
    if ($user == 'admin' && $pass == '123'){
        $_SESSION['login'] = $user;
        header('Location: welcome.php');
        exit;
    } else {
    // Nếu thất bại, chuyển hướng về login.html
        header('Location: login.html?error=1'); // Kèm theo thông báo lỗi trên URL
        exit; //phải tự ghi error=1 hả, convention là gì
    }
} else {
    header('Location: login.html'); //khi nào error 1 khi nào ko
    exit;
}
// TODO 7: Nếu người dùng truy cập trực tiếp file này (không qua POST),
// "đá" họ về trang login.html
// Gợi ý: Dùng else cho TODO 2 và cũng header() về login.html
// liệu có case fake POST (có thể là từ form khác trong web ko)
?>
<!-- status 302? -->