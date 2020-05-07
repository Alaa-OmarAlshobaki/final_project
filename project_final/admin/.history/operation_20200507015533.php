<?php 
include("include/connection.php");
$query ="SELECT id FROM category WHERE id={$_GET['cat_id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$id = $row['id'];
echo " value='$id'";

// $query = "INSERT INTO product (prod_name,prod_desc,author_name,	price_prod,product_qty) Values ( '$cat_name','$hostImg' ) WHERE  "


?>