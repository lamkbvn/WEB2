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
            <!-- <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
            <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
            <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
            <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
            <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
            <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div>
            <div class="discount-card">
              <div class="infor-card">
                <div class="infor-card-main">
                  <div class="title-infor-card">
                    Khuyến mãi Lễ Hội
                  </div>
                  <div class="detail-infor-card">
                  Ưu đãi đặc biệt cho mùa lễ hội
                  </div>
                  <div class="hansudung">
                    Hạn sử dụng : Còn lại 18 ngày
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
                HOLIDAY12
                </div>
                <button class="btn-use-card" onclick="useDiscount(event)">Sử dụng</button>
              </div>
            </div> -->
    </div>
  </div>
</body>

</html>