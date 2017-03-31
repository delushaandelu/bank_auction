<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Admin Control Panel - View Bank';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Admin Control Panel - Add Bank';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Admin Control Panel - Modify Bank';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Admin Control Panel - View Bank';
}


$script    = array('bank.js');

require_once '../include/template.php';
?>
