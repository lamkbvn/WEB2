<link rel="stylesheet" href="css/cssadmin.css">

<body>

	<div class="user--table">
		<h2 class="table--heading">Danh sách Người Dùng</h2>

		<div class="list-feature">
			<div class="filter-container">

				<input type="text" id="filterInput" placeholder="Nhập giá trị cần tìm kiếm...">

			</div>

			<a href="index.php?controller=trang-admin&action=add" class="list-feature-item add-user-btn">
				<img src="css/icons/favorites-admin-icon.svg" alt="" class="list-feature-item--icon">
				<p class="nav-admin-item--title">Thêm mới</p>
			</a>
		</div>
		<table id="tableData" class="custom-table">
			<thead class="table-head">
				<tr class="table--head">
					<th class="table-header">ID</th>
					<th class="table-header">Họ Tên</th>
					<th class="table-header">Email</th>
					<th class="table-header">Số Điện Thoại</th>
					<th class="table-header">Ngày Tạo</th>
					<th class="table-header">Địa Chỉ</th>
					<th class="table-header">Hành Động</th>
				</tr>
			</thead>

			<tbody class="table-body">
				<?php
				$stt = 1;
				foreach ($data as $value) {
					if (isset($_SESSION['objuser']) && isset($_SESSION['idUserLogin']) && $value['id'] != $_SESSION['idUserLogin']) {
				?>
						<tr class="table-row ">
							<td class="table-cell id"><?php echo $value['id']; ?></td>
							<td class="table-cell fullname"><?php echo $value['fullname']; ?></td>
							<td class="table-cell email"><?php echo $value['email']; ?></td>
							<td class="table-cell phone_number"><?php echo $value['phone_number']; ?></td>
							<td class="table-cell create_at"><?php echo $value['create_at']; ?></td>
							<td class="table-cell diachi"><?php echo $value['address']; ?></td>
							<td class="table-cell">
								<a class="edit-role table-btn" href="index.php?controller=trang-admin&action=editrole&id=<?php echo $value['id']; ?>">Role</a>
								<a class="edit-btn table-btn" href="index.php?controller=trang-admin&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
								<?php
								$status = $value['status'];
								if ($status == 0) {
									echo '<a class="unban-user table-btn" href="index.php?controller=trang-admin&action=unbanuser&id=' . $value['id'] . '">Unban</a>';
								} elseif ($status == 1) {
									echo '<a class="ban-user table-btn" href="index.php?controller=trang-admin&action=banuser&id=' . $value['id'] . '">Ban </a>';
								}
								?>
								<a class="delete-btn table-btn" href="index.php?controller=trang-admin&action=delete&id=<?php echo $value['id']; ?>">Delete</a>
							</td>
						</tr>
				<?php
						$stt++;
					}
				}
				?>
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

<<<<<<< HEAD
			if (fullname || email || phone_number || create_at || diachi) {
				var textValue = fullname.textContent || fullname.innerText;
				var emailValue = email.textContent || email.innerText;
				var phone_numberValue = phone_number.textContent || phone_number.innerText;
				var create_atValue = create_at.textContent || create_at.innerText;
				var diachiValue = diachi.textContent || diachi.innerText;
				if (textValue.toLowerCase().indexOf(filter) > -1 ||
					emailValue.toLowerCase().indexOf(filter) > -1 ||
					phone_numberValue.toLowerCase().indexOf(filter) > -1 ||
					create_atValue.toLowerCase().indexOf(filter) > -1 ||
					diachiValue.toLowerCase().indexOf(filter) > -1) {
					rows[i].style.display = ""; // Hiển thị hàng
				} else {
					rows[i].style.display = "none"; // Ẩn hàng
				}
			}
		}
	});

	$(document).ready(function() {
		$('.delete-btn').on('click', function(e) {
			e.preventDefault();
			var deleteUrl = $(this).attr('data-delete-url');
			var rowToDelete = $(this).closest('.table-row');
			var confirmDelete = confirm('Bạn có chắc chắn muốn xóa tour này không?');
			if (confirmDelete) {
				$.ajax({
					url: deleteUrl,
					type: 'GET',
					success: function(response) {
						// Xử lý phản hồi thành công (nếu cần)
						if (rowToDelete.length > 0) { // Kiểm tra nếu rowToDelete tồn tại
							rowToDelete.hide(); // Ẩn dòng bằng jQuery hide()
						}
					},
					error: function(xhr, status, error) {
						// Xử lý lỗi (nếu cần)
					}
				});
			} else {
				// Nếu người dùng không đồng ý, không làm gì cả
			}
		});
	});
=======
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
>>>>>>> b1a3c1b441f1d2547220ca28e14b8503ad49e982
</script>