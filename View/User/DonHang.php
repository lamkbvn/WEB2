
<style>
  .header-dh {
    display : flex;
    margin-top: 30px;
    margin-left: 12px;
    margin-bottom: 10px;
  }

  .hinhchunhat {
    width: 7px;
    height: 22px;
    background-color: var(--primary-color);
    border-radius: 10px;
    margin-left: 12px;
    margin-right: 12px;
  }

  .text{
    font-size: 24px;
  }

  .body-dh{
    display :flex;
    max-height : 550px;
    align-items : center;
    flex-direction: column;
    overflow-y : auto;
    padding-bottom: 10px;
  }

  .item-dh{
    width : 90%;
    max-height : 50px;
    height : 10%;
    display : flex;
    flex-wrap :wrap;
    row-gap : 8px;
    justify-content: space-between;
    align-items : center;
    padding : 12px;
    border-radius : 10px;
    border : 1px solid black;
    margin-top : 10px;
    margin-bottom: 10px;

    background: rgb(255 199 147 / 85%);

  }

  .txt-dh{
    font-weight : bold;
  }

  .txt-date{
    font-style : italic;
  }

  .btn-item-dh{
    display : flex;
    gap : 10px;
    width : 150px;
  }

  .btn{
    cursor: pointer;
    border : 1px solid black;
    border-radius : 8px;
    padding : 6px;
    background: rgba(255, 122, 0, 0.85);

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
    border-radius : 8px;
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
    border : 1px solid var(--primary-color);
    display : flex;
    padding : 10px;
    margin-bottom : 10px;
    margin-right : 10px;

    border-radius : 10px;
    background : rgb(255 199 147 / 85%);

  }

  .col-1{
    height : 100px;
  }

  .col-2{
    margin-left: 10px;
    line-height : 23px;
    width :56%;
  }

  .col-2 .name {
    font-weight : bold;
  }

  .col-2 .desc{
    font-size : 14px;
  }

  .col-2 .date-go{
    font-style : italic;
  }

  .col-3{
    margin-left: 10px;
    display : flex;
    align-items : center;
    /* color : var(--primary-color); */
  }

  .hide-on{
    display : none ;
  }

  .quay-lai-profile{
  width: 95%;
  font-style: bold;
  color: blue;
  cursor: pointer;
  margin : 10px 0px 0px 10px;
  }

  .txt-status{
    width: 165px;
  }
</style>
<body>
  <div class="quay-lai-profile" onclick = "onSideBar()">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
    </svg>
  Quay lại
  </div>
  <div class="header-dh">
    <div class="hinhchunhat"></div>
    <div class="text">Đơn hàng</div>
  </div>

  <div class="body-dh">
    <?php
    include_once ("../Controller/User.php");
    $i = 1;
    $result = loadDataDonHang();
    if (mysqli_num_rows($result) <= 0) {
      echo "Không có đơn hàng nào";
    }
    while ($row = mysqli_fetch_array($result)) {
      if ($row['status'] != 4) {
        echo '
      <div class="item-dh ' . $row['id'] . '">
      <div class="txt-dh">Đơn hàng ' . $i++ . '</div>
      <div class="txt-date">Đặt ngày:' . $row['date_order'] . '</div>
      <div class="txt-status">Trạng thái : ' . ($row['status'] == 1 ? 'Đã xử lí' : 'Chưa xử lí') . '</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        ' . ($row['status'] == 0 ? '<div class="btn-huy btn" onclick = "destroyDetailDH(event)">Hủy</div>' : '') . '
      </div>
      </div>
      ';
      }
    }
    ?>

    <!-- <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
        <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>

        <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
        <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
        <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
        <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div>
    <div class="item-dh 1">
      <div class="txt-dh">Don hang 1</div>
      <div class="txt-date">30-1-2024</div>
      <div class="txt-status">Trạng thái : Chưa xử lí</div>
      <div class="btn-item-dh">
        <div class="btn-xemchitiet btn" onclick = "displayDetailDH(event)">Xem chi tiet</div>
        <div class="btn-huy btn">Hủy</div>
      </div>
    </div> -->
  </div>

  <div class="detail-item-dh hide-on">
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

