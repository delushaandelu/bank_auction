<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Admin Control Panel - View Property';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Admin Control Panel - Add Property';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Admin Control Panel - Modify Property';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = 'Admin Control Panel - View Property Detail';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Admin Control Panel - View Property';
}




$script    = array('property.js','jquery.min.js');

require_once '../include/template.php';
?>
