<?php

include 'class/user.php';
session_start();
if(!isset($_SESSION['email'])&& !isset($_SESSION['admin_ID']))
{
 header('location:../login.php');
}
$user = new user();
$user_id=$_SESSION['admin_ID'];

$sql = "UPDATE login_details SET is_type=:is_type WHERE login_details_id=:id";
$query = $user->runQuery($sql);
$query->bindParam(':is_type',$_POST["is_type"],PDO::PARAM_STR);
$query->bindParam(':id',$_SESSION["login_details_id"],PDO::PARAM_STR);
$query->execute();

?>