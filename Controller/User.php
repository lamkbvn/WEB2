<?php
//gia su da dang nhap thanh cong vo user 1
$idUser = 1;

// function searchDiscounts-----------------------
if (!function_exists('searchDiscount')) {
  function searchDiscount($idUser)
  {
    $db = new DBConfig();
    $db->connect();
    $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
    $db->resultSearchDiscount($searchTerm, $idUser);
    $db->disconnect();
  }
}

// function nameUser---------------------

if (!function_exists('nameUser')) {
  function nameUser($idUser)
  {

    $db = new DBConfig();
    $db->connect();
    $nameChange = isset($_POST['nameChange']) ? $_POST['nameChange'] : '';
    $db->resultNameUser($idUser, $nameChange);
    $db->disconnect();
  }
}


// excute function
if (isset($_POST['action'])) {
  if ($_POST['action'] == 'nameUser') {
    require_once('../Model/DBConfig.php');
    nameUser($idUser);
  }
  if ($_POST['action'] == 'searchDiscount') {
    require_once('../Model/DBConfig.php');
    searchDiscount($idUser);
  }
}

// display Detail
if (isset($_POST['pageuser'])) {
  switch ($_POST['pageuser']) {
    case 'mud':
      include("../View/User/MucUuDai.php");
      break;
    case 'dh':
      include("../View/User/DonHang.php");
      break;
    case 'dg':
      include("../View/User/DanhGia.php");
      break;
    case 'cs':
      include("../View/User/ChinhSua.php");
      break;
  }
}

?>