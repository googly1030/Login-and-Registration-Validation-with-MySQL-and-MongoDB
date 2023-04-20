<?php

require 'vendor/autoload.php'; // Include the Predis library

// Create a Redis client
$redis = new Predis\Client();

// Get the form data
$Email = $_POST['Email'];
$password = $_POST['password'];

// Store the email and password data in Redis
$redis->set($Email, $password);

if(empty($_POST['Email']) || empty($_POST['password'])){
 echo json_encode( array('message' => 'fill all the fields') );
 
  exit();

}
//check if email matches with 
$Email=$_POST['Email'];
$Password=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);
//select email and password from the database
$select = mysqli_query($conn, "SELECT * FROM signup WHERE email = '".$_POST['Email']."' AND password = '".$_POST['password']."'");

if(mysqli_num_rows($select)) {
  echo json_encode( array('success' => true) );
}

else{
  echo json_encode( array('message' => 'invalid email or password') );
  exit();
}


?>





