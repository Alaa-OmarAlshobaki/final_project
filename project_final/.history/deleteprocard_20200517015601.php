<?php
include('admin/include/function.php');
 include('admin/include/connection.php');

 session_start();

 unset($_SESSION['quantity']);


$model = $_GET['idpro'];
foreach ($_SESSION['prod_card']as $key => $vehicle) 
{ 
    if($vehicle == $model){
      
        unset($_SESSION['prod_card'][$key]);
        direct('index.php');
    }
  
}

// print_r($_SESSION['prod_card'])



function delete($pid){
    $m=$_SESSION['cart'];
    $max=count($m);
    for($i=0;$i<$max;$i++){
        if($pid==$_SESSION['cart'][$i]['productid']){
        unset($_SESSION['cart'][$i]);
        $_SESSION['cart']=array_values($_SESSION['cart']);$_SESSION['cart'.'num']-=1;break;
        direct('index.php');
        }
    }
}


 



 ?>