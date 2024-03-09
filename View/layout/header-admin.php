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
		padding-right: 50px;
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

	.header-admin {
		padding: 16px 0px;
		padding-left: 250px;
		background: #fff;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.header-left {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 20px;
	}

	.header-left--icon {}

	.header-left--find {
		position: relative;

	}

	.header-left--find-icon {
		position: absolute;
		top: 12px;
		left: 12px;
	}

	.header-left--find--input {
		border-radius: 19px;
		border: 0.6px solid #D5D5D5;
		background: #F5F6FA;
		width: 388px;
		height: 38px;
		flex-shrink: 0;
	}

	.header-right {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 20px;
		margin-right: 50px;
	}

	.header-right--nofi {}

	.header-right--nofi--ico {}

	.header-right--nofi--text {}

	.header-right--profile {
		display: flex;
		justify-content: space-between;
		align-items: center;
		gap: 20px;
	}

	.header-right--profile-avatar {}

	.header-right--profile-info {}

	.header-right--profile--title {}

	.header-right--profile--desc {}

	.more-profile {}
</style>

<header class="header-admin">
	<div class="header-left">
		<img src="css/icons/hamberger-admin.svg" alt="" class="header-left--icon">
		<div class="header-left--find">
			<img src="css/icons/search-admin.svg" alt="" class="header-left--find-icon">
			<input type="text" class="header-left--find--input">
		</div>
	</div>


	<div class="header-right">
		<div class="header-right--nofi">
			<img src="css/icons/nofi-admin.svg" alt="" class="header-right--nofi--icon">
			<div class="header-right--nofi--text"></div>
		</div>
		<div class="header-right--profile">
			<img src="css/icons/avatar-admin.png" alt="" class="header-right--profile-avatar">
			<div class="header-right--profile-info">
				<p class="header-right--profile--title">ten</p>
				<p class="header-right--profile--desc">adsd</p>
			</div>
			<img src="css/icons/more-info-admin.svg" alt="" class="more-profile">
		</div>
	</div>
</header>
<!-- 
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
</div> -->


<!-- View/admin/indexAdmin.php -->
<ul>
	<li><a href="#" id="add_user">Add User</a></li>
	<li><a href="#" id="admin">Admin</a></li>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/ajax.js"></script>