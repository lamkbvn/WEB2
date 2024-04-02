<link rel="stylesheet" href="css/cssadmin.css">

<body>

    <div class="user--table">
        <h2 class="table--heading">Danh Sách Voucher</h2>

        <div class="list-feature">
            <div class="filter-container">

                <input type="text" id="filterInput" placeholder="Nhập tên người dùng cần tìm">

            </div>

        </div>
        <table id="tableData" class="custom-table">
            <thead class="table-head">
                <tr class="table--head">
                    <th class="table-header">ID</th>
                    <th class="table-header">Tên Voucher</th>
                    <th class="table-header">Mô tả</th>
                    <th class="table-header">Mã</th>
                    <th class="table-header">Giá trị</th>
                    <th class="table-header">Ngày bắt đầu</th>
                    <th class="table-header">Ngày kết thúc</th>
                    <th class="table-header">Hành Động</th>


                </tr>
            </thead>

            <tbody class="table-body">
                <?php foreach ($listvoucher as $voucher): ?>

                <tr class="table-row">
                    <td class="table-cell id"><?php echo $voucher['id']; ?></td>
                    <td class="table-cell discount_name"><?php echo $voucher['discount_name']; ?></td>
                    <td class="table-cell description"><?php echo $voucher['description']; ?></td>
                    <td class="table-cell code"><?php echo $voucher['code']; ?></td>
                    <td class="table-cell percent"><?php echo $voucher['percent']; ?></td>
                    <td class="table-cell date_start"><?php echo $voucher['date_start']; ?></td>
                    <td class="table-cell date_end"><?php echo $voucher['date_end']; ?></td>

                    <td class="table-cell">
                        <a class="edit-btn table-btn"
                            href="index.php?controller=trang-admin&action=suavoucher&id=<?php echo $voucher['id']; ?>">Edit</a>
                        <a class="delete-btn table-btn"
                            href="index.php?controller=trang-admin&action=xoavoucher&id=<?php echo $voucher['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>

<script>
// Lấy ô input và bảng dữ liệu
var input = document.getElementById("filterInput");
var table = document.getElementById("tableData");

// Lắng nghe sự kiện input trên ô tìm kiếm
input.addEventListener("input", function() {
    var filter = input.value.toLowerCase(); // Chuyển đổi giá trị nhập vào thành chữ thường để so sánh

    // Lặp qua từng hàng trong tbody
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        var discount_name = rows[i].getElementsByClassName("discount_name")[
        0]; // Lấy cột Tên Voucher trong hàng
        var description = rows[i].getElementsByClassName("description")[0]; // Lấy cột Mô tả voucher trong hàng
        var code = rows[i].getElementsByClassName("code")[0]; // Lấy cột Mã voucher trong hàng
        var percent = rows[i].getElementsByClassName("percent")[0]; // Lấy cột Giá trị voucher trong hàng
        var date_start = rows[i].getElementsByClassName("date_start")[0]; // Lấy cột Ngày bắt đầu trong hàng
        var date_end = rows[i].getElementsByClassName("date_end")[0]; // Lấy cột Ngày kết thúc trong hàng

        if (discount_name || description || code || percent || date_start || date_end) {
            var textValue = discount_name.textContent || discount_name.innerText;
            var descriptionValue = description.textContent || description.innerText;
            var codeValue = code.textContent || code.innerText;
            var percentValue = percent.textContent || percent.innerText;
            var date_startValue = date_start.textContent || date_start.innerText;
            var date_endValue = date_end.textContent || date_end.innerText;
            if (textValue.toLowerCase().indexOf(filter) > -1 ||
                descriptionValue.toLowerCase().indexOf(filter) > -1 ||
                codeValue.toLowerCase().indexOf(filter) > -1 ||
                percentValue.toLowerCase().indexOf(filter) > -1 ||
                date_startValue.toLowerCase().indexOf(filter) > -1 ||
                date_endValue.toLowerCase().indexOf(filter) > -1) {
                rows[i].style.display = ""; // Hiển thị hàng
            } else {
                rows[i].style.display = "none"; // Ẩn hàng
            }
        }
    }
});
</script>