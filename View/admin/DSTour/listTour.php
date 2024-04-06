<link rel="stylesheet" href="css/cssadmin.css">

<body>

	<div class="user--table">
		<h2 class="table--heading">Danh sách Tour</h2>

		<div class="list-feature">
			<div class="filter-container">
				<input type="text" id="filterInput" placeholder="Nhập giá trị cần tìm kiếm...">
			</div>
			<?php
			$isAdd = 0;
			$isEdit = 0;
			$isDelete = 0;
			foreach ($role as $rowRole) {
				if ($rowRole['id_chucNang'] == 2) {
					switch ($rowRole['HD']) {
						case 'Add':
							$isAdd = 1;
							break;
						case 'Edit':
							$isEdit = 1;
							break;
						case 'Delete':
							$isDelete = 1;
							break;
						default:
							# code...
							break;
					}
				}
			}
			if ($isAdd == 1) {
				echo "<a href='index.php?controller=trang-admin&action=addTour' class='list-feature-item add-user-btn'>
						<img src='css/icons/favorites-admin-icon.svg' alt='' class='list-feature-item--icon'>
						<p class='nav-admin-item--title'>Thêm mới</p>
					</a>";
			}
			?>
		</div>
		<table id="tableData" class="custom-table">
			<thead class="table-head">
				<tr class="table--head">
					<th class="table-header">Hình ảnh</th>
					<th class="table-header" onclick="sortTable(1)">Tiêu đề
						<img id="sortIcon1" src="images/arrow-point-to-up.png" width="14px">
					</th>
					<th class="table-header" onclick="sortTable(2)">Giá
						<img id="sortIcon2" src="images/arrow-point-to-up.png" width="14px">
					</th>
					<th class="table-header" onclick="sortTable(3)">Ngày tạo
						<img id="sortIcon3" src="images/arrow-point-to-up.png" width="14px">
					</th>
					<th class="table-header" onclick="sortTable(4)">Số lượng mua
						<img id="sortIcon4" src="images/arrow-point-to-up.png" width="14px">
					</th>
					<th class="table-header" onclick="sortTable(5)">Số lượng còn lại
						<img id="sortIcon5" src="images/arrow-point-to-up.png" width="14px">
					</th>
					<th class="table-header" onclick="sortTable(6)">Số sao
						<img id="sortIcon6" src="images/arrow-point-to-up.png" width="14px">
					</th>
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
					if ($rowsIMG) {
						foreach ($rowsIMG as $rowIMG) {
							if ($rowIMG['id_product'] == $idProduct) {
								$imageData = $rowIMG['image'];
								$urlIMG = 'data:image/jpeg;base64,' . base64_encode($imageData) . '';
								break;
							}
						}
					}
					if ($urlIMG == null) $urlIMG = "images/no_image.gif";
				?>
					<tr class="table-row">
						<td class="table-cell"><img loading="lazy" src="<?php echo $urlIMG ?>" alt="Hình ảnh tour" class="image-product-admin" width="80" height="45"></td>
						<td class="table-cell id"><?php echo $value['title']; ?></td>
						<td class="table-cell"><?php echo number_format($value['price'], 0, ',', '.'); ?></td>
						<td class="table-cell"><?php echo $value['create_at']; ?></td>
						<td class="table-cell"><?php echo $value['num_bought']; ?></td>
						<td class="table-cell"><?php echo $value['soLuongConLai']; ?></td>
						<td class="table-cell status"><?php echo $value['star_feedback']; ?></td>
						<td class="table-cell elet">
							<?php
							if ($isEdit == 1) {
								echo "<a class='edit-btn table-btn' href='index.php?controller=trang-admin&action=editTour&id={$value['id']}'>Edit</a>";
							}
							if ($isDelete == 1) {
								echo "<a class='delete-btn table-btn' data-delete-url='index.php?controller=trang-admin&action=deleteTour&id={$value['id']}'>Delete</a>";
							}
							?>
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
	<script src="js/sapxep.js"></script>
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