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

        /**
         * @return mixed
         */
        public function getTc()
        {
            return $this->tc;
        }

        /**
         * @param mixed $tc
         */
        public function setTc($tc)
        {
            $this->tc = $tc;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getSurname()
        {
            return $this->surname;
        }

        /**
         * @param mixed $surname
         */
        public function setSurname($surname)
        {
            $this->surname = $surname;
        }

        /**
         * @return mixed
         */
        public function getDiplomaNo()
        {
            return $this->diplomaNo;
        }

        /**
         * @param mixed $diplomaNo
         */
        public function setDiplomaNo($diplomaNo)
        {
            $this->diplomaNo = $diplomaNo;
        }

        /**
         * @return mixed
         */
        public function getGraduateSchool()
        {
            return $this->graduateSchool;
        }

        /**
         * @param mixed $graduateSchool
         */
        public function setGraduateSchool($graduateSchool)
        {
            $this->graduateSchool = $graduateSchool;
        }

        /**
         * @return mixed
         */
        public function getSpecializedSchool()
        {
            return $this->specializedSchool;
        }

        /**
         * @param mixed $specializedSchool
         */
        public function setSpecializedSchool($specializedSchool)
        {
            $this->specializedSchool = $specializedSchool;
        }

        /**
         * @return mixed
         */
        public function getAcademicDegree()
        {
            return $this->academicDegree;
        }

        /**
         * @param mixed $academicDegree
         */
        public function setAcademicDegree($academicDegree)
        {
            $this->academicDegree = $academicDegree;
        }

        /**
         * @return mixed
         */
        public function getProfession()
        {
            return $this->profession;
        }

        /**
         * @param mixed $profession
         */
        public function setProfession($profession)
        {
            $this->profession = $profession;
        }

        /**
         * @return mixed
         */
        public function getGender()
        {
            return $this->gender;
        }

        /**
         * @param mixed $gender
         */
        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        /**
         * @return mixed
         */
        public function getAge()
        {
            return $this->age;
        }

        /**
         * @param mixed $age
         */
        public function setAge($age)
        {
            $this->age = $age;
        }

        /**
         * @return mixed
         */
        public function getPolyclinic()
        {
            return $this->polyclinic;
        }

        /**
         * @param mixed $polyclinic
         */
        public function setPolyclinic($polyclinic)
        {
            $this->polyclinic = $polyclinic;
        }

        /**
         * @return mixed
         */
        public function getIsDoctorOnCall()
        {
            return $this->isDoctorOnCall;
        }

        /**
         * @param mixed $isDoctorOnCall
         */
        public function setIsDoctorOnCall($isDoctorOnCall)
        {
            $this->isDoctorOnCall = $isDoctorOnCall;
        }



    }

?>