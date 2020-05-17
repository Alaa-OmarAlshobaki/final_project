<?php
include("include/connection.php");
$query ="SELECT id FROM category WHERE id={$_GET['cat_id']}";
if($result=mysqli_query($conn,$query)){

$prod_name=$_POST['prod_name'];
$prod_desc=$_POST['prod_desc'];
$author_name=$_POST['author_name'];
$price_prod=$_POST['price_prod'];
$product_qty=$_POST['product_qty'];
$id=$_GET['cat_id'];
$sql = "INSERT INTO `product`(`prod_name`, `prod_desc`, `author_name`, `price_prod`, `product_qty`, `id_cat`) 
        VALUES                ('$prod_name','$prod_desc','$author_name',$price_prod,$product_qty, (SELECT id from category WHERE id=$id))";
      mysqli_query($conn, $sql);
}





?>