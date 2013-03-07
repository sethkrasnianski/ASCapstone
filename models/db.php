<?php
try 
{
    $db=new PDO(
            'mysql:host=localhost;dbname=ASCapstone', //dsn
            'root',//username
            '',//password
            //options:
            array(
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES=>false
                )
            );
}
catch (PDOException $ex) {
    error_log($ex->getMessage());
    require_once('models/render.php');
    $error = 'Could connect to the database. Try later.';
    include('views/errors.php');
    exit();
}