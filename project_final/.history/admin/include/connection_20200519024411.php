<?php

//  connection to database final_project
$conn= mysqli_connect("localhost","root","","book_store");

// if no connect with server stop and return msg
if(!$conn){
    die("connect failed");
    
}



?>