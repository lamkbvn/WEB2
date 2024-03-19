<?php
include ('Model/DBConfig.php');
$db = new DBConfig();
// $db->connect();
// $db->foreignKey('product', 'id_category', 'category', 'id');
// $db->disconnect();
// include('Controller/User.php');
// include('View/User/user.php');
include ('Controller/ThongKe.php');
include ('View/ThongKe/thongke.php');
?>