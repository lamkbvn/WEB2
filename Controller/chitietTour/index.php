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
        } 
        break;
    }
}
?>