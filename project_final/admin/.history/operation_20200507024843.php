<?php 
include("include/connection.php");
$query ="SELECT id FROM category WHERE id={$_GET['cat_id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

// echo "<option>{$row['id']}</option>";
echo $row['id'];



    $prod_name=$_POST['prod_name'];
	$prod_desc=$_POST['prod_desc'];
	$author_name=$_POST['author_name'];
    $price_prod=$_POST['price_prod'];
    $product_qty=$_POST['product_qty'];
	$id=$_POST['id_cat'];
	$sql = "INSERT INTO `product`( `prod_name`, `prod_desc`, `author_name`, `price_prod` `product_qty`) 
	        VALUES ('$prod_name','$prod_desc','$author_name','$price_prod','$product_qty')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}

?>