
<?php
//This file lets the admin to save changes edited changes in the database

$event_id = $_POST["event_id"];
$event_name= $_POST["event_name"];
$event_date= $_POST["event_date"];
$event_time= $_POST["event_time"];
$contact_lead= $_POST["contact_lead"];
$contact_lead_email= $_POST["contact_lead_email"];
$contact_lead_phone= $_POST["contact_lead_phone"];
$event_location= $_POST["event_location"];
$event_datetime = $_POST["event_datetime"];

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

//update edited fields in the databse
$sql = "update events set event_name = '".$event_name."' , event_date = '".$event_date."', event_time = '".$event_time."', event_lead = '".$contact_lead."', event_email = '".$contact_lead_email."', event_lead_phone = '".$contact_lead_phone."', event_location = '".$event_location."',event_datetime = '".$event_datetime."' where event_id='" . $event_id."'";

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "New event created successfully";

echo $event_date;
?>
