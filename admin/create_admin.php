<?php
/****** Creating Account for accessing Add system *******/

require '../vendor/autoload.php'; // include Composer's autoloader

$username = "admin";
$password = md5("admin");

// $client = new MongoClient();
$client = new MongoDB\Client("mongodb://localhost:27017");

$collection = $client->feedback_system->account;

$result = $collection->insertOne( [ 'username' => $username , 'date' => date("Y-m-d")  , 'password' => $password ] );

echo "user for admin panel created '{$result->getInsertedId()}'";


 // if(isset($_POST['username']) && isset($_POST['password'])){
 //     $username = ($_POST['username']);
 //     $password = ($_POST['password']);
 //     $pass_hash = md5($password);


 //}
 ?>
