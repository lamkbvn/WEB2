<?php 

if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = '';
}
    
include ("../../Model/DBConfig.php");
$db = new DBConfig();
$db->connect();
require_once('../../View/chitietTour/chitietTour.php');
switch($action){
    case 'book-tour':{
        if (isset($_REQUEST['buy-now'])) {
            // Xử lý khi người dùng nhấn nút "Mua ngay"
            //date này là date book tour
            $dateBook = $_REQUEST['datePhp'];
            //date này là ngày mua
            $date = date('y-m-d');
            $totalPrice = $_REQUEST['totalMoneyphp'];
            $hoten = $_REQUEST['hoTen'];
            $email = $_REQUEST['email'];
            $sdt = $_REQUEST['sodienthoai'];
            $diachi = $_REQUEST['diachi'];
            $note = $_REQUEST['note-book-tour'];
            $id = date('dmyHis');
            $db->InsertOrder($id, 1, 1, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, 1);
            //nếu muốn dùng idOrder để truyền vào DetailOrder thì dùng biến id này
            echo "<script>window.location.href='../chitietTour/index.php';</script>";
            // exit();
        } 
        break;
    }
    case 'send-cmt':{
        if (isset($_REQUEST['send-cmt'])) {
            $cmt = $_REQUEST['text-cmt'];
            $currentDate = date("Y-m-d H:i:s");
            $star = $_REQUEST['rating'];
            $db->InsertCmt(1, 1, $cmt, $currentDate, $star);
            echo "<script>window.location.href='../chitietTour/index.php';</script>";
            // exit();
        }
        break;
    }
    case 'add-cart':{
        if (isset($_REQUEST['add-cart'])) {
            // Xử lý khi người dùng nhấn nút "Thêm vào giỏ hàng"
            $numTicket = $_REQUEST['numTicketphp'];
            $db->InsertCart(1, 1, $numTicket, 1);
            // echo "<script>window.location.href='../chitietTour/index.php';</script>";
            // exit();
        }
        break;
    }
}
?>