<?php
require_once('../includes/phpmailer/Exception.php');
require_once('../includes/phpmailer/SMTP.php');
require_once('../includes/phpmailer/PHPMailer.php');
require_once('../includes/function.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
	$email = $_POST['email'];
	sendMail($email, 'title', 'hiiii');
}
