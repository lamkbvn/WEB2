<?php
//gia su da dang nhap thanh cong vo user 1
$idUser = 1;

$hostname = "localhost";
$username = "root";
$password = "";
$database = "mydb";
$con = mysqli_connect($hostname, $username, $password);
mysqli_select_db($con, $database);

// function searchDiscounts-----------------------
if (!function_exists('searchDiscount')) {
  function searchDiscount($con, $idUser)
  {
    $result = mysqli_query($con, "SELECT * FROM discount as d,discountuser as du where id_user = " . $idUser . " and du.id_discount = d.id  ");
    if (isset($_POST['searchTerm'])) {
      $stringFind = $_POST['searchTerm'];
      $query = "SELECT * FROM discount as d,discountuser as du where code like '%$stringFind%'and date_end > CURRENT_DATE and id_user = " . $idUser . " and du.id_discount = d.id  ";
      $result = mysqli_query($con, $query);
    }
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
  }
}

// function nameUser---------------------

if (!function_exists('nameUser')) {
  function nameUser($con, $idUser)
  {
    $sql = 'select * from nguoidung where id = ' . $idUser;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $fullnameprofile = $row['fullname'];
    if (isset($_POST['nameChange'])) {
      $fullnameprofile = $_POST['nameChange'];
      $sql = 'Update nguoidung SET fullname = "' . $fullnameprofile . '"  WHERE id = ' . $idUser;
      mysqli_query($con, $sql);
    }
    echo $fullnameprofile;

  }
}


// excute function
if (isset($_POST['action'])) {
  if ($_POST['action'] == 'nameUser')
    nameUser($con, $idUser);
  if ($_POST['action'] == 'searchDiscount')
    searchDiscount($con, $idUser);
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