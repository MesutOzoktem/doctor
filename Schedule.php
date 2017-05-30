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

        $result = DoctorManager::insertNewEvent($activeUser, $picker1, $picker2, $title);

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
                events: 'http://deu-doctor.hol.es/events.php',

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
                    <button  type="submit" class="btn btn-success"><a style="color:#ffffff;" href="http://deu-doctor.hol.es/logout.php">Log out</a></button>
                </form>

            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="http://deu-doctor.hol.es/Schedule.php">Working Schedule<span class="sr-only">(current)</span></a></li>

            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="http://deu-doctor.hol.es/PatientAssay.php">Patient's Assays</a></li>
                <li><a href="http://deu-doctor.hol.es/AssayRequest.php">Create Assay Request</a></li>
                <li><a href="http://deu-doctor.hol.es/Emergency.php">Send to Emergency</a></li>
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
								<button align="center" type="submit"  class="btn btn-info">Create Event</button>

                            </div>
							</div>
						
						
                        </div>
                   
                    
                </form>
				<form class="w3_form_post">
				 <div class='col-md-5'>
				<div class="form-group">
                                <label>Doctor ID</label>
                                <div class='input-group date' id='title'>
                                    <input type="text" id="send" class="form-control" required />
									<button align="center" type="submit" id="btnCallSrvc" class="btn btn-info">Get Events</button>
                                </div>
                            </div>
							</div>
							</form>
							
							</div>
                <div>
				 

             
                    <script>
                        // JQuery
                        $(document).ready(function() { // when DOM is ready, this will be executed
                            $("#btnCallSrvc").click(function(e) {
                                var tc = $("#send").val();
                                var url = "http://appointmentmodule.000webhostapp.com/listDoctorsAppointments.php";
                                var url2 = "http://deu-doctor.hol.es/Appointment.php";
                                $.ajax({ // start an ajax POST
                                    method	: "post",
                                    url		: url,
                                    dataType: "text",
                                    data	:  {
                                        "doctorid"	: tc
                                    },
                                    success : function(reply) { // when ajax executed successfully
                                        //console.log(reply);
                                        var jsonToString = JSON.stringify(reply);
                                        var json_obj = $.parseJSON(jsonToString);

                                        console.log(json_obj);
										console.log(jsonToString);

                                                $.ajax({
                                                        method: "post",
                                                        url: url2,
                                                        dataType: "json",
                                                        data: {
                                                            "appointments" : json_obj
                                                        }

                                                    }
                                                )
                                        /*for (i=0; i<json_obj.appointments.length; i++)
                                        {
                                            var appointments = json_obj.appointments[i];
                                            var pName = appointments.PatientName;
                                            var pSSN = appointments.PatientSSN;
                                        }*/

                                        //$("#divCallResult").html(table);
                                    },
                                    error   : function(err) { // some unknown error happened
                                        console.log(JSON.stringify(err));
                                        console.log(err);
                                        alert(" There is an error! Please try again. " + err);
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

<div id='calendar'>

</div>




</body>
</html>

