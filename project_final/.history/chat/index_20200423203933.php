<?php
include 'class/user.php';
session_start();
if(!isset($_SESSION['id_student'],$_SESSION["email"]))
{
 header('location:login.php');
}
$user_id=$_SESSION['id_student'];

$user = new USER();

//fetch user details
$result=$user->user_detail($user_id);

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="function.js"></script>
    <script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>


</head>
<style>
body {
    background-color: white;
}

a {
    color: #950a0a;
    font-size: 20px;
    text-decoration: none;
}

a:hover {
    color: black;
    font-size: 20px;
    text-decoration: none;
}
</style>

<body>

    <div class="header" style="height:100px">
        <a href="../StudentPage.php" class="text-center"><i class="fas fa-home"></i><br> home</a>
        <a href="" class="text-center"><i class="fas fa-user-tie"></i><br> <?php echo($result['name']); ?></a>
    </div>

    <div id="user_details"></div>
    <div id="user_model_details"></div>


</body>

</html>