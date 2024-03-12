<?php
include("/WEB2/Model/DBConfig.php");
$db = new DBConfig();
$db->connect();
$result = $db->execute("SELECT * FROM chucnang");
$rowsCN = array();
$result2 = $db->execute("SELECT * FROM role");
$rowsRole = array();

// Kiểm tra và lấy dữ liệu từ kết quả truy vấn
if ($result2 !== false && $result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $rowsRole[] = $row2;
    }
}
if ($result !== false && $result->num_rows > 0) {
    while ($row4 = $result->fetch_assoc()) {
        $rowsCN[] = $row4;
    }
}
require_once('../../View/Admin/addNewRole.php');
if(isset($_REQUEST['addRole'])){
    if(isset($_REQUEST['selectRole'])){
        $idRole = $_REQUEST['selectRole'];
    }
    if(isset($_REQUEST['name_role'])){
        $nameRole = $_REQUEST['name_role'];
    }
    foreach ($rowsCN as $rowCN) {
        $idCN = $rowCN['id'];
        $HD="null";
        // Lấy giá trị của các checkbox từ $_POST
        if(isset($_POST['view'][$idCN])){
            $HD = "View";
            $db->InsertRoleLinhDong($idRole, $idCN, $HD, $nameRole);
        } 
        if(isset($_POST['add'][$idCN])){
            $HD = "Add";
            $db->InsertRoleLinhDong($idRole, $idCN, $HD, $nameRole);
        } 
        if(isset($_POST['delete'][$idCN])){
            $HD = "Delete";
            $db->InsertRoleLinhDong($idRole, $idCN, $HD, $nameRole);
        } 
        if(isset($_POST['edit'][$idCN])){
            $HD = "Edit";
            $db->InsertRoleLinhDong($idRole, $idCN, $HD, $nameRole);
        }
    }
        
    
}
?>