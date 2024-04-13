<body>

	<div class="add-user-box">
		<h2 class="add-user--heading">Thêm người dùng</h2>
		<div class="add-user--inner">
			<form action="" method="post" class="form--add-user" onsubmit="return validateForm()">
				<div class=" form--inner">
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
						<!-- <div class="form--inner--fill">
							<label class="add-user--label" for="status">Trạng Thái:</label><br>
							<input placeholder="Trạng thái" class="add-user--input" type="text" id="status" name="status"><br>

						</div> -->
						<div class="form--inner--fill">
							<label class="add-user--label" for="address">Địa Chỉ:</label><br>
							<input placeholder="Địa chỉ" class="add-user--input" type="text" id="address" name="address"><br>

						</div>

						<div class="form--inner--fill">
							<label class="add-user--label" for="username">Tài khoản</label><br>
							<input placeholder="Tài khoản" class="add-user--input" type="text" id="username" name="username"><br><br>
						</div>

						<div class="form--inner--fill">
							<label class="add-user--label" for="password">Mật khẩu</label><br>
							<input placeholder="Mật khẩu" class="add-user--input" type="text" id="password" name="password"><br><br>
						</div>
						<div class="form--inner--fill">
							<select name="role" id="role" class="editrole-select">
								<option class="editrole-option" value="0" selected>--Chọn quyền--</option>
								<?php $data = $db->getDataId('acount', $_REQUEST['id']); ?>
								<?php foreach ($roles as $role) :
									$selected = ($data['id_role'] == $role['id']) ? 'selected' : ''; ?>
									<option <?= $selected ?> class="editrole-option" value="<?= $role['id'] ?>"><?= $role['decription'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>

					</div>
				</div>
				<input placeholder="" class="add-user--btn" type="submit" name="add_user" value="Thêm">
			</form>
		</div>


	</div>
</body>
<script>
	let checkValid = 0;

	function validateForm() {
		var fullname = document.getElementById("fullname").value.trim();
		var username = document.getElementById("username").value.trim();
		var password = document.getElementById("password").value.trim();
		var email = document.getElementById("email").value.trim();
		var phoneNumber = document.getElementById("phone_number").value.trim();
		var address = document.getElementById("address").value.trim();

		var error = false;

		// Kiểm tra điều kiện và hiển thị thông báo lỗi nếu cần
		if (fullname === "" && fullname.length() < 6) {
			error = true;
		}

		if (address === "" && address.length() < 6) {
			error = true;
		}

		var email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		var phone_regex = /^\d{10,11}$/;

		// Kiểm tra email
		if (!email_regex.test(email)) {
			error = true;
		}

		if (!/^\d{10,11}$/.test(phoneNumber)) {
			error = true;
		} else if (phoneNumber === "") {
			error = true;
		}

		if (error) {
			return false;
		}
		checkValid = 1;

		return true;
	}

	$(document).ready(function() {
		$('.add-user--inner form').submit(function(e) {
			e.preventDefault(); // Ngăn chặn việc gửi form mặc định
			// Thu thập dữ liệu từ form
			var fullname = $('#fullname').val();
			var username = $('#username').val();
			var password = $('#password').val();
			var email = $('#email').val();
			var phone_number = $('#phone_number').val();
			var address = $('#address').val();
			var role = $('#role').val();

			// Gửi AJAX request
			$.ajax({
				type: 'POST',
				url: 'Controller/trangadmin/checkAddUser.php',
				data: {
					fullname: fullname,
					username: username,
					password: password,
					email: email,
					phone_number: phone_number,
					address: address,
					role: role,
					checkValid: checkValid
				},
				// Xử lý phản hồi từ server ở đây
				success: function(response) {
					if (response.trim() === "exists username") {
						alert("Tài khoản đã tồn tại, vui lòng nhập lại!");
					} else if (response.trim() === "exists email") {
						alert("Email đã tồn tại, vui lòng nhập lại!");
					} else if (response.trim() === "invalid email") {
						alert("Nhập sai Email, vui lòng nhập lại!");
					} else if (response.trim() === "invalid phone") {
						alert("Nhập sai số điện thoại, vui lòng nhập lại!");
					} else if (response.trim() === "exists phone") {
						alert("Số điện thoại đã tồn tại, vui lòng nhập lại!");
					} else if (response.trim() === "valid") {
						alert("Đăng kí thành công");
					} else {
						alert("Vui lòng nhập đầy đủ thông tin");
					}
				},

				error: function(xhr, status, error) {
					// Xử lý lỗi nếu có
					console.error(xhr.responseText);
				}
			});
		});

	});
</script>

</html>