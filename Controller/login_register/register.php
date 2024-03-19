<?php 
$user_name = $_POST['user_name_signup'];
$password = $_POST['password_signup'];
$fullname = $_POST['fullname_signup'];
$phone_number = $_POST['phone_number_signup'];
$email = $_POST['email_signup'];
$address = $_POST['address_signup'];
$db->registerAcount($user_name, $password, 1, 1);
$db->registerNguoiDung($fullname, $email, $phone_number, 1, 1, $address, 1);
?>