<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = '';
}

$alert;


switch ($action) {
	case 'add': {
			if (isset($_POST['add_user'])) {
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$phone_number = $_POST['phone_number'];
				$create_at = $_POST['create_at'];
				$status = $_POST['status'];
				$address = $_POST['address'];
				$id_acount = $_POST['id_acount'];

				// Gọi phương thức InsertData để chèn dữ liệu vào cơ sở dữ liệu
				if ($db->insertUserData($fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)) {
					$alert = 'add_success';
					header('location: index.php?controller=trang-admin&action=indexAdmin');
				}
			}

			if (isset($_POST['add_user'])) {
				// Thực hiện kiểm tra và xử lý dữ liệu ở đây
				// Ví dụ:
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$phone_number = $_POST['phone_number'];
				// Kiểm tra và xử lý dữ liệu...

				// Sau khi xử lý, trả về phản hồi cho Ajax
				echo "Dữ liệu đã được xử lý thành công!";
			}
			require_once('View/admin/add.php');

			break;
		}

	case 'edit': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$listUsersTable = "nguoidung";
				$dataID = $db->getDataId($listUsersTable, $id);
				if (isset($_POST['edit_user'])) {
					$fullname = $_POST['fullname'];
					$email = $_POST['email'];
					$phone_number = $_POST['phone_number'];
					$create_at = $_POST['create_at'];
					$status = $_POST['status'];
					$address = $_POST['address'];
					$id_acount = $_POST['id_acount'];

					if ($db->updateEditData($id, $fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)) {
						header('location: index.php?controller=trang-admin&action=indexAdmin');
					}
				}
			}
			require_once('View/admin/edit.php');
			break;
		}

	case 'editrole': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$listUsersTable = "nguoidung";
				$dataID = $db->getDataId($listUsersTable, $id);
				if (isset($_POST['edit_user'])) {
					$fullname = $_POST['fullname'];
					$email = $_POST['email'];
					$phone_number = $_POST['phone_number'];
					$create_at = $_POST['create_at'];
					$status = $_POST['status'];
					$address = $_POST['address'];
					$id_acount = $_POST['id_acount'];

					if ($db->updateEditData($id, $fullname, $email, $phone_number, $create_at, $status, $address, $id_acount)) {
						header('location: index.php?controller=trang-admin&action=indexAdmin');
					}
				}
			}
			require_once('View/admin/editrole.php');
			break;
		}


	case 'delete': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$listUsersTable = "nguoidung";

				if ($dataID = $db->deleteUser($listUsersTable, $id)) {
					header('location: index.php?controller=trang-admin&action=indexAdmin');
				}
			}
			break;
		}

	case 'banuser': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$dataID = $db->blockUser($id);
			}
			header('location: index.php?controller=trang-admin&action=indexAdmin');

			break;
		}

	case 'unbanuser': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$dataID = $db->unblockUser($id);
			}
			header('location: index.php?controller=trang-admin&action=indexAdmin');

			break;
		}

	case 'indexAdmin': {
			$listUsersTable = "nguoidung";
			$data = $db->getAllData($listUsersTable);
			require_once('View/admin/indexAdmin.php');
			break;
		}
	case 'headeradmin': {
			$listUsersTable = "nguoidung";
			$data = $db->getAllData($listUsersTable);
			require_once('View/admin/header-admin.php');
			break;
		}

	case 'products': {
			require_once('View/admin/products.php');
			break;
		}
	case 'thongke': {
			require_once('View/admin/thongke.php');
			break;
		}
}
