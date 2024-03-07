<?php
//temp
// $hostname = "localhost";
// $username = "root";
// $password = "";
// $database = "mydb";
// $con = mysqli_connect($hostname, $username, $password);
// mysqli_select_db($con, $database);
//temp

include("./Model/connect/connectDatabase.php");
include("./Controller/loadData.php");
// $idUser = 1;

$sql = 'select * from users where id = ' . $idUser;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$fullnameprofile = $row['fullname'];
if (isset($_POST['nameChange'])) {
  $fullnameprofile = $_POST['nameChange'];
  $sql = 'Update users SET fullname = "' . $fullnameprofile . '"  WHERE id = ' . $idUser;
  mysqli_query($con, $sql);
}
echo $fullnameprofile;

?>