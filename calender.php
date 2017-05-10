<html>
<head>
    <meta charset='utf-8' />
    <link href='css/fullcalender.css' rel='stylesheet' />
    <link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='js/moment.min.js'></script>
    <script src='js/jqueryCalender.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>

    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2017-05-06',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: "events.php",

            });

        });

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
</head>
<body>

<div id='calendar'>

</div>

</body>
</html>
