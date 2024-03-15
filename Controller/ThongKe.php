<?php

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'thongKe') {
    require_once('../Model/DBConfig.php');
    thongKe();
  }
}
function thongKe()
{
  $db = new DBConfig();
  $db->connect();
  $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : '';
  $db->resultThongKe($orderby);
  $db->disconnect();
}

?>