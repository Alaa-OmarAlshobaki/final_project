<?php 
include("include/connection.php");
$query ="SELECT id FROM category WHERE id={$_GET['cat_id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

// echo "<option>{$row['id']}</option>";
echo " value='{$row['id']}'";

// $query = "INSERT INTO product (prod_name,prod_desc,author_name,	price_prod,product_qty) Values ( '$cat_name','$hostImg' ) WHERE  "


?>