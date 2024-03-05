<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="CSSofLam/MucUuDai.css">
</head>

<style>

</style>

<body>
  <div class="mucUuDai-container">
    <form class="find-discount-group">
      <input type="text" name="txtFindDiscount" placeholder="Nhập mã khuyến mãi" class="input-discount">
      <button type="button" class="btn-use" onclick="sendGetRequest()">Tìm kiếm</button>
    </form>

    <div class="nav-discount">
      <div class="hinhvuong"></div>
      <div class="textMuc">Mục ưu đãi</div>
    </div>

    <?php include("Model/User/searchDiscount.php"); ?>

  </div>
</body>

</html>