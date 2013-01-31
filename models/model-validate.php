<?php 

	function validate_create_account($user) {
		if(is_array($user)) {
		   	if(	$user['FirstName'] === "" ||
		   		$user['MiddleName'] === ""
		   	){
		    	return 'Please fill required fields.';
		    } else {
		    	return 'Account Created';
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