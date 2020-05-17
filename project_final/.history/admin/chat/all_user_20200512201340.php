<style>
.panel-danger {
    color: white !important;
    background-color: rgb(187, 30, 37) !important;
}
</style>

<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include 'class/user.php';

if(!isset($_SESSION['email']) && !isset($_SESSION['admin_ID']))
{
 header('location:../auth_login.php');
}
 $user_id= $_SESSION['admin_ID'];
// print_r($_SESSION);
// die();

$db = new config();
$pdo = $db->db();

$user = new user();

$sql = "SELECT * FROM customer_table";
$query= $user->runQuery($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

?>
<div class="panel" style="width: 50rem; margin-left:50px; margin-top:50px; box-shadow: 10px 10px 5px grey;">
    <div class="panel-heading  panel-danger">
        Customer
    </div>
    <div class="panel-body">
        <ul class="list-group list-group-flush">


            <?php	foreach ($results as $row) {  
		$status = '';
		date_default_timezone_set("Asia/Amman");
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = $user->fetch_last_activity($row->id_customer);
		if($user_last_activity > $current_timestamp)
		{
		  $status = '<span class="fas fa-circle text-success"></span>';
		}
		else
		{
		  $status = '<span class="fas fa-circle text-danger"></span>';
		 } 
?><li class="list-group-item">

                <?php echo $row->full_name_customer ; ?>
                <?php echo $user->count_unseen_message($row->id_customer,$user_id) ; ?>
                <?php echo $user->fetch_is_type_status($row->full_name_customer) ; ?>

                <?php echo $status ; ?>

                <a class="text-success start_chat" data-touserid="<?php echo $row->id_customer ;?>"
                    data-tousername="<?php echo $row->full_name_customer ;?>"><span style="font-size:30px"
                        class="fas fa-sms"></span></a>
            </li>



            <?php 	} 	?>
        </ul>
    </div>
</div>


</div>
</div>