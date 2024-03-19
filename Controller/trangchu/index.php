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
