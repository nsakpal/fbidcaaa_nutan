<!-- Css Files
<html>
<head>
-->

<!-- Css Files
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> 
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
-->
<!-- JS Files
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>

</head>
<body>
-->


<script src="/calendarWidget/js/jquery-ui.js"></script>
<script src="/calendarWidget/js/bootstrap-tokenfield.js"></script>
<link rel="stylesheet" href="/calendarWidget/css/bootstrap-tokenfield.css" />
<link rel="stylesheet" href="/calendarWidget/css/jquery-ui.css" />


<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Invite Attendees</h4>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="form-group">
                    <label for="attendees_name">Attendees:</label>
                    <input type="text"  id="attendeesList" >
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#attendeesList').tokenfield({
                                autocomplete: {
                                    source:
<?php
//This file gets memmbers from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar";
$mysqli = new mysqli($servername, $username, $password, $dbname);
$rows = [];
$query = "SELECT  m_email FROM members ";

//$sql = "SELECT m_first_name as name, m_email as id FROM members WHERE name LIKE '%%%s%%' ORDER BY popularity DESC LIMIT 10";

$result = $mysqli->query($query);


while ($row = $result->fetch_assoc()) {
    $rows[] = $row['m_email'];
}

echo "[";
foreach ($rows as $item) {
    echo "'" . $item . "',";
}
echo "'nope']";
?>,
                                    delay: 100

                                },
                                showAutocompleteOnFocus: true

                            })
                        });

                    </script>

                </div>
                <div class="form-group">
                    <label for="event_subject">Subject:</label>
                    <input type="event_subject" class="form-control" id="event_name" placeholder="Event Name" name="event_subject">
                </div>

                <div class="form-group">
                    <label for="event_message">Event Message:</label>
                    <textarea  type="event_message" class="form-control" id="event_message" placeholder="Enter Event Message" name="event_message"></textarea>
                </div>

            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="send_invite">Send Invite</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>

            </div>
        </div>
    </div>
</div>
<!--  </body>
  
</html> -->