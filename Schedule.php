<?php
/**
 * Created by PhpStorm.
 * User: zoro_
 * Date: 22.04.2017
 * Time: 16:29
 */

require_once ("DoctorManager.php");


session_start();
$activeUser = null;

if(isset($_SESSION['activeUser'])) {
    $activeUser = $_SESSION['activeUser'];

    $errorMeesage = "";

    if (isset($_POST["picker1"]) && isset($_POST["picker2"]) && isset($_POST["title"])) {
        $picker1 = trim($_POST["picker1"]);
        $picker2 = trim($_POST["picker2"]);
        $title = trim($_POST["title"]);

        $errorMeesage = "";

        $result = DoctorManager::insertNewEvent($picker1, $picker2, $title);

        if (!$result) {
            $errorMeesage = "Silme başarısız";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Doctor System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css" />
    <!-- burası -->
    <link href="css/regstyle.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="js/regjs2.js"></script>
    <!-- //js -->
    <!-- font-awesome-icons -->
    <!-- //font-awesome-icons -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>


    <link href='css/fullcalender.css' rel='stylesheet' />
    <link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='js/moment.min.js'></script>
    <script src='js/jqueryCalender.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/moment-with-locales.js"></script>
    <script type="text/javascript" src="js/npm.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
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

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Doctors</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 2%">

                <form class="navbar-form navbar-right">
                    <?php
                    if(isset($activeUser)) {
                        echo "<a style = \"font-color: #ff0000;\">Welcome $activeUser</a>";
                    }
                    else {
                        echo "<a href='RegisterInterface.php'>Hatalı Giris</a>";
                    }
                    ?>
                    <button type="submit" class="btn btn-success">Log out</button>
                </form>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="http://localhost:8080/doctor/Schedule.php">Working Schedule<span class="sr-only">(current)</span></a></li>

            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Patient's Assays</a></li>
                <li><a href="">Create Assay Request</a></li>
                <li><a href="">Send to Emergency</a></li>
                <li><a href="">Epicrisis</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="container">

                <form method="POST" class="w3_form_post" action="<?php $_PHP_SELF ?>">
                    <div class='col-md-5'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker6'>
                                <input data-date-format="YYYY-MM-DD HH:ss:MM" name="picker1" type="text" class="form-control" required />
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker7'>
                                <input data-date-format="YYYY-MM-DD HH:ss:MM" name="picker2" type="text" class="form-control" required />
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class="form-group">
                            <label>Title</label>
                            <div class='input-group date' id='title'>
                                <input type="text" name="title" class="form-control" required />

                            </div>
                        </div>
                    </div>
                    <div class="w3_main_grid">
                        <div class="w3_main_grid_right">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<div id='calendar'>

</div>


</body>
</html>

