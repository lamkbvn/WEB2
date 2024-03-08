<style>
	table {
		border-collapse: collapse;
		width: 100%;
		margin-left: 270px;
	}

	th,
	td {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		margin-left: 270px;

	}

	th {
		background-color: #f2f2f2;

	}

	h2,
	#sort-users {
		margin-left: 270px;

	}

	.edit-btn {
		color: #000;
	}

	.delete-btn {
		color: #000;
	}
</style>

<body>

	<?php
	require_once("View/layout/header-admin.php");
	?>
	<h2>Danh sách Người Dùng</h2>

	<select id="sort-users">
		<option value="id">ID</option>
		<option value="id_role">ID Role</option>
		<option value="user_name">Tên Người Dùng</option>
		<!-- Thêm các tùy chọn sắp xếp khác nếu cần -->
	</select>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>ID Role</th>
				<th>Tên Người Dùng</th>
				<th>Họ Tên</th>
				<th>Email</th>
				<th>Password</th>
				<th>Số Điện Thoại</th>
				<th>Ngày Tạo</th>
				<th>Trạng Thái</th>
				<th>Địa Chỉ</th>
				<th>Hành Động</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			foreach ($data as $value) {
			?>
				<tr>
					<td><?php echo $value['id']; ?></td>
					<td><?php echo $value['id_role']; ?></td>
					<td><?php echo $value['user_name']; ?></td>
					<td><?php echo $value['fullname']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><?php echo $value['password']; ?></td>
					<td><?php echo $value['phone_number']; ?></td>
					<td><?php echo $value['create_at']; ?></td>
					<td><?php echo $value['status']; ?></td>
					<td><?php echo $value['address']; ?></td>
					<td>
						<a class="edit-btn" href="index.php?controller=trang-admin&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
						<a class="delete-btn" href="index.php?controller=trang-admin&action=delete&id=<?php echo $value['id']; ?>">Delete</a>
					</td>
				</tr>
			<?php
				$stt++;
			}
			?>
		</tbody>
	</table>
</body>
<script>
	$(document).ready(function() {
		$('#sort-users').change(function() {
			var sortBy = $(this).val();
			$.ajax({
				url: 'sort_users.php', // Đường dẫn tới mã xử lý sắp xếp trên máy chủ
				type: 'POST',
				data: {
					sortBy: sortBy
				},
				success: function(data) {
					// Cập nhật giao diện người dùng với dữ liệu mới
					$('#user-list').html(data);
				}
			});
		});
	});
</script>