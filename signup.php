<?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";
$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Extract the data sent by the AJAX request
   
    $Email = $_POST["Email"];
    $password = $_POST["password"];
    
    //fill all the fields
    if(empty($_POST['Email']) || empty($_POST['password'])){
        echo json_encode( array('message' => 'fill all the fields') );

      exit();
    }
    //if email already exists
    $select = mysqli_query($conn, "SELECT * FROM signup WHERE email = '".$_POST['Email']."'");
    if(mysqli_num_rows($select)) {
        echo json_encode( array('message' => 'email already exists') );
        exit();
    }
    // Insert the data into MySQL
    $sql = "INSERT INTO signup ( Email, password) VALUES ('$Email', '$password')";
    if ($conn->query($sql) === TRUE) {
       //send data.success is true in json to ajax
        echo json_encode( array('success' => true) );
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
