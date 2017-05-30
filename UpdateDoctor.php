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

$errorMeesage = "";

if(isset($_POST["tc"]) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["diplomaNo"]) &&
    isset($_POST["graduateSchool"]) && isset($_POST["specializedSchool"]) && isset($_POST["academicDegree"]) &&
    isset($_POST["profession"]) && isset($_POST["gender"]) && isset($_POST["age"]) && isset($_POST["polyclinic"])) {
    $tc = trim($_POST["tc"]);
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $diplomaNo = trim($_POST["diplomaNo"]);
    $graduateSchool = trim($_POST["graduateSchool"]);
    $specializedSchool = trim($_POST["specializedSchool"]);
    $academicDegree = trim($_POST["academicDegree"]);
    $profession = trim($_POST["profession"]);
    $gender = trim($_POST["gender"]);
    $age = trim($_POST["age"]);
    $polyclinic = trim($_POST["polyclinic"]);

    $errorMeesage = "";

    $result = DoctorManager::updateDoctor($tc, $name, $surname, $diplomaNo, $graduateSchool,
        $specializedSchool, $academicDegree, $profession, $gender, $age, $polyclinic);

    if (!$result) {
        $errorMeesage = "Yeni kullanıcı kaydı başarısız!";
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
    <!-- burası -->
    <link href="css/regstyle.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="js/regjs2.js"></script>
    <!-- //js -->
    <!-- font-awesome-icons -->
    <!-- //font-awesome-icons -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>


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
                <li><a href="http://deu-doctor.hol.es/Interface.php">Doctor's Information <span class="sr-only">(current)</span></a></li>
                <li><a href="http://deu-doctor.hol.es/AddDoctor.php">Add a New Doctor</a></li>
                <li><a href="http://deu-doctor.hol.es/DeleteDoctor.php">Delete a Doctor</a></li>
                <li class="active"><a href="http://deu-doctor.hol.es/UpdateDoctor.php">Update Info of a Doctor</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="center-container">
                <div class="main">
                    <h1 class="w3layouts_head">Update Info of a Doctor</h1>
                    <div class="w3layouts_main_grid">
                        <form method="POST" class="w3_form_post" action="<?php $_PHP_SELF ?>">
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>TC <i>:</i></label>
									<input type="text" name="tc" placeholder="T.C." required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Name <i>:</i></label>
									<input type="text" name="name" placeholder="Name" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Surname <i>:</i></label>
									<input type="text" name="surname" placeholder="Surname" required="">
								</span>
                            </div><div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Diploma No <i>:</i></label>
									<input type="text" name="diplomaNo" placeholder="Diploma No" required="">
								</span>
                            </div>

                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Graduate School <i>:</i></label>
									<input type="text" name="graduateSchool" placeholder="Graduate School" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Specialized School <i>:</i></label>
									<input type="text" name="specializedSchool" placeholder="Specialized School" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Academic Degree <i>:</i></label>
									<input type="text" name="academicDegree" placeholder="Academic Degree" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Profession <i>:</i></label>
									<input type="text" name="profession" placeholder="Profession" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Gender <i>:</i></label>
									<input type="text" name="gender" placeholder="Gender" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Age <i>:</i></label>
									<input type="text" name="age" placeholder="Age" required="">
								</span>
                            </div>
                            <div class="w3_agileits_main_grid w3l_main_grid">
								<span class="agileits_grid">
									<label>Polyclinic <i>:</i></label>
									<input type="text" name="polyclinic" placeholder="Polyclinic" required="">
								</span>
                            </div>


                            <div class="w3_main_grid">
                                <div class="w3_main_grid_right">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Calendar -->
                    <link rel="stylesheet" href="css/reg1.css" />
                    <script src="js/regjs3.js"></script>

                    <!-- //Calendar -->
                    <div class="w3layouts_copy_right">
                        <div class="container">
                            <p>© 2017 Doctor System. All rights reserved | Design by <a href="http://w3layouts.com">Mesut Özöktem and Güray Turan.</a></p>
                        </div>
                    </div>
                </div>
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

