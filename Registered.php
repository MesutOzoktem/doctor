<?php


class Registered
{
    private $tc;
    private $username;
    private $password;

    /**
     * Registered constructor.
     * @param $tc
     * @param $name
     * @param $password
     */
    public function __construct($tc, $username, $password)
    {
        $this->tc = $tc;
        $this->username = $username;
        $this->password = $password;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $name
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}

?>