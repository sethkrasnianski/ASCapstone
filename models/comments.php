<?php
function addCommentDetail($Comment, $OrderDetailID)
{
	/* @var $db PDO */
	global $db;

	$query = 'INSERT INTO CommentDetail (Comment, OrderDetailID)
                VALUES (:Comment, :OrderDetailID)';
	$statement = $db->prepare($query);
	$statement->bindValue(':Comment', $Comment);
        $statement->bindValue(':OrderDetailID', $OrderDetailID);
	$statement->execute();
	$statement->closeCursor();
        
        //???????also add the commentID to the order detail ID somehow????????
        
        
}

function addCommentID($orderDetailID, $commentDetailID)
{
    /* @var $db PDO */
	global $db;
        
    $query = 'INSERT INTO Comment (OrderDetailID, CommentDetailID)
                VALUES (:OrderDetailID, :CommentDetailID)';
    $statement = $db->prepare($query);
	$statement->bindValue(':OrderDetailID', $orderDetailID);
        $statement->bindValue(':CommentDetailID', $commentDetailID);
	$statement->execute();
	$statement->closeCursor();
}

 function getCommentDetailID()
        {
            global $db;
            $query = 'SELECT CommentDetailID FROM CommentDetail ORDER BY CommentDetailID DESC LIMIT 1';
            $statement = $db->prepare($query);
            $statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
        return $results;
        }


//Mike 3-7        
        
 function getComment($OrderDetailID)
{
	/* @var $db PDO */
	global $db;
	$query = 'SELECT * FROM CommentDetail WHERE OrderDetailID = :OrderDetailID;';
	$statement = $db->prepare($query);
	$statement->bindValue(':OrderDetailID', $OrderDetailID);
	$statement->execute();
	$results = $statement->fetch();
	$statement->closeCursor();
	return $results;
}

//end Mike 3-7
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
