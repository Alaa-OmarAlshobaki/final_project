<?php
//include function
include("include/function.php");
//include connection
include("include/connection.php");
// start session
session_start();
unset($_SESSION);

direct('login.php');



?>