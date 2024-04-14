<?php 

if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
} else {
    $action = '';
}
session_start();
if (isset($_SESSION['idUserLogin'])) {
    $idUser = $_SESSION['idUserLogin'];
}     
include ("../../Model/DBConfig.php");
$db = new Database();
$db->connect();
require_once('../../View/User/chitietTour/chitietTour.php');
switch($action){
    case 'book-tour':{
        if (isset($_REQUEST['buy-now'])&& isset($_REQUEST['id'])) {
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
            $soLuong = $_REQUEST['numTicketphp'];
            $id = date('dmyHis');
            $idPro = $_REQUEST['id'];
            $idVoucher = $_REQUEST['idVoucher'];
            $db->InsertOrder($id, $idUser, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, 1);
            $db->InsertDetailOrder($id, $idPro, $rowTour['price'], $soLuong, $totalPrice,  $dateBook);
            if($idVoucher != 0) $db->XoaVoucherKhiAddMa($idVoucher, $idUser);
            //nếu muốn dùng idOrder để truyền vào DetailOrder thì dùng biến id này
            echo "<script>window.location.href='../chitietTour/buyTour.php?id=$idPro';</script>";
            // exit();
        } 
        break;
    }
    case 'send-cmt':{
        if (isset($_REQUEST['send-cmt']) && isset($_REQUEST['id'])) {
            $cmt = $_REQUEST['text-cmt'];
            $currentDate = date("Y-m-d H:i:s");
            $star = $_REQUEST['rating'];
            $idPro = $_REQUEST['id'];
            $db->InsertCmt($idUser, $idPro, $cmt, $currentDate, $star);
            $db->updateStarOfTour(1);
            echo "<script>window.location.href='../chitietTour/buyTour.php?id=$idPro';</script>";
            // exit();
        }
        break;
    }
    case 'add-cart':{
        
        if (isset($_REQUEST['add-cart'])) {
            if(isset($_REQUEST['id'])){
                // echo "<script>alert('a');</script>";
                $idPro = $_REQUEST['id'];
                $numTicket = $_REQUEST['numTicketphp'];
                $db->InsertCart($idUser, $idPro, $numTicket, 1);
            }
            // Xử lý khi người dùng nhấn nút "Thêm vào giỏ hàng"
            
            // echo "<script>window.location.href='../chitietTour/index.php';</script>";
            // exit();
        }
        break;
    }
}
$db->disconnect();
?>