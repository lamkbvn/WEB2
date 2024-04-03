<link rel="stylesheet" href="css/cssadmin.css">

<body>

	<div class="user--table">
		<h2 class="table--heading">Danh sách Quyền</h2>

		<div class="list-feature">
			<div class="filter-container">
				<select id="filterBy">
					<option value="all">Tất cả</option>
					<option value="name">Tên</option>
					<option value="year">Năm sinh</option>
				</select>
				<input type="text" id="filterInput" placeholder="Nhập giá trị...">
				<button>Lọc</button>
			</div>

			<a href="index.php?controller=trang-admin&action=addRole" class="list-feature-item add-user-btn">
				<img src="css/icons/favorites-admin-icon.svg" alt="" class="list-feature-item--icon">
				<p class="nav-admin-item--title">Thêm mới</p>
			</a>
		</div>
		<table id="tableData" class="custom-table">
			<thead class="table-head">
				<tr class="table--head">
					<th class="table-header">ID</th>
					<th class="table-header">Tên quyền</th>
					<th class="table-header">Hành động</th>
				</tr>
			</thead>

			<tbody class="table-body">
				<?php
				$stt = 1;
				foreach ($data as $value) {
				?>
					<tr class="table-row">
						<td class="table-cell id"><?php echo $value['id']; ?></td>
						<td class="table-cell"><?php echo $value['decription']; ?></td>
						<td class="table-cell">
							<a class="edit-btn table-btn" href="index.php?controller=trang-admin&action=editRole&id=<?php echo $value['id']; ?>">Edit</a>
							<a class="delete-btn table-btn" data-delete-url="index.php?controller=trang-admin&action=deleteRole&id=<?php echo $value['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php
					$stt++;
				}
				?>
			</tbody>
		</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.delete-btn').on('click', function(e) {
				e.preventDefault();
				var deleteUrl = $(this).attr('data-delete-url');
				var rowToDelete = $(this).closest('.table-row');
				var confirmDelete = confirm('Bạn có chắc chắn muốn xóa quyền này không?');
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
	</script>
</body>