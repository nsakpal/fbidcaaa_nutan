/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//declare global variables
var GLOBAL_EVENT_DATE = null;
var GLOBAL_EVENT_TIME = null;

$(document).ready(function () {
    $("#myModal").on('shown.bs.modal', function () {

        $('#selectedDate').text(GLOBAL_EVENT_DATE);
        $('#event_date_').val(GLOBAL_EVENT_DATE);      
        $('#event_time_').val(GLOBAL_EVENT_TIME);

    });

    $('#datetimepicker').datetimepicker({
        inline: true,
        sideBySide: false,
        format: 'MM/dd/yyyy'
    });
    $('#eventtimepicker').datetimepicker({
        inline: true,
        format: "hh:mm a"
    });


    $("#eventtimepicker").on("dp.change", function (e) {

        GLOBAL_EVENT_TIME = e.date.format('hh:mm a');
        
        $('#event_time_').val(GLOBAL_EVENT_TIME); 


    });

    $("#createEventForm").submit(function (e){
         var url = "/webservices/createAnEventInDatabase.php";
         var date = $('#datetimepicker').data('DateTimePicker').date();
         var time = $('#eventtimepicker').data('DateTimePicker').date();
         var eventname = $('[name="event_name"]').text();
         var eventlead = $('[name="event_lead"]').text();
         var eventemail = $('[name="event_email"]').text();
         var eventphone = $('[name="event_phone"]').text();
         var eventlocation = $('[name="event_location"]').text();
//alert($("#createEventForm").serialize());

//alert($("#event_date_").text());
        $.ajax({
            type: "POST", 
            url: url,
            //data:{event_date:date,event_time:time,event_name:eventname,event_lead:eventlead,event_email:eventemail,event_phone:eventphone,event_location:eventlocation},
            data: $("#createEventForm").serialize(),
            success: function(data)
            {
                //alert(data);
            }
            
            
        });
        e.preventDefault();
        
    }) ;
    
    
    $("#datetimepicker").on("dp.change", function (e) {
        GLOBAL_EVENT_DATE = e.date;
        var temp = e.date.toString().split(" ");
        GLOBAL_EVENT_DATE = temp[0] + ' ' + temp[1] + ' ' + temp[2] + ' ' + temp[3];
        /*
         * 
         * Make an Ajax call to get the list of all the events on the date picked out by
         * the user
         * 
         * **/
        
        loadEventsForADate(GLOBAL_EVENT_DATE);
        
    });
    
});

function loadEventsForADate(dateObject){
   
   var url = "/webservices/getEventsForADate.php"; 
    $.ajax({
           type: "POST",
           url: url,
           data: {"selected_date":dateObject}, // serializes the form's elements.
           success: function (data)
           {
                  $("#listofevents").html(data);

                       // $("#createEventForm").(data); // show response from the php script.
           }
       });
}

