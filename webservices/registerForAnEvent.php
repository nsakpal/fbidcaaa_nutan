<?php
session_start();

$event_id = $_POST["event_id"];
$user_id = $_SESSION['u_id_no'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "insert into eventattendees (event_id,user_id) values ('".$event_id."','".$user_id."')";

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "Registered for the event";
?>