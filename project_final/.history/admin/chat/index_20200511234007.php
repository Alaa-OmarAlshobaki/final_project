<?php
session_start();
include 'class/user.php';

if(!isset($_SESSION['email'])&& !isset($_SESSION['admin_ID']))
{
 header('location:../login.php');
}
$user_id =$_SESSION['admin_ID'];

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
    <link rel="stylesheet" href="../fontawesome-pro/css/all.min.css">
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


    <div id="user_details"></div>
    <div class="chat-conversation-box" id="user_model_details">
        <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
            <div class="chat" data-chat="person1">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
                <div class="bubble you">
                    Hello,
                </div>
                <div class="bubble you">
                    It's me.
                </div>
                <div class="bubble you">
                    I have a question regarding project.
                </div>
            </div>
            <div class="chat" data-chat="person2">
                <div class="conversation-start">
                    <span>Today, 5:38 PM</span>
                </div>
                <div class="bubble you">
                    Hello!
                </div>
                <div class="bubble me">
                    Hey!
                </div>
                <div class="bubble me">
                    How was your day so far.
                </div>
                <div class="bubble you">
                    It was a bit dramatic.
                </div>
            </div>
            <div class="chat" data-chat="person3">
                <div class="conversation-start">
                    <span>Today, 3:38 AM</span>
                </div>
                <div class="bubble me">
                    Hey Buddy.
                </div>
                <div class="bubble me">
                    What's up
                </div>
                <div class="bubble you">
                    I am sick
                </div>
                <div class="bubble you">
                    Not comming to office today.
                </div>
            </div>
            <div class="chat" data-chat="person4">
                <div class="conversation-start">
                    <span>Yesterday, 4:20 PM</span>
                </div>
                <div class="bubble you">
                    Hi, collect your check
                </div>
                <div class="bubble me">
                    Ok, I will be there in 10 mins
                </div>
            </div>
            <div class="chat" data-chat="person5">
                <div class="conversation-start">
                    <span>Today, 6:28 AM</span>
                </div>
                <div class="bubble you">
                    Hi
                </div>
                <div class="bubble you">
                    Uploaded files to server.
                </div>
            </div>
            <div class="chat" data-chat="person6">
                <div class="conversation-start">
                    <span>Monday, 1:27 PM</span>
                </div>
                <div class="bubble you">
                    Hi, I am back from vacation
                </div>
                <div class="bubble you">
                    How are you?
                </div>
                <div class="bubble me">
                    Welcom Back
                </div>
                <div class="bubble me">
                    I am all well
                </div>
                <div class="bubble you">
                    Coffee?
                </div>
            </div>
            <div class="chat" data-chat="person7">
            </div>
            <div class="chat" data-chat="person8">
            </div>
            <div class="chat" data-chat="person9">
            </div>
            <div class="chat" data-chat="person10">
            </div>
            <div class="chat" data-chat="person11">
            </div>
            <div class="chat" data-chat="person12">
            </div>
        </div>
    </div>
    <div id="user_model_details"></div>


</body>

</html>