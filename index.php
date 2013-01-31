<?php 
require_once('models/db.php');
require_once('models/render.php');
require_once('models/model-validate.php');
require_once('models/model-users.php');

if (isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
}
else
{
	$action = 'login'; // default page
}

switch ($action):
	case 'login':
	include 'views/view-login.php';
	break;

	case 'add-test':
	include 'views/success.php';
	break;

	case 'create-account':
	include 'views/view-create-account.php';
	break;

	case 'add-account':
	include 'views/view-dashboard.php';
	if(validate_create_account($_REQUEST) !== "") {
		echo validate_create_account($_REQUEST);
	} else {
		addUser($_REQUEST);
	}
	break;

	case 'validateLogin':
	//require 'model-login.php';
	break;

	default:
		$error = 'Unknown action: $action';
		include('view-error.php');
endswitch;

