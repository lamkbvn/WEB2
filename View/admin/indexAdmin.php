<link rel="stylesheet" href="css/cssadmin.css">

<body>

	<div class="user--table">
		<h2 class="table--heading">Danh sách Người Dùng</h2>

		<table id="tableData" class="custom-table">

			<thead class="table-head">
				<tr class="table-row">
					<th class="table-header">ID</th>
					<th class="table-header">ID Role</th>
					<th class="table-header">Tên Người Dùng</th>
					<th class="table-header">Họ Tên</th>
					<th class="table-header">Email</th>
					<th class="table-header">Password</th>
					<th class="table-header">Số Điện Thoại</th>
					<th class="table-header">Ngày Tạo</th>
					<th class="table-header">Trạng Thái</th>
					<th class="table-header">Địa Chỉ</th>
					<th class="table-header">Hành Động</th>
				</tr>
			</thead>

			<tbody class="table-body">
				<?php
				$stt = 1;
				foreach ($data as $value) {
				?>
					<tr class="table-row">
						<td class="table-cell"><?php echo $value['id']; ?></td>
						<td class="table-cell"><?php echo $value['id_role']; ?></td>
						<td class="table-cell"><?php echo $value['user_name']; ?></td>
						<td class="table-cell"><?php echo $value['fullname']; ?></td>
						<td class="table-cell"><?php echo $value['email']; ?></td>
						<td class="table-cell"><?php echo $value['password']; ?></td>
						<td class="table-cell"><?php echo $value['phone_number']; ?></td>
						<td class="table-cell"><?php echo $value['create_at']; ?></td>
						<td class="table-cell"><?php echo $value['status']; ?></td>
						<td class="table-cell"><?php echo $value['address']; ?></td>
						<td class="table-cell">
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
	</div>

</body>