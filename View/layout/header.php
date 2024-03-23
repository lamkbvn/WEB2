<style>
	.header-avatar img{
		cursor: pointer;
	}

	.header-avatar .item{
		height: 40px;
		width : 83%;
		text-align : center;
		display: flex;
		align-items : center;
		column-gap : 3px;
		padding: 0px 10px;
		font-size : 16px;
	}

	.item svg{
		width : 20px;
		height : 20px;
	}

	.header-avatar .item:hover{
		background: #f5f5f5;
	}

	.drop-user-side-bar{
		border-radius : 10px;
		box-shadow: -1px 5px 15px 0px rgb(171, 171, 171);
		width : 120px;
		height : 100px;
		position: absolute;
		right : 230px;
		display: flex;
		justify-content : center;
		flex-direction : column ;
		background : white ;
		cursor: pointer;
		display : none;
	}

	.header-avatar:hover .drop-user-side-bar{
		display : flex;
	}

</style>

<div class="nav">
	<div class="nav-top">
		<div class="container">
			<div class="nav-top--inner">
				<div class="nav-top--left">
					<a href="index.php?controller=trang-chu">
						<img src="css/icons/8939fe11b96fc40d9c65ca88a0ad1fd1.png" alt="" class="nav-top--logo">
					</a>
					<div class="nav-top--find">
						<img src="css/icons/find-magnifier-search-zoom-look-svgrepo-com.svg" class="nav-top--find__icon" />
						<input type="text" class="nav-top--find__input" placeholder="Tìm theo điểm đến, hoạt động">
					</div>
				</div>
				<div class="nav-top--right">
					<div class="nav-top--right__inner">
						<a href="#!" class="nav-top--right__panner">Mở ứng dụng</a>
						<a href="#!" class="nav-top--right__panner">Xem gần đây</a>
						<?php
						session_start();

						if (isset ($_SESSION['objuser'])) {
							echo $_SESSION['objuser'][0];
							echo '
							<div class = "header-avatar">
								<img src="css/icons/avatar-admin.png" />
								<div class = "drop-user-side-bar">
									<div class = "donhang item">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
											<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
										</svg>
										<div class = "text">Giỏ hàng</div>
									</div>
									<div class = "caidat item">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
											<path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
										</svg>
										<div class = "text">Cài đặt</div>
									</div>
								</div>
							</div>';
							echo '<a href="includes/session/del_session.php">Thoát</a>';
							echo '
							';
							// Ẩn liên kết "Đăng kí" và "Đăng nhập"
						} else {
							echo '<a href="index.php?controller=trang-chu&action=login" class="nav-top--right__panner">Đăng kí</a>';
							echo '<a href="index.php?controller=trang-chu&action=login" class="nav-top--right__panner login-btn">Đăng nhập</a>';
						}
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="nav-bottom">
		<div class="container">
			<div class="nav-bottom--inner">
				<ul class="nav-bottom--list">
					<li class="nav-bottom--item">Bạn muốn đi đâu</li>
					<li class="nav-bottom--item">Tour</li>
					<li class="nav-bottom--item">Du thuyền</li>
					<li class="nav-bottom--item">Hoạt động dưới nước</li>
					<li class="nav-bottom--item">Phiêu lưu và khám phá thiên nhiên</li>
					<li class="nav-bottom--item">Trải nghiệm văn hoá</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script>

</script>