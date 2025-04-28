<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Css/admin/style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Admin</h1>
        </div>
        <div class="navbar">
            <ul>
                <?php include "../../Controller/admin/index.php" ?>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Danh mục</a></li>
                <li><a href="#">Hàng hóa</a></li>
                <li><a href="#">Khách hàng</a></li>
                <li><a href="index.php?action=dsbl">Bình luận</a></li>
                <li><a href="#">Thống kê</a></li>
            </ul>
        </div>
    </div>
</body>

</html>