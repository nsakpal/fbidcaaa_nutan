//This javascript file does all the functionality for the calendar page

$(document).ready(function () {

    //admin is able to add an event 
    $("#addEventButton").click(function (e2) {
        e2.preventDefault(); //prevents any default actions

        //load the UI file
        $('#myModal').load('/uiElements/createEventHTML.php', function () {

            //lets admin select a different date and time when adding an event
            $('#eventtimepicker').datetimepicker({
                inline: true,
                format: "hh:mm a",
                defaultDate: $('#datetimepicker').data('DateTimePicker').date()
            });
            //Seperate date and the time for the UI
            var temp = $('#datetimepicker').data('DateTimePicker').date().toString().split(" ");

            //seperates the day, month, date, and the year
            $('#selectedDate').text(temp[0] + ' ' + temp[1] + ' ' + temp[2] + ' ' + temp[3]);

            //display the date
            $('#myModal').modal({show: true});

            //close button for the add event form
            $('#closeButton').click(function (e) {
                e.preventDefault(); //prevents any default actions
                $('#myModal').modal('hide');
            });

            //create event button
            $("#createEventFormButton").click(function (e1) {
                e1.preventDefault();

                //Seperate date and the time for the UI
                var temp = $('#datetimepicker').data('DateTimePicker').date().toString().split(" ");

                //seperates the day, month, date, and the year
                var date = temp[0] + ' ' + temp[1] + ' ' + temp[2] + ' ' + temp[3];
                var time = $('#eventtimepicker').data('DateTimePicker').date().format('hh:mm a');

                //
                var eventname = $('[name="event_name"]').val();
                var eventlead = $('[name="contact_lead"]').val();
                var eventemail = $('[name="contact_lead_email"]').val();
                var eventphone = $('[name="contact_lead_phone"]').val();
                var eventlocation = $('[name="event_location"]').val();
                var url = "/webservices/createAnEventInDatabase.php";
                $.ajax({

                    //posting the form information to the webservices
                    type: "POST",
                    url: url,
                    data: {"event_date": date,
                        "event_time": time,
                        "event_name": eventname,
                        "contact_lead": eventlead,
                        "contact_lead_email": eventemail,
                        "contact_lead_phone": eventphone,
                        "event_location": eventlocation,
                        "event_datetime": $('#eventtimepicker').data('DateTimePicker').date().toString()},

                    //
                    success: function (data)
                    {
                        $('#myModal').modal('hide');
                        loadEventsForADate(date);
                    }


                });


            });

        });

    });

    //display the datetime picker next to each other
    $('#datetimepicker').datetimepicker({
        inline: true,
        sideBySide: false,
        format: 'MM/dd/yyyy'
    });

    //Seperate date and the time for the UI
    var temp1 = $('#datetimepicker').data('DateTimePicker').date().toString().split(" ");

    //seperates the day, month, date, and the year
    var date1 = temp1[0] + ' ' + temp1[1] + ' ' + temp1[2] + ' ' + temp1[3];
    loadEventsForADate(date1);

    //displays the event information for the date selected
    $("#datetimepicker").on("dp.change", function (e) {

        var temp = e.date.toString().split(" ");

        loadEventsForADate(temp[0] + ' ' + temp[1] + ' ' + temp[2] + ' ' + temp[3]);

    });
});

function loadEventsForADate(dateObject) {

    var url = "/webservices/getEventsForADate.php";
    $.ajax({
        type: "POST",
        url: url,
        data: {"selected_date": dateObject}, // serializes the form's elements.
        success: function (data)
        {
            //ui widget that deletes that particular event
            $("#listofevents").html(data);
            $(".delete_event").click(function (e) {
                delete_event_function($(this).parent().attr('event_id'), $(this).parent().attr('event_name'), $(this).parent().attr('event_time'), $(this).parent().attr('event_loc'));
            });

            //ui widget that edits event infomation
            $(".edit_event").click(function (e) {
                edit_event_function($(this).parent().attr('event_id'));
            });

            //ui widget to invite attendees for an event
            $(".inviteAttendees").click(function (e) {
                //get the parent to select the attribute
                inviteattendees_to_event_function($(this).parent().attr('event_id'),
                        $(this).parent().attr('event_date'),
                        $(this).parent().attr('event_name'),
                        $(this).parent().attr('event_time'),
                        $(this).parent().attr('event_loc'),
                        $(this).parent().attr('event_lead'),
                        $(this).parent().attr('event_lead_phone'),
                        $(this).parent().attr('event_lead_email'),
                        );
            });


            //general user is able to register for an event
            $(".registerMeForThisEvent").click(function (e) {
                var eventId = $(this).parent().attr('event_id');
                $.ajax({

                    url: '/webservices/registerForAnEvent.php',
                    type: 'POST',
                    data: {
                        'event_id': eventId
                    },

                    success: function (data) {
                        alert('Data: ' + data);
                    }
                });


            });

            //click function to show map
            $(".showMapClass").click(function (e) {
                e.preventDefault();
                var loc = $(this).text();
                var eventNameForShowMap = $(this).parent().parent().children().first().attr('event_name');
                $('#myModal').load('/uiElements/showmap.php', function () {
                    $("#locationTitle").text(eventNameForShowMap);

                    //display google map
                    $('#myModal').modal({show: true});
                    var encodedLOC = encodeURIComponent(loc);
                    $("#showMap").attr('src', 'https://www.google.com/maps/embed/v1/place?q=' + encodedLOC + '&key=AIzaSyB6g_H_DIVQbkmWUm_xr9Ul0Apcsa2GDYk');
                    $('#closeButton').on('click', function (e) {
                        $('#myModal').modal('hide');
                    });

                });

            });
        }
    });
}
//function to invite attendees
function inviteattendees_to_event_function(event_id_obj, event_date_obj, event_name_obj, event_time_obj, event_location_obj, event_contact_obj, event_contact_phone_obj, event_contact_email_obj) {

    //connects to the UI form to invite attendees
    $('#myModal').load('/uiElements/addAttendeesAdmin.php', function () {
        //shows the selected event name
        $("#event_name").val(event_name_obj);
        //displays defaut message with the event information
        $("#event_message").val("Event Date: " + event_date_obj + "<br>Event Time: " + event_time_obj + "<br>Event Location : " + event_location_obj + "<br>Event Contact Name: " + event_contact_obj + "<br>Event Contact Phone: " + event_contact_phone_obj + "<br>Event Contact Email: " + event_contact_email_obj);


        $('#send_invite').click(function (e) {
            var url = "/webservices/sendEmail.php";
            $.ajax({
                type: "POST",
                url: url,
                // serializes the form's elements
                data: {"attendees": $("#attendeesList").val().replace(/,/g, ";"), "event_name": event_name_obj, "message_body": $("#event_message").val()},
                success: function (data)
                {
                   // alert(data);

                    $('#myModal').modal('hide');

                }
            });
        });

        //reads members from the database to send invites to 
        $('#myModal').modal({show: true});
        
        $('#closeButton').on('click', function (e) {
            $('#myModal').modal('hide');
        });

    });
}

//function to delete an event
function delete_event_function(event_id_obj, event_name, event_time, event_loc) {

    $('#myModal').load('/uiElements/delete_event_popup.php', function () {

        //displays the event information to be deleted
        $("#event_name_forDelete").text(event_name);
        $("#event_time_forDelete").text(event_time);
        $("#event_loc_forDelete").text(event_loc);

        $('#myModal').modal({show: true});
        $('#confirm_delete').on('click', function (e) {

            //calling the webservice to delete
            var url = "/webservices/deleteAnEventInDatabase.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {"event_id": event_id_obj}, // serializes the form's elements (key and value)
                success: function (data)
                {
                    var temp = $('#datetimepicker').data('DateTimePicker').date().toString().split(" ");

                    var date = temp[0] + ' ' + temp[1] + ' ' + temp[2] + ' ' + temp[3];
                    loadEventsForADate(date);
                    $('#myModal').modal('hide');


                }
            });
        });
    });
}

//function to edit an event
function edit_event_function(event_id_obj) {

    //calling the webservice to edit
    var url = "/webservices/editEventForEventID.php";
    $.ajax({
        type: "POST",
        url: url,
        data: {"event_id": event_id_obj}, // serializes the form's elements (key and value)
        success: function (data)
        {
            //shows the edit form
            $('#myModal').html(data);
            $('#myModal').modal({show: true});

            $('#save_changes').click(function (e) {
                e.preventDefault();
                //lets the admin to select new date and time
                var temp = $('#neweventdatetimepicker').data('DateTimePicker').date().toString().split(" ");

                //seperates the day, month, date, and the year
                var date = temp[0] + ' ' + temp[1] + ' ' + temp[2] + ' ' + temp[3];
                var time = $('#neweventdatetimepicker').data('DateTimePicker').date().format('hh:mm a');

                //stores the changed information
                var eventname = $('[name="event_name"]').val();
                var eventlead = $('[name="contact_lead"]').val();
                var eventemail = $('[name="contact_lead_email"]').val();
                var eventphone = $('[name="contact_lead_phone"]').val();
                var eventlocation = $('[name="event_location"]').val();
                var url = "/webservices/savechanges.php";
                $.ajax({

                    //posting the form information to the webservices
                    type: "POST",
                    url: url,
                    data: {"event_id": event_id_obj,
                        "event_date": date,
                        "event_time": time,
                        "event_name": eventname,
                        "contact_lead": eventlead,
                        "contact_lead_email": eventemail,
                        "contact_lead_phone": eventphone,
                        "event_location": eventlocation,
                        "event_datetime": $('#neweventdatetimepicker').data('DateTimePicker').date().toString()},

                    //close the function
                    success: function (data)
                    {
                        $('#myModal').modal('hide');
                        $('#datetimepicker').data('DateTimePicker').date($('#neweventdatetimepicker').data('DateTimePicker').date());
                    }
                });

            });
        }
    });
}

