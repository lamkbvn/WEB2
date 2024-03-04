<?php 
// if(isset($_COOKIE['id_user'])) { // lấy id user đang đăng nhập
//     // Lấy giá trị của cookie
//     $id_user = $_COOKIE['id_user'];
// } 


if (isset($_REQUEST['send-cmt'])) {
    $con = mysqli_connect("localhost","root","");
	if (!$con)
	{
		die('Could not connect: ');
    } 
    mysqli_select_db($con, "web_tour");
    // Xử lý khi người dùng nhấn nút "Mua ngay"
    $cmt = $_REQUEST['text-cmt'];
    $currentDate = date("Y-m-d H:i:s");
    $star = $_REQUEST['rating'];
    mysqli_query($con, "INSERT INTO feedback_travelplace (user_id, product_id, note, create_at, num_star)
    VALUES ('1', '1', '$cmt', '$currentDate', '$star')");
    mysqli_close($con);
    header("Location: /View/index.php");
    exit();
}
?>