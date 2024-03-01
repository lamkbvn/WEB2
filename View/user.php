<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB2</title>
  <link rel="stylesheet" href="./CSSofLam/user.css">
  <link rel="stylesheet" href="./CSSofLam/usersidebarmain.css">
  <link rel="stylesheet" href="./CSSofLam/userdisplaydetail.css">
</head>

<body>
  <section class="user">
    <div class="side-bar-main">
      <div class="profile">
        <img src="./IMAGEofLam/person.svg" alt="" class="profile-image-user">
        <?php $nameuser = 'lam pro vip';
        echo '<div class ="profile-name-user">' . $nameuser . '</div>'
          ?>
        <div class="profile-edit-profile">
          <label for="">Chỉnh sửa</label>
          <img src="./IMAGEofLam/chevron-compact-right.svg" alt="" class="image-edit-profile">
        </div>
      </div>
      <div class="preferential line-black-light">
        <div class="muc select-icon">
          <img src="./IMAGEofLam/stack.svg" alt="" class="select-icon"> <label for="">Mã ưu đãi</label>
          <img src="./IMAGEofLam/plus.svg" alt="" class="them-ma-uu-dai">
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/cash-coin.svg" alt=""> <label for="">Klook credit</label>
          <div class="count-credit">0</div>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/gift.svg" alt=""> <label for="">Phiếu quà tặng Klook</label>
        </div>
      </div>

      <div class="other line-black-light">
        <div class="muc">
          <img src="./IMAGEofLam/donhang.svg" alt=""> <label for="">Đơn hàng</label>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/danhgia.svg" alt=""> <label for="">Đánh giá</label>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/credit-card.svg" alt=""> <label for="">Quản lí phương thức thanh toán</label>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/thongtinkhackhang.svg" alt=""> <label for="">Quản lí thông tin khách hàng</label>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/donhangdagiao.svg" alt=""> <label for="">Quản lí thông tin giao hàng</label>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/yeuthich.svg" alt=""> <label for="">Yêu thích</label>
        </div>
      </div>
      <div class="setting line-black-light">
        <div class="muc">
          <img src="./IMAGEofLam/quanlidangnhap.svg" alt=""> <label for="">Quản lí đăng nhập</label>
        </div>
        <div class="muc">
          <img src="./IMAGEofLam/setting.svg" alt=""> <label for="">Cài đặt</label>
        </div>
      </div>
    </div>

    <div class="display-detail">
      <form class="find-discount-group">
        <input type="text" name="txtFindDiscount" placeholder="Nhập mã khuyến mãi" class="input-discount">
        <button class="btn-use">Tìm kiếm</button>
      </form>

      <div class="nav-discount">
        <div class="pointer">
          <a href="index.php" class="textApDungDuoc selected">Áp dụng được</a>
        </div>
        <div class="pointer">
          Không áp dụng
        </div>
      </div>

      <?php
      include("./Controller/connectDatabase.php");
      $result = mysqli_query($con, "SELECT * FROM discount");
      if (isset($_GET['txtFindDiscount'])) {
        $stringFind = $_GET['txtFindDiscount'];
        $query = "SELECT * FROM discount where code like '%$stringFind%' ";
        $result = mysqli_query($con, $query);
      }
      if (mysqli_num_rows($result) == 0)
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
      ?>

      <div class="find-discount">
        <?php
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
        ?>
      </div>
    </div>
  </section>
</body>

</html>