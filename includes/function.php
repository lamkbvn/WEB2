<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($to, $subject, $code)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'duylam46821379@gmail.com';                     //SMTP username
        $mail->Password = 'toek wzyl odit fdqc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('duylam468213@gmail.com', 'Klook');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $code;
        $mail->Body = '
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
                <p style="font-size: 16px; font-weight: 400;">Mã ưu đãi: ' . $code . '</p> 
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

function sendMailForgot($to, $idNguoiDung)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'duylam46821379@gmail.com';                     //SMTP username
        $mail->Password = 'toek wzyl odit fdqc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('duylam468213@gmail.com', 'Klook');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $mail->Subject = mb_encode_mimeheader('[Klook] Đặt lại mật khẩu', 'UTF-8');
        $mail->Body = '<div class="email-send-fogotpassword" style="background-color: #fff; padding: 20px">
		<svg xmlns="http://www.w3.org/2000/svg" width="115" height="32" viewBox="0 0 115 32"><g id="logo-icon"><path d="M2.54763 8.36536C3.06015 8.61137 3.59026 8.82129 4.13396 8.99281C5.30016 9.3607 5.46157 9.20603 4.95716 8.16962C4.74383 7.73129 4.50605 7.30996 4.24603 6.9069C3.73787 6.11922 3.39541 5.82966 2.58517 6.51148C2.42393 6.64717 2.27315 6.79368 2.13362 6.94961C1.64432 7.49646 1.65049 7.93473 2.54763 8.36536Z" fill="#FF5B00"></path> <path d="M14.1387 30.6133C13.9381 30.042 13.697 29.4846 13.4164 28.9461C12.8147 27.7909 12.5758 27.7861 12.1718 28.948C12.001 29.4393 11.8614 29.9363 11.7525 30.4362C11.5397 31.4131 11.579 31.8893 12.7068 31.9844C12.9312 32.0033 13.1559 32.0062 13.3793 31.9935C14.1627 31.9489 14.4898 31.6134 14.1387 30.6133Z" fill="#4D40CA"></path> <path d="M29.9921 22.1916C29.5357 21.6588 29.1166 21.0934 28.739 20.4994C27.9292 19.2255 28.0621 18.9832 29.4582 19.2528C30.0487 19.3668 30.6266 19.5154 31.1899 19.6965C32.2907 20.0503 32.7449 20.3662 32.1901 21.552C32.0797 21.788 31.9531 22.015 31.8116 22.2316C31.3156 22.991 30.7912 23.1243 29.9921 22.1916Z" fill="#00CBD0"></path> <path d="M22.4408 1.98794C22.0369 2.33178 21.6084 2.64744 21.1582 2.93187C20.1926 3.54195 20.009 3.44178 20.2133 2.39013C20.2997 1.94537 20.4124 1.50999 20.5496 1.08569C20.8178 0.2565 21.0572 -0.0856586 21.956 0.332238C22.1349 0.4154 22.3069 0.510793 22.4711 0.617347C23.0467 0.991023 23.1477 1.38605 22.4408 1.98794Z" fill="#FFC200"></path> <path d="M5.42233 21.2638C0.93364 23.938 -0.367496 20.5653 0.0845712 16.146C0.792365 9.2268 5.42233 9.10795 7.59725 14.0515C8.91167 17.0392 8.41049 19.4836 5.42233 21.2638Z" fill="#00CBD0"></path> <path d="M10.6485 26.0616C10.6485 26.811 10.6177 27.5533 10.5574 28.2872C10.4335 29.7926 9.45576 31.049 7.46783 29.7926C6.65317 29.2777 5.88662 28.6937 5.17642 28.0488C3.53171 26.5552 3.11245 25.1077 5.17642 23.3024C5.6975 22.8466 6.23639 22.4107 6.79193 21.9958C9.37625 20.0658 10.3777 21.3717 10.5759 24.0743C10.624 24.7305 10.6485 25.3932 10.6485 26.0616Z" fill="#FF5B00"></path> <path d="M25.6517 24.6001C24.0483 23.2415 22.3469 21.9943 20.5596 20.8704C16.726 18.4598 15.9969 18.8556 16.8081 23.0109C17.1512 24.7683 17.5985 26.4886 18.1434 28.1651C19.2081 31.4414 20.1587 32.7933 23.7271 31.1421C24.4373 30.8135 25.1203 30.4366 25.772 30.0156C28.0574 28.5391 28.4584 26.9783 25.6517 24.6001Z" fill="#FFC200"></path> <path d="M23.7952 7.67218C23.3049 8.31326 22.8329 8.96882 22.3797 9.6381C19.6944 13.6037 19.9603 13.7517 23.7952 15.4257C25.1767 16.0289 26.5971 16.5603 28.0514 17.0154C33.3695 18.6794 34.1829 16.8212 32.6334 12.2089C32.1916 10.8938 31.5799 9.65613 30.8244 8.52163C28.4711 4.98797 26.5415 4.08062 23.7952 7.67218Z" fill="#FF5B00"></path> <path d="M15.4106 0.0412101C14.0773 0.169808 12.7917 0.461057 11.574 0.894807C8.25614 2.07667 8.74808 3.46615 10.576 6.12C10.9533 6.66782 11.3431 7.20642 11.7451 7.73538C13.8749 10.5385 14.4369 11.1585 16.165 7.18391C16.7289 5.88706 17.23 4.55679 17.6646 3.19692C18.4003 0.894806 18.2869 -0.236201 15.4106 0.0412101Z" fill="#4D40CA"></path></g> <g id="logo-en"><path xmlns="http://www.w3.org/2000/svg" d="M110.033 11.2082L105.034 16.6937L105.033 5.86887C105.033 5.49526 104.658 5.23652 104.308 5.36831L101.74 6.33195C101.531 6.41054 101.393 6.61003 101.393 6.8325V24.8478C101.393 25.144 101.634 25.3834 101.929 25.3834H104.497C104.794 25.3834 105.034 25.1428 105.034 24.8478V19.1155L110.366 25.1996C110.468 25.3157 110.614 25.3822 110.77 25.3822H114.126C114.589 25.3822 114.834 24.8369 114.527 24.4923L108.583 17.8146L114.057 11.9324C114.376 11.5902 114.132 11.0328 113.665 11.0328H110.429C110.279 11.0328 110.135 11.0969 110.033 11.2082Z" class="logo-en-fill"></path> <path d="M91.1668 25.8527C87.0009 25.8527 83.6133 22.3317 83.6133 18.0026C83.6133 13.908 86.8803 10.7007 91.0499 10.7007C95.4265 10.7007 98.6034 13.8862 98.6034 18.2773C98.6034 22.6684 95.4765 25.8527 91.1668 25.8527ZM91.2801 22.463C93.452 22.463 95.0282 20.7493 95.0282 18.3903C95.0282 15.8818 93.4861 14.1304 91.2801 14.1304C88.9852 14.1304 87.3833 15.821 87.3833 18.242C87.3833 20.6485 89.0595 22.463 91.2801 22.463Z" class="logo-en-fill"></path> <path d="M73.9871 25.8527C69.8224 25.8527 66.4336 22.3317 66.4336 18.0026C66.4336 13.908 69.7006 10.7007 73.8702 10.7007C78.2481 10.7007 81.4249 13.8862 81.4249 18.2773C81.4249 22.6684 78.2968 25.8527 73.9871 25.8527ZM74.1004 22.463C76.2723 22.463 77.8485 20.7493 77.8485 18.3903C77.8485 15.8818 76.3064 14.1304 74.1004 14.1304C71.8055 14.1304 70.2037 15.821 70.2037 18.242C70.2037 20.6874 71.842 22.463 74.1004 22.463Z" class="logo-en-fill"></path> <path d="M60.0078 24.9472L60.0285 6.82125C60.0285 6.59762 60.1674 6.39709 60.3781 6.31809L62.9045 5.37132C63.2577 5.23884 63.6341 5.50015 63.6329 5.87569L63.6049 24.9484C63.6049 25.245 63.3637 25.4856 63.0653 25.4856H60.5462C60.249 25.4856 60.0078 25.2438 60.0078 24.9472Z" class="logo-en-fill"></path> <path d="M52.9732 11.2082L47.9745 16.6937L47.9733 5.86887C47.9733 5.49526 47.5988 5.23652 47.2486 5.36831L44.6808 6.33195C44.4712 6.41054 44.333 6.61003 44.333 6.8325V24.8478C44.333 25.144 44.5742 25.3834 44.8698 25.3834H47.4377C47.7346 25.3834 47.9745 25.1428 47.9745 24.8478V19.1155L53.3065 25.1996C53.4082 25.3157 53.5549 25.3822 53.71 25.3822H57.0667C57.5296 25.3822 57.7744 24.8369 57.4678 24.4923L51.5239 17.8146L56.9976 11.9324C57.3163 11.5902 57.0728 11.0328 56.605 11.0328H53.3695C53.2192 11.0328 53.075 11.0969 52.9732 11.2082Z" class="logo-en-fill"></path></g> <!----></svg>
        <h2>Xin chào,</h2><br>

        <p>
            Đặt lại mật khẩu thật đơn giản - Chỉ cần nhấn vào nút bên dưới! Email này có hiệu lực trong 30 phút.
        </p>
		<a href="http://localhost/WEB2/index.php?controller=trang-chu&action=resetPassword&idNguoiDung=' . $idNguoiDung . '">
		
		<button style=" border-radius: 12px;
            background-color: #ff5b00;
            border: 1px solid #ff5b00;
            color: #fff;
            font-size: 16px;
            font-stretch: normal;
            font-style: normal;
            font-weight: 600;
            line-height: 22px;
            margin-top: 30px;
            min-width: 100px;
            outline: none;
            overflow: hidden;
            padding: 10px 16px;
            text-align: center;
            text-decoration: none;
            text-transform: none;
            width: 200px;
            cursor: pointer;
            text-decoration: none;
            ">Đặt lại mật khẩu</button>
        </a>
        <p style="color: #b0a49d; font-size: 14px; padding-top: 30px;">
            Nếu bạn không gửi yêu cầu đặt lại mật khẩu, có thể email này đã bị gửi nhầm - Bạn có thể bỏ qua email này.
        </p>

        <p style="padding-top: 30px;">
            Cảm ơn,<br>
            Klook
        </p>

    </div>';

        $mail->SMTPDebug = 0; // Change to 0 or false to disable debugging

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
function sendMailUpdateOrder($to, $idOrder, $oldStatus, $newStatus, $listOrderDetail, $totalAllMoney)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'duylam46821379@gmail.com';                     //SMTP username
        $mail->Password = 'toek wzyl odit fdqc';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';
        
        //Recipients
        $mail->setFrom('duylam468213@gmail.com', 'Klook');
        $mail->addAddress($to);     //Add a recipient

        //Content
        $mail->isHTML(true);
        
        // Generate table content
        $subject_content_table = '';
        $stt = 1;
        foreach ($listOrderDetail as $value) {
                    $dbbbb = new Database();
                    $dbbbb->connect();
                    $result = $dbbbb->GetImgProduct($value['id_product']);
                    $row = mysqli_fetch_array($result);
                    $numImg = mysqli_num_rows($result);
                    if($numImg>0) {
                            $imageData = $row['image'];
                            $url = 'data:image/jpeg;base64,' . base64_encode($imageData);
                    }
                    else {
                            $url = "images/no_image.gif";
                    }
            $subject_content_table .= '
            <tr class="table-row" style="border: 1px solid #333;">
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . $stt++ . '</td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">
                <img src="' . $url . '" alt="" class="img-product-detail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px" />
                </td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . $value["title"] . '</td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . $value["price"] . ' vnđ</td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . $value["amount"] . '</td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . number_format($value["total_money"], 0, ",", ".") . ' vnđ</td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . $value["discount_name"] . '</td>
                <td class="table-cell id" style="border: 1px solid #333; padding: 5px">' . $value["date_go"] . '</td>
            </tr>
            ';
        }
        $subject_content_table .= '
    <tr>
        <td colspan="8" style="border: 1px solid #333; padding: 5px"> Tổng tiền cuối: <span style="font-weight: 600">' . number_format($totalAllMoney, 0, ",", ".")  . ' vnđ</span></td>
    </tr>';
        
        // Email content
        $subject_content = "[Klook] Cập nhật trạng thái đơn hàng [# " . $idOrder . "]";
        $subject_content_body_inform = "Chúng tôi xin thông báo với bạn rằng đơn hàng của bạn với mã số [# " . $idOrder . " ] đã được cập nhật trạng thái mới như sau: ";
        
        switch ($oldStatus) {
            case 1:
                $subject_content_body_status_before = "Trạng thái trước đó: <span style='font-weight: 600'>chờ xác nhận</span>";
                break;
            case 2:
                $subject_content_body_status_before = "Trạng thái trước đó: <span style='font-weight: 600'>đã xác nhận</span>";
                break;
            case 3:
                $subject_content_body_status_before = "Trạng thái trước đó: <span style='font-weight: 600'>đang thực hiện tour</span>";
                break;
            case 4:
                $subject_content_body_status_before = "Trạng thái trước đó: <span style='font-weight: 600'>đã hoàn thành</span>";
                break;
            case 5:
                $subject_content_body_status_before = "Trạng thái trước đó: <span style='font-weight: 600'>đã huỷ bỏ</span>";
                break;
            default:
                $subject_content_body_status_before = "Trạng thái trước đó: <span style='font-weight: 600'>Unknown status</span>";
                break;
        }
        
        switch ($newStatus) {
            case 1:
                $subject_content_body_status_after = "Trạng thái mới: <span style='font-weight: 600'>chờ xác nhận</span>";
                break;
            case 2:
                $subject_content_body_status_after = "Trạng thái mới: <span style='font-weight: 600'>đã xác nhận</span>";
                break;
            case 3:
                $subject_content_body_status_after = "Trạng thái mới: <span style='font-weight: 600'>đang thực hiện tour</span>";
                break;
            case 4:
                $subject_content_body_status_after = "Trạng thái mới: <span style='font-weight: 600'>đã hoàn thành</span>";
                break;
            case 5:
                $subject_content_body_status_after = "Trạng thái mới: <span style='font-weight: 600'>đã huỷ bỏ</span>";
                break;
        }
        
        $mail->Subject = mb_encode_mimeheader($subject_content, 'UTF-8');

        $mail->Body = '<div class="email-send-fogotpassword" style="background-color: #fff; padding: 20px">
		<svg xmlns="http://www.w3.org/2000/svg" width="115" height="32" viewBox="0 0 115 32"><g id="logo-icon"><path d="M2.54763 8.36536C3.06015 8.61137 3.59026 8.82129 4.13396 8.99281C5.30016 9.3607 5.46157 9.20603 4.95716 8.16962C4.74383 7.73129 4.50605 7.30996 4.24603 6.9069C3.73787 6.11922 3.39541 5.82966 2.58517 6.51148C2.42393 6.64717 2.27315 6.79368 2.13362 6.94961C1.64432 7.49646 1.65049 7.93473 2.54763 8.36536Z" fill="#FF5B00"></path> <path d="M14.1387 30.6133C13.9381 30.042 13.697 29.4846 13.4164 28.9461C12.8147 27.7909 12.5758 27.7861 12.1718 28.948C12.001 29.4393 11.8614 29.9363 11.7525 30.4362C11.5397 31.4131 11.579 31.8893 12.7068 31.9844C12.9312 32.0033 13.1559 32.0062 13.3793 31.9935C14.1627 31.9489 14.4898 31.6134 14.1387 30.6133Z" fill="#4D40CA"></path> <path d="M29.9921 22.1916C29.5357 21.6588 29.1166 21.0934 28.739 20.4994C27.9292 19.2255 28.0621 18.9832 29.4582 19.2528C30.0487 19.3668 30.6266 19.5154 31.1899 19.6965C32.2907 20.0503 32.7449 20.3662 32.1901 21.552C32.0797 21.788 31.9531 22.015 31.8116 22.2316C31.3156 22.991 30.7912 23.1243 29.9921 22.1916Z" fill="#00CBD0"></path> <path d="M22.4408 1.98794C22.0369 2.33178 21.6084 2.64744 21.1582 2.93187C20.1926 3.54195 20.009 3.44178 20.2133 2.39013C20.2997 1.94537 20.4124 1.50999 20.5496 1.08569C20.8178 0.2565 21.0572 -0.0856586 21.956 0.332238C22.1349 0.4154 22.3069 0.510793 22.4711 0.617347C23.0467 0.991023 23.1477 1.38605 22.4408 1.98794Z" fill="#FFC200"></path> <path d="M5.42233 21.2638C0.93364 23.938 -0.367496 20.5653 0.0845712 16.146C0.792365 9.2268 5.42233 9.10795 7.59725 14.0515C8.91167 17.0392 8.41049 19.4836 5.42233 21.2638Z" fill="#00CBD0"></path> <path d="M10.6485 26.0616C10.6485 26.811 10.6177 27.5533 10.5574 28.2872C10.4335 29.7926 9.45576 31.049 7.46783 29.7926C6.65317 29.2777 5.88662 28.6937 5.17642 28.0488C3.53171 26.5552 3.11245 25.1077 5.17642 23.3024C5.6975 22.8466 6.23639 22.4107 6.79193 21.9958C9.37625 20.0658 10.3777 21.3717 10.5759 24.0743C10.624 24.7305 10.6485 25.3932 10.6485 26.0616Z" fill="#FF5B00"></path> <path d="M25.6517 24.6001C24.0483 23.2415 22.3469 21.9943 20.5596 20.8704C16.726 18.4598 15.9969 18.8556 16.8081 23.0109C17.1512 24.7683 17.5985 26.4886 18.1434 28.1651C19.2081 31.4414 20.1587 32.7933 23.7271 31.1421C24.4373 30.8135 25.1203 30.4366 25.772 30.0156C28.0574 28.5391 28.4584 26.9783 25.6517 24.6001Z" fill="#FFC200"></path> <path d="M23.7952 7.67218C23.3049 8.31326 22.8329 8.96882 22.3797 9.6381C19.6944 13.6037 19.9603 13.7517 23.7952 15.4257C25.1767 16.0289 26.5971 16.5603 28.0514 17.0154C33.3695 18.6794 34.1829 16.8212 32.6334 12.2089C32.1916 10.8938 31.5799 9.65613 30.8244 8.52163C28.4711 4.98797 26.5415 4.08062 23.7952 7.67218Z" fill="#FF5B00"></path> <path d="M15.4106 0.0412101C14.0773 0.169808 12.7917 0.461057 11.574 0.894807C8.25614 2.07667 8.74808 3.46615 10.576 6.12C10.9533 6.66782 11.3431 7.20642 11.7451 7.73538C13.8749 10.5385 14.4369 11.1585 16.165 7.18391C16.7289 5.88706 17.23 4.55679 17.6646 3.19692C18.4003 0.894806 18.2869 -0.236201 15.4106 0.0412101Z" fill="#4D40CA"></path></g> <g id="logo-en"><path xmlns="http://www.w3.org/2000/svg" d="M110.033 11.2082L105.034 16.6937L105.033 5.86887C105.033 5.49526 104.658 5.23652 104.308 5.36831L101.74 6.33195C101.531 6.41054 101.393 6.61003 101.393 6.8325V24.8478C101.393 25.144 101.634 25.3834 101.929 25.3834H104.497C104.794 25.3834 105.034 25.1428 105.034 24.8478V19.1155L110.366 25.1996C110.468 25.3157 110.614 25.3822 110.77 25.3822H114.126C114.589 25.3822 114.834 24.8369 114.527 24.4923L108.583 17.8146L114.057 11.9324C114.376 11.5902 114.132 11.0328 113.665 11.0328H110.429C110.279 11.0328 110.135 11.0969 110.033 11.2082Z" class="logo-en-fill"></path> <path d="M91.1668 25.8527C87.0009 25.8527 83.6133 22.3317 83.6133 18.0026C83.6133 13.908 86.8803 10.7007 91.0499 10.7007C95.4265 10.7007 98.6034 13.8862 98.6034 18.2773C98.6034 22.6684 95.4765 25.8527 91.1668 25.8527ZM91.2801 22.463C93.452 22.463 95.0282 20.7493 95.0282 18.3903C95.0282 15.8818 93.4861 14.1304 91.2801 14.1304C88.9852 14.1304 87.3833 15.821 87.3833 18.242C87.3833 20.6485 89.0595 22.463 91.2801 22.463Z" class="logo-en-fill"></path> <path d="M73.9871 25.8527C69.8224 25.8527 66.4336 22.3317 66.4336 18.0026C66.4336 13.908 69.7006 10.7007 73.8702 10.7007C78.2481 10.7007 81.4249 13.8862 81.4249 18.2773C81.4249 22.6684 78.2968 25.8527 73.9871 25.8527ZM74.1004 22.463C76.2723 22.463 77.8485 20.7493 77.8485 18.3903C77.8485 15.8818 76.3064 14.1304 74.1004 14.1304C71.8055 14.1304 70.2037 15.821 70.2037 18.242C70.2037 20.6874 71.842 22.463 74.1004 22.463Z" class="logo-en-fill"></path> <path d="M60.0078 24.9472L60.0285 6.82125C60.0285 6.59762 60.1674 6.39709 60.3781 6.31809L62.9045 5.37132C63.2577 5.23884 63.6341 5.50015 63.6329 5.87569L63.6049 24.9484C63.6049 25.245 63.3637 25.4856 63.0653 25.4856H60.5462C60.249 25.4856 60.0078 25.2438 60.0078 24.9472Z" class="logo-en-fill"></path> <path d="M52.9732 11.2082L47.9745 16.6937L47.9733 5.86887C47.9733 5.49526 47.5988 5.23652 47.2486 5.36831L44.6808 6.33195C44.4712 6.41054 44.333 6.61003 44.333 6.8325V24.8478C44.333 25.144 44.5742 25.3834 44.8698 25.3834H47.4377C47.7346 25.3834 47.9745 25.1428 47.9745 24.8478V19.1155L53.3065 25.1996C53.4082 25.3157 53.5549 25.3822 53.71 25.3822H57.0667C57.5296 25.3822 57.7744 24.8369 57.4678 24.4923L51.5239 17.8146L56.9976 11.9324C57.3163 11.5902 57.0728 11.0328 56.605 11.0328H53.3695C53.2192 11.0328 53.075 11.0969 52.9732 11.2082Z" class="logo-en-fill"></path></g> <!----></svg>
        <h2 style="color: #212121">Kính gửi Quý khách hàng,</h2><br>

        <p style="color: #212121; font-size: 16px">
        Chúng tôi xin gửi lời cảm ơn chân thành đến Quý khách hàng đã tin tưởng và sử dụng dịch vụ của chúng tôi. Chúng tôi mong muốn rằng bạn đang có một trải nghiệm du lịch thú vị và đáng nhớ.
        </p>
        <p style="color: #212121; font-size: 16px">
            ' .$subject_content_body_inform .'
        </p>

        <p style="color: #212121; font-size: 16px"> ' .$subject_content_body_status_before . '</p>
        <p style="color: #212121; font-size: 16px"> ' .$subject_content_body_status_after . '</p>

        <table id="tableData" class="custom-table" style="border: 1px solid #ccc; border-collapse: collapse; padding: 5px">
                <thead class="table-head">
                    <tr class="table--head">
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">STT</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Hình sản phẩm</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Tên sản phẩm</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Giá sản phẩm</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Số lượng</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Tổng tiền</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Tên vocher</th>
                        <th class="table-header" style="border: 1px solid #333; padding: 5px">Ngày đi</th>
                    </tr>
                </thead>
                <tbody>
                    '. $subject_content_table .'
                </tbody>
            </table>


        <p style="color: #212121; font-size: 16px">
        Chúng tôi luôn sẵn lòng hỗ trợ bạn và mong rằng bạn sẽ tiếp tục tận hưởng chuyến đi của mình. Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ bổ sung, vui lòng liên hệ với chúng tôi qua email hoặc số điện thoại dưới đây.
        </p>

        <p style="color: #212121; font-size: 16px">
        Xin chân thành cảm ơn,
        </p>

        <p style="padding-top: 30px; color: #212121; font-size: 16px">
            Cảm ơn,<br>
            Klook
        </p>

    </div>';
        $mail->SMTPDebug = 0; // Change to 0 or false to disable debugging

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


