<?php
session_start();

//unset the session value
$_SERVER= array();

//destroy the seesion
session_destroy();

//redirect to login/home page
header("Location:assignmentP.php");
exit();

?>