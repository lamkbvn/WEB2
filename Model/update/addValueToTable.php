<?php

function insertToTable($nameTable, $nameColumns, $inforColumns)
{
  include('connectDatabase.php');
  $query = 'INSERT INTO ' . $nameTable . '(' . $nameColumns . ') VALUES(' . $inforColumns . ')';
  mysqli_query($con, $query);
}

$nameColumnsDiscount = 'id_user,discount_name , description , code ,percent ,date_start ,date_end ,status';

$inforColumns = ' 2, "Giảm 35%" ,"Đơn tối thiểu đ15tr" ,"B35P" ,0.1 ,"2024-03-01" , "2024-04-03" ,1';
//insertToTable('discount', $nameColumnsDiscount, $inforColumns);
?>