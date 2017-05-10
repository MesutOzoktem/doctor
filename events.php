<?php
//require("../../../connect/config.php");

$link = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("hospital");
$query = "SELECT title,start,end FROM events";
$result = mysql_query($query) or die(mysql_error());
$arr = array();
while($row = mysql_fetch_assoc($result)){
    $arr[] = $row;
}
echo json_encode($arr);
?>