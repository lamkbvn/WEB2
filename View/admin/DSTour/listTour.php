<link rel="stylesheet" href="css/cssadmin.css">

<body>

	<div class="user--table">
		<h2 class="table--heading">Danh sách Tour</h2>

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

			<a href="index.php?controller=trang-admin&action=addTour" class="list-feature-item add-user-btn">
				<img src="css/icons/favorites-admin-icon.svg" alt="" class="list-feature-item--icon">
				<p class="nav-admin-item--title">Thêm mới</p>
			</a>
		</div>
		<table id="tableData" class="custom-table">
			<thead class="table-head">
				<tr class="table--head">
					<th class="table-header">Hình ảnh</th>
					<th class="table-header">Tiêu đề</th>
					<th class="table-header">Giá</th>
					<th class="table-header">Ngày tạo</th>
					<th class="table-header">Số lượng mua</th>
					<th class="table-header">Số lượng còn lại</th>
					<th class="table-header">Số sao</th>
					<th class="table-header">Hành động</th>
				</tr>
			</thead>

			<tbody class="table-body">
				<?php
				$stt = 1;
				foreach ($data as $value) {
					$idProduct = $value['id'];
					$rowsIMG = $db->getAllData('image_product');
					$urlIMG = null;
					if($rowsIMG){
						foreach ($rowsIMG as $rowIMG){
							if($rowIMG['id_product'] == $idProduct){
								$imageData = $rowIMG['image'];
								$urlIMG = 'data:image/jpeg;base64,'.base64_encode($imageData).'';
								break;
							}
						}
					}
					if ($urlIMG == null) $urlIMG = "images/no_image.gif";
				?>
					<tr class="table-row">
						<td class="table-cell"><img src="<?php echo $urlIMG ?>" alt="Hình ảnh tour" class="image-product-admin"></td>
						<td class="table-cell id"><?php echo $value['title']; ?></td>
						<td class="table-cell"><?php echo number_format($value['price'], 0, ',', '.'); ?></td>
						<td class="table-cell"><?php echo $value['create_at']; ?></td>
						<td class="table-cell"><?php echo $value['num_bought']; ?></td>
						<td class="table-cell"><?php echo $value['soLuongConLai']; ?></td>
						<td class="table-cell status"><?php echo $value['star_feedback']; ?></td>
						<td class="table-cell elet">
							<a class="edit-btn table-btn" href="index.php?controller=trang-admin&action=editTour&id=<?php echo $value['id']; ?>">Edit</a>
							<a class="delete-btn table-btn" data-delete-url="index.php?controller=trang-admin&action=deleteTour&id=<?php echo $value['id']; ?>">Delete</a>
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
	</script>

</body>