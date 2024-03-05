<?php
if (isset($_GET['pageuser'])) {
  if ($_GET['pageuser'] == 'mud')
    include("./View/User/MucUuDai.php");
  elseif ($_GET['pageuser'] == 'dh')
    include("./View/User/DonHang.php");
  elseif ($_GET['pageuser'] == 'dg')
    include("./View/User/DanhGia.php");
}
?>