<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = '';
}

switch ($action) {

	case 'shoping': {
			require_once('View/trangchu/shoping.php');
			break;
		}
	case 'login': {
			require_once('View/trangchu/login.php');
			break;
		}
	default: {
			require_once('View/trangchu/trangchu.php');
			break;
		}
}
