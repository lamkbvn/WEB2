<style>
	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
	}

	.themuser {
		width: 400px;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 5px;
		background-color: #f9f9f9;
	}

	.themuser h3 {
		text-align: center;
		margin-bottom: 20px;
	}

	.themuser form label {
		display: block;
		margin-bottom: 5px;
	}

	.themuser form input[type="text"],
	.themuser form input[type="email"],
	.themuser form input[type="password"],
	.themuser form input[type="date"] {
		width: 100%;
		padding: 8px;
		margin-bottom: 10px;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	.themuser form input[type="submit"] {
		width: 100%;
		padding: 10px;
		border: none;
		border-radius: 4px;
		background-color: #4CAF50;
		color: white;
		cursor: pointer;
	}

	.themuser form input[type="submit"]:hover {
		background-color: #45a049;
	}

	.alert {
		color: green;
		text-align: center;
	}

	.form--inner {
		display: flex;
		gap: 30px;
	}
</style>

<body>
	<div class="container">
		<div class="themuser">
			<h3>Sửa quyền</h3>
			<form action="" method="POST" class="form">
				<div class="form--inner">
					<div class="flex">

						<label for="fullname">Họ Tên:</label><br>
						<input type="text" id="fullname" name="fullname"><br>

						<label for="email">Email:</label><br>
						<input type="email" id="email" name="email"><br>

						<label for="phone_number">Số Điện Thoại:</label><br>
						<input type="text" id="phone_number" name="phone_number"><br>

					</div>
					<div class="flex">
						<label for="create_at">Ngày Tạo:</label><br>
						<input type="date" id="create_at" name="create_at"><br>

						<label for="status">Trạng Thái:</label><br>
						<input type="text" id="status" name="status"><br>

						<label for="address">Địa Chỉ:</label><br>
						<input type="text" id="address" name="address"><br><br>

						<label for="id_acount">id_acount</label><br>
						<input type="text" id="id_acount" name="id_acount"><br><br>
					</div>
				</div>
				<input type="submit" name="edit_user" value="Sửa">
			</form>
			<?php
			if (isset($alert) && $alert == 'add_success') {
				echo "<p style='color: green; align-item: center;'>Sửa thành công</p>";
			} else return;
			?>

		</div>


	</div>
</body>

</html>