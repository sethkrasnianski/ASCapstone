<?php 
require_once('models/db.php');
require_once('models/render.php');
require_once('models/users.php');

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
	include 'views/login.php';
	break;

	// Testing db
	case 'add-test':
	include 'views/success.php';
	break;

	case 'createAccount':
	include 'views/createAccount.php';
	break;

	case 'addAccount':
	require_once 'models/createAccount.php';
	include 'views/dashboard.php';
	if(validateNewUser($_REQUEST) !== "") {
		echo validateNewUser($_REQUEST);
		addUser($_REQUEST);
	} else {
		echo validateNewUser($_REQUEST);
	}
	break;

	case 'validateLogin':
	require_once 'model-login.php';
	break;

	default:
		$error = 'Unknown action: $action';
		include('error.php');
endswitch;

