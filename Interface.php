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
        $activeUser =  $_SESSION['activeUser'];
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
                <li class="active"><a href="http://localhost:8080/doctor/interface.php">Doctor's Information <span class="sr-only">(current)</span></a></li>
                <li><a href="http://localhost:8080/doctor/AddDoctor.php">Add a New Doctor</a></li>
                <li><a href="http://localhost:8080/doctor/DeleteDoctor.php">Delete a Doctor</a></li>
                <li><a href="http://localhost:8080/doctor/UpdateDoctor.php">Update Info of a Doctor</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="panel panel-info">
                <!-- Default panel contents -->
                <div class="panel-heading">Doctor List</div>
                <form method="POST" action="<?php $_PHP_SELF ?>">
                    <!-- Table -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>T.C</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Diploma No</th>
                            <th>Graduate School</th>
                            <th>Specialized School</th>
                            <th>Academic Degree</th>
                            <th>Profession</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Polyclinic</th>
                            <th>Is Doctor On Call</th>
                        </tr>
                        <?php
                        $doctorList = DoctorManager::getAllDoctors();

                        for($i = 0; $i < count($doctorList); $i++) {
                            ?>
                            <tr>
                                <td><?php echo $doctorList[$i]->getTc(); ?></td>
                                <td><?php echo $doctorList[$i]->getName(); ?></td>
                                <td><?php echo $doctorList[$i]->getSurname(); ?></td>
                                <td><?php echo $doctorList[$i]->getDiplomaNo(); ?></td>
                                <td><?php echo $doctorList[$i]->getGraduateSchool(); ?></td>
                                <td><?php echo $doctorList[$i]->getSpecializedSchool(); ?></td>
                                <td><?php echo $doctorList[$i]->getAcademicDegree(); ?></td>
                                <td><?php echo $doctorList[$i]->getProfession(); ?></td>
                                <td><?php echo $doctorList[$i]->getGender(); ?></td>
                                <td><?php echo $doctorList[$i]->getAge(); ?></td>
                                <td><?php echo $doctorList[$i]->getPolyclinic(); ?></td>
                                <td><?php echo $doctorList[$i]->getIsDoctorOnCall(); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

