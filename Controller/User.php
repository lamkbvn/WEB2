<?php
//gia su da dang nhap thanh cong vo user 1
// function searchDiscounts-----------------------
if (!function_exists('searchDiscount')) {
  function searchDiscount($idUser)
  {
    $db = new Database();
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

    $db = new Database();
    $db->connect();
    $nameChange = isset($_POST['nameChange']) ? $_POST['nameChange'] : '';
    $db->resultNameUser($idUser, $nameChange);
    $db->disconnect();
  }
}

function emailUser($idUser)
{

  $db = new Database();
  $db->connect();
  $emailChange = isset($_POST['emailChange']) ? $_POST['emailChange'] : '';
  $db->resultEmailUser($idUser, $emailChange);
  $db->disconnect();
}

function sdtUser($idUser)
{

  $db = new Database();
  $db->connect();
  $sdtChange = isset($_POST['sdtChange']) ? $_POST['sdtChange'] : '';
  $db->resultsdtUser($idUser, $sdtChange);
  $db->disconnect();
}


// excute function
if (isset($_POST['action'])) {
  if ($_POST['action'] == 'nameUser') {
    require_once('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    nameUser($_SESSION['idUserLogin']);
  }
  if ($_POST['action'] == 'searchDiscount') {
    require_once('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    searchDiscount($_SESSION['idUserLogin']);
  }
  if ($_POST['action'] == 'emailUser') {
    require_once('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    emailUser($_SESSION['idUserLogin']);
  }
  if ($_POST['action'] == 'sdtUser') {
    require_once('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    sdtUser($_SESSION['idUserLogin']);
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
