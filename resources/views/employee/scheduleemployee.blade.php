{{-- <!DOCTYPE html>
<html>
<head>
    <title>Schedule Employee</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
</head>
<body>

<div class="container">
    <br />
    <br />

    <div id="calendar"></div>

</div>

<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/full-calender',

       // load data in the fullCalendar

       data =


    });

});

</script>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rooster</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>


  <!-- Modal -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Shift details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="title" readonly>
          <span id="titleError" class="text-danger"></span>
        </div>
        <div class="modal-body">
          <input type="date" class="form-control" id="Date" readonly >
          <span id="DateError" class="text-danger"></span>
        </div>
        <div class="modal-body">
          <input type="time" class="form-control" id="starttime" readonly >
          <span id="starttimeError" class="text-danger"></span>
        </div>
        <div class="modal-body">
          <input type="time" class="form-control" id="endtime" readonly>
          <span id="endtimeError" class="text-danger"></span>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="status" readonly>
          <span id="statusError" class="text-danger"></span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mt-5 text-center"></h3>
                <div class="mt-5 mb-5 col-md-11 offset-1">

                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var booking = @json($events);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',

                },
                events: booking,
                selectable: true,
                selectHelper: true,

                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },

                eventClick: function(event)
                {
                    $('#bookingModal').modal('show');
                    $('#title').val(event.title);
                    $('#Date').val(event.start.format('YYYY-MM-DD'));
                    $('#starttime').val(event.start.format('HH:mm:ss'));
                    $('#endtime').val(event.end.format('HH:mm:ss'));
                    $('#status').val(event.status);

                },



            });

           // make it for mobile devices too


            $(window).resize(function() {
                $('#calendar').fullCalendar('option', 'height', $(window).height() - 100);

                
            });

            $(window).resize();

            $(ios).resize(function() {
                $('#calendar').fullCalendar('option', 'height', $(ios).height() - 100);
                $('#calendar').fullCalendar('option', 'width', $(ios).width() - 100);
                $('#calendar').fullCalendar('option', 'panding', 50);
            });

            $(ios).resize();
        });
    </script>
</body>
</html>
