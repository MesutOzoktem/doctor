
<?php
/**
 * Created by PhpStorm.
 * User: zoro_
 * Date: 22.04.2017
 * Time: 16:29
 */

require_once ("DoctorManager.php");

$errorMeesage = "";

if(isset($_POST["tc"]) && isset($_POST["username"]) && isset($_POST["password"]))
{
    $tc = trim($_POST["tc"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $errorMeesage = "";

    $result = DoctorManager::registerDoctor($tc, $username, $password);

    if(!$result) {
        $errorMeesage = "Kayıt başarısız!";
    }
}
else if(isset($_POST["usernameLogin"]) && isset($_POST["passwordLogin"])) {
    $usernameLogin = trim($_POST["usernameLogin"]);
    $passwordLogin = trim($_POST["passwordLogin"]);

    $query = "select username,isAdmin from registered where username = '".$_POST["usernameLogin"]."' and password = '".$_POST["passwordLogin"]."'";
    $db = new db();
    $result = $db->query($query);

    $row = $result->fetch_assoc();

    if($row['username'] == null)
    {
        $message = "Incorrect entry, try again";
    }
    else
    {
        session_start();
        $_SESSION['activeUser'] = $row['username'];
        if ($row['isAdmin'] == 1)
        {
            header("location: Interface.php");
        }
        else
        {
            header("location: Schedule.php");
        }
		

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Doctor System</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Stylish Creative Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <link href="css/styleLogin.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
    <!-- css files -->

    <!-- Online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <!-- //Online-fonts -->
</head>
<body>
<!-- main -->
<div class="main">
    <canvas id="myCanvas"></canvas>
    <div class="main-w3l">
        <h1 class="logo-w3">Login or Register to the System</h1>
        <div class="w3layouts-main">
            <h2>Login Now</h2>
            <form method="POST" action="<?php $_PHP_SELF ?>">
                <input placeholder="NAME" name="usernameLogin" type="text" required="">
                <span class="icons i1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                <input placeholder="PASSWORD" name="passwordLogin" type="password" required="">
                <span class="icons i2"><i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="submit" value="Login" name="login">
            </form>
            <h6><a href="#">Forgot Password?</a></h6>
            <h3>(or)</h3>
            <div class="social_icons agileinfo">
                <ul class="top-links">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="w3layouts-main2">
            <h3>Register Now</h3>
            <form method="POST" action="<?php $_PHP_SELF ?>">
                <input placeholder="T.C." name="tc" type="text" required="">
                <span class="icons i3"><i class="fa fa-user" aria-hidden="true"></i></span>
                <input placeholder="USER NAME" name="username" type="text" required="">
                <span class="icons i4"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                <input placeholder="PASSWORD" name="password" type="password" required="">
                <span class="icons i5"><i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="submit" value="Register" name="register">
            </form>
        </div>
        <div class="clear"></div>
        <div class="footer-w3l">
            <p>&copy; 2017 Doctor System. All rights reserved | Design by <a href="http://w3layouts.com">Mesut Özöktem and Güray Turan.</a></p>
        </div>     
    </div>
</div>




<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.minLogin.js"></script>
<!-- //js -->
<!-- particles-JavaScript -->
<script src="js/particles.min.js"></script>
<script>
    window.onload = function() {
        Particles.init({
            selector: '#myCanvas',
            color: '#eba7a7',
            connectParticles: true,
            minDistance: 90
        });
    };
</script>

</body>
</html>
