<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../../Css/admin/style.css">
</head>

<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Danh mục</a></li>
                <li><a href="index.php?action=dsvoucher">Voucher</a></li>
                <li><a href="#">Khách hàng</a></li>
                <li><a href="index.php?action=dsbl">Bình luận</a></li>
                <li><a href="#">Thống kê</a></li>
            </ul>
        </nav>
        <main class="content">
            <?php 
            include "../../Controller/admin/index.php";

            ?>
        </main>
    </div>
</body>

</html>