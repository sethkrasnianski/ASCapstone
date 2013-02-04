<?php 

	function validateNewUser($user) {
		if(is_array($user)) {
		   	if(	$user['FirstName'] === "" ||
		   		$user['LastName'] === "" ||
		   		$user['Company'] === "" ||
		   		$user['Company'] === "" ||
		   		$user['Street'] === "" ||
		   		$user['City'] === "" ||
		   		$user['State'] === "" ||
		   		$user['Zip'] === "" ||
		   		$user['Phone'] === "" ||
		   		$user['Email'] === "" ||
		   		$user['Username'] === "" ||
		   		$user['Password'] === ""
		   	){
		    	return false;
		    } else {

		    	return true;
		    }
		}
		// $user['FirstName']);
		// $user['MiddleName']);
		// $user['LastName']);
		// $user['Company']);
		// $user['Street']);
		// $user['Street2']);
		// $user['City']);
		// $user['State']);
		// $user['Zip']);
		// $user['Phone']);
		// $user['Email']);
		// $user['DOB']);	
		// $user['Username']);
		// $user['Password']);
	}

 ?>