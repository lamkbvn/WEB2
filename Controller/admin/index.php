<?php
include("../../Model/DBConfig.php");
include ("../../View/admin/header.php");

if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = '';
}

$db = new DBConfig();
$db->connect();

switch($action){
        case "dsbl":
            $listbinhluan=$db->loadall_feedback(0);
            include("../../View/admin/list_feedback.php");
            break;
    }  


?>