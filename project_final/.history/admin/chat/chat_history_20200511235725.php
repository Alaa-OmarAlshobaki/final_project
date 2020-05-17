<?php
session_start();
include 'class/user.php';

print_r($_SESSION);
if(!isset($_SESSION['email'])&& !isset($_SESSION['admin_ID']))
{
 header('location:../auth_login.php');
}
$user = new user();
$user_id= $_SESSION['admin_ID'];

if($_POST['to_user_id']){
  echo $user->chat_history($user_id,$_POST['to_user_id']);
}

?>