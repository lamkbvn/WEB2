<?php
require_once(__DIR__ . "/phpmailer/Exception.php");
require_once(__DIR__ . "/phpmailer/PHPMailer.php");
require_once(__DIR__ . "/phpmailer/SMTP.php");
require_once(__DIR__ . "/function.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
	$email = $_POST['email'];
	sendMail($email, 'title', '11111111111111111');
} else {
}

