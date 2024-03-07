<?php 
  if(isset($_GET['option'])) {
    $option = $_GET['option'];
    switch($option) {
      case "showproduct": 
          header('location: Controller/showproduct/showproduct.php');
          break;
      case "chitiet":
          break;
    }
  }else {
    echo "<h1>Khong la duoc bien option</h1>";
  }
?>

