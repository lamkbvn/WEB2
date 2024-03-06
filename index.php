
<?php

include("modules/DBConfig.php");
$db = new Database;
$db->connect();

if (isset($_GET['controller'])) {
	$controller = $_GET['controller'];
} else {
	$controller = '';
}

switch ($controller) {
	case 'trang-chu': {
			require_once('Controller/trangchu/index.php');
		}
	case 'trang-admin': {
			require_once('Controller/trangadmin/index.php');
		}
}
