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
			ob_start();
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				if ($db->checkLogin($username, $password)) {
					$objuser = array($username, $password);
					$_SESSION['objuser'] = $objuser;
					header('Location: index.php?controller=trang-chu');
					exit();
				} else {
					echo "Tên người dùng hoặc mật khẩu không đúng.";
				}
			} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnRegister'])) {
				$fullname = $_POST['fullname_signup'];
				$user_name = $_POST['user_name_signup'];
				$password = $_POST['password_signup'];
				$email = $_POST['email_signup'];
				$phone_number = $_POST['phone_number_signup'];
				$address = $_POST['address_signup'];
				if ($db->checkExistingAccount($user_name)) {
					echo "Tài khoản đã tồn tại. Vui lòng chọn tên khác.";
				} else {
					$db->registerAcount($user_name, $password, 1, 1);
					$db->registerNguoiDung($fullname, $email, $phone_number, 1, 1, $address, 1);
				}
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
