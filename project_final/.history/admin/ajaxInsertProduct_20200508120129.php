<?php
include("include/connection.php");
$query ="SELECT id FROM category WHERE id={$_GET['cat_id']}";
$result=mysqli_query($conn,$query);


$row=mysqli_fetch_assoc($result);



?>