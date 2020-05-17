<?php
include('admin/include/function.php');
 include('admin/include/connection.php');

 session_start();




$model = $_GET['idpro'];
foreach ($_SESSION['prod_card']as $key => $vehicle) 
{ 
    if($vehicle == $model){
      
        unset($_SESSION['prod_card'][$key]);
        direct('index.php');
    }
  
}
// print_r($_SESSION['prod_card'])






 



 ?>