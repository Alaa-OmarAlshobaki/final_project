<?php

include 'class/user.php';
session_start();
if(!isset($_SESSION['email'])&& !isset($_SESSION['admin_ID']))
{
 header('location:../login.php');
}
$user = new user();
$user_id=$_SESSION['admin_ID'];

$db = new config();
$pdo = $db->db();

$sql = "UPDATE login_details SET last_activity=now() WHERE login_details_id=:login_details_id";
$query= $user->runQuery($sql);
$query->bindParam(':login_details_id',$_SESSION['login_details_id'],PDO::PARAM_STR);
$query->execute();

?>