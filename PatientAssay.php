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
                <li><a href="http://deu-doctor.hol.es/Schedule.php">Working Schedule<span class="sr-only">(current)</span></a></li>

            </ul>
            <ul class="nav nav-sidebar">
                <li class="active"><a href="http://deu-doctor.hol.es/PatientAssay.php">Patient's Assays</a></li>
                <li><a href="http://deu-doctor.hol.es/AssayRequest.php">Create Assay Request</a></li>
                <li><a href="http://deu-doctor.hol.es/Emergency.php">Send to Emergency</a></li>
                <li><a href="">Epicrisis</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="container">
				
				
                <br/><br/><br/><br/>
                        <div class='col-md-5'>
                            <div class="form-group">
                                <label>Patient SSN</label>
                                <div class='input-group date' id='title'>
                                    <input align="center" placeholder="Patient SSN" type="text" id="sendedID" class="form-control" required />
									<button align="center" type="submit" id="btnSendedInfo" class="btn btn-info">List Assays</button>
                                </div>
                            </div>
                        </div>
                      
                    
                    <div id="divCallResult">
                            <script>
                                // JQuery
                                $(document).ready(function() { // when DOM is ready, this will be executed
                                    $("#btnSendedInfo").click(function(e) {
                                        var patientSSN = $("#sendedID").val();

                                        var url = "http://elitelaboratory.hol.es/QueryAssaysService.php";
                                        $.ajax({ // start an ajax POST
                                            method	: "post",
                                            url		: url,
                                            dataType: "json",
                                            data	:  {
                                                "patientID"	: patientSSN
                                            },

                                            success : function(reply) { // when ajax executed successfully
                                                
                                                
                                                var jsonToString2 = JSON.stringify(reply);
                                                var json_obj2 = $.parseJSON(jsonToString2);
												console.log(json_obj2);

                                                var table = "<table class='table'>"+
                                                    "<thead>"+
                                                    "<tr>"+
                                                    "<th>Assay ID</th>"+
                                                    "<th>Patient SSN</th>"+
                                                    "<th>Assay Date</th>"+
                                                    "<th>Assay Type</th>"+
                                                    "<th>Assay Result</th>"+
                                                    "</tr>"+
                                                    "</thead>"+
                                                    "<tbody>";

                                                //console.log(json_obj);
                                                console.log(json_obj2);

                                                table+="<tr>";

                                                for (i = 0; i < json_obj2.assays.length; i++)
                                                {
                                                    var assays = json_obj2.assays[i];
                                                    var id = assays.id;
                                                    table+="<td>" + id + "</td>";
                                                    var patientID = assays.patientID;
                                                    table+="<td>" + patientID + "</td>";
                                                    var assayDate = assays.assayDate;
                                                    table+="<td>" + assayDate + "</td>";
                                                    var assayType = assays.assayType;
                                                    table+="<td>" + assayType + "</td>";
                                                    var assayResult = assays.assayResult;
                                                    table+="<td>" + assayResult + "</td>";
                                                    table+="</tr>";
                                                }

                                                table+="</tbody>"+
                                                    "</table>";
                                                $("#divCallResult").html(table);
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

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->



<div id='calendar'>

</div>




</body>
</html>

