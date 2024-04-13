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
	isset($_POST['checkValid']) && $_POST['checkValid'] == 1

) {
	$id_role = "0";
	if (isset($_POST['role'])) $id_role = $_POST['role'];

	$id_acount = 0;
	$username;
	$password;
	if (
		isset($_POST['username']) && isset($_POST['password'])
	) {
		$username = $_POST['username'];
		$password = $_POST['password'];
	}

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$status = "1";
	$create_at = date('Y/m/d');


	$usernameExists = false;
	$emailExists = false;
	$phone_numberExists = false;
	foreach ($accounts as $account) {
		if ($account['user_name'] === $username) {
			$usernameExists = true;
			break;
		}
	}

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
	if ($usernameExists) {
		echo "exists username";
	} else if ($emailExists) {
		echo "exists email";
	} else if ($phone_numberExists) {
		echo "exists phone";
	} else if (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $email)) {
		echo "invalid email";
	} else if (!preg_match("/^\d{10,11}$/", $phone_number)) {
		echo "invalid phone";
	} else {
		if ($username !== '' && $password !== '') {
			$accountEND = end($accounts);
			$id_acount = $accountEND['id'] + 1;
			$db->registerAcount($username, $password, $id_role, $status);
		}
		$db->registerNguoiDung($fullname, $email, $phone_number, $create_at, $status, $address, $id_acount);
		echo "valid";
	}
} else {
	echo "invalid request";
}
