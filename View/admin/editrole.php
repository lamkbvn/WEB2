<style>
	.editrole {
		margin-left: 50px;
		margin-top: 20px;
	}

	.editrole-heading {}

	.editrole-form {
		display: flex;
		margin-top: 20px;
		gap: 20px;
	}

	.editrole-form--inner {}

	.editrole-label {}

	.editrole-select {
		height: 25px;
		border-radius: 5px;
	}

	.editrole-option {}

	.editrole-btn {
		background-color: #ccc;
	}
</style>

<body>
	<div class="container">
		<div class="editrole">
			<h3 class="editrole-heading">Sửa quyền</h3>
			<form action="" method="POST" class="editrole-form">
				<div class="editrole-form--inner">
					<label for="role" class="editrole-label">Chọn quyền:</label>
					<select name="role" id="role" class="editrole-select">
						<?php foreach ($roles as $role) : ?>
							<option class="editrole-option" value="<?= $role['id'] ?>"><?= $role['decription'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" class="editrole-btn">Sửa Quyền</button>
			</form>
		</div>
	</div>
</body>