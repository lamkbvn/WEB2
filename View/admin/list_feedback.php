<link rel="stylesheet" href="css/cssadmin.css">

<body>

    <div class="user--table">
        <h2 class="table--heading">Danh Sách Bình Luận</h2>

        <div class="list-feature">
            <div class="filter-container">

                <input type="text" id="filterInput" placeholder="Nhập giá trị cần tìm kiếm...">

            </div>

        </div>
        <table id="tableData" class="custom-table">
            <thead class="table-head">
                <tr class="table--head">
                    <th class="table-header">ID</th>
                    <th class="table-header">Họ Tên</th>
                    <th class="table-header">Nội dung</th>
                    <th class="table-header">Tour</th>
                    <th class="table-header">Ngày bình luận</th>
                    <th class="table-header">Hành Động</th>
                </tr>
            </thead>

            <tbody class="table-body">
                <?php foreach ($listbinhluan as $binhluan) : ?>

                <tr class="table-row">

                    <td class="table-cell id"><?php echo $binhluan['id']; ?></td>
                    <td class="table-cell fullname"><?php echo $binhluan['fullname']; ?></td>
                    <td class="table-cell note"><?php echo $binhluan['note']; ?></td>
                    <td class="table-cell title"><?php echo $binhluan['title']; ?></td>
                    <td class="table-cell create_at"><?php echo $binhluan['create_at']; ?></td>
                    <td class="table-cell">

                        <a class="delete-btn table-btn"
                            href="index.php?controller=trang-admin&action=xoabl&id=<?php echo $binhluan['id']; ?>">Delete</a>
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
            rows[i].style.display = "";// Hiển thị hàng
        } else {
            rows[i].style.display = "none"; // Ẩn hàng
        }
    }
});
</script>