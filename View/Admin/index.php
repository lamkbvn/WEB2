<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php?action='add-tour'"></a>
    <?php

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    include("../../Model/DBConfig.php");
    $db = new DBConfig();
    $db->connect();

    switch ($action) {
        case 'add-tour': {
                require_once('../../Controller/Admin/C_addNewTour.php');
                break;
            }
    }
    ?>
</body>

</html>