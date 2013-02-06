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
	$action = 'login'; // default pageww
}

switch ($action) {
	case 'login':
	include 'views/login.php';
	break;

	// Testing db
	// case 'add-test':
	// include 'views/success.php';
	// break;

	// LOGIN
	case 'validateLogin':
	require_once 'models/login.php';
	$username = $_REQUEST['User'];
	$password = $_REQUEST['Pass'];
	if (verifyPassword($username, $password) === false)
	{
		include 'views/login.php';
		echo 'false!';
	}
	else
	{
		$user = getUserFromUsername($username);
		// SAVE USER
		$_SESSION['Username'] = $user['Username'];
		$_SESSION['Password'] = $user['Password'];
		$_SESSION['FirstName'] = $user['FirstName'];
		$_SESSION['LastName'] = $user['LastName'];
		$_SESSION['Company'] = $user['Company'];
		$_SESSION['userHash'] = hash('haval256,4', 'The quick brown fox jumped over the lazy dog.') . hash('ripemd320', $username . $password) ;
		include 'views/dashboard.php';
	}
	break;

	// CREATE ACCOUNT
	case 'createAccount':
	require_once 'models/users.php';
	include 'views/createAccount.php';
	break;

	case 'addAccount':
	require_once 'models/addAccount.php';
	require_once 'models/addAccount.php';
	if(validateNewUser($_REQUEST) === true) {
		addUser($_REQUEST);
		include 'views/dashboard.php';
	} else {
		$error = "Please fill out the required fields indicated with *";
		include 'views/createAccount.php';
	}
	break;

	// FORGOT PASSWORD
	case 'forgotPassword':
	require_once 'models/forgotPassword.php';
	// $email = $_POST['']
	include 'views/forgotpassword.php';
	break;

	// RESET PASSWORD
	case 'resetPassword':
	require_once 'models/login.php';
	require_once 'models/resetPassword.php';
	$dob = $_REQUEST['DOB'];
	if (verifyDOB($dob))
	{
		include 'views/login.php';
	}
	else
	{
		// Add User key
		$_SESSION['Username'] = $username;
		$_SESSION['Password'] = $password;
		$test = verifyDOB($dob);
		include 'views/resetPassword.php';
	}
	break;

	// DASHBOARD
	case 'dashboard':
	require_once 'models/login.php';
	require_once 'models/dashboard.php';
	if (verifyPassword($_SESSION['Username'], $_SESSION['Password']))
	{
		include 'views/login.php';
	}
	else
	{
		$user = getUserFromUsername();
		include 'views/dashboard.php';
	}
	break;

	// LOGOUT
	case 'logOut':
	session_destroy();
	include 'views/login.php';
	break;

	// UNKNOWN ACTION
	default:
		$error = "Unknown request: $action";
		include 'views/errors.php';
	break;
}

