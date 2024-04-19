<?php
//gia su da dang nhap thanh cong vo user 1
// function searchDiscounts---------------------
$idOrder;
function searchDiscount($idUser)
{
  $db = new Database();
  $db->connect();
  $searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
  $result = $db->resultSearchDiscount($searchTerm, $idUser);
  if (mysqli_num_rows($result) == 0) {
    echo '
          <div class="no-find-discount">
            <div class="title-no-find1">
              Mã mời khuyến mãi mới
            </div>
            <div class="title-no-find2">
              Bạn có mã ưu đãi? Nhập vào để lưu ở bên trên.Hoặc bạn có thể mời bạn bè sử dụng Klook và kiếm điểm thưởng.
            </div>
          </div>
          ';
    return;
  }
  while ($row = mysqli_fetch_array($result)) {
    $timezone = new DateTimeZone('Asia/Ho_Chi_Minh');
    // Tạo đối tượng DateTime cho hai mốc thời gian
    $now = new DateTime('now', $timezone); // Thời điểm hiện tại
    $futureDate = new DateTime($row['date_end'] . ' 23:59:59'); // Mốc thời gian trong tương lai
    if ($futureDate < $now) {
      continue;
    }
    // Tính khoảng thời gian giữa hai mốc
    $interval = $now->diff($futureDate);

    // Lấy số ngày còn lại từ DateInterval
    $daysRemaining = $interval->days;
    $hoursRemaining = $interval->h;
    echo '
              <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    ' . $row['discount_name'] . '
                  </div>
                  <div class="detail-infor-card">
                  ' . $row['description'] . '
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại ' . ($daysRemaining > 0 ? $daysRemaining : $hoursRemaining / 3) . ($daysRemaining > 0 ? ' ngày' : ' giờ') . '
                  </div>
                </div>
              </div>
              <div class="cac-hinh-tron">
                <div class="hinhtron"></div>
                <div class="hinhtron"></div>
                <div class="hinhtron"></div>
                <div class="hinhtron"></div>
                <div class="hinhtron"></div>
              </div>
              <div class="use-card">
                <div class="title-use-card">
                  Mã ưu đãi
                </div>
                <div class="code-use-card">
                ' . $row['code'] . '
                </div>
                <button class="btn-use-card" onclick ="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
              ';
  }
  $db->disconnect();
}

// function nameUser---------------------

function nameUser($idUser)
{

  $db = new Database();
  $db->connect();
  $nameChange = isset($_POST['nameChange']) ? $_POST['nameChange'] : '';
  $db->resultNameUser($idUser, $nameChange);
  $db->disconnect();
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

function loadDataDonHang()
{
  include "../Model/DBConfig.php";
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $db = new Database();
  $db->connect();
  $result = $db->getDataDonHang($_SESSION['idUserLogin']);
  $db->disconnect();
  return $result;
}

function getDataDetailDH($idOrder)
{
  include_once "../Model/DBConfig.php";
  $db = new Database();
  $db->connect();
  $result = $db->getDataChiTietDonHang($idOrder);
  $db->disconnect();
  return $result;
}



// excute function
if (isset($_POST['action'])) {
  if ($_POST['action'] == 'nameUser') {
    require_once ('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    nameUser($_SESSION['idUserLogin']);
  }
  if ($_POST['action'] == 'searchDiscount') {
    require_once ('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    searchDiscount($_SESSION['idUserLogin']);
  }
  if ($_POST['action'] == 'emailUser') {
    require_once ('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    emailUser($_SESSION['idUserLogin']);
  }
  if ($_POST['action'] == 'sdtUser') {
    require_once ('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    sdtUser($_SESSION['idUserLogin']);
  }

  if ($_POST['action'] == 'orderDetail') {
    require_once ('../Model/DBConfig.php');
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $idOrder = isset($_POST['idOrder']) ? $_POST['idOrder'] : '';
    $result = getDataDetailDH($idOrder);
    if (mysqli_num_rows($result) <= 0)
      echo "khong co ket qua";
    else
      while ($row = mysqli_fetch_array($result)) {
        echo '
        <div class="detail-dh">
        <img src="images/heart.png" alt="" class = "col-1 img">
        <div class="col-2">
          <div class="name">' . $row['title'] . '</div>
          <div class="desc">' . $row['content'] . '</div>
          <div class="date-go">' . $row['date_go'] . '</div>
        </div>
        <div class="col-3 price">' . number_format($row['total_money']) . ' VNĐ</div>
      </div>
        ';
      }
  }
}


// display Detail
if (isset($_POST['pageuser'])) {
  switch ($_POST['pageuser']) {
    case 'mud':
      include ("../View/User/MucUuDai.php");
      break;
    case 'dh':
      include ("../View/User/DonHang.php");
      break;
    case 'dg':
      include ("../View/User/DanhGia.php");
      break;
    case 'cs':
      include ("../View/User/ChinhSua.php");
      break;
  }
}

?>
