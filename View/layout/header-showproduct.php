
<style>

	.header-avatar a{
		color : black;
	}

	.header-avatar img{
		cursor: pointer;
	}

	.header-avatar .item{
		height: 40px;
		width : 180px;
		text-align : center;
		display: flex;
		align-items : center;
		column-gap : 3px;
		padding: 0px 10px;
		font-size : 16px;
	}

	.header-avatar .item svg{
		width : 20px;
		height : 20px;
	}

	.header-avatar .item:hover{
		background: #f5f5f5;
	}

	.header-avatar .drop-user-side-bar{
		border-radius : 10px;
		box-shadow: -1px 5px 15px 0px rgb(171, 171, 171);
		width : 180px;
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
					<a href="/WEB2/index.php?controller=trang-chu">
						<img src="/WEB2/css/icons/8939fe11b96fc40d9c65ca88a0ad1fd1.png" alt="" class="nav-top--logo">
					</a>
					<!-- <div class="nav-top--find">
						<img src="css/icons/find-magnifier-search-zoom-look-svgrepo-com.svg" class="nav-top--find__icon" />
						<input type="text" class="nav-top--find__input" placeholder="Tìm theo điểm đến, hoạt động">
					</div> -->
				</div>
				<div class="nav-top--right">
					<div class="nav-top--right__inner">
						<a href="#!" class="nav-top--right__panner">Mở ứng dụng</a>
						<a href="#!" class="nav-top--right__panner">Xem gần đây</a>
						<?php
						if (session_status() == PHP_SESSION_NONE) {
							session_start();
						}
						if (isset ($_SESSION['idUserLogin'])) {
							$idUser = $_SESSION['idUserLogin'];
						}
						$numCart = $db->execute("SELECT COUNT(*) AS total_rows FROM cart WHERE id_user='$idUser'");
						$rowNumCart = $numCart->fetch_assoc();
						$totalRowsNumCart = $rowNumCart["total_rows"];
						?>
						<?php
						if (isset ($_SESSION['isLogin'])) {
							if ($_SESSION['isLogin'] == 1) {
								echo '<a href="#" id="cartIcon" class="option-header-right nav-top--right__panner">Giỏ hàng
          								<div id="numCart">';
								// Embedding PHP to display $totalRowsNumCart
								echo $totalRowsNumCart;
								echo '</div>
      								</a>';
							}
						}

						if (isset ($_SESSION['objuser'])) {
							echo '<div class ="tennguoidung"> ' . $db->getTenNguoiDung() . '</div>';
							echo '
							<div class = "header-avatar">
								<img src="css/icons/avatar-admin.png" />
								<div class = "drop-user-side-bar">
									<a href="index.php?controller=trang-chu&action=userprofile">
										<div class = "trangcanhan item">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
												<path d="M6 8a3 3 0 1 0 0tho-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
											</svg>
											<div class = "text">Trang cá nhân</div>
										</div>
									</a>
									<div class = "dangxuat item">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
											<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
										</svg>
										<div class = "text">Đăng xuất</div>
									</div>
								</div>
							</div>';
							echo '<a href="includes/session/del_session.php">Thoát</a>';


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
	<!-- <div class="nav-bottom">
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
	</div> -->
</div>