<?php
include("admin/include/function.php");
 include("admin/include/connection.php"); 
 use PHPMailer\PHPMailer\PHPMailer;

require 'C:\xampp\htdocs\project_final\vendor\phpmailer\phpmailer\src\PHPMailer.php';

require 'C:\xampp\htdocs\project_final\vendor\autoload.php';




function sendmail($to, $message) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port     = 587;  
    $mail->Username = "alo2.omar92@gmail.com";
    $mail->Password = "cs123456cs";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("alo2.omar92@gmail.com", " Pustok.bookStore");
    $mail->AddAddress($to);
    $mail->Subject = "Pustok.bookStore";
    $mail->WordWrap   = 80;
    $content = "<b>".$message."</b>"; $mail->MsgHTML($content);
    $mail->IsHTML(true);
    if(!$mail->Send()) 
    echo "Problem sending email.";
    else 
    echo "register Done";}
 


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    <link href="admin/fontawesome-pro/css/all.min.css" rel="stylesheet">
    <script src="admin/fontawesome-pro/js/all.min.js"></script>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 ">
                            <a href="index.html" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <a href="chat\index.php"> <i class="fal fa-comments-alt"></i></a>
                                </div>
                                <div class="text mt-3">
                                    <p>Free Support</p>
                                    <p class="font-weight-bold number">Send Massage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right ">
                                    <li class="menu-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <!-- Shop -->
                                    <li class="menu-item has-children mega-menu">
                                        <a href="javascript:void(0)">Sections <i
                                                class="fas fa-chevron-down dropdown-arrow"></i></a>
                                        <ul class="sub-menu four-column">
                                            <!-- read all section from database -->
                                            <?php
                                            $queryReadSect="SELECT * FROM category";
                                            $resultReadSec=mysqli_query($conn,$queryReadSect);
                                           while($rowReadSec=mysqli_fetch_assoc($resultReadSec))
                                           {


                                            ?>
                                            <li class="cus-col-25">
                                                <h3 class="menu-title"><a
                                                        href="categorey.php?id=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                                    </a></h3>

                                            </li>
                                            <?php } ?>

                                        </ul>
                                    </li>

                                    <!-- Blog -->
                                    <li class="menu-item">
                                        <a href="login.php">Login</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars"></i>Browse
                                        Sections</a>
                                    <ul class="category-menu">
                                        <?php
                                          $queryCat ="SELECT * FROM category ";
                                           
                                          $resultCat=mysqli_query($conn,$queryCat);
                                          while($rowCat =mysqli_fetch_assoc($resultCat)){ 
                                            $id= $rowCat['id'];
                                          
                                        ?>
                                        <li class="cat-item has-children">
                                            <a
                                                href="categorey.php?id=<?php echo $rowCat['id'] ?>"><?php echo $rowCat['category_name'] ?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                       $querySub ="SELECT * FROM product
                                                       INNER JOIN category
                                                       ON product.id_cat = category.id 
                                                       WHERE id_cat=$id";
                                                        
                                                       $resultSub=mysqli_query($conn,$querySub);
                                                       while($rowSub =mysqli_fetch_assoc($resultSub)){ 
                                                ?>
                                                <li> <a
                                                        href="product.php?id=<?php echo $rowSub['id_product'] ?>"><?php echo $rowSub['prod_name'] ?></a>
                                                </li>
                                                <?php  } ?>
                                            </ul>
                                        </li>

                                        <?php  } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-lg-5">
                            <!-- <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div> -->
                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-mobile-menu">
            <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
                <div class="container">
                    <div class="row align-items-sm-end align-items-center">
                        <div class="col-md-4 col-7">
                            <a href="index.html" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 order-3 order-md-2">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><i
                                            class="fa fa-bars mr-5"></i>Browse
                                        Sections</a>
                                    <ul class="category-menu">
                                        <?php
                                          $queryCatMob ="SELECT * FROM category ";
                                           
                                          $resultCatMob=mysqli_query($conn,$queryCatMob);
                                          while($rowCatMob =mysqli_fetch_assoc($resultCatMob)){ 
                                            $id= $rowCatMob['id'];
                                          
                                        ?>
                                        <li class="cat-item has-children">
                                            <a
                                                href="categorey.php?id=<?php echo $rowCatMob['id'] ?>"><?php echo $rowCatMob['category_name'] ?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                       $querySubMob ="SELECT * FROM product
                                                       INNER JOIN category
                                                       ON product.id_cat = category.id 
                                                       WHERE id_cat=$id";
                                                        
                                                       $resultSubMob=mysqli_query($conn,$querySubMob);
                                                       while($rowSubMob =mysqli_fetch_assoc($resultSubMob)){ 
                                                ?>
                                                <li> <a
                                                        href="product.php?id=<?php echo $rowSubMob['id_product'] ?>"><?php echo $rowSubMob['prod_name'] ?></a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.html" class="cart-link link-icon"><i class="ion-bag"></i></a>
                                    </li>
                                    <li class="sin-link">
                                        <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
                                                class="ion-navicon"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--Off Canvas Navigation Start-->
            <aside class="off-canvas-wrapper">
                <div class="btn-close-off-canvas">
                    <i class="ion-android-close"></i>
                </div>
                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here">
                            <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav class="off-canvas-nav">
                            <ul class="mobile-menu main-mobile-menu">
                                <li class="menu-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Sections</a>
                                    <ul class="sub-menu">
                                        <!-- read all section from database -->
                                        <?php
                                            $queryReadSect="SELECT * FROM category";
                                            $resultReadSec=mysqli_query($conn,$queryReadSect);
                                           while($rowReadSec=mysqli_fetch_assoc($resultReadSec))
                                           {


                                            ?>
                                        <li class="menu-item-has-children">
                                            <a href="categorey.php?id=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                            </a>
                                            <!-- <ul class="sub-menu">
                                                <li><a href="blog.html">Full Widh (Default)</a></li>
                                                <li><a href="blog-left-sidebar.html">left Sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                                            </ul> -->
                                        </li>
                                        <?php } ?>
                                        <!-- <li class="menu-item-has-children">
                                            <a href="#">Blog List</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-list.html">Full Widh (Default)</a></li>
                                                <li><a href="blog-list-left-sidebar.html">left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog Details</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog-details.html">Image Format (Default)</a></li>
                                                <li><a href="blog-details-gallery.html">Gallery Format</a></li>
                                                <li><a href="blog-details-audio.html">Audio Format</a></li>
                                                <li><a href="blog-details-video.html">Video Format</a></li>
                                                <li><a href="blog-details-left-sidebar.html">left Sidebar</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </li>

                                <li><a href="login.php">login</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>

                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(+962) 788320226</a>
                            <a href="" class="sin-contact"><i class="fas fa-envelope"></i>alaaomaralshobaki@gmil.com</a>
                        </div>
                        <div class="off-canvas-social">
                            <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
            <!--Off Canvas Navigation End-->
        </div>
        <div class="sticky-init fixed-header common-sticky">
            <div class="container d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <a href="index.html" class="site-brand">
                            <img src="image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8">
                        <div class="main-navigation flex-lg-right">
                            <ul class="main-menu menu-right ">
                                <li class="menu-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <!-- Shop -->
                                <li class="menu-item has-children mega-menu">
                                    <a href="javascript:void(0)">Sections <i
                                            class="fas fa-chevron-down dropdown-arrow"></i></a>
                                    <ul class="sub-menu four-column">
                                        <!-- read all section from database -->
                                        <?php
                                            $queryReadSect="SELECT * FROM category";
                                            $resultReadSec=mysqli_query($conn,$queryReadSect);
                                           while($rowReadSec=mysqli_fetch_assoc($resultReadSec))
                                           {


                                            ?>
                                        <li class="cus-col-25">
                                            <h3 class="menu-title"><a
                                                    href="categorey.php?id=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                                </a></h3>

                                        </li>
                                        <?php } ?>
                                        <!-- <li class="cus-col-25">
                                            <h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
                                            <ul class="mega-single-block">
                                                <li><a href="shop-list.html">Fullwidth</a></li>
                                                <li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
                                                <li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="cus-col-25">
                                            <h3 class="menu-title"> <a href="javascript:void(0)">Product Details 1</a>
                                            </h3>
                                            <ul class="mega-single-block">
                                                <li><a href="product-details.html">Product Details Page</a></li>
                                                <li><a href="product-details-affiliate.html">Product Details
                                                        Affiliate</a></li>
                                                <li><a href="product-details-group.html">Product Details Group</a></li>
                                                <li><a href="product-details-variable.html">Product Details
                                                        Variables</a></li>
                                            </ul>
                                        </li>
                                        <li class="cus-col-25">
                                            <h3 class="menu-title"><a href="javascript:void(0)">Product Details 2</a>
                                            </h3>
                                            <ul class="mega-single-block">
                                                <li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
                                                </li>
                                                <li><a href="product-details-right-thumbnail.html">Right Thumbnail</a>
                                                </li>
                                                <li><a href="product-details-left-gallery.html">Left Gallery</a></li>
                                                <li><a href="product-details-right-gallery.html">Right Gallery</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </li>

                                <!-- Blog -->
                                <li class="menu-item">
                                    <a href="login.php">Login</a>
                                </li>
                                <li class="menu-item">
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!--=============================================
    =            Login Register page content         =
    =============================================-->
        <main class="page-section inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                        <!-- Login Form s-->
                        <form method="POST" action="">
                            <div class="login-form">
                                <h4 class="login-title">New Customer</h4>
                                <p><span class="font-weight-bold">I am a new customer</span></p>
                                <div class="row">
                                    <div class="col-md-12 col-12 mb--15">
                                        <label for="email">Full Name</label>
                                        <input class="mb-0 form-control" type="text" name="full_name_customer" id="name"
                                            placeholder="Enter your full name">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label for="email">Email</label>
                                        <input class="mb-0 form-control" type="email" id="email" name="email_customer"
                                            placeholder="Enter Your Email Address Here..">
                                    </div>
                                    <div class="col-12 mb--20">
                                        <label for="phone">Phone</label>
                                        <input class="mb-0 form-control" name="phone_customer" type="phone" id="phone"
                                            placeholder="Enter Your Phone Number Here..">
                                    </div>
                                    <div class="col-lg-6 mb--20">
                                        <label for="password">Password</label>
                                        <input class="mb-0 form-control" type="password" id="password"
                                            name="password_customer" placeholder="Enter your password">
                                    </div>
                                    <div class="col-lg-6 mb--20">
                                        <label for="password">Repeat Password</label>
                                        <input class="mb-0 form-control" type="password" id="repeat-password"
                                            name="reepass" placeholder="Repeat your password">
                                    </div>
                                    <div class="col-lg-6 mb--20">
                                        <label for="password"> Street Address</label>
                                        <input class="mb-0 form-control" type="text" id="address"
                                            placeholder="Enter your Street Address" name="street_customer">
                                    </div>
                                    <div class="col-lg-6 mb--20">
                                        <label for="address">City Address</label>
                                        <input class="mb-0 form-control" type="text" name="city_customer" id=""
                                            placeholder="Enter your City Address">
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn btn-outlined" name="save">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
					if(isset($_POST['save'])){
						
                        $promCode= promoCode();
						$name= $_POST['full_name_customer'];
						$email= $_POST['email_customer'];
						$phone= $_POST['phone_customer'];
						$pass= $_POST['password_customer'];
						$repass= $_POST['reepass'];
						$str= $_POST['street_customer'];
						$add= $_POST['city_customer'];
						$querySelect="SELECT email_customer FROM customer_table WHERE email_customer= '$email '";
						$resSelect= mysqli_query($conn,$querySelect);
						if($row = mysqli_fetch_assoc($resSelect)){
							echo "the email is used";
						}else{
							if($pass === $repass){
						   $queryInsert="INSERT INTO customer_table (full_name_customer,phone_customer,email_customer,street_customer,city_customer,password_customer,promo_code)
													 VALUES('$name',$phone,'$email','$str','$add','$pass','$promCode')";
						   if($resInsert=mysqli_query($conn,$queryInsert)){
							sendmail($_POST["email_customer"] , "Welcome to new users
							Hi" . $name .", you got a 30% discount code". $promCode .". You can use it when you visit us next time".$promCode);
							 
							
							echo "<div role='alert' aria-live='assertive' aria-atomic='true' class='toast' data-autohide='false'>
							<div class='toast-header'>
							  <img src='...' class='rounded mr-2' alt='...'>
							  <strong class='mr-auto'>Bootstrap</strong>
							  <small>11 mins ago</small>
							  <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							  </button>
							</div>
							<div class='toast-body'>
							  Hello, You can now log in, useing your Email and Password
							</div>
						  </div>";
						
						}
						   
					
							}else{
								echo "password not match";
							}
						}
					
					
					
					}
					
					


                     ?>


                </div>
            </div>
        </main>
    </div>
    <!--=================================
  Brands Slider
===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Brand Slider</h2>
        <div class="container">
            <div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <img src="image/singleslide/1.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/2.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/3.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/4.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/5.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/6.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/7.png" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/singleslide/8.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--=================================
    Footer Area
===================================== -->
    <footer class="site-footer">
        <div class="container">
            <div class="row justify-content-between  section-padding">
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="brand-footer footer-title">
                            <img src="image/logo--footer.png" alt="">
                        </div>
                        <div class="footer-contact">
                            <p><span class="label">Address:</span><span class="text">Example Street 98, HH2 BacHa, New
                                    York, USA</span></p>
                            <p><span class="label">Phone:</span><span class="text">+18088 234 5678</span></p>
                            <p><span class="label">Email:</span><span class="text">suport@hastech.com</span></p>
                        </div>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Information</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Prices drop</a></li>
                            <li><a href="">New products</a></li>
                            <li><a href="">Best sales</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-2 col-sm-6">
                    <div class="single-footer pb--40">
                        <div class="footer-title">
                            <h3>Extras</h3>
                        </div>
                        <ul class="footer-list normal-list">
                            <li><a href="">Delivery</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Stores</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class=" col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h3>Newsletter Subscribe</h3>
                    </div>
                    <div class="newsletter-form mb--30">
                        <form action="./php/mail.php">
                            <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
                            <button class="btn btn--primary w-100">Subscribe</button>
                        </form>
                    </div>
                    <div class="social-block">
                        <h3 class="title">STAY CONNECTED</h3>
                        <ul class="social-list list-inline">
                            <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a>
                            </li>
                            <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
                            <li class="single-social google"><a href=""><i
                                        class="ion ion-social-googleplus-outline"></i></a></li>
                            <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam
                    vel magna volutpat, posuere eros</p>
                <a href="#" class="payment-block">
                    <img src="image/icon/payment.png" alt="">
                </a>
                <p class="copyright-text">Copyright © 2019 <a href="#" class="author">Pustok</a>. All Right Reserved.
                    <br>
                    Design By Pustok</p>
            </div>
        </div>
    </footer>
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <script src="js/plugins.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>