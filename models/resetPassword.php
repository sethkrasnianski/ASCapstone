<?php 

function getUserFromDob($dob)
{
	/* @var db PDO */
	global $db;

	$query = 'SELECT * FROM UserTable WHERE DOB = :DOB';
	$statement = $db->prepare($query);
	$statement->bindValue(':DOB', $dob);
	$statement->execute();
	$results = $statement->fetchAll();
	$statement->closeCursor();
	return $results;
}

function verifyDOB($dob)
{
	$_dob = getUserFromDob($dob);

	if (isset($user))
	{
		if ($_dob == $dob['dob'])
		{
			//username was found and password is a match
			return $_dob;
		}
		else
		{
			//password does not match record for username
			return false;
		}

	}
	else
	{
		//no record for username found
		return false;
	}
}

?>