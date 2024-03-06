<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = '';
}

switch ($action) {

	case 'add': {
			require_once('View/admin/add.php');
			break;
		}

	default: {
			require_once('View/admin/admin.php');
			break;
		}
}
