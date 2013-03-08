<?php

// function createNewOrder($userID, $inactive) {
// 	global $db;
// 	$query = "INSERT INTO Orders (UserID, Inactive) VALUES (:UserID, :Inactive)";
// 	$statement = $db->prepare($query);
// 	$statement->bindValue(':UserID', $userID);
// 	$statement->bindValue(':Inactive', $inactive);
// 	$statement->execute();
// 	$statement->closeCursor();
// }


function addOrder($order)
{
	/* @var $db PDO */
	global $db;

	$query = 'INSERT INTO OrderDetail (UserID, Quantity, ProductID, StatusID,
				ProjectedShipDate, OrderDate, TaskID, ActualShipDate, PONumber, SpecialAssignment1, SpecialAssignment2, SpecialAssignment3, PricePaid) 
              VALUES (:UserID, :Quantity, :ProductID, :StatusID, :ProjectedShipDate, 
                :OrderDate, :TaskID, :ActualShipDate, :PONumber, :SpecialAssignment1, :SpecialAssignment2, :SpecialAssignment3, :PricePaid)';
	$statement = $db->prepare($query);
	$statement->bindValue(':UserID', $order['UserID']);
	$statement->bindValue(':Quantity', $order['Quantity']);
	$statement->bindValue(':ProductID', $order['ProductID']);
	$statement->bindValue(':StatusID', $order['StatusID']);
	$statement->bindValue(':ProjectedShipDate', $order['ProjectedShipDate']);
	$statement->bindValue(':OrderDate', $order['OrderDate']);
	$statement->bindValue(':TaskID', $order['TaskID']);
	$statement->bindValue(':ActualShipDate', $order['ActualShipDate']);
	$statement->bindValue(':PONumber', $order['PONumber']);
	$statement->bindValue(':SpecialAssignment1', $order['SpecialAssignment1']);
	$statement->bindValue(':SpecialAssignment2', $order['SpecialAssignment2']);
	$statement->bindValue(':SpecialAssignment3', $order['SpecialAssignment3']);	
	$statement->bindValue(':PricePaid', $order['PricePaid']);
	$statement->execute();
	$statement->closeCursor();
}

function hasOrder($userID) {
	$hasOrder = getOrderDetail($userID);
	if(isset($hasOrder[0])) {
		return 1;
	} else {
		return 0;
	}
}

        function getOrderDetail($userID)
{
	/* @var $db PDO */
	global $db;
	$query = 'SELECT * FROM OrderDetail WHERE UserID = :UserID;';
	$statement = $db->prepare($query);
	$statement->bindValue(':UserID', $userID);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $results;
}
     

 function getOrderDetailFromTaskTable($userID)
{
	/* @var $db PDO */
	global $db;
	$query = 'SELECT OrderDetailID FROM TaskTable WHERE UserID = :UserID;';
	$statement = $db->prepare($query);
	$statement->bindValue(':UserID', $userID);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $results;
}

        function getOrderByOrderDetail($orderDetailID)
{
	/* @var $db PDO */
	global $db;
	$query = 'SELECT * FROM OrderDetail WHERE OrderDetailID = :OrderDetailID;';
	$statement = $db->prepare($query);
	$statement->bindValue(':OrderDetailID', $orderDetailID);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $result;
}

        function getOrderDetailID()
        {
            /* @var $db PDO */
            global $db;
            $query = 'SELECT OrderDetailID FROM OrderDetail ORDER BY OrderDetailID DESC LIMIT 1';
            $statement = $db->prepare($query);
            $statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
        return $results;
        }

        function updateOrder($order)
{
	/* @var $db PDO */
	global $db;

	$query = 'UPDATE OrderDetailTable Set Quantity = :Quantity, ProductID = :ProductID, StatusID = :StatusID,
		ProjectedShipDate = :ProjectedShipDate, OrderDate = :OrderDate, TaskAssignmentID = :TaskAssignmentID, ActualShipDate = :ActualShipDate, 
                PONumber = :PONumber, SpecialAssignment1 = :SpecialAssignment1, SpecialAssignment2 = :SpecialAssignment2, 
                SpecialAssignment3 = :SpecialAssignment3, PricePaid = :PricePaid, CommentID = :CommentID, WHERE OrderDetailID = :OrderDetailID'; 
                
	$statement = $db->prepare($query);
	$statement->bindValue(':Quantity', $order['Quantity']);
	$statement->bindValue(':ProductID', $order['ProductID']);
	$statement->bindValue(':StatusID', $order['StatusID']);
	$statement->bindValue(':ProjectedShipDate', $order['ProjectedShipDate']);
	$statement->bindValue(':OrderDate', $order['OrderDate']);
	$statement->bindValue(':TaskAssignmentID', $order['TaskAssignmentID']);
	$statement->bindValue(':ActualShipDate', $order['ActualShipDate']);
	$statement->bindValue(':PONumber', $order['PONumber']);
	$statement->bindValue(':SpecialAssignment1', $order['SpecialAssignment1']);
	$statement->bindValue(':SpecialAssignment2', $order['SpecialAssignment2']);
	$statement->bindValue(':SpecialAssignment3', $order['SpecialAssignment3']);	
	$statement->bindValue(':PricePaid', $order['PricePaid']);
	$statement->bindValue(':CommentID', $order['CommentID']);

	$statement->execute();
	$statement->closeCursor();
        
}
        function getUserOrders($userID) {
            /* @var $db PDO */
			global $db;
			$query = 'SELECT * FROM OrderDetail WHERE UserID = :UserID';
			$statement = $db->prepare($query);
			$statement->bindValue(':UserID', $userID);
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor();
			return $results;
        }
        
         function getAllOrders() {
            /* @var $db PDO */
			global $db;
			$query = 'SELECT * FROM OrderDetail';
			$statement = $db->prepare($query);			
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$statement->closeCursor();
			return $results;
        }
        
        //add more retrieve order functions for returning sorted lists
        
        function getOrderDetailTask ($TaskAssignmentID)
        {
             /* @var $db PDO */
	global $db;
	$query = 'SELECT * FROM OrderDetailTable WHERE TaskAssignmentID = :TaskAssignmentID;';
	$statement = $db->prepare($query);
	$statement->bindValue(':TaskAssignmentID', $TaskAssignmentID);
	$statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
	return $results;
        }
        
        
         function getOrderDetailStatus ($StatusID)
        {
             /* @var $db PDO */
	global $db;
	$query = 'SELECT * FROM OrderDetailTable WHERE StatusID = :StatusID;';
	$statement = $db->prepare($query);
	$statement->bindValue(':StatusID', StatusID);
	$statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
	return $results;
        }
        
        function getOrderDetailPONumber ($PONumber)
        {
             /* @var $db PDO */
	global $db;
	$query = 'SELECT * FROM OrderDetailTable WHERE PONumber = :PONumber;';
	$statement = $db->prepare($query);
	$statement->bindValue(':PONumber', PONumber);
	$statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
	return $results;
        }

