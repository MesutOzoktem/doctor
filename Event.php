<?php

/**
 * Created by PhpStorm.
 * User: zoro_
 * Date: 25.05.2017
 * Time: 21:24
 */
class Event
{
    private $username;
    private $title;
    private $start;
    private $end;

    /**
     * Event constructor.
     * @param $username
     * @param $title
     * @param $start
     * @param $end
     */
    public function __construct($username, $title, $start, $end)
    {
        $this->username = $username;
        $this->title = $title;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }




}