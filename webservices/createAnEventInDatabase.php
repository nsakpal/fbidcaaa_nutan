
<?php

//This file creates an event in the database

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

//Insert data to create an event which will be saved into the database
$sql = "INSERT INTO events (event_name, event_date, event_time, event_lead, event_email, event_lead_phone, event_location,event_datetime)
VALUES ('".$event_name."', '".$event_date."', '".$event_time."','". $contact_lead."' , '". $contact_lead_email."' , '".$contact_lead_phone."' , '". $event_location."','".$event_datetime. "')";

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "New event created successfully";

echo $event_date;
?>
