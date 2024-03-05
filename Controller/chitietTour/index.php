<?php 
if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = '';
}

switch($action){
    case 'xem-tour':{
        require_once('View/chitietTour/chitietTour.php');
    }
    case 'book-tour':{
        if (isset($_REQUEST['buy-now'])) {
            // Xử lý khi người dùng nhấn nút "Mua ngay"
            $date = $_REQUEST['datePhp'];
            $totalPrice = $_REQUEST['totalMoneyphp'];
            $hoten = $_REQUEST['hoTen'];
            $email = $_REQUEST['email'];
            $sdt = $_REQUEST['sodienthoai'];
            $diachi = $_REQUEST['diachi'];
            $note = $_REQUEST['note-book-tour'];
            $db->InsertOrder(1, 1, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, 1);
            header("Location: /View/chitietTour/chitietTour.php");
            exit();
        } 
        break;
    }
    case 'send-cmt':{
        if (isset($_REQUEST['send-cmt'])) {
            $cmt = $_REQUEST['text-cmt'];
            $currentDate = date("Y-m-d H:i:s");
            $star = $_REQUEST['rating'];
            $db->InsertCmt(1, 1, $cmt, $currentDate, $star);
            header("Location: /View/chitietTour/chitietTour.php");
            exit();
        }
    }
    case 'add-cart':{
        if (isset($_REQUEST['add-cart'])) {
            // Xử lý khi người dùng nhấn nút "Thêm vào giỏ hàng"
            $numTicket = $_REQUEST['numTicketphp'];
            $db->InsertCart(1, 1, $numTicket, 1);
            header("Location: /View/chitietTour/chitietTour.php");
        } 
    }
}
?>