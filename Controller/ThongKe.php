<?php

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'thongKe') {
    require_once ('../Model/DBConfig.php');
    thongKe();
  }
}
function thongKe()
{
  $db = new Database();
  $db->connect();
  // selectCategory : selectCategory,
  //       dateStart : dateStart,
  //       dateEnd : dateEnd,
  $namecoll = isset($_POST['namecoll']) ? $_POST['namecoll'] : '';
  $orderby = isset($_POST['orderby']) ? $_POST['orderby'] : '';
  $selectCategory = isset($_POST['selectCategory']) ? $_POST['selectCategory'] : '';
  $dateStart = isset($_POST['dateStart']) ? $_POST['dateStart'] : '';
  $dateEnd = isset($_POST['dateEnd']) ? $_POST['dateEnd'] : '';
  $result = $db->resultThongKe($orderby, $selectCategory, $dateStart, $dateEnd, $namecoll);
  $stt = 1;
  $tongTien = 0;
  $tongSL = 0;
  if ($selectCategory == 0) {
    for ($i = 0; $i < count($result); $i++) {
      $key = 'key' . $i;
      echo '
      <tr>
        <th class = "table-cell stt">' . $stt . '</th>
        <th class ="table-cell nameTour ">' . $result[$key][0] . '</th>
        <th class = "table-cell price-tk">' . '~' . '</th>
        <th class = "table-cell num-bought ">' . $result[$key][1] . '</th>
        <th class = "table-cell total-money">' . $result[$key][2] . '</th>
        <th class ="date-go table-cell">' . '~' . '</th>
      </tr>';
      $tongTien = $tongTien + $result[$key][2];
      $tongSL = $tongSL + $result[$key][1];
      $stt = $stt + 1;
    }
  } else {
    while ($row = mysqli_fetch_array($result)) {
      echo '
      <tr>
        <th class = "table-cell stt">' . $row['id'] . '</th>
        <th class ="table-cell nameTour ">' . $row['title'] . '</th>
        <th class = "table-cell price-tk">' . $row['price'] . '</th>
        <th class = "table-cell num-bought ">' . $row['amount'] . '</th>
        <th class = "table-cell total-money">' . $row['total_money'] . '</th>
        <th class ="date-go table-cell">' . $row['date_go'] . '</th>
      </tr>';
      $tongTien = $tongTien + $row['total_money'];
      $tongSL = $tongSL + $row['amount'];
      $stt = $stt + 1;
    }
  }
  echo '
      <tr style = "font-weight : 600">
        <th class = "table-cell">Tổng :
        <th class = "table-cell"> </th>
        <th class = "table-cell"> </th>
        <th class = "table-cell"> ' . $tongSL . '</th>
        <th class = "table-cell"> ' . $tongTien . '</th>
      </tr>';
  $db->disconnect();
}

?>