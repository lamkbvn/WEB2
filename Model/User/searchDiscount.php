<?php
include("./Controller/connect/connectDatabase.php");
$result = mysqli_query($con, "SELECT * FROM discount");
if (isset($_GET['txtFindDiscount'])) {
  $stringFind = $_GET['txtFindDiscount'];
  $query = "SELECT * FROM discount where code like '%$stringFind%' ";
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
echo '<div class="find-discount">';
while ($row = mysqli_fetch_array($result)) {
  // Tạo đối tượng DateTime cho hai mốc thời gian
  $now = new DateTime(); // Thời điểm hiện tại
  $futureDate = new DateTime($row['date_end']); // Mốc thời gian trong tương lai
  if ($futureDate < $now) {
    continue;
  }
  // Tính khoảng thời gian giữa hai mốc
  $interval = $now->diff($futureDate);

  // Lấy số ngày còn lại từ DateInterval
  $daysRemaining = $interval->days;
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
                Hạn sử dụng : Còn lại ' . $daysRemaining . ' ngày
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
            <button class="btn-use-card">Sử dụng</button>
          </div>
        </div>
          ';
}
echo '</div>';
?>