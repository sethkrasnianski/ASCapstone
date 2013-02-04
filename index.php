<?php
session_start();

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
	require_once 'models/addAccount.php';
	if(validateNewUser($_REQUEST) === true) {
		addUser($_REQUEST);
		include 'views/dashboard.php';
	} else {
		$error = "Please fill out the required fields indicated with *";
		include 'views/createAccount.php';
	}
	break;

	case 'validateLogin':
	require_once 'models/login.php';
	$username = $_REQUEST['User'];
	$password = $_REQUEST['Pass'];
	if (verifyPassword($username,$password))
	{
		include 'views/login.php';
	}
	else
	{
		// Add User key
		$_SESSION['Username'] = $username;
		$_SESSION['Password'] = $password;
		include 'views/dashboard.php';
	}
	break;

	case 'forgotPassword':
	include 'views/forgotpassword.php';
	break;

	case 'resetPassword':
	require_once 'models/resetPassword.php';
	break;

	default:
		$error = "Unknown request: $action";
		include 'views/errors.php';
endswitch;

