<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSSofLam/MucUuDai.css">
</head>

<body>
  <div class="mucUuDai-container">
    <form class="find-discount-group">
      <input type="text" name="txtFindDiscount" placeholder="Nhập mã khuyến mãi" class="input-discount"
        onkeyup="searchDiscount(this.value)">
      <button type="button" class="btn-use">Tìm kiếm</button>
    </form>

    <div class="nav-discount">
      <div class="hinhvuong"></div>
      <div class="textMuc">Mục ưu đãi</div>
    </div>
    <div class="find-discount">
      <?php
      include ("../Model/DBConfig.php");
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      searchDiscount($_SESSION['idUserLogin']);
      ?>
    </div>
  </div>
</body>

</html>