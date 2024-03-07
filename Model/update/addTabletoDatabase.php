<?php
include('./Model/connect/connectDatabase.php');
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

// $query = 'drop table discount';
//mysqli_query($con, $query);
?>