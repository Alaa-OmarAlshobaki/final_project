<?php
include('include/connection.php');

$query ="SELECT id_product FROM product WHERE id={$_GET['pro_id']}";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

// echo "<option>{$row['id']}</option>";
echo $row['id'];


?>