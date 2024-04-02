<?php

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'thongKe') {
    require_once ('../Model/DBConfig.php');
    thongKe();
  }
}
function thongKe()
{
  $db = new Database();
  $db->connect();
  // selectCategory : selectCategory,
  //       dateStart : dateStart,
  //       dateEnd : dateEnd,
  $namecoll = isset($_POST['namecoll']) ? $_POST['namecoll'] : '';
  $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : '';
  $selectCategory = isset($_POST['selectCategory']) ? $_POST['selectCategory'] : '';
  $dateStart = isset($_POST['dateStart']) ? $_POST['dateStart'] : '';
  $dateEnd = isset($_POST['dateEnd']) ? $_POST['dateEnd'] : '';
  $db->resultThongKe($orderby, $selectCategory, $dateStart, $dateEnd, $namecoll);
  $db->disconnect();
}

?>