<?php
include("include/connection.php");
if(isset($_GET['cat_id'])){
    $idCat= $_GET['cat_id'];
    $name=$_GET['name'];
$description=$_GET['description'];
$author=$_GET['author'];
$price=$_GET['price'];
$quantity=$_GET['quantity'];

    $query ="SELECT id FROM category WHERE id={$idCat}";
if($result=mysqli_query($conn,$query)){



$sql = "INSERT INTO `product`(`prod_name`, `prod_desc`, `author_name`, `price_prod`, `product_qty`, `id_cat`) 
        VALUES                ('$name','$description','$author',$price,$quantity, (SELECT id from category WHERE id=$idCat))";
      mysqli_query($conn, $sql);
     
}
      $querymax="SELECT MAX(id_product) FROM product";
                                                   $resultmax= mysqli_query($conn,$querymax);
                                                   $rowmax= mysqli_fetch_assoc($resultmax);
                                                   echo $rowmax['MAX(id_product)'];
  
}






?>