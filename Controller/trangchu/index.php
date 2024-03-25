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
			}
			require_once('View/trangchu/login.php');
			break;
		}
	case "showproduct": // cua Huu Loc
		require_once('Controller/showproductController/showproduct.php');
		break;
	case "userprofile":
		require_once('View/User/user.php');
		break;
	default: {
			if (isset($db)) {
				$listUsersTable = "product";
				$dataHotProduct = $db->getAllData($listUsersTable);
				$listCategory = $db->getAllData("category");

				require_once('View/trangchu/trangchu.php');
				break;
			}
		}
}
