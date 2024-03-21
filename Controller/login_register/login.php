<?php 
$user_name = $_POST['user_name_login'];
$password = $_POST['password_login'];
$result = $db->checkLogin($user_name, $password)->fetch_assoc();
if ($result) {
    $objuser = array($username, $password);

    $_SESSION['objuser'] = $objuser;

    header('location: index.php?controller=trang-chu');
} else {
    // Đăng nhập thất bại
    echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
}

?>