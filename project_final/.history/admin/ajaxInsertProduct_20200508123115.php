<?php
include("include/connection.php");
$query ="SELECT id FROM category WHERE id={$_POST['cat_id']}";
if($result=mysqli_query($conn,$query)){

$name=$_POST['prod_name'];
$description=$_POST['prod_desc'];
$author=$_POST['author_name'];
$price=$_POST['price_prod'];
$quantity=$_POST['product_qty'];
$id=$_POST['cat_id'];
$sql = "INSERT INTO `product`(`prod_name`, `prod_desc`, `author_name`, `price_prod`, `product_qty`, `id_cat`) 
        VALUES                ('$name','$description','$author',$price,$quantity, (SELECT id from category WHERE id=$id))";
      mysqli_query($conn, $sql);
}
echo "'Data added successfully !'"





?>