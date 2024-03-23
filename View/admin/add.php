<body>

	<div class="add-user-box">
		<h2 class="add-user--heading">Thêm người dùng</h2>
		<div class="add-user--inner">
			<form action="" method="POST" class="form--add-user">
				<div class="form--inner">
					<div class="form--inner-left">
						<div class="form--inner--fill">
							<label class="add-user--label" for="fullname">Họ Tên:</label><br>
							<input placeholder="Họ tên" class="add-user--input" type="text" id="fullname" name="fullname"><br>

						</div>
						<div class="form--inner--fill">
							<label class="add-user--label" for="email">Email:</label><br>
							<input placeholder="Email" class="add-user--input" type="email" id="email" name="email"><br>

						</div>
						<div class="form--inner--fill">
							<label class="add-user--label" for="phone_number">Số Điện Thoại:</label><br>
							<input placeholder="Phone number" class="add-user--input" type="text" id="phone_number" name="phone_number"><br>

						</div>
					</div>
					<div class="form--inner--right">
						<div class="form--inner--fill">
							<label class="add-user--label" for="status">Trạng Thái:</label><br>
							<input placeholder="Trạng thái" class="add-user--input" type="text" id="status" name="status"><br>

						</div>
						<div class="form--inner--fill">
							<label class="add-user--label" for="status">Địa Chỉ:</label><br>
							<input placeholder="Địa chỉ" class="add-user--input" type="text" id="address" name="address"><br>

						</div>

						<div class="form--inner--fill">
							<label class="add-user--label" for="id_acount">id_acount</label><br>
							<input placeholder="1" class="add-user--input" type="text" id="id_acount" name="id_acount"><br><br>
						</div>
					</div>
				</div>
				<input placeholder="" class="add-user--btn" type="submit" name="add_user" value="Thêm">
			</form>
			<?php
			if (isset($alert) && $alert == 'add_success') {
				echo "<p style='color: green; align-item: center;'>Thêm thành công</p>";
			} else return;
			?>

		</div>


	</div>
</body>
<script>
	// Sử dụng jQuery cho Ajax
	$(document).ready(function() {
		$("#add-user-btn").click(function() {
			// Lấy dữ liệu từ form
			var formData = $("#add-user-form").serialize();

			// Gửi dữ liệu bằng Ajax
			$.ajax({
				type: "POST",
				url: "Controller/trangadmin/index.php", // Đường dẫn tới file PHP xử lý dữ liệu
				data: formData,
				success: function(response) {
					// Xử lý phản hồi từ máy chủ
					alert(response); // Hiển thị thông báo
				}
			});
		});
	});
</script>

</html>