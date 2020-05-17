<?php
session_start();
include 'class/user.php';


if(!isset($_SESSION['email'])&& !isset($_SESSION['id']))
{
 header('location:../login.php');
}
$user = new user();
$user_id=$_SESSION['id'];

if($_POST['to_user_id']){
  echo $user->chat_history($user_id,$_POST['to_user_id']);
}

?>