<style>
	a {
		display: inline-block;
	}

	.navigation {
		display: flex;
		justify-content: center;
		align-items: flex-start;
		flex-direction: column;
		background: #fff;
		position: absolute;
		top: 0;
		left: 0;

	}

	.nav-item--logo {
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0 auto;
	}

	.nav-admin-list {
		display: flex;
		justify-content: center;
		align-items: flex-start;
		flex-direction: column;
	}

	.nav-admin-item {
		padding: 15px 20px;
		max-width: 240px;
		color: #202224;
		font-size: 14px;
		font-weight: 600;
		letter-spacing: 0.3px;
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 5px;
	}
</style>

<div class="navigation">
	<a href="index.php?controller=trang-admin&action=list" class="nav-item--logo">
		<img src="css/icons/Logo-admin.svg" alt=""></a>
	<div class="nav-admin-list">
		<a href="index.php?controller=trang-admin&action=admin" class="nav-admin-item">
			<img src="css/icons/trangchu-admin-icon.svg" alt="" class="nav-admin-item--icon">
			<p class="nav-admin-item--title">Trang chủ</p>
		</a>
		<a href="index.php?controller=trang-admin&action=add" class="nav-admin-item">
			<img src="css/icons/favorites-admin-icon.svg" alt="" class="nav-admin-item--icon">
			<p class="nav-admin-item--title">Thêm mới</p>
		</a>
		<a href="index.php?controller=trang-admin&action=list" class="nav-admin-item">
			<img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
			<p class="nav-admin-item--title">Danh sách User</p>
		</a>
		<a href="index.php?controller=trang-admin&action=statistics" class="nav-admin-item">
			<img src="css/icons/thongke-admin-icon.svg" alt="" class="nav-admin-item--icon">
			<p class="nav-admin-item--title">Thống kê</p>
		</a>
		<a href="index.php?controller=trang-admin&action=products" class="nav-admin-item">
			<img src="css/icons/product-admin-icon.svg" alt="" class="nav-admin-item--icon">
			<p class="nav-admin-item--title">Sản phẩm</p>
		</a>
	</div>
</div>