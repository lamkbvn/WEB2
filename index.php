<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php?controller=chi-tiet-tour&action='xem-tour'">xem tour</a>
<?php 
    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    } else {
        $controller = '';
    }

    switch($controller){
        case 'chi-tiet-tour':{
            header("Location: /Controller/chitietTour/index.php");
            break;
        }
    }

// hihi
?>
</body>
</html>