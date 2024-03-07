<?php 
    include "../../Model/DBConfig.php";
    $db = new DBConfig;
    $db->connect();
    $table = 'product';
    // $result = $db->getAllData($table);
    $listCategory = $db->getAllData('category');
    $page = 1;
    if(isset($_GET['keyword'])) {
        
    }
    
    require_once("../../View/index.php");
?>