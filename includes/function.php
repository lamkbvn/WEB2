<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $content)
{
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
		$mail->isSMTP();                                            //Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'duylam46821379@gmail.com';                     //SMTP username
		$mail->Password   = 'toek wzyl odit fdqc';                               //SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		//Recipients
		$mail->setFrom('duylam468213@gmail.com', 'Klook');
		$mail->addAddress($to);     //Add a recipient

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = '<div class="discount" style="
		width: 380px;
		height: 110px;
		flex-shrink: 0;
		border: 1px solid #ccc;
		padding: 10px;
		border-radius: 10px;
	">
<div class="discount--inner" style="
			display: flex;
			justify-content: center;
			align-items: center;
		">
	<div class="discount--left" style="
				width: 239px;
				height: 92px;
				border-radius: 10px;
				background-color: pink;
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
			">
		<p class="discount--heading" style="
					color: #fff;
					font-size: 20px;
					font-weight: 700;
					height: 30px;
				">
			Tặng 500.000đ đặt h...
		</p>
		<p class="discount--desc" style="
					color: #fff;
					font-size: 12px;
					font-weight: 400;
					margin-top: -30px;
				">
			Giảm 8% tối đa 500,000đ cho đơn từ 1tr. Áp dụn... Xem
			thêm
		</p>
	</div>

	<div class="discount--right" style="">
		<div class="discount--pass" style="">Mã ưu đãi</div>
		<div class="discount--title" style="">NAPLANDAU</div>
		<button class="discount--btn" style="">Sử dụng</button>
	</div>
</div>
</div>';

		$mail->SMTPDebug = 0; // Change to 0 or false to disable debugging

		$mail->send();
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
