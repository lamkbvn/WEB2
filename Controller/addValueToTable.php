<?php
include('connectDatabase.php');
$query = '
insert into discount(id_user,discount_name , description , code ,percent ,date_start ,date_end ,status)
values( 2, "Giảm 30%" ,"Đơn tối thiểu đ15tr" ,"B15P" ,0.1 ,"2024-03-01" , "2024-04-03" ,1)
';
// mysqli_query($con, $query);
?>