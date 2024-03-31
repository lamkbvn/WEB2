<style>
    .account-settings th:nth-child(3),
    .account-settings td:nth-child(3) {
        width: 250px;
        text-align: left;
    }
* {
    margin: 0;
    padding: 0;

}

.account-settings th:nth-child(3),
.account-settings td:nth-child(3) {
    width: 250px;
    text-align: left;
}

    .account-settings th:nth-child(5),
    .account-settings td:nth-child(5) {
        width: 170px;
    }
.account-settings th:nth-child(5),
.account-settings td:nth-child(5) {
    width: 170px;
}

.account-settings th:nth-child(4),
.account-settings td:nth-child(4) {
    width: 170px;
}

.account-settings {
    margin-left: 204px;
    margin-right: 50px;
    overflow-x: auto;
    width: calc(100% - 248px);
    padding: 15px;
    box-sizing: border-box;
}

.account-settings h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.account-settings form {
    width: 100%;
    border-radius: 4px;
    overflow: hidden;
}

.account-settings table {
    width: 100%;
    border-collapse: collapse;
}

.account-settings th,
.account-settings td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ccc;
}

.account-settings th {
    background-color: #b1b1b1;
    font-weight: bold;
}

.account-settings a input[value='Xóa'] {
    padding: 2px;
    border-radius: 6px;
    background: #ff0027;
    color: white;
    border: none;
}

.account-settings a input[value='Sửa'] {
    padding: 2px;
    border-radius: 6px;
    background: #4880ff;
    color: white;
    border: none;
    margin-right: 5px;
}

.account-settings th:first-child,
.account-settings td:first-child {
    width: 50px;
}

.account-settings th:nth-child(2),
.account-settings td:nth-child(2) {
    width: 180px;
}

.account-settings th:nth-child(6),
.account-settings td:nth-child(6) {
    width: 170px;
}

.account-settings th:nth-child(7),
.account-settings td:nth-child(7) {
    width: 170px;
}

.account-settings th:nth-child(8),
.account-settings td:nth-child(8) {
    width: 100px;
}

.account-settings th:nth-child(9),
.account-settings td:nth-child(9) {
    width: 100px;
}

.account-settings th:nth-child(10),
.account-settings td:nth-child(10) {
    width: 100px;
}

.account-settings th:nth-child(11) {
    width: 200px;
}

.account-settings th:last-child,
.account-settings td:last-child {
    text-align: center;
}

.account-settings th:last-child button,
.account-settings td:last-child button {
    margin-right: 10px;
}

.list-feature {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 20px 0;
}

.add-user-btn {
    background: #4880ff;
    padding: 10px;
    border-radius: 10px;
    color: #fff;
    padding: 8px 10px;
}

.list-feature-item {
    text-decoration: none;
    display: flex;
    align-items: center;
}
</style>
<!-- <link rel="stylesheet" href="css/feedback&voucher.css"> -->


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