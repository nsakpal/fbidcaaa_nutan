
<?php
//delete event based on event id

$event_id= $_POST["event_id"];


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

//delete event from the database based on the event_id
$sql = "delete from events where event_id=".$event_id;

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "Event deleted successfully";

?>
