<link rel="stylesheet" href="css/cssadmin.css">

<body>

	<div class="user--table">
		<h2 class="table--heading">Danh sách Người Dùng</h2>

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
					<th class="table-header">Trạng Thái</th>
					<th class="table-header">Địa Chỉ</th>
					<th class="table-header">id account</th>
					<th class="table-header">Hành Động</th>
				</tr>
			</thead>

			<tbody class="table-body">
				<?php
				$stt = 1;
				foreach ($data as $value) {
				?>
					<tr class="table-row">
						<td class="table-cell id"><?php echo $value['id']; ?></td>
						<td class="table-cell"><?php echo $value['fullname']; ?></td>
						<td class="table-cell"><?php echo $value['email']; ?></td>
						<td class="table-cell"><?php echo $value['phone_number']; ?></td>
						<td class="table-cell"><?php echo $value['create_at']; ?></td>
						<td class="table-cell status"><?php echo $value['status']; ?></td>
						<td class="table-cell"><?php echo $value['address']; ?></td>
						<td class="table-cell"><?php echo $value['id_acount']; ?></td>
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
				?>
			</tbody>
		</table>
	</div>
</body>