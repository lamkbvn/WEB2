<link rel="stylesheet" href="css/cssadmin.css">

<body>

    <div class="user--table">
        <h2 class="table--heading">Danh Sách Bình Luận</h2>

        <div class="list-feature">
            <div class="filter-container">

                <input type="text" id="filterInput" placeholder="Nhập tên người dùng cần tìm">

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
    var rows = table.getElementsByTagName("tr");
    for (var i = 0; i < rows.length; i++) {
        var fullname = rows[i].getElementsByClassName("fullname")[0]; // Lấy cột Họ Tên trong hàng
        var note = rows[i].getElementsByClassName("note")[0]; // Lấy cột Nội dung trong hàng
        var title = rows[i].getElementsByClassName("title")[0]; // Lấy cột Tên tour trong hàng
        var create_at = rows[i].getElementsByClassName("create_at")[0]; // Lấy cột Ngày bình luận trong hàng

        if (fullname || note || title || create_at) {
            var textValue = fullname.textContent || fullname.innerText;
            var noteValue = note.textContent || note.innerText;
            var titleValue = title.textContent || title.innerText; // Corrected variable name
            var create_atValue = create_at.textContent || create_at.innerText;
            if (textValue.toLowerCase().indexOf(filter) > -1 ||
                noteValue.toLowerCase().indexOf(filter) > -1 ||
                titleValue.toLowerCase().indexOf(filter) > -1 ||
                create_atValue.toLowerCase().indexOf(filter) > -1) {
                rows[i].style.display = ""; // Hiển thị hàng
            } else {
                rows[i].style.display = "none"; // Ẩn hàng
            }
        }
    }
});
</script>