<?php
// function to make more direct in the same page
ob_start();

//make function direct
function direct($slug){
    header("Location:$slug");
}




?>