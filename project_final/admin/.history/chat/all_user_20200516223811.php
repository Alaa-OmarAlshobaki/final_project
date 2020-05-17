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

if(!isset($_SESSION['email']) && !isset($_SESSION['id_admin']))
{
 header('location:../auth_login.php');
}
 $user_id= $_SESSION['id_admin'];
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Chat Application </title>
    <link rel="icon" type="../image/x-icon" href="../assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/css/apps/mailing-chat.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

</head>

<body class="alt-menu sidebar-noneoverflow">
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm expand-header">
            <a href="../index.php" class="sidebarCollapse" data-placement="bottom">
                <img src="../../image/logo.png"> </a>


            <a href="../index.php" class="d-flex justify-content-end h1 pl-5 ml-5 text-center "><i
                    class="fal fa-home-lg-alt"><br>HOME</i></a>
        </header>


    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>



        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="chat-section layout-top-spacing">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12">

                            <div class="chat-system">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-menu mail-menu d-lg-none">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></div>
                                <div class="user-list-box">
                                    <div class="search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                        <input type="text" class="form-control" placeholder="Search" />
                                    </div>
                                    <div class="people">






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
?>
                                        <!-- <li class="list-group-item"> -->
                                        <div class="person" data-chat="person6">
                                            <div class="user-info">
                                                <div class="f-head">
                                                    <img src="../uploads/cus.png" alt="avatar">
                                                </div>
                                                <div class="f-body">
                                                    <div class="meta-info">

                                                        <span class="user-name" data-name="Nia Hillyer">
                                                            <?php echo $row->full_name_customer ; ?>
                                                            <?php echo $user->count_unseen_message($row->id_customer,$user_id) ; ?>
                                                            <?php echo $user->fetch_is_type_status($row->full_name_customer) ; ?>


                                                        </span>
                                                        <span class="user-meta-time"> <?php echo $status ; ?></span>
                                                    </div>
                                                    <span class="preview"> <a class=" start_chat"
                                                            data-touserid="<?php echo $row->id_customer ;?>"
                                                            data-tousername="<?php echo $row->full_name_customer ;?>"><span
                                                                style="font-size:30px"
                                                                class="fas fa-sms"></span></a></span>
                                                </div>
                                            </div>
                                        </div>





                                        <!-- </li> -->



                                        <?php 	} 	?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </ul> -->
                    </div>
                </div>


            </div>
        </div>