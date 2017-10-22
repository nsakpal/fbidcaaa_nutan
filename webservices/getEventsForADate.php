<?php

session_start();


$selected_date = $_POST["selected_date"];

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

$sql = "SELECT * FROM events where event_date='" . $selected_date . "'";
$result = $conn->query($sql);
echo "<table class='table'>";

echo"<thead>
      <tr>
        <th></th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Event Time</th>
        <th>Event Location</th>
        <th>Event Contact</th>
        <th>Event Contact Phone</th>
        <th>Event Contact Email</th>
      </tr>
    </thead>";


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        if ($_SESSION['u_access'] == 'WRITE') {
            echo "<tr><td   event_date='" . $row["event_date"] . "' event_lead_phone='" . $row["event_lead_phone"] . "' event_lead_email='" . $row["event_email"] . "' event_id='" . $row["event_id"] . "' event_name='" . $row["event_name"] . "' event_time='" . $row["event_time"] . "' event_loc='" . $row["event_location"] . "' event_lead='" . $row["event_lead"] . "'><div class='input-group-addon glyphicon glyphicon-trash btn btn-primary-outline delete_event' /><div class='input-group-addon glyphicon glyphicon-pencil btn btn-primary-outline edit_event' /> <div class='input-group-addon glyphicon glyphicon-user btn btn-primary-outline inviteAttendees' /> </td><td>" . $row["event_name"] . "</td><td>" . $row["event_date"] . "</td><td>" . $row["event_time"] . "</td><td><a href='#' class='showMapClass'>" . $row["event_location"] . "</a></td><td>" . $row["event_lead"] . "</td><td>" . $row["event_lead_phone"] . "</td><td>" . $row["event_email"] . "</td></tr>";
        } else {
            echo "<tr><td event_id='" . $row["event_id"] . "'> <button type='button' class='btn btn-info btn-lg registerMeForThisEvent' >I want to attend </button></td><td>" . $row["event_name"] . "</td><td>" . $row["event_date"] . "</td><td>" . $row["event_time"] . "</td><td><a href='#' class='showMapClass'>" . $row["event_location"] . "</a></td><td>" . $row["event_lead"] . "</td><td>" . $row["event_lead_phone"] . "</td><td>" . $row["event_email"] . "</td></tr>";
        }
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>