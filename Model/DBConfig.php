<?php

//--------------- database connection--------//
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mydb";
$con = mysqli_connect($hostname, $username, $password);
mysqli_select_db($con, $database);


// ------------INSERT INTO TABLE------------------
$nameColumnsDiscount = 'id_user,discount_name , description , code ,percent ,date_start ,date_end ,status';
$inforColumns = ' 2, "Giảm 35%" ,"Đơn tối thiểu đ15tr" ,"B35P" ,0.1 ,"2024-03-01" , "2024-04-03" ,1';

if (!function_exists('insertToTable')) {
  function insertToTable($con, $nameTable, $nameColumns, $inforColumns)
  {
    $query = 'INSERT INTO ' . $nameTable . '(' . $nameColumns . ') VALUES(' . $inforColumns . ')';
    mysqli_query($con, $query);
  }
}


//----------------CREATE TABLE-----------------------
$query = 'CREATE TABLE `discount`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_user` INT NOT NULL,
  `discount_name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `code` VARCHAR(255) NOT NULL,
  `percent` DOUBLE(8, 2) NOT NULL,
  `date_start` DATE NOT NULL,
  `date_end` DATE NOT NULL,
  `status` INT NOT NULL
);';

//------------------------------------------

?>