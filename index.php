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

	// LOGIN
	case 'login':
	$_SESSION['newPassword'] = false;
	echo $_SESSION['newPassword'];
	include 'views/login.php';
	break;

	// VALIDATE LOGIN
	case 'validateLogin':
	require_once 'models/login.php';
	require_once 'models/orders.php';
	require_once 'models/products.php';
	$username = $_REQUEST['User'];
	$password = $_REQUEST['Pass'];
	$userInfo = getUserFromUsername($username);
	if (verifyPassword($username, $password) == false) {
		$_SESSION['loginFailed'] = true;
		include 'views/login.php';
	}
	else {
		$user = getUserFromUsername($username);
		// SAVE USER
		$_SESSION['PermissionLevel'] = $user['PermissionLevel'];
		$_SESSION['userHash'] = hash('haval256,4', 'The quick brown fox jumped over the lazy dog.') . hash('ripemd320', $username . $password) ;
		$_SESSION['UserID'] = $user['UserID'];
		$_SESSION['Username'] = $user['Username'];
		$_SESSION['Password'] = $user['Password'];
		$_SESSION['FirstName'] = $user['FirstName'];
		$_SESSION['LastName'] = $user['LastName'];
		$_SESSION['Company'] = $user['Company'];
		$_SESSION['NewUser'] = hasOrder($user['UserID']);
		include 'views/dashboard.php';
	}
	break;

	// CREATE ACCOUNT
	case 'createAccount':
	require_once 'models/users.php';
	include 'views/createAccount.php';
	break;

	// ADD ACCOUNT
	case 'addAccount':
	require_once 'models/addAccount.php';
	require_once 'models/login.php';
	if(validateNewUser($_REQUEST) === true) {
		// Get username
		$_REQUEST['PermissionLevel'] = 3;
		addUser($_REQUEST);
		$user = getUserFromUsername($_REQUEST['Username']);
		$_SESSION['PermissionLevel'] = $_REQUEST['PermissionLevel'];
		$_SESSION['UserID'] = $user['UserID'];
		$_SESSION['Username'] = $user['Username'];
		$_SESSION['Password'] = $user['Password'];
		$_SESSION['FirstName'] = $user['FirstName'];
		$_SESSION['LastName'] = $user['LastName'];
		$_SESSION['Company'] = $user['Company'];
		$_SESSION['userHash'] = hash('haval256,4', 'The quick brown fox jumped over the lazy dog.') . hash('ripemd320', $username . $password) ;
		include 'views/dashboard.php';
	} else {
		$error = "Please fill out the required fields indicated with *";
		include 'views/createAccount.php';
	}
	break;

	// FORGOT PASSWORD
	case 'forgotPassword':
	require_once 'models/forgotPassword.php';
	include 'views/forgotpassword.php';
	break;

	// SECURITY QUESTIONS
	case 'securityQuestions':
	require_once 'models/forgotPassword.php';
	$email = $_REQUEST['email'];
	$_SESSION['Email'] = $email;	
	if (getUserfromEmail($_SESSION['Email']) == "") {
		include 'views/forgotPassword.php';
	} else {
		$question = askSecurityQuestion($email);
		$_SESSION['question'] = $question['question'];
		$_SESSION['correctAnswer'] = $question['answer'];
		include 'views/securityQuestions.php';
	}
	break;

	// PASSWORD RESET
	case 'passwordReset':
	require_once 'models/forgotPassword.php';
	$userAnswer = $_REQUEST['userAnswer'];
	$correctAnswer = $_SESSION['correctAnswer'];
	if(verifyAnswer($userAnswer, $correctAnswer) == false) {
		include 'views/securityQuestions.php';
	} else {
		include 'views/passwordReset.php';
	}
	break;

	// VALIDATE NEW PASSWORD
	case 'validateNewPassword':
	require_once 'models/forgotPassword.php';
	$password1 = $_REQUEST['password1'];
	$password2 = $_REQUEST['password2'];
	if($password1 === $password2) {
		updatePassword($_SESSION['Email'], $password1);
		$_SESSION['newPassword'] = true;
		include 'views/login.php';
	} else {
		include 'views/passwordReset.php';	
	}
	break;

	// DASHBOARD
	case 'dashboard':
	require_once 'models/login.php';
	require_once 'models/dashboard.php';
	require_once 'models/products.php';
	require_once 'models/orders.php';
	if (!isset($_SESSION['Username']) && !isset($_SESSION['Password'])) {		
		include 'views/login.php';
	} else {
		$details = array();
		$user = getUserFromUsername($_SESSION['Username']);		
		$_SESSION['NewUser'] = hasOrder($user['UserID']);
		include 'views/dashboard.php';
	}

	break;

	// NEW ORDER
	case 'newOrder':
	require_once 'models/orders.php';
	require_once 'models/products.php';
	if(isset($_SESSION['UserID'])) {
		$products = getAllProducts();
		include 'views/order.php';
	} else {
		render_error('Something went wrong.');
	}
	break;

	// PLACE ORDER
	case 'placeOrder':
	require_once 'models/orders.php';
	if(isset($_REQUEST['submit']) && isset($_SESSION['userHash'])) {

		// Get product array (id, price)
		$product = $_REQUEST['ProductID'];
		// Convert to php array
		$productArray = explode(',', $product);
		// grab ID (first key)
		$productID = array_slice($productArray, 0, 1);
		// Set REQUEST['id'] to product ID from array
		$_REQUEST['ProductID'] = implode($productID);
		$_REQUEST['PricePaid'] = str_replace("$", "", $_REQUEST['PricePaid']);

		// add order
		addOrder($_REQUEST);
		// Cache Order data
		$orderResponse = 'Thank you for placing your order.';
		$_SESSION['NewUser'] = hasOrder($_SESSION['UserID']);

		include 'views/dashboard.php';
	} else {
		render_error('Something went wrong.');
	}
	break;


	// ALL ORDERS
	case 'allOrders':
	require_once 'models/orders.php';
	if(isset($_SESSION['UserID'])) {
		include 'views/allOrders.php';
	} else {
		render_error('Something went wrong.');
	}
	break;

	// LOGOUT
	case 'logOut':
	session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
	include 'views/login.php';
	break;

	// ----- EMPLOYEE ----- //
	case 'orderEmployee':
	include 'views/order-employee.php';
	break;

	// UNKNOWN ACTION
	default:
		render_error('Unknown request.');
	break;
}

