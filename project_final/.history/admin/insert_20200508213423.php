<?Php
include("include/connection.php");

if(count($_FILES["image"]["tmp_name"]) > 0)
{
 for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
 {
  $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
  $query = "INSERT INTO gallery(image) VALUES ('$image_file')";
  $statement = mysqli_query($conn,$query);
 
 }
}

?>





?>