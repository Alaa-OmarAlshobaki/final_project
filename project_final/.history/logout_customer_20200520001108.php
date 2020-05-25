<?php
//include function
include("admin/include/function.php");
//include connection
include("admin/include/connection.php");
// start session
session_start();
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['cart']);

direct('login.php');



?>