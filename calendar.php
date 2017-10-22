

<!DOCTYPE html>


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="/calendarWidget/js/jquery.js"></script>
        <script type="text/javascript" src="/calendarWidget/bootstrap/js/moment.js"></script>
        <script type="text/javascript" src="/calendarWidget/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/calendarWidget/js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="/calendarWidget/js/customfunctions.js"></script>
        <link href="/calendarWidget/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
        <link href="/calendarWidget/bootstrap/css/bootstrap.css" rel="stylesheet"> 
       

        <script type="text/javascript" src="/calendarWidget/js/jquery.tokeninput.js"></script>
        <link rel="stylesheet" href="/calendarWidget/css/token-input.css" type="text/css" />
        <link rel="stylesheet" href="/calendarWidget/css/token-input-facebook.css" type="text/css" />
         <link href="/calendarWidget/css/custom.css" rel="stylesheet"> 
    </head>

    <body style="align-content: center">

        <div class="container">

            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <div id="datetimepicker"></div>
                    </div>
                </div>
                <!--/span-->
            </div>

            <div>
                <!-- Trigger the event with a button -->

                <?php
                
                //check if the session is logged in
                 session_start();
                if(isset($_SESSION['u_access'])){
                   
                    if ($_SESSION['u_access'] == 'WRITE') {
                    echo "<button type='button' class='btn btn-info btn-lg' id='addEventButton'>Add Event</button>";
                }
                }else{
                    header('Location: /index.php');
                }
                
                ?>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog"></div>
                <div class="modal fade" id="success" role="dialog"></div>

            </div>


            <div id="listofevents"class="table-responsive"></div>

        </div>
    </body>


</html>

