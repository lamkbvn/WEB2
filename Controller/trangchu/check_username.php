<?php
require_once '../../Model/DBConfig.php';

$db = new Database();
$conn = $db->connect();

$accounts = $db->getAllAccounts();
if (
	isset($_POST['username']) &&
	$_POST['fullname'] !== '' &&
	$_POST['password'] !== '' &&
	$_POST['email'] !== '' &&
	$_POST['phone_number'] !== '' &&
	$_POST['address'] !== ''
) {
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$id_role = "1";
	$status = "1";
	$create_at = "1";
	$usernameExists = false;
	foreach ($accounts as $account) {
		if ($account['user_name'] === $username) {
			$usernameExists = true;
			break;
		}
	}
	if ($usernameExists) {
		echo "exists";
	} else {
		$db->registerAcount($username, $password, $id_role, $status);

		echo "valid";
	}
} else {
	echo "invalid request";
}