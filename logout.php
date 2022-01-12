<?php

session_start();
$_SESSION = array();
session_destroy(); //by exicuting this function active session will be destroyed
header("location: signIn.php"); 

?>
