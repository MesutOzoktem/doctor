<?php


    class Doctor
    {
        private $tc;
        private $name;
        private $surname;
        private $diplomaNo;
        private $graduateSchool;
        private $specializedSchool;
        private $academicDegree;
        private $profession;
        private $gender;
        private $age;
        private $polyclinic;
        private $isDoctorOnCall;


        public function __construct($tc, $name, $surname, $diplomaNo, $graduateSchool, $specializedSchool, $academicDegree, $profession, $gender, $age, $polyclinic, $isDoctorOnCall)
        {
            $this->tc = $tc;
            $this->name = $name;
            $this->surname = $surname;
            $this->diplomaNo = $diplomaNo;
            $this->graduateSchool = $graduateSchool;
            $this->specializedSchool = $specializedSchool;
            $this->academicDegree = $academicDegree;
            $this->profession = $profession;
            $this->gender = $gender;
            $this->age = $age;
            $this->polyclinic = $polyclinic;
            $this->isDoctorOnCall = $isDoctorOnCall;
        }

        public function getTc()
        {
            return $this->tc;
        }

        
        public function setTc($tc)
        {
            $this->tc = $tc;
        }

       
        public function getName()
        {
            return $this->name;
        }

    
        public function setName($name)
        {
            $this->name = $name;
        }

       
        public function getSurname()
        {
            return $this->surname;
        }

        
        public function setSurname($surname)
        {
            $this->surname = $surname;
        }

     
        public function getDiplomaNo()
        {
            return $this->diplomaNo;
        }

      
        public function setDiplomaNo($diplomaNo)
        {
            $this->diplomaNo = $diplomaNo;
        }

       
        public function getGraduateSchool()
        {
            return $this->graduateSchool;
        }

       
        public function setGraduateSchool($graduateSchool)
        {
            $this->graduateSchool = $graduateSchool;
        }

       
        public function getSpecializedSchool()
        {
            return $this->specializedSchool;
        }

      
        public function setSpecializedSchool($specializedSchool)
        {
            $this->specializedSchool = $specializedSchool;
        }

      
        public function getAcademicDegree()
        {
            return $this->academicDegree;
        }

      
        public function setAcademicDegree($academicDegree)
        {
            $this->academicDegree = $academicDegree;
        }

       
        public function getProfession()
        {
            return $this->profession;
        }

       
        public function setProfession($profession)
        {
            $this->profession = $profession;
        }

       
        public function getGender()
        {
            return $this->gender;
        }

       
        public function setGender($gender)
        {
            $this->gender = $gender;
        }

       
        public function getAge()
        {
            return $this->age;
        }

        
        public function setAge($age)
        {
            $this->age = $age;
        }

       
        public function getPolyclinic()
        {
            return $this->polyclinic;
        }

        public function setPolyclinic($polyclinic)
        {
            $this->polyclinic = $polyclinic;
        }

       
        public function getIsDoctorOnCall()
        {
            return $this->isDoctorOnCall;
        }

        
        public function setIsDoctorOnCall($isDoctorOnCall)
        {
            $this->isDoctorOnCall = $isDoctorOnCall;
        }



    }

?>