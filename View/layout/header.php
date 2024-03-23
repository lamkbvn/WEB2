<div class="nav">
	<div class="nav-top">
		<div class="container">
			<div class="nav-top--inner">
				<div class="nav-top--left">
					<a href="index.php?controller=trang-chu">
						<img src="css/icons/8939fe11b96fc40d9c65ca88a0ad1fd1.png" alt="" class="nav-top--logo">
					</a>
					<div class="nav-top--find">
						<img src="css/icons/find-magnifier-search-zoom-look-svgrepo-com.svg"
							class="nav-top--find__icon" />
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
							echo '<img src="css/icons/avatar-admin.png" />';
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
	<div class="nav-bottom">
		<div class="container">
			<div class="nav-bottom--inner">
				<ul class="nav-bottom--list">
					<a
						href="http://localhost/WEB2/index.php?controller=trang-chu&action=showproduct&category=0">
							<li class="nav-bottom--item">
								Tất cả danh mục
							</li>
					</a>
					<?php foreach ($listCategory as $item): ?>
						<a
							href="http://localhost/WEB2/index.php?controller=trang-chu&action=showproduct&category=<?= $item['id'] ?>">
							<li class="nav-bottom--item">
								<?= $item['name_category'] ?>
							</li>
						</a>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</div>