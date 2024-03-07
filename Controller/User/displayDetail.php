<?php

if (isset($_GET['pageuser'])) {
  switch ($_GET['pageuser']) {
    case 'mud':
      include("./View/User/MucUuDai.php");
      break;
    case 'dh':
      include("./View/User/DonHang.php");
      break;
    case 'dg':
      include("./View/User/DanhGia.php");
    case 'cs':
      include("./View/User/ChinhSua.php");
  }
}
?>