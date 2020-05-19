<?php
session_start();
include 'class/user.php';

if(!isset($_SESSION['id']))
{
 header('location:..\login.php');
}
$user_id =$_SESSION['id'];

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
    <link rel="stylesheet" href="../admin/fontawesome-pro/css/all.min.css">
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
<link href="../admin/fontawesome-pro/css/all.min.css" rel="stylesheet">
<script src="../admin/fontawesome-pro/js/all.min.js"></script>
<div class="header-middle pt--10 pb--10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ">
                <a href="index.html" class="site-brand">
                    <img src="../image/logo.png" alt="">
                </a>
            </div>
            <div class="col-lg-3">
                <div class="header-phone ">
                    <div class="icon">
                        <a href="chat\index.php"> <i class="fal fa-comments-alt"></i></a>
                    </div>
                    <div class="text mt-3">
                        <p>Free Support</p>
                        <p class="font-weight-bold number">Send Massage</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item">
                            <a href="index.php">Home</a>
                        </li>
                        <!-- Shop -->

                        <!-- Pages -->
                        <li class="menu-item">
                            <a href="my-account.php">Account </a>

                        </li>
                        <!-- Blog -->

                        <li class="menu-item">
                            <a href="contact.html">Contact</a>
                        </li>
                        <?php if(isset($_SESSION['id'])) { ?>
                        <li class="menu-item">
                            <a href="logout_customer.php"><i class="fal fa-sign-out"></i></a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<body>


    <div id="user_details"></div>
    <div id="user_model_details"></div>


</body>

</html>