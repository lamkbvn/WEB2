<style>
    .account-settings th:nth-child(3),
    .account-settings td:nth-child(3) {
        width: 250px;
        text-align: left;
    }

    .account-settings th:nth-child(5),
    .account-settings td:nth-child(5) {
        width: 170px;
    }
</style>
<link rel="stylesheet" href="css/feedback&vo    ucher.css">

<body>

</body>
<div class="account-settings">
    <h2>Danh Sách Bình Luận</h2>
    <form>
        <table>
            <thead>
                <tr>

                    <th>Id</th>
                    <th>Người dùng</th>
                    <th>Nội dung</th>
                    <th>Sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listbinhluan as $binhluan) : ?>

                    <tr>

                        <td><?php echo $binhluan['id']; ?></td>
                        <td><?php echo $binhluan['fullname']; ?></td>
                        <td><?php echo $binhluan['note']; ?></td>
                        <td><?php echo $binhluan['title']; ?></td>
                        <td><?php echo $binhluan['create_at']; ?></td>
                        <td>
                            <a href="index.php?controller=trang-admin&action=xoabl&id=<?php echo $binhluan['id']; ?>">
                                <input type="button" value="Xóa">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>
</body>