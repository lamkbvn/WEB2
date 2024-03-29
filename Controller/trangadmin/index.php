<?php


if (isset($_GET['controller']) && $_GET['controller'] == 'trang-admin') {
	include_once("View/admin/header-admin.php");
}


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
	case 'role': {
			require_once('Controller/trangadmin/C_addNewRole.php');
			break;
		}
	case 'addRole': {
			include("../../Model/DBConfig.php");
			$db = new Database();
			$db->connect();
			$result = $db->execute("SELECT * FROM chucnang");
			$rowsCN = array();
			$result2 = $db->execute("SELECT * FROM role");
			$rowsRole = array();

			if ($result !== false && $result->num_rows > 0) {
				while ($row4 = $result->fetch_assoc()) {
					$rowsCN[] = $row4;
				}
			}
			if (isset($_REQUEST['addRole'])) {
				if (isset($_REQUEST['name_role'])) {
					$nameRole = $_REQUEST['name_role'];
				}
				$db->InsertRole($nameRole);
				foreach ($rowsCN as $rowCN) {
					$idCN = $rowCN['id'];
					$HD = "null";
					// Lấy giá trị của các checkbox từ $_POST
					if (isset($_POST['view'][$idCN])) {
						$HD = "View";
						$db->InsertRoleLinhDong($idCN, $HD);
					}
					if (isset($_POST['add'][$idCN])) {
						$HD = "Add";
						$db->InsertRoleLinhDong($idCN, $HD);
					}
					if (isset($_POST['delete'][$idCN])) {
						$HD = "Delete";
						$db->InsertRoleLinhDong($idCN, $HD);
					}
					if (isset($_POST['edit'][$idCN])) {
						$HD = "Edit";
						$db->InsertRoleLinhDong($idCN, $HD);
					}
				}
			}
			$db->disconnect();
			break;
		}
	case 'tour': {
			require_once('Controller/trangadmin/C_addNewTour.php');
			break;
		}
	case 'addTour': {
			include("../../Model/DBConfig.php");
			$db = new Database();
			$db->connect();

			$result = $db->execute("SELECT * FROM provincial");
			$rowsProvin = array();

			// Kiểm tra và lấy dữ liệu từ kết quả truy vấn
			if ($result !== false && $result->num_rows > 0) {
				while ($row2 = $result->fetch_assoc()) {
					$rowsProvin[] = $row2; // Thêm dòng dữ liệu vào mảng
				}
			}

			$result2 = $db->execute("SELECT * FROM category");
			$rowsCate = array();

			// Kiểm tra và lấy dữ liệu từ kết quả truy vấn
			if ($result2 !== false && $result2->num_rows > 0) {
				while ($row3 = $result2->fetch_assoc()) {
					$rowsCate[] = $row3; // Thêm dòng dữ liệu vào mảng
				}
			}
			if (isset($_REQUEST['btnAddTour'])) {
				$id = date('dmyHis');
				$title = $_REQUEST['title'];
				$category = $_REQUEST['category'];
				$provincial = $_REQUEST['provincial'];
				$price = $_REQUEST['price'];
				$content = $_REQUEST['content'];
				$address = $_REQUEST['address'];
				$currentDate = date("Y-m-d");
				$acount = $_REQUEST['acount'];
				$category = $_REQUEST['category'];

				$db->InsertTour($id, $category, 1, $provincial, $title, $price, $content, $address, $currentDate, $acount);

				if (!empty($_FILES['img1']['tmp_name']) && getimagesize($_FILES['img1']['tmp_name']) !== false) {
					$img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
					$db->InsertImg($id, '1', $img1);
				}

				if (!empty($_FILES['img2']['tmp_name']) && getimagesize($_FILES['img2']['tmp_name']) !== false) {
					$img2 = addslashes(file_get_contents($_FILES['img2']['tmp_name']));
					$db->InsertImg($id, '2', $img2);
				}

				if (!empty($_FILES['img3']['tmp_name']) && getimagesize($_FILES['img3']['tmp_name']) !== false) {
					$img3 = addslashes(file_get_contents($_FILES['img3']['tmp_name']));
					$db->InsertImg($id, '3', $img3);
				}
			}
			$db->disconnect();
			break;
		}
}
