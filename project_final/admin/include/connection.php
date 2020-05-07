<?php
//  connection to database final_project
$conn= mysqli_connect("localhost","root","","final_project");

// if no connect with server stop and return msg
if(!$conn){
    die("connect failed");
    
}



?>