<?php
//include conniction
include("include/connection.php");
//include function
include("include/function.php");
//start session
session_start();
//check of admin login 
if(isset($_POST['submit'])){
    $emailAdmin =  @$_POST['email'];
    $passAdmin  =  @$_POST['password'];
    $query = "SELECT * FROM admin 
              WHERE admin_email = '$emailAdmin'
              AND   admin_pass  = '$passAdmin'";
              
    $result = mysqli_query($conn,$query);
    if($row = mysqli_fetch_assoc($result)){

        $_SESSION['email']       = $row['admin_email'];
        $_SESSION['admin_ID']    = $row['id'];
        direct('index.php');
    }else{
        $error="user not found";
        
    }


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login dashboard RaiseUrMind </title>
    <link rel="icon" type="image/x-icon" href="assets/img/fav.png" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="fontawesome-pro/css/all.min.css" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/elements/alert.css">

    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>

<body class="form">


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Log In to <a href="index.html"><span class="brand-name h2">RaiseUrMind
                                </span></a>
                        </h1>
                        <!-- <p class="signup-link">New Here? <a href="auth_register.html">Create an account</a></p> -->
                        <form class="text-left" action="" method="POST">
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="email">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="submit" value="">Log
                                            In</button>
                                    </div>

                                </div>

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div>

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <?php if(isset($error)){?>
                                        <div class="alert alert-outline-primary mb-4" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><svg>
                                                    ... </svg></button>
                                            <i class="fal fa-exclamation-triangle text-white "></i>
                                            <strong class="pl-5">Warning!</strong> <?php echo $error ?>.
                                        </div>
                                        <?php }  ?>
                                    </div>
                                </div>


                                <div class="field-wrapper">
                                    <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions">&copy <?php echo date("Y") ?> All Rights Reserved. <a
                                href="index.html">RaiseUrMind</a>
                            <a href="javascript:void(0);"></a><a href="javascript:void(0);"></a> <a
                                href="javascript:void(0);"></a></p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->

    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>

    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="fontawesome-pro/js/all.min.js"></script>
    <!-- <script>
    $(document).ready(function() {
        App.init();
    });
    </script> -->

    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/custom.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-1.js"></script>
    <script src="assets/js/scrollspyNav.js"></script>


</body>

</html>