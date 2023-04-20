<?php

require 'vendor/autoload.php'; // Include the MongoDB PHP Library

// Create a MongoDB client
$client = new MongoDB\Client('mongodb://localhost:27017');

// Select a database and collection
$db = $client->mydb;
$collection = $db->data;

// Get the form data
$Username= $_POST['Username'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$about = $_POST['about'];

// Insert the form data into MongoDB
$document = [
    'Username' => $Username,
    'age' => $age,
    'dob' => $dob,
    'contact' => $contact,
    'address' => $address,
    'about' => $about,

];
//if filed is empty send message in json to ajax
if(empty($_POST['Username']) || empty($_POST['age']) || empty($_POST['dob']) || empty($_POST['contact']) || empty($_POST['address']) || empty($_POST['about'])){
    echo json_encode( array('message' => 'fill all the fields') );
  exit();
}

$result = $collection->insertOne($document);
//send data.success is true in json to ajax
if($result){
    echo json_encode( array('success' => true) );
    
}
else{
    echo json_encode( array('message' => 'error') );
    exit();
}




exit();
?>




