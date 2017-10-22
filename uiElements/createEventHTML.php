

<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="row"><h2>Additional Event Details : <p id="selectedDate"> </p></h2></div>
        </div>
        <div class="modal-body">
            <form id = "createEventForm" >
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

            </form>
        </div>
        <div class="modal-footer">
            <button type="create_new_event" id="createEventFormButton" class="btn btn-default">Create New Event</button>   
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type= "text" name="event_time" id ="event_time_" style ="visibility:hidden;">
            <input type="text" name="event_date" id ="event_date_" style ="visibility:hidden;">
        </div>
    </div>
</div>