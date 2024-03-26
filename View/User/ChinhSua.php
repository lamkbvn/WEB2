<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSSofLam/chinhsua.css">
</head>

<body>
  <div class="edit-profile-container">

    <div class="edit-profile-header">
      <div class="edit-profile-infor">
        <div class="hinhvuong"></div>
        <span class="text">Thông tin cá nhân</span>
      </div>

      <div class="edit-profile-infor-desc">
        Thông tin này chỉ được sử dụng để cá nhân hoá trải nghiệm của bạn trên Klook. Thông tin của bạn sẽ được lưu trữ
        an toàn và không công khai.
      </div>
    </div>

    <div class="muc-edit-container">
      <div class="muc-edit edit-profile-name">
        <div class="row1">
          <div class="chitiet-muc-edit">Tên của bạn</div>
          <div class="btn-on-edit" onclick="onEditProfile(event)">Chỉnh sửa</div>
        </div>
        <div class="content-muc-edit row2 name-user">
          <?php
          require_once ('../Model/DBConfig.php');
          if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
          nameUser($_SESSION['idUserLogin']) ?>
        </div>
        <div method="get " class="row3">
          <div class="header-edit">
            <span class="header-edit-ho">Họ</span>
            <span class="header-edit-ten">Tên</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile1(event)">Hủy</span>
          </div>
          <div class="content-edit">
            <input type="text" name="textHo" placeholder="Nhập họ" class="textHo">
            <input type="text" name="textTen" placeholder="Nhập tên" class="textTen">
          </div>
          <button class="btn-luu" onclick="changeNameProfile(event)">Lưu</button>
        </div>
      </div>

      <div class="muc-edit">
      <div class="row1">
          <div class="chitiet-muc-edit">Email</div>
          <div class="btn-on-edit" onclick="onEditProfile(event)">Chỉnh sửa</div>
        </div>
        <div class="content-muc-edit row2 email-user">
        <?php
        require_once ('../Model/DBConfig.php');
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        emailUser($_SESSION['idUserLogin']) ?>
        </div>
        <div class="row3">
          <div class="header-edit">
            <span class="header-edit-email">Email</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile1(event)">Hủy</span>
          </div>
          <div class="content-edit">
            <input type="text" name="emailProfile" id="emailProfile" class="emailProfile" placeholder ="nhap email moi">
            <div class="errorMes" style = "margin-top : 5px;"></div>
          </div>
          <button class="btn-luu" onclick="changeEmailProfile(event)">Lưu</button>
        </div>
      </div>

      <div class="muc-edit">
        <div class="row1">
          <div class="chitiet-muc-edit">Số điện thoại</div>
          <div class="btn-on-edit" onclick="onEditProfile(event)">Chỉnh sửa</div>
        </div>
        <div class="content-muc-edit row2 sdt-user">
        <?php
        require_once ('../Model/DBConfig.php');
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        sdtUser($_SESSION['idUserLogin']) ?>
        </div>
        <div class="row3">
          <div class="header-edit">
            <span class="header-edit-sdt">Số điện thoại</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile1(event)">Hủy</span>
          </div>
          <div class="content-edit">
            <input type="text" name="sdt" id="sdt" class="sdt">
            <div class="errorMes" style = "margin-top : 5px;"></div>
          </div>
          <button class="btn-luu" onclick = "changesdtProfile(event)">Lưu</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/User/chinhsua.js"></script>
</body>


</html>