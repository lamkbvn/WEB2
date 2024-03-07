<?php
    $servername="localhost";
    $username= "root";
    $password= "";
    $dbname= "tourDuLich";
    ;
    
    if (!$conn= mysqli_connect($servername, $username, $password, $dbname)) {
         die("Kết nối thất bại!");
    }
?>