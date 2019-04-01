<?php
/**Config File for DB connection**/
require 'config.php' ;
/******Selecting Collection For usage*******/
$var = 'feedback';
$feedback = $_POST['feedback'] ;
$collection = $db->$var;
/*Inserting Data in DB*/
$result = $collection->insertOne( [  'date' => date('Y/m/d')   , 'feedback' => $feedback ] );
/***Output for the insertion shown***/
echo "Inserted with Object ID '{$result->getInsertedId()}'";

?>
