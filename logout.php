<?php
session_start();
if(session_destroy())
{
header("Location: http://deu-doctor.hol.es");
}
?>
