<?php
include "../../Model/DBConfig.php";

// Instantiate DBConfig
$db = new DBConfig();
$db->connect();

// Handle different actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'dsbl':
            displayFeedback();
            break;
        case 'xoabl':
            deleteFeedback();
            break;

        case 'dsvoucher':
            displayVouchers();
            break;
        case 'xoavoucher':
            deleteVoucher();
            break;
        case 'suavoucher':
            editVoucher();
            break;
        case 'themvoucher':
            addVoucher();
            break;
        case 'capnhatvoucher':
            updateVoucher();
            break;
        default:
            echo "<h2>Chào mừng đến trang admin!</h2>";
            break;
    }
}

// Function to display feedback
function displayFeedback() {
    global $db;
    $sql = "SELECT feedback.*, nguoidung.*, product.* 
            FROM feedback 
            JOIN nguoidung  ON feedback.user_id = nguoidung.id
            JOIN product  ON feedback.product_id = product.id
            ORDER BY feedback.id DESC";
    $result = $db->execute($sql);
    $listbinhluan = $db->getAllData();
    include "list_feedback.php";
}


// Function to display vouchers
function displayVouchers() {
    global $db;
    $sql = "SELECT * FROM discount order by id desc";
    $result = $db->execute($sql);
    $listvoucher = $db->getAllData();
    include "list_voucher.php";
}

// Function to edit voucher
function editVoucher() {
    global $db;
    if(isset($_GET['id']) && $_GET['id'] > 0){
         
        $voucherId = $_GET['id'];

        $voucherDetails = $db->getVoucherDetailsById($voucherId);
    }
    include "editVoucher.php";

}

// Function to delete feedback
function deleteFeedback() {
    global $db;
    if(isset($_GET['id']) && $_GET['id'] > 0){
        $commentId = $_GET['id'];
        $result = $db->deleteComment($commentId);
        if($result) {
            displayFeedback(); 
        }
    }
}

// Function to delete voucher
function deleteVoucher() {
    global $db;
    if(isset($_GET['id']) && $_GET['id'] > 0){
        $voucherId = $_GET['id'];
        $result = $db->deleteVoucher($voucherId);
        if($result) {
            displayVouchers(); 
        }
    }
}

$alert;

function addVoucher() {
    global $db;
    if(isset($_POST['btnadd'])&&($_POST['btnadd'])){
        $ten_voucher= $_POST['ten_voucher'];
        $ma_voucher=$_POST['ma_voucher'];
        $gia_tri=$_POST['gia_tri'];
        $ngay_bat_dau=$_POST['ngay_bat_dau'];
        $ngay_ket_thuc=$_POST['ngay_ket_thuc'];
        $mo_ta=$_POST['mo_ta'];
         
        if($db->insertVoucher($ten_voucher,$ma_voucher,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta)){
            $alert = 'add_success';
        }
    }
    include "addVoucher.php";

    
}

function updateVoucher() {
    global $db;
    if(isset($_POST['btnedit'])&&($_POST['btnedit'])){
        $id= $_POST['id'];
        $ten_voucher= $_POST['ten_voucher'];
        $ma_voucher=$_POST['ma_voucher'];
        $gia_tri=$_POST['gia_tri'];
        $ngay_bat_dau=$_POST['ngay_bat_dau'];
        $ngay_ket_thuc=$_POST['ngay_ket_thuc'];
        $mo_ta=$_POST['mo_ta'];
         
        if($db->updateVoucher($id,$ten_voucher,$ma_voucher,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta)){
            $alert = 'add_success';
        }
    }
    displayVouchers();

    
}
?>