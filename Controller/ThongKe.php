<?php

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'thongKe') {
    include('../Model/DBConfig.php');
    thongKe($con);
  }
}
function thongKe($con)
{
  $sql = 'SELECT * FROM product ';
  if (isset($_POST['orderby'])) {
    if ($_POST['orderby'] == 'ASC')
      $sql = $sql . 'ORDER BY num_bought';
    if ($_POST['orderby'] == 'DESC')
      $sql = $sql . 'ORDER BY num_bought DESC';
  }
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_array($result)) {
    echo '
    <tr>
      <td> ' . $row['id'] . '</td>
      <td class ="nameTour">' . $row['title'] . '</td>
      <td>' . $row['price'] . '</td>
      <td class = "num-bought">' . $row['num_bought'] . '</td>
      <td>' . $row['star_feedback'] . '</td>
      <td class ="slcl">' . $row['soLuongConLai'] . '</td>
    </tr>';
  }
}

?>