<?php
require_once '../../Model/DBConfig.php';

$db = new Database();
$conn = $db->connect();

$accounts = $db->getAllAccounts();
$nguoidungs = $db->getAllNguoiDung();

if (
	$_POST['fullname'] !== '' &&
	$_POST['email'] !== '' &&
	$_POST['phone_number'] !== '' &&
	$_POST['address'] !== '' &&
	$_POST['userID'] !== '' &&
	isset($_POST['checkValid']) && $_POST['checkValid'] == 1

) {

	$id_acount = 0;
	$username;
	$password;
	if (
		isset($_POST['username']) && isset($_POST['password'])
	) {
		$username = $_POST['username'];
		$password = $_POST['password'];
	}

	$emailOfUser = $_POST['emailOfUser'];
	$phoneOfUser = $_POST['phoneOfUser'];

	$fullname = $_POST['fullname'];
	$userID = $_POST['userID'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$role = $_POST['role'];

	$status = "1";
	$create_at = date('Y/m/d');


	$usernameExists = false;
	$emailExists = false;
	$phone_numberExists = false;

	foreach ($nguoidungs as $nguoidung) {
		if ($nguoidung['email'] === $email) {
			$emailExists = true;
			break;
		}
		if ($nguoidung['phone_number'] === $phone_number) {
			$phone_numberExists = true;
			break;
		}
	}
	if ($emailExists && $email != $emailOfUser) {
		echo "exists email";
	} else if ($phone_numberExists && $phone_number != $phoneOfUser) {
		echo "exists phone";
	} else if (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $email)) {
		echo "invalid email";
	} else if (!preg_match("/^\d{10,11}$/", $phone_number)) {
		echo "invalid phone";
	} else {
		if (
			$db->updateEditData($userID, $fullname, $email, $phone_number, $create_at, $address)
			&& $db->roleAccount($userID, $role)
		) {
			echo "valid";
		} else if ($db->updateEditData($userID, $fullname, $email, $phone_number, $create_at, $address))
			echo "valid";
		else if ($db->roleAccount($userID, $role))
			echo "valid";
		else {
			echo "inva";
		}
	}
} else {
	echo "invalid request";
}
