<?php
// function to make more direct in the same page
ob_start();
include('connection.php');

//make function direct
function direct($slug){
    header("Location:$slug");
}
///return count data
function count(){
    global $conn;
    $query= "SELECT COUNT() FROM ";
    $result= mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

}




?>