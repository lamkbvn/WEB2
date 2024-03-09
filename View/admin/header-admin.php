<!-- Trong mỗi trang HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page Title</title>
	<link rel="stylesheet" href="css/cssadmin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<body>
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

	<div class="navigation">
		<a href="#" onclick="loadPage('?controller=trang-admin&action=indexAdmin')" id="nav-item--logo">
			<img src="css/icons/Logo-admin.svg" alt=""></a>
		<div class="nav-admin-list">
			<a href="#" onclick="loadPage('?controller=trang-admin&action=indexAdmin')" id="page1" class="nav-admin-item">
				<img src="css/icons/trangchu-admin-icon.svg" alt="" class="nav-admin-item--icon">
				<p class="nav-admin-item--title">Trang chủ</p>
			</a>
			<a href="#" onclick="loadPage('?controller=trang-admin&action=add')" id="page2" class="nav-admin-item">
				<img src="css/icons/favorites-admin-icon.svg" alt="" class="nav-admin-item--icon">
				<p class="nav-admin-item--title">Thêm mới</p>
			</a>
			<a href="#" onclick="loadPage('?controller=trang-admin&action=thongke')" id="page3" class="nav-admin-item">
				<img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
				<p class="nav-admin-item--title">thong ke</p>
			</a>
		</div>
	</div>
	<div id="content">
	</div>

	<script>
		$(document).ready(function() {
			// Mặc định tải trang indexAdmin khi trang được tải
			loadPage('?controller=trang-admin&action=indexAdmin');
		});

		function loadPage(page) {
			$.ajax({
				url: page,
				type: 'GET',
				success: function(response) {
					$('#content').html(response);
					// Thay đổi URL trên trình duyệt mà không làm tải lại trang
					history.pushState({}, null, page);
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
				}
			});
			return false; // Ngăn chặn trình duyệt chuyển hướng khi nhấp vào liên kết
		}
	</script>
</body>

</html>