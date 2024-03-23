<?php 
    include "../../../../Model/DBConfig.php";
    $db = new Database;
    $db->connect();
    $table = 'product';
    // $result = $db->getAllData($table);
    $listCategory = $db->getAllData('category');
    $page = 1;
    if(isset($_GET['keyword'])) {
        
    }
    echo "da vao dc cap 2";
    require_once("View/index.php");

?>