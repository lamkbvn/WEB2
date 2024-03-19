<?php 
$user_name = $_POST['user_name_login'];
$password = $_POST['password_login'];
$result = $db->checkLogin($user_name, $password)->fetch_assoc();
if ($result) {
    // Đăng nhập thành công
    echo "Đăng nhập thành công!";
} else {
    // Đăng nhập thất bại
    echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
}

?>