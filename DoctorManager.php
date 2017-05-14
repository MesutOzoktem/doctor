<?php

require_once ("db.php");
require_once ("Doctor.php");
require_once ("Registered.php");
/**
 * Created by PhpStorm.
 * User: zoro_
 * Date: 22.04.2017
 * Time: 16:27
 */
    class DoctorManager
    {
        public static function getAllDoctors () {
            $db = new db();
            $result = $db->getDataTable("select tc, name, surname, diplomaNo, graduateSchool, specializedSchool, academicDegree, profession, gender, age, polyclinic, isDoctorOnCall from doctor order by tc");

            $allDoctors = array();

            while($row = $result->fetch_assoc()) {
                $doctorObj = new Doctor($row["tc"], $row["name"], $row["surname"], $row["diplomaNo"],
                            $row["graduateSchool"], $row["specializedSchool"], $row["academicDegree"],
                            $row["profession"], $row["gender"], $row["age"],
                            $row["polyclinic"], $row["isDoctorOnCall"]);
                array_push($allDoctors, $doctorObj);
            }

            return $allDoctors;
        }

        public static function insertNewDoctor($tc, $name, $surname, $diplomaNo, $graduateSchool, $specializedSchool, $academicDegree, $profession, $gender, $age, $polyclinic) {
            $db = new db();
            $success = $db->executeQuery("INSERT INTO doctor(tc, name, surname, diplomaNo, graduateSchool, specializedSchool, academicDegree, profession, gender, age, polyclinic) 
                                          VALUES ('$tc', '$name', '$surname', '$diplomaNo', '$graduateSchool', '$specializedSchool', '$academicDegree', '$profession', '$gender', '$age', '$polyclinic')");
            return $success;
        }

        public static function deleteDoctor($tc) {
            $db = new db();
            $success = $db->executeQuery("DELETE from doctor where ($tc = tc)");
            return $success;
        }

        public static function updateDoctor($tc, $name, $surname, $diplomaNo, $graduateSchool, $specializedSchool, $academicDegree, $profession, $gender, $age, $polyclinic) {
            $db = new db();
            $success = $db->executeQuery("UPDATE doctor SET (name = '$name', surname = '$surname', diplomaNo = '$diplomaNo', graduateSchool = '$graduateSchool', specializedSchool = '$specializedSchool', 
                                                             academicDegree = '$academicDegree', profession = '$profession', gender = '$gender', age = '$age', polyclinic = '$polyclinic') 
                                          WHERE ($tc = tc)");
            return $success;
        }

        public static function registerDoctor($tc, $username, $password) {
            $db = new db();
            if(self::tcExist($tc)) {
                $success = $db->executeQuery("INSERT INTO registered(tc, username, password) 
                                          VALUES ('$tc', '$username', '$password')");
                return $success;

            }
            else
            {
                return $errorMeesage = "Kayıt başarısız";
            }
        }
        public  static function tcExist($tc) {
            $db = new db();
            $connection = $db->getConnection();
            $query = "SELECT tc FROM doctor WHERE tc = '$tc'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                return true;
            }
            else{
                echo "lan ibne mesut";
                false;
            }
        }

        public static function insertNewEvent($picker1, $picker2, $title) {
            $db = new db();
            $success = $db->executeQuery("INSERT INTO events(title, start, end) 
                                          VALUES ('$title', '$picker1', '$picker2')");
            return $success;
        }


    }

?>
