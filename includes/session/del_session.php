<?php
session_start();

// Xóa phiên đăng nhập
unset($_SESSION['objuser']);

// Chuyển hướng trở lại trang index.php với các tham số trên URL
header('location: ../../index.php?controller=trang-chu');
