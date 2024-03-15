<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bảng HTML</title>
</head>


<style>
  .header{
    width: 100%;
    height: 50px;
    background-color:red;
  }
  .main{
    display: flex;
    column-gap: 55px;
  }

  .side-bar{
    width : 300px;
    height : 1800px;
    background-color: blue;
  }

  .filter{
    display: flex;
    margin-top:  10px;
    margin-bottom: 10px;
  }

  .date-start{
    margin-left : 50px;
  }

  .date-end{
    margin-left : 50px;
  }

  .submit{
    margin-left : 50px;
    width : 80px;
    height : 20.53px;
    border: 1px solid black;
    text-align: center;
    cursor: pointer;
  }

  .submit:active{
    background-color: black ;
    color : white;

  }

  .typeData{
    display : flex;
    column-gap : 15px;
    margin :10px 0px;
  }

  .btnData{
    width : 120px;
    height : 20.53px;
    border: 1px solid black;
    text-align: center;
    cursor: pointer;
  }

  .btnData:active{
    background-color: black ;
    color : white;
  }

  .hide{
    display: none;
  }

  .chartData{
    width : 1000px;
  }
</style>

<body>
<div class="header"></div>
<div class="main">
  <div class="side-bar">side bar</div>
  <div class="content">
  <div class="filter">
    <select name="all" id="category" class = "category">
      <option value="0">Tất cả</option>
      <option value="1">Tour</option>
      <option value="2">Du thuyền</option>
      <option value="3">Hoạt động dưới nước</option>
      <option value="4">Phiêu lưu và khám phá thiên nhiên</option>
      <option value="5">Trải nghiệm văn hóa</option>
    </select>
    <div class="date-start">
      <label for="input-date-start">Ngày bắt đầu : </label>
      <input type="date" name="input-date-start" id="input-date-start" class="input-date-start" onchange = "selectDateStart(event)">
    </div>
    <div class="date-end">
      <label for="input-date-end">Ngày kết thúc : </label>
      <input type="date" name="input-date-end" id="input-date-end" class="input-date-end" onchange = "selectDateEnd(event)">
    </div>
    <div class="submit" onclick = "filterThongKe(event)">Lọc</div>
  </div>
  <div class="typeData">
    <select name="sapxep" id="sapxep" onchange = "OrderBy(event)">
      <option value="-1">Chọn kiểu sắp xếp</option>
      <option value="0">Sắp xếp tăng dần</option>
      <option value="1">Sắp xếp giảm dần</option>
    </select>
    <select name="kieudulieu" id="kieudulieu" onchange = "typeData(event)">
      <option value="0">Bảng</option>
      <option value="1">Biểu đồ</option>
    </select>
  </div>
  <table border="1" class = "tableData">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Price</th>
        <th>Num bought</th>
        <th>Star feedback</th>
        <th>SLCL</th>
      </tr>
    </thead>
    <tbody class = "bodyTable">
      <?php thongKe() ?>
    </tbody>
  </table>
  <div class = "chartData hide" style = "width = 400px;">
    <canvas width="400px" height="200px" id="myChart">
    </canvas>
  </div>
  </div>
</div>
  <script src="./js/User/Jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="./js/ThongKe/thongke.js"></script>
</body>

</html>