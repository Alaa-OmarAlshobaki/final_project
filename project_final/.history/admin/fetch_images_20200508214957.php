<?php include("include/connection.php");

$query = "SELECT * FROM gallery ORDER BY image_id DESC";

if($statement = mysqli_query($conn,$query)){

$output = '<div class="row">';

 $result = mysqli_fetch_assoc($statement);

 foreach($result as $row)
 {
//   $output .= '
//   <div class="col-md-2" style="margin-bottom:16px;">
  <img src="data:image/jpeg;base64,'.base64_encode($row['images'] ).'" class="img-thumbnail" />
//   </div>
//   ';
 }
}

// $output .= '</div>';

base64_encode( $row['images']);
 