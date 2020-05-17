<?php
// function to make more direct in the same page
ob_start();
include('connection.php');

//make function direct
function direct($slug){
    header("Location:$slug");
}

///return count data
function countItems($item,$table) {
    global $conn;
    $query= "SELECT COUNT($item) FROM $table";
    $result= mysqli_query($conn,$query);
    return $row= mysqli_fetch_assoc($result);
   

                               }

  function createPromoCode() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $code = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $code= $code . $tmp; 
        $i++; 
    } 

    return $code; 

}                              




?>