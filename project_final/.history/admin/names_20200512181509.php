<?php
include("include/connection.php");
$query="SELECT * FROM product WHERE id_cat ={$_GET['admin_id']}";
$res=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($res)){
    echo "<option value='{$value['id_product']}'>{$value['prod_name']}</option>";
}


?>