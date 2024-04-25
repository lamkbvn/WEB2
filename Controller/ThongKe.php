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
    // for ($i = 0; $i < count($result); $i++) 
    foreach ($result as $key => $value) {
      // $key = 'key' . $i;
      echo '
      <tr>
        <th class = "table-cell stt">' . $value[3] . '</th>
        <th class ="table-cell nameTour ">' . $value[0] . '</th>
        <th class = "table-cell price-tk">' . '~' . '</th>
        <th class = "table-cell num-bought ">' . $value[1] . '</th>
        <th class = "table-cell total-money">' . $value[2] . '</th>
        <th class ="date-go table-cell">' . '~' . '</th>
      </tr>';
      $tongTien = $tongTien + $result[$key][2];
      $tongSL = $tongSL + $result[$key][1];
      $stt = $stt + 1;
    }
  } else {
    // while ($row = mysqli_fetch_array($result)) 
    foreach ($result as $key => $value) {
      echo '
      <tr>
        <th class = "table-cell stt">' . $value[0] . '</th>
        <th class ="table-cell nameTour ">' . $value[1] . '</th>
        <th class = "table-cell price-tk">' . $value[2] . '</th>
        <th class = "table-cell num-bought ">' . $value[3] . '</th>
        <th class = "table-cell total-money">' . $value[4] . '</th>
        <th class ="date-go table-cell">' . $value[5] . '</th>
      </tr>';
      $tongTien = $tongTien + $value[4];
      $tongSL = $tongSL + $value[3];
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