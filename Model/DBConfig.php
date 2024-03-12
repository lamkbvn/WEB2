<?php

//--------------- database connection--------//
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mydb";
$con = mysqli_connect($hostname, $username, $password);
mysqli_select_db($con, $database);

//----------------CREATE TABLE-----------------------
$query = '
CREATE TABLE `order_detail`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_order` INT NOT NULL,
  `id_product` INT NOT NULL,
  `price` INT NOT NULL,
  `amount` INT NOT NULL,
  `total_money` INT NOT NULL,
  `date_go` DATE NOT NULL
);
';

//mysqli_query($con, $query);



// ------------INSERT INTO TABLE------------------

$columnsNguoiDung = 'fullname , email , phone_number , create_at ,status, address , id_account';

$columnsProvincial = 'name_province';

$columnsDiscountUser = 'id_user,id_discount';

$columnsImageProduct = 'id_product,id_user,image,decription';

$columnsCart = 'id_user,id_product,amount,status';

$columnsOrderDetail = 'id_order,id_product,price,amount,total_money,date_go';

$columnsFeedBack = 'user_id,product_id,note,create_at,update_at,num_star';

$columnsDiscount = 'discount_name , percent ,description , date_start,date_end,status';

$columnsPhanQuyenLinhDong = 'id_category,id_user,id_provincial ,title,price,content,create_at,update_at,status,num_bought,star_feedback,address,soLuongConLai';

$columnsChucNang = 'decription';

$columnsRole = 'decription';

$columnsOrder = 'id_user,fullname.';

$columnsCategory = 'name_category';

$columnsAccount = 'user_name,password ,id_role,status';



$inforColumns = ' 2, "Giảm 35%" ,"Đơn tối thiểu đ15tr" ,"B35P" ,0.1 ,"2024-03-01" , "2024-04-03" ,1';

$sql = "
INSERT INTO `order_detail` (`id_order`, `id_product`, `price`, `amount`, `total_money`, `date_go`) VALUES
(1, 3, 1700000, 2, 3400000, '2024-03-10'),
(2, 6, 2100000, 1, 2100000, '2024-03-10'),
(3, 9, 1800000, 3, 5400000, '2024-03-11'),
(4, 12, 2500000, 1, 2500000, '2024-03-11'),
(5, 15, 1900000, 2, 3800000, '2024-03-12'),
(6, 18, 2100000, 1, 2100000, '2024-03-12'),
(7, 21, 2300000, 2, 4600000, '2024-03-13'),
(8, 24, 2000000, 1, 2000000, '2024-03-13'),
(9, 27, 1800000, 3, 5400000, '2024-03-14'),
(10, 30, 2400000, 1, 2400000, '2024-03-14'),
(11, 33, 2200000, 2, 4400000, '2024-03-15'),
(12, 36, 2600000, 1, 2600000, '2024-03-15'),
(13, 39, 1700000, 2, 3400000, '2024-03-16'),
(14, 2, 2000000, 1, 2000000, '2024-03-16'),
(15, 5, 1800000, 3, 5400000, '2024-03-17'),
(16, 8, 2300000, 1, 2300000, '2024-03-17'),
(17, 11, 2100000, 2, 4200000, '2024-03-18'),
(18, 14, 1900000, 1, 1900000, '2024-03-18'),
(19, 17, 2200000, 2, 4400000, '2024-03-19'),
(20, 20, 2000000, 1, 2000000, '2024-03-19');

";

//mysqli_query($con, $sql);

if (!function_exists('insertToTable')) {
  function insertToTable($con, $nameTable, $nameColumns, $inforColumns)
  {
    $query = 'INSERT INTO ' . $nameTable . '(' . $nameColumns . ') VALUES(' . $inforColumns . ')';
    mysqli_query($con, $query);
  }
}


//------------------------------------------

?>