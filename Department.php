<?php
/**
 * Created by PhpStorm.
 * User: zoro_
 * Date: 23.05.2017
 * Time: 13:40
 */

header('Access-Control-Allow-Origin: *');

require_once ("db.php");
require_once ("Doctor.php");

if(isset($_POST["branch"])) {

    $branch = trim($_POST["branch"]);

    $db = new db();
    $result = $db->getDataTable("select tc, name, surname, diplomaNo, graduateSchool, specializedSchool, academicDegree, profession, gender, age, polyclinic, isDoctorOnCall 
                                       from doctor where profession='$branch'");


    $allDoctors = array();

    while($row = $result->fetch_assoc()) {
        $doctorObj = new Doctor($row["tc"], $row["name"], $row["surname"], $row["diplomaNo"],
            $row["graduateSchool"], $row["specializedSchool"], $row["academicDegree"],
            $row["profession"], $row["gender"], $row["age"],
            $row["polyclinic"], $row["isDoctorOnCall"]);

        array_push($allDoctors, array("TC"=>$doctorObj->getTc(), "Name"=>$doctorObj->getName(), "Surname"=>$doctorObj->getSurname()));
    }

    //header('Content-type: application/json');
    echo json_encode(array('Doctors'=>$allDoctors));

}

else
{
	echo "failed";
}

?>
