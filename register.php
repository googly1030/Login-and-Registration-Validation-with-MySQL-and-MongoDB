<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$Username= $_POST['Username'];
$age= $_POST['age'];
$dob= $_POST['dob'];
$contact= $_POST['contact'];

//fill all the fields
if(empty($_POST['Username']) || empty($_POST['age']) || empty($_POST['dob']) || empty($_POST['contact'])){
    echo json_encode( array('message' => 'fill all the fields') );
  exit();
}

// Insert data into MySQL table
$sql = "INSERT INTO register (Username, age, dob, contact) VALUES ('$Username', '$age', '$dob', '$contact')";
if ($conn->query($sql) === TRUE) {
  
    echo json_encode( array('success' => true) );

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>