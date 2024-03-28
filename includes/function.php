<!-- <link rel="stylesheet" href="css/icons/header-01.webp"> -->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject)
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
		$mail->Body    = '
		<div class="explorer-collection" style="width: 100%; background-color: #f9f9f9; text-align: center;">
    <div class="container" style="display: inline-block; vertical-align: middle; padding: 5px;">
        <div class="explorer-collection--inner">
            <h1 class="explorer-collection--heading" style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Khám phá thế giới dễ dàng hơn với ứng dụng Klook!</h1>
            <h2 style="font-size: 16px; font-weight: 500;">Bạn có thể đặt trải nghiệm bất cứ lúc nào, lên kế hoạch du lịch từ bất cứ đâu và tận hưởng ưu đãi chỉ có trên ứng dụng.</h2>
            <div class="explorer-collection--block" style="text-align: center;">
                <div style="margin-bottom: 20px;" font-weight: 400;>
                    <h3 style="font-size: 16px; ">Tải ứng dụng</h3>
                    <img style="width: 600px;" src="https://res.klook.com/image/upload/v1669770702/ued/platform/OTA/email_usp_01.jpg" alt="Tải ứng dụng" style="max-width: 100%;">
                </div>
                <div style="margin-bottom: 20px; font-weight: 400;">
                    <h3 style="font-size: 16px;">Tận hưởng nhiều ưu đãi hấp dẫn</h3>
                    <img style="width: 600px;" src="https://ci3.googleusercontent.com/meips/ADKq_NZA_dfzMVUJbQeC-puQfxl290tVx8KHzewcpdhiNc-QTJwnfDkL4UlMUOgvzorpUVE7l79p2FHkv_wCJdiUnX_jcuo3jSd3KUH8iC86VU-lUURqipMpVlckNQilOJY9Z1oX6qomYg=s0-d-e1-ft#https://res.klook.com/image/upload/v1669770702/ued/platform/OTA/email_usp_04.jpg" alt="Tận hưởng nhiều ưu đãi hấp dẫn" style="max-width: 100%;">
                </div>
                <div>
                    <h3 style="font-size: 16px; font-weight: 400;">Chuyến du lịch hoàn hảo trong tầm tay bạn</h3>
                    <img style="width: 600px;" src="https://ci3.googleusercontent.com/meips/ADKq_NbmV6MLGYRxfu2R8ynZFPFJwiNNGJxaZ-TqkfHkD1TEycwmUUjh9LnjhZ8lgItXFJOiq6lWdOU4vdN4RJn45rttXG3P1b50FDeMDEJJtks9PyjI3A7zT0t73hiz0o-08Fg_jwJbPA=s0-d-e1-ft#https://res.klook.com/image/upload/v1669770702/ued/platform/OTA/email_usp_02.jpg" alt="Chuyến du lịch hoàn hảo trong tầm tay bạn" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </div>
</div>



	
	';

		$mail->SMTPDebug = 0; // Change to 0 or false to disable debugging

		$mail->send();
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}
