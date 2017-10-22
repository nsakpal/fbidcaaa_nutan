
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
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Event</button>
                <button type="add_event" class="btn btn-info btn-lg" data-toggle="add" data-target="#add_button">Add Event</button>
                <button id ="add_new_event" ></button>


                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
  
                        <!-- Event content-->
                        <div class="modal-content">
                            <form id = "createEventForm" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="row"><h2>Additional Event Details : <p id="selectedDate"> </p></h2></div>

                            </div>
                          
                                
                                <div class="modal-body">

                                    <div class="row">
                                        <p>Select a time</p>
                                        <div class="col-md-8">
                                            <div id="eventtimepicker"></div>
                                        </div>

                                    </div>
                                    <div class="eventDetailsClass">

                                        <div class="form-group">
                                            <label for="event_name">Event Name:</label>
                                            <input type="event_name" class="form-control" id="event_name" placeholder="Enter Event Name" name="event_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_lead">Event Lead:</label>
                                            <input type="contact_lead" class="form-control" id="event_date" placeholder="Enter Event Lead Name" name="contact_lead">
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_lead_email">Event Lead Email:</label>
                                            <input type="contact_lead_email" class="form-control" id="event_date" placeholder="Enter Event Lead Email" name="contact_lead_email">
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_lead_phone">Event Lead Phone Number:</label>
                                            <input type="contact_lead_phone" class="form-control" id="event_date" placeholder="000-000-0000" name="contact_lead_phone">
                                        </div>

                                        <div class="form-group">
                                            <label for="event_location">Event Location:</label>
                                            <input type="event_location" class="form-control" id="event_date" placeholder="Enter Event Location" name="event_location">
                                        </div>


                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="create_new_event" class="btn btn-default">Create New Event</button>   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                <input type= "text" name="event_time" id ="event_time_" style ="visibility:hidden;">
                                <input type= "text" name="event_date" id ="event_date_" style ="visibility:hidden;">
                            </form>

                        </div>

                    </div>
                </div>

            </div>

            <!--/row-->
        </div>
        

        <div id="listofevents"class="table-responsive"></div>


    </body>
    
    
</html>

