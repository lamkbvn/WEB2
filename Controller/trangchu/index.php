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
					if ($idRole != 0) {
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
	case "cart":
			// Ensure session is started before using $_SESSION
			session_start();
		
			// Retrieve the user ID from the session
			$idUser = $_SESSION['idUserLogin'];
		
			// Build the SQL query to fetch cart items
			$sql = "SELECT cart.*, product.* 
					FROM cart 
					LEFT JOIN product ON cart.id_product = product.id
					WHERE cart.id_user = $idUser";
		
			// Execute the query
			$result = $db->execute($sql);
		
			// Check if there are cart items
			if ($result && $result->num_rows > 0) {
				// Fetch all cart items into an array
				$listCart = $result->fetch_all(MYSQLI_ASSOC);
			} else {
				// If no cart items found, initialize an empty array
				$listCart = array();
			}
		
			// Include the cart view file and pass the cart items array
			include "View/Cart/cart.php";
		break;
	case 'deleteItemCart':
			session_start();
			
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				$ItemId = $_GET['id'];
				$result = $db->deleteItemCart($ItemId);

				//thành công thì hiện thị lại ds cart
				if ($result) {
					$idUser = $_SESSION['idUserLogin'];

					$sql = "SELECT cart.*, product.* 
							FROM cart 
							LEFT JOIN product ON cart.id_product = product.id
							WHERE cart.id_user = $idUser";

					$result = $db->execute($sql);
		
					if ($result && $result->num_rows > 0) {

						$listCart = $result->fetch_all(MYSQLI_ASSOC);
					} else {
						
						$listCart = array();
					}
					include "View/Cart/cart.php";
				}
			}
			break;
	case "userprofile":
		require_once('View/User/user.php');
		break;
	case "forgotPassword":
		if (isset($_GET['$idNguoiDung'])) {
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