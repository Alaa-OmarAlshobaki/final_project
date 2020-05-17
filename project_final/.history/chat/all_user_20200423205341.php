<style>
.panel-danger {
    color: white !important;
    background-color: rgb(187, 30, 37) !important;
}
</style>

<?php
date_default_timezone_set('Asia/Kolkata');
include 'class/user.php';
session_start();
if(!isset($_SESSION['id_student'],$_SESSION['email']))
{
 header('location:login.php');
}
$user_id=$_SESSION['id_student'];

$db = new config();
$pdo = $db->db();

$user = new user();

$sql = "SELECT academicadvisor.nameac, student.id_academicadvisor FROM student
        INNER JOIN academicadvisor
		ON student.id_academicadvisor=academicadvisor.academicid
		  WHERE id_student=:user_id";
$query= $user->runQuery($sql);
$query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

?>
<div class="panel" style="width: 50rem; margin-left:50px; margin-top:50px; box-shadow: 10px 10px 5px grey;">
    <div class="panel-heading  panel-danger">
        Academic
    </div>
    <div class="panel-body">
        <ul class="list-group list-group-flush">


            <?php	foreach ($results as $row) {  
		$status = '';
		date_default_timezone_set("Asia/Amman");
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = $user->fetch_last_activity($row->id_academicadvisor);
		if($user_last_activity > $current_timestamp)
		{
		  $status = '<span class="fas fa-circle text-success"></span>';
		}
		else
		{
		  $status = '<span class="fas fa-circle text-danger"></span>';
		 } 
?><li class="list-group-item">

                <?php echo $row->nameac ; ?>
                <?php echo $user->count_unseen_message($row->id_academicadvisor,$user_id) ; ?>
                <?php echo $user->fetch_is_type_status($row->nameac) ; ?>

                <?php echo $status ; ?>

                <a class="text-success start_chat" data-touserid="<?php echo $row->id_academicadvisor ;?>"
                    data-tousername="<?php echo $row->nameac ;?>"><span style="font-size:30px"
                        class="fas fa-sms"></span></a>
            </li>



            <?php 	} 	?>
        </ul>
    </div>
</div>

<?php
	
$sq2 = "SELECT trainingadvisor.name, student.id_trainingadvisor FROM student
INNER JOIN trainingadvisor
ON student.id_trainingadvisor=trainingadvisor.phone
  WHERE id_student=:user_id";
$query= $user->runQuery($sq2);
$query->bindParam(':user_id',$user_id,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

?>

<div class="panel " style="width: 50rem; margin-left:50px; margin-top:50px ;  box-shadow: 10px 10px 5px grey;">
    <div class="panel-heading  panel-danger">
        training
    </div>
    <div class="panel-body">
        <ul class="list-group list-group-flush">


            <?php	foreach ($results as $row) {  
		$status = '';
		date_default_timezone_set("Asia/Amman");
		$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
		$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		$user_last_activity = $user->fetch_last_activity($row->id_trainingadvisor);
		if($user_last_activity > $current_timestamp)
		{
		  $status = '<span class="fas fa-circle text-success"></span>';
		}
		else
		{
		  $status = '<span class="fas fa-circle text-danger"></span>';
		 } 
?>

            <li class="list-group-item">


                <?php echo $row->name  ; ?>
                <?php echo $user->count_unseen_message($row->id_trainingadvisor,$user_id) ; ?>
                <?php echo $user->fetch_is_type_status($row->name) ; ?>

                <?php echo $status ; ?>
                <a class="text-success start_chat" data-touserid="<?php echo $row->id_trainingadvisor ;?>"
                    data-tousername="<?php echo $row->name ;?>"><span style="font-size:30px"
                        class="fas fa-sms"></span></a>

            </li>

            <?php 	} 	?>


        </ul>
    </div>
</div>