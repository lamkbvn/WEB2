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
				$id_role = $_POST['id_role'];
				$user_name = $_POST['user_name'];
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$phone_number = $_POST['phone_number'];
				$create_at = $_POST['create_at'];
				$status = $_POST['status'];
				$address = $_POST['address'];

				// Gọi phương thức InsertData để chèn dữ liệu vào cơ sở dữ liệu
				if ($db->insertUserData($id_role, $user_name, $fullname, $email, $password, $phone_number, $create_at, $status, $address)) {
					$alert = 'add_success';
				}
			}
			require_once('View/admin/add.php');
			break;
		}

	case 'list': {
			$listUsersTable = "users";
			$data = $db->getAllData($listUsersTable);
			require_once('View/admin/list.php');
			break;
		}
	case 'edit': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$listUsersTable = "users";
				$dataID = $db->getDataId($listUsersTable, $id);

				if (isset($_POST['edit_user'])) {
					$id_role = $_POST['id_role'];
					$user_name = $_POST['user_name'];
					$fullname = $_POST['fullname'];
					$email = $_POST['email'];
					$password = $_POST['password'];
					$phone_number = $_POST['phone_number'];
					$create_at = $_POST['create_at'];
					$status = $_POST['status'];
					$address = $_POST['address'];
					if ($db->updateEditData($id, $id_role, $user_name, $fullname, $email, $password, $phone_number, $create_at, $status, $address)) {
						header('location: index.php?controller=trang-admin&action=list');
					}
				}
			}
			require_once('View/admin/edit.php');
			break;
		}

	case 'delete': {
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$listUsersTable = "users";

				if ($dataID = $db->deleteUser($listUsersTable, $id)) {
					header('location: index.php?controller=trang-admin&action=list');
				}
			}
			require_once('View/admin/list.php');
			break;
		}

	case 'admin': {
			require_once('View/admin/indexAdmin.php');
			break;
		}
}
