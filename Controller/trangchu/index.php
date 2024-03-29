
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
			if (isset($_REQUEST['login'])) {
				$username = $_REQUEST['username'];
				$password = $_REQUEST['password'];
				$resuiltCheckLogin = $db->checkLogin($username, $password);
				$rowCheckLogin = $resuiltCheckLogin->fetch_assoc();
				if ($rowCheckLogin) {
					$objuser = array($username, $password);
					$_SESSION['objuser'] = $objuser;
					$idUser = $rowCheckLogin['id'];
					$_SESSION['idUserLogin'] = $idUser;
					$flagLogin = 1;
					$_SESSION['isLogin'] = $flagLogin;
					$idRole = $rowCheckLogin['id_role'];
					if ($idRole == 2) {
						header("Location: index.php?controller=trang-admin&action=indexAdmin");
					} else {
						header("Location: index.php?controller=trang-chu");
					}
					exit();
				} else {
					$flagLogin = 0;
					$_SESSION['isLogin'] = $flagLogin;
					http_response_code(401);
					echo '<div style="color:red; margin-bottom: 10px;">Tên đăng nhập hoặc mật khẩu không đúng!</div>';
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
	case "forgotPassword":
		if(isset($_GET['$idNguoiDung'])) {
			$idUserForReset = $_GET['$idNguoiDung'];
		}
		header("location: View/trangchu/forgotPassword.php");
		break;
	case "resetPassword": 
		header("location: View/trangchu/resetPassword.php");
		break;
	case '': {
			if (isset($db)) {
				$listUsersTable = "product";
				$dataHotProduct = $db->getAllData($listUsersTable);
				$listCategory = $db->getAllData("category");
				require_once('View/trangchu/trangchu.php');
				break;
			}
		}
}
