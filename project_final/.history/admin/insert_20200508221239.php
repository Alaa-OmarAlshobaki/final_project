<?php
include("include/connection.php");
$prod= $GET['prod'];

if(count($_FILES["image"]["tmp_name"]) > 0)
{
    print_r($_FILES);
 for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
 {
  $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
  $query = "INSERT INTO gallery(id_product,image) VALUES ($prod,'$image_file')";
  $statement = mysqli_query($conn,$query);
 
 }
}

?>





?>