<?php
require_once(__DIR__ . "/phpmailer/Exception.php");
require_once(__DIR__ . "/phpmailer/PHPMailer.php");
require_once(__DIR__ . "/phpmailer/SMTP.php");
require_once(__DIR__ . "/function.php");
include "../Model/DBConfig.php";

// Kiểm tra xem có dữ liệu được gửi qua phương thức POST không
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'web2';
	$conn = new mysqli($hostname, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Kết nối CSDL thất bại: " . $conn->connect_error);
	}
	$email = $_POST['email'];
	$discount_name = "Khuyến mãi cho người dùng mới";
	$code = "NGUOIDUNGMOI" . rand();
	$percent = 10;
	$date_start = date('Y/m/d');
	$date_end = date('Y/m/d', strtotime($date_start . ' +1 month'));
	$description = "Hãy trải nghiệm những dịch vụ hấp dẫn của chúng tôi";
	$sql = "INSERT INTO discount (discount_name, code, percent, date_start, date_end, description) 
            VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssisss", $discount_name, $code, $percent, $date_start, $date_end, $description);
	if ($stmt->execute()) {
		// Gửi email
		sendMail($email, 'Welcome to Klook', $code);
		echo "Đã thêm mã giảm giá vào cơ sở dữ liệu và gửi email thành công.";
	} else {
		echo "Có lỗi xảy ra khi thêm mã giảm giá vào cơ sở dữ liệu: " . $conn->error;
	}
	// Đóng kết nối
	$conn->close();
}

if (isset($_POST['email-forgot'])) {
	$email_forgot = $_POST['email-forgot'];
	$sql = "SELECT * FROM nguoiDung WHERE email like '" . $email_forgot . "'";

	$db = new Database();
	$db->connect();
	$resultCheckToSentEmail = $db->getAllDataBySql($sql);
	if ($db->num_row() > 0) {
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
				<path d="M10 1L1 8.5L10 16" stroke="#212121" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
	<div data="1" class="check-tim-thay-email"></div>
</div>';
	} else {
		echo '<div data="-1" class="check-tim-thay-email"></div>';
	}
}

if(isset($_POST['status'])) {
	$orderId = $_POST['orderId'];
	$oldStatus = $_POST['old_status'];
	$newStatus = $_POST['status'];
	$totalAllMoney = $_POST['total_all_money'];
	$db = new Database();
	$db->connect();
	$db->updateOrder($orderId, $newStatus);
	$email = $db->getMailByIdOrder($orderId);
	$result = $db->getDetailOrderByOrderId($orderId);
	$listOrderDetail = $db->getAll();
	sendMailUpdateOrder($email, $orderId, $oldStatus, $newStatus, $listOrderDetail, $totalAllMoney);
	header("location: http://localhost/WEB2/index.php?controller=trang-admin&action=detailOrder&id=$orderId");
}
