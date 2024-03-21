<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = '';
}

switch ($action) {
	case 'shoping': {
			if (isset($_POST['login'])) {
				header('location: index.php?controller=trang-admin&action=indexAdmin');
			}
			require_once('View/trangchu/shoping.php');
			break;
		}
	case 'login': {
			session_start();
			// Kiểm tra xem đã có session username và password hay chưa
			if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
				$username = $_SESSION['username'];
				$password = $_SESSION['password'];
				echo $username;
				echo $password;

				if ($db->checkCredentials($username, $password)) {
				} else {
					echo "Tên đăng nhập hoặc mật khẩu không chính xác!";
				}
			} else if (isset($_POST['btnRegister'])) {
				$fullname = $_POST['fullname_signup'];
				$user_name = $_POST['user_name_signup'];
				$password = $_POST['password_signup'];
				$email = $_POST['email_signup'];
				$phone_number = $_POST['phone_number_signup'];
				$address = $_POST['address_signup'];
				$db->registerAcount($user_name, $password, 1, 1);
				$db->registerNguoiDung($fullname, $email, $phone_number, 1, 1, $address, 1);
			}
			require_once('View/trangchu/login.php');
			break;
		}
	default: {
			$listUsersTable = "product";
			$dataHotProduct = $db->getAllData($listUsersTable);
			require_once('View/trangchu/trangchu.php');
			break;
		}
}
