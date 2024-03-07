<?php
$sql = 'update users set fullname = ' . $fullnameprofile . '  where id = ' . $idUser;
mysqli_query($con, $sql);
?>