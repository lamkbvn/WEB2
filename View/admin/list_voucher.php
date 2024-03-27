<style>
.account-settings th:nth-child(5),
.account-settings td:nth-child(5) {
    width: 80px;
}

.account-settings th:nth-child(3),
.account-settings td:nth-child(3) {
    width: 350px;
    text-align: left;
}
</style>

<div class="account-settings">
    <h2>Danh Sách Voucher</h2>
    <div class="div">
        <a href="index.php?action=themvoucher">
            <input type="button" value="Thêm">
        </a>
    </div>
    <form>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên Voucher</th>
                    <th>Mô tả</th>
                    <th>Mã</th>
                    <th>Giá trị</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listvoucher as $voucher): ?>

                <tr>

                    <td><?php echo $voucher['id']; ?></td>
                    <td><?php echo $voucher['discount_name']; ?></td>
                    <td><?php echo $voucher['description']; ?></td>
                    <td><?php echo $voucher['code']; ?></td>
                    <td><?php echo $voucher['percent']; ?></td>
                    <td><?php echo $voucher['date_start']; ?></td>
                    <td><?php echo $voucher['date_end']; ?></td>
                    <td>
                        <a href="index.php?action=suavoucher&id=<?php echo $voucher['id']; ?>">
                            <input type="button" value="Sửa">
                        </a>

                        <a href="index.php?action=xoavoucher&id=<?php echo $voucher['id']; ?>">
                            <input type="button" value="Xóa">
                        </a>

                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </form>

</div>