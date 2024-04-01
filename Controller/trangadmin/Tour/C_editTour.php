<?php
include("../../../Model/DBConfig.php");
$db = new Database();
$db->connect();

$result = $db->execute("SELECT * FROM provincial");
$rowsProvin = array();

// Kiểm tra và lấy dữ liệu từ kết quả truy vấn
if ($result !== false && $result->num_rows > 0) {
    while ($row2 = $result->fetch_assoc()) {
        $rowsProvin[] = $row2; // Thêm dòng dữ liệu vào mảng
    }
}

$result2 = $db->execute("SELECT * FROM category");
$rowsCate = array();

// Kiểm tra và lấy dữ liệu từ kết quả truy vấn
if ($result2 !== false && $result2->num_rows > 0) {
    while ($row3 = $result2->fetch_assoc()) {
        $rowsCate[] = $row3; // Thêm dòng dữ liệu vào mảng
    }
}

// require_once('View/Admin/addNewTour.php');

// if(isset($_GET['action'])){
//     $action = $_GET['action'];
// } else {
//     $action = '';
// }
if(isset($_REQUEST['idEdit'])){
    $idEdit = $_REQUEST['idEdit'];
}

if (isset($_REQUEST['btnAddTour'])) {
    
    echo "abc";
    $title = $_REQUEST['title'];
    $category = $_REQUEST['category'];
    $provincial = $_REQUEST['provincial'];
    $price = $_REQUEST['price'];
    $content = $_REQUEST['content'];
    $address = $_REQUEST['address'];
    $currentDate = date("Y-m-d");
    $acount = $_REQUEST['acount'];
    $category = $_REQUEST['category'];
    echo $idEdit;
    $db->UpdateTour($idEdit, $category, 1, $provincial, $title, $price, $content, $currentDate, $address, $acount);
    
    if (!empty($_FILES['img1']['tmp_name']) && getimagesize($_FILES['img1']['tmp_name']) !== false) {
        $img1 = addslashes(file_get_contents($_FILES['img1']['tmp_name']));
        $db->InsertImg($id, '1', $img1);
    }
    
    if (!empty($_FILES['img2']['tmp_name']) && getimagesize($_FILES['img2']['tmp_name']) !== false) {
        $img2 = addslashes(file_get_contents($_FILES['img2']['tmp_name']));
        $db->InsertImg($id, '2', $img2);
    }
    
    if (!empty($_FILES['img3']['tmp_name']) && getimagesize($_FILES['img3']['tmp_name']) !== false) {
        $img3 = addslashes(file_get_contents($_FILES['img3']['tmp_name']));
        $db->InsertImg($id, '3', $img3);
    }
} else 
echo "error";
$db->disconnect();
echo "<script>window.location.href = '/WEB2/index.php?controller=trang-admin&action=tour';</script>";
    exit;
// header('index.php?controller=trang-admin&action=tour');
?>
