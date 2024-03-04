<?php 
// if(isset($_COOKIE['id_user'])) { // lấy id user đang đăng nhập
//     // Lấy giá trị của cookie
//     $id_user = $_COOKIE['id_user'];
// } 
// mở kết nối
$con = mysqli_connect("localhost","root","");
if (!$con)
{
    die('Could not connect: ');
} 
mysqli_select_db($con, "web_tour");
if (isset($_REQUEST['buy-now'])) {
    // Xử lý khi người dùng nhấn nút "Mua ngay"
    $date = $_REQUEST['datePhp'];
    $totalPrice = $_REQUEST['totalMoneyphp'];
    $hoten = $_REQUEST['hoTen'];
    $email = $_REQUEST['email'];
    $sdt = $_REQUEST['sodienthoai'];
    $diachi = $_REQUEST['diachi'];
    $note = $_REQUEST['note-book-tour'];
    mysqli_query($con, "INSERT INTO orders (id_user, order_method_id, fullname, email, phone_number, address, note, date_order, total_money, status, id_discount)
    VALUES ( '1', '1', '$hoten', '$email', '$sdt', '$diachi', '$note', '$date', '$totalPrice','1', '1' )");
    $current_host = $_SERVER['HTTP_HOST'];
    header ("Location:/View/chitietTour.php");
}  
if (isset($_REQUEST['add-cart'])) {
    // Xử lý khi người dùng nhấn nút "Thêm vào giỏ hàng"
    $numTicket = $_REQUEST['numTicketphp'];
    mysqli_query($con, "INSERT INTO cart (id_user, id_product,amount, status)
    VALUES ('1', '1', '$numTicket', '1' )");
    $current_host = $_SERVER['HTTP_HOST'];
    header ("Location:/View/chitietTour.php");
} 
mysqli_close($con);
?>