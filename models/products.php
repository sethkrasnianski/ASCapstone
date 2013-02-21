<?php  

	function getAllProducts() {
		/* @var $db PDO */
		global $db;
		$query = 'SELECT * FROM Product';
		$statement = $db->prepare($query);
		$statement->execute();
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

?>