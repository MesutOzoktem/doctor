<?php
session_start();
$activeUser = null;
$activeUser = $_SESSION['activeUser'];

require_once ("db.php");
require_once ("Event.php");


$db = new db();
$result = $db->getDataTable("SELECT username,title,start,end FROM events WHERE username = '$activeUser'");

$events = array();

while ($row = $result->fetch_assoc()) {
    $eventsObj = new Event($row["username"], $row["title"], $row["start"], $row["end"]);
    array_push($events, array("title"=>$eventsObj->getTitle(), "start"=>$eventsObj->getStart(), "end"=>$eventsObj->getEnd()));
}

echo json_encode($events);


?>