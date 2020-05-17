<?php include("include/connection.php");

$query = "SELECT * FROM gallery ORDER BY image_id DESC";

if($statement = mysqli_query($conn,$query)){

$output = '<div class="row">';

 $result = mysqli_fetch_assoc($statement);

 foreach($result as $row)
 {
$alaa= base64_encode($row['images'] )
 }
}

$output .= '</div>';

echo $alaa;