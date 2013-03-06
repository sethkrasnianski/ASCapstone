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

	function getOneProduct($productID) {
		global $db;
		$query = "SELECT * FROM Product WHERE ProductID = :ProductID";
		$statement = $db->prepare($query);
		$statement->bindValue(':ProductID', $productID);
		$statement->execute();
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);
		$statement->closeCursor();
		return $results;
	}
?>