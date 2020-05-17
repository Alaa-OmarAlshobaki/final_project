<?php
include("include/connection.php");
$query="SELECT * FROM product WHERE id_cat ={$_GET['admin_id']}";



?>