<link rel="stylesheet" href="css/cssadmin.css">

<body>

    <div class="user--table">
        <h2 class="table--heading">Danh Sách Voucher</h2>

        <div class="list-feature">
            <div class="filter-container">

                <input type="text" id="filterInput" placeholder="Nhập giá trị cần tìm kiếm...">

            </div>

        </div>
        <table id="tableData" class="custom-table">
            <thead class="table-head">
                <tr class="table--head">
                    <th class="table-header">ID</th>
                    <th class="table-header">Tên Voucher</th>
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
    var rows = table.getElementsByClassName("table-row");
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByClassName("table-cell"); // Lấy tất cả các ô trong hàng

        var rowVisible = false; // Biến để kiểm tra xem hàng có nên hiển thị hay không

        // Lặp qua tất cả các ô trong hàng
        for (var j = 0; j < cells.length; j++) {
            var textValue = cells[j].textContent.toLowerCase(); // Nội dung của ô chuyển thành chữ thường

            // Nếu nội dung của ô chứa giá trị tìm kiếm, hiển thị hàng và thoát khỏi vòng lặp
            if (textValue.indexOf(filter) > -1) {
                rowVisible = true;
                break;
            }
        }

        // Hiển thị hoặc ẩn hàng dựa trên kết quả kiểm tra các ô trong hàng
        if (rowVisible) {
            rows[i].style.display = ""; // Hiển thị hàng
        } else {
            rows[i].style.display = "none"; // Ẩn hàng
        }
    }
});
</script>