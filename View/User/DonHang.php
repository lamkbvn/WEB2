
<style>
  .header-dh {
    display : flex;
  }

  .hinhchunhat {
    width: 7px;
    height: 22px;
    background-color: var(--primary-color);
    border-radius: 10px;
  }

  .text{
    font-size: 24px;
  }

  .body-dh{
    display :flex;
    align-items : center;
    flex-direction: column;
  }

  .item-dh{
    width : 794px;
    height : 30px;
    display : flex;
    justify-content: space-between;
    align-items : center;
    padding : 12px;
    border-radius : 10px;
    border : 1px solid black;
    margin-top : 10px;
  }

  .btn-xemchitiet{
    cursor: pointer;
  }

  .detail-item-dh{
    width : 100%;
    height : 100%;
  }

  .layout{
    position: fixed;
    top : 70px;
    left : 0;
    width : 100%;
    height : 100%;
    background-color : black;
    opacity: 0.3;
  }

  .display{
    position: fixed;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color : white;
    width : 600px;
    height : 570px;
    padding  : 20px 0px 20px 20px;
  }

  .container-dh{
    overflow : auto;
    height :98%;
    margin-top : 5px;

  }

  .exit {
    position: fixed;
    right : 3px;
    top : 3px;
    width : 16px;
    height : 16px;
    cursor: pointer;
    border : 1px solid black;
    border-radius : 15px;
    text-align : center;
  }

  .detail-dh{
    height : 100px;
    border : 1px solid black;
    display : flex;
    padding : 10px;
    margin-bottom : 10px;
    margin-right : 10px;
  }

  .col-1{
    height : 100px;
  }

  .col-2{
    margin-left: 10px;
    line-height : 20px;
    width : 80%;
  }

  .col-3{
    margin-left: 10px;
  }

  .hide{
    display : none ;
  }
</style>
<body>
  <div class="header-dh">
    <div class="hinhchunhat"></div>
    <div class="text">Đơn hàng</div>
  </div>

  <div class="body-dh">
    <?php
    include_once ("../Controller/User.php");
    $i = 1;
    $result = loadDataDonHang();
    while ($row = mysqli_fetch_array($result)) {
      echo '
      <div class="item-dh ' . $row['id'] . '">
      <div class="txt-dh">Don hang ' . $i++ . '</div>
      <div class="txt-date">' . $row['date_order'] . '</div>
      <div class="btn-xemchitiet" id = "btn-xemchitiet" onclick = "displayDetailDH(event)">Xem chi tiet</div>
      </div>
      ';
    }
    ?>
    <!-- <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="btn-xemchitiet" onclick = "displayDetailDH(event)">Xem chi tiet</div>
    </div> -->
  </div>

  <div class="detail-item-dh">
      <div class="layout"></div>
      <div class="display">
        <div class="exit" onclick ="exitDetailDH(event)">X</div>
        <div class="container-dh">
          <!-- <div class="detail-dh">
            <img src="images/heart.png" alt="" class = "col-1 img">
            <div class="col-2">
              <div class="name">Tour đảo cô tô</div>
              <div class="desc">Khám phá thiên nhiên</div>
              <div class="date-go">30-1-2024</div>
            </div>
            <div class="col-3 price">3000000</div>
          </div> -->
        </div>
      </div>
  </div>
<!-- <script src="js/User/script.js" ></script> -->
</body>

