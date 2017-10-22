<?php


$event_id = $_POST["event_id"];

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

$sql = "SELECT * FROM events where event_id=" . $event_id . "";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        echo "<div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
        <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <div class='row'><h2>Additional Event Details : <p id='selectedDate'> </p></h2></div>
        </div>
        <div class='modal-body'>
            <form id = 'createEventForm' >
                <div class='row'>
                    <p>Select a time</p>
                    <div class='col-md-8'>
                        <div id='neweventdatetimepicker'></div>
                        <script type='text/javascript'>
                        $(function(){
                            $('#neweventdatetimepicker').datetimepicker({
                inline: true,
                sideBySide: true,
                    defaultDate:"."moment('" . $row["event_datetime"] ."')". "
            });
                        });

                    </script>
                    </div>

                </div>
                <div class='eventDetailsClass'>

                    <div class='form-group'>
                        <label for='event_name'>Event Name:</label>
                        <input type='event_name' class='form-control' id='event_name' placeholder='Enter Event Name' name='event_name' value='" . $row["event_name"] ."'>
                    </div>
                    <div class='form-group'>
                        <label for='contact_lead'>Event Lead:</label>
                        <input type='contact_lead' class='form-control' id='event_date' placeholder='Enter Event Lead Name' name='contact_lead' value='" . $row["event_lead"] ."'>
                    </div>

                    <div class='form-group'>
                        <label for='contact_lead_email'>Event Lead Email:</label>
                        <input type='contact_lead_email' class='form-control' id='event_date' placeholder='Enter Event Lead Email' name='contact_lead_email' value='" . $row["event_email"] ."'>
                    </div>

                    <div class='form-group'>
                        <label for='contact_lead_phone'>Event Lead Phone Number:</label>
                        <input type='contact_lead_phone' class='form-control' id='event_date' placeholder='000-000-0000' name='contact_lead_phone' value='" . $row["event_lead_phone"] ."'>
                    </div>

                    <div class='form-group'>
                        <label for='event_location'>Event Location:</label>
                        <input type='event_location' class='form-control' id='event_date' placeholder='Enter Event Location' name='event_location' value='" . $row["event_location"] ."'>
                    </div>
                </div>

            </form>
        </div>
        <div class='modal-footer'>
            <button type='save_changes' id='save_changes' class='btn btn-default'>Save Changes</button>   
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            <input type= 'text' name='event_time' id ='event_time_' style ='visibility:hidden;'>
            <input type='text' name='event_date' id ='event_date_' style ='visibility:hidden;'>
        </div>
    </div>
</div>";

        // echo "<tr><td event_id='". $row["event_id"]. "' event_name='". $row["event_name"]. "' event_time='". $row["event_time"]. "' event_loc='". $row["event_location"]. "'><div class='input-group-addon glyphicon glyphicon-trash btn btn-primary-outline delete_event' /><div class='input-group-addon glyphicon glyphicon-pencil btn btn-primary-outline edit_event' /> </td><td>". $row["event_name"]. "</td><td>" . $row["event_date"]. "</td><td>" . $row["event_time"]. "</td><td>". $row["event_location"]. "</td><td>". $row["event_lead"]. "</td><td>". $row["event_lead_phone"]. "</td><td>". $row["event_email"]. "</td></tr>";
    }
} else {
    
}

$conn->close();
?>