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


<style>
    .header-admin-active {
        color: #fff;
        background: #4880ff;
    }
</style>


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
                <div class="header-right--profile-info">
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        ob_start();
                        session_start();
                    }
                    if (isset($_SESSION['objuser']) && isset($_SESSION['idUserLogin'])) {
                        echo '<div class ="tennguoidung nav-top--right__panner "> ' . $db->getTenNguoiDung() . '</div>';
                        echo '
							<div class = "header-avatar">
								<img src="/WEB2/images/avatar.png" width = "34" />
								<div class = "drop-user-side-bar">
									<a href="index.php?controller=trang-chu&action=userprofile&pageuser=cs">
										<div class = "trangcanhan item">
										<img src="/WEB2/IMAGEofLam/person.svg" width = "22" />
											<div class = "text">Trang cá nhân</div>
										</div>
									</a>
									<a class = "dangxuat item" href="includes/session/del_session.php" >
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
											<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
										</svg>
										<p class="text">Đăng xuất</p>
									</a>
								</div>
							</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>
    </header>

    <div class="navigation-admin">
        <a href="index.php?controller=trang-admin&action=indexAdmin" id="nav-item--logo">
            <img src="css/icons/Logo-admin.png" alt="" class="nav-item--logo"></a>
        <div class="nav-admin-list">

            <a href="index.php?controller=trang-admin&action=indexAdmin" id="page1" class="nav-admin-item">
                <img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
                <p class="nav-admin-item--title">Người dùng</p>
            </a>

            <a href="index.php?controller=trang-admin&action=role" id="page2" class="nav-admin-item">
                <img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
                <p class="nav-admin-item--title">Phân quyền</p>
            </a>

            <a href="index.php?controller=trang-admin&action=tour" id="page3" class="nav-admin-item">
                <img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
                <p class="nav-admin-item--title">Tour</p>
            </a>

            <a href="index.php?controller=trang-admin&action=dsbl" id="page4" class="nav-admin-item">
                <img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
                <p class="nav-admin-item--title">Bình luận</p>
            </a>
            <a href="index.php?controller=trang-admin&action=dsvoucher" id="page5" class="nav-admin-item">
                <img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
                <p class="nav-admin-item--title">Voucher</p>
            </a>

            <a href="index.php?controller=trang-admin&action=dthongke" id="page6" class="nav-admin-item">
                <img src="css/icons/userslist-admin-icon.svg" alt="" class="nav-admin-item--icon">
                <p class="nav-admin-item--title">Thống kê</p>
            </a>
        </div>
    </div>
    <div id="content">

    </div>


</body>

</html>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const action = urlParams.get('action');

    if (action === 'indexAdmin' || action === 'edit' || action === 'editrole') {
        document.getElementById('page1').classList.add('header-admin-active');
    } else if (action === 'role' || action === 'editRole') {
        document.getElementById('page2').classList.add('header-admin-active');
    } else if (action === 'tour' || action === 'editTour') {
        document.getElementById('page3').classList.add('header-admin-active');
    } else if (action === 'dsbl') {
        document.getElementById('page4').classList.add('header-admin-active');
    } else if (action === 'dsvoucher' || action === 'suavoucher') {
        document.getElementById('page5').classList.add('header-admin-active');
    } else if (action === 'dthongke') {
        document.getElementById('page6').classList.add('header-admin-active');
    }
</script>