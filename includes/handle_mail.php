<?php
require_once(__DIR__ . "/phpmailer/Exception.php");
require_once(__DIR__ . "/phpmailer/PHPMailer.php");
require_once(__DIR__ . "/phpmailer/SMTP.php");
require_once(__DIR__ . "/function.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
	$email = $_POST['email'];
	sendMail($email, 'title', 'dass');
}
if(isset($_POST['email-forgot'])) {
	$email_forgot = $_POST['email-forgot'];
	$sql = "SELECT * FROM nguoiDung WHERE email like '" . $email_forgot . "'";

	$db = new Database();
	$db->connect();
    $resultCheckToSentEmail = $db->getAllDataBySql($sql);
	if($db->num_row() > 0) {
		$idNguoiDung = $db->getIdByEmail($email_forgot);
		
		
		setcookie("userIDForReset", $idNguoiDung, time() + 1800, "/");
		sendMailForgot($email_forgot, $idNguoiDung);

	echo '<div class="susscess-sent-email" style="background: #fff;
		border-radius: 20px;
		box-shadow: 0 4px 10px 0 rgba(0,0,0,.14);
		margin: 0 22% 0 auto;
		min-height: 280px;
		padding: 20px 50px;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		z-index: 100;
		width: 440px;
		text-align: center">
		<a href="http://localhost/WEB2/index.php?controller=trang-chu&action=login">
			<div class="icon-left" style="text-align: left;">
				<svg width="15" height="23" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10 1L1 8.5L10 16" stroke="#212121" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
		</a>
		<svg width="64" height="64" viewBox="0 0 48 48" fill="none">
			<circle cx="24" cy="24" r="21" fill="transparent" stroke="#08B371" stroke-width="3.6"></circle>
			<path d="M15 24L21.364 30.364L32.6777 19.0503" stroke="#08B371" stroke-width="3.6" stroke-linecap="round" stroke-linejoin="round"></path>
		</svg>
		<h2 style="padding-top: 20px">Đã gửi email</h2>
		<p>Chúng tôi đã gửi email cho bạn đến <span style="color: #212121; font-weight: 600">' . $email_forgot . '</span>. Hãy làm theo hướng dẫn trong email để đặt lại mật khẩu của bạn.</p><br>
		<p style="margin-top: 32px; color: #757575;">Không thể tìm thấy email? Hãy đảm bảo bạn đã nhập chính xác địa chỉ email hoặc</p>
		<div data="1" class = "check-tim-thay-email"></div>
	</div>';
	} else {
		echo '<div data="-1" class = "check-tim-thay-email"></div>';
	}
}

