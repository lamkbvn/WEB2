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
          nameUser($idUser) ?>
        </div>
        <div method="get " class="row3">
          <div class="header-edit">
            <span class="header-edit-ho">Họ</span>
            <span class="header-edit-ten">Tên</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile(event)">Hủy</span>
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
          <div class="chitiet-muc-edit">Danh xưng</div>
          <div class="btn-on-edit" onclick="onEditProfile(event)">Chỉnh sửa</div>
        </div>
        <div class="content-muc-edit row2">Chưa có</div>
        <div method="get " class="row3">
          <div class="header-edit">
            <span class="header-edit-danh-xung">Danh xưng</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile(event)">Hủy</span>
          </div>
          <div class="content-edit">
            <select name="danhxung" id="danhxung" class="danhxung" placeholder="Please select">
              <option value="1">Anh</option>
              <option value="1">Chị</option>
            </select>
          </div>
          <button type="submit" class="btn-luu">Lưu</button>
        </div>
      </div>

      <div class="muc-edit">
        <div class="row1">
          <div class="chitiet-muc-edit">Ngày sinh</div>
          <div class="btn-on-edit" onclick="onEditProfile(event)">Chỉnh sửa</div>
        </div>
        <div class="content-muc-edit row2">Chưa có</div>
        <div method="get " class="row3">
          <div class="header-edit">
            <span class="header-edit-ngay-sinh">Ngày sinh</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile(event)">Hủy</span>
          </div>
          <div class="content-edit">
            <input type="date" name="ngaysinh" id="ngaysinh" class="ngaysinh">
          </div>
          <button type="submit" class="btn-luu">Lưu</button>
        </div>
      </div>

      <div class="muc-edit">
        <div class="row1">
          <div class="chitiet-muc-edit">Quốc gia/Khu vực bạn cư trú</div>
          <div class="btn-on-edit" onclick="onEditProfile(event)">Chỉnh sửa</div>
        </div>
        <div class="content-muc-edit row2">Chưa có</div>
        <div class="row3">
          <div class="header-edit">
            <span class="header-edit-quoc-gia">Quốc gia/Khu vực bạn cư trú</span>
            <span class="header-edit-btn-off-edit" onclick="offEditProfile(event)">Hủy</span>
          </div>
          <div class="content-edit">
            <input type="text" name="quocgia" id="quocgia" class="quocgia">
          </div>
          <button class="btn-luu">Lưu</button>
        </div>
      </div>

    </div>
  </div>

  <script src="js/User/chinhsua.js"></script>
</body>


</html>