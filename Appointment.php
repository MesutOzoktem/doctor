<?php
/**
 * Created by PhpStorm.
 * User: zoro_
 * Date: 23.05.2017
 * Time: 13:40
 */

require_once ("db.php");
require_once ("Doctor.php");

session_start();
$activeUser = null;
$activeUser = $_SESSION['activeUser'];

//if(isset($_POST['appointments'])) {

    $new = json_decode($_POST['appointments'], true);
    $db = new db();

    for ($i=0; $i<10; $i++)
    {
		$appointmentID = $new['appointments'][$i]['AppointmentID'];
        $patientName = $new['appointments'][$i]['PatientName'];
        $patientSSN = $new['appointments'][$i]['PatientSSN'];
        $date = $new['appointments'][$i]['Date'];
        $startTime = $new['appointments'][$i]['Time'];
        $endTime = $new['appointments'][$i]['EndTime'];
		
		if($patientName == NULL)
		{
			break;
		}
	

        $title = "Appointment ID : " . $appointmentID . " PatientName : " . $patientName . " PatientSSN : " . $patientSSN;
        $start = $date . " " . $startTime;
        $end = $date . " " . $endTime;
		
		echo $title . " " . $start . " " . $end;

        $result = $db->executeQuery("INSERT INTO events(username, title, start, end) VALUES ('$activeUser','$title','$start','$end')");

    }



?>
