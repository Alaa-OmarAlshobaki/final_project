<?php
include("admin/include/function.php") ;
 include("admin/include/connection.php") ;
 use PHPMailer\PHPMailer\PHPMailer;
 
require 'C:\xampp\htdocs\project_final\vendor\phpmailer\phpmailer\src\PHPMailer.php';

require 'C:\xampp\htdocs\project_final\vendor\autoload.php';


session_start();
global  $discountPromr;

if(!isset($_SESSION['id'])){
    direct('login.php');
}
$id_customer=$_SESSION['id'];

isset($_GET['idProd']);
if(isset($_POST['addToCart'])){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
        $_SESSION['cart'][0]['productid']=$_GET['idProd'];
        $_SESSION['cart'][0]['quantity']=$_POST['quantity'];
        echo 'Product successfully added';
    }
    else {
        /*if exist change quantity*/
                if(isexist($_GET['idProd'],$_POST['quantity'])){
                    echo 'Quantity updated successfully';
                }
        /*else add new product in cart*/
                else{
                    $m=$_SESSION['cart'];
                    $max=count($m);
                    $_SESSION['cart'][$max]['productid']=$_GET['idProd'];
                    $_SESSION['cart'][$max]['quantity']=$_POST['quantity'];
                    echo 'Product successfully added';
                }
            }
        
        
   
  
    
   
   
}
function isexist($pid,$quantity) {
    $m=$_SESSION['cart'];
    $max=count($m);
    for($i=0;$i<$max;$i++){
        if($pid==$_SESSION['cart'][$i]['productid']){
            $_SESSION['cart'][$i]['quantity']=$quantity;
            return true;
        }
    }
    return false;

}

$max=count($_SESSION['cart']);
for($i=0;$i<$max;$i++){
    $prod_id=$_SESSION['cart'][$i]['productid'];
    $quantity=$_SESSION['cart'][$i]['quantity'];
    $query="SELECT * FROM product
          WHERE id_product= $prod_id";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
 $prodctCard[]=array($row,$quantity);



}
    

}
// foreach ($_SESSION['cart'] as $prod_id) {
//    $query="SELECT * FROM product
         
//            WHERE id_product= $prod_id";
//    $result=mysqli_query($conn,$query);
//    while($row=mysqli_fetch_assoc($result)){
      
//        $prodctCard[]=$row;
      
//    }
// }




$total=0;
//validation code 
  // define variables and set to empty values
  $codeErr = "";
  $code =  "";
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 if (empty($_POST["code"])) {
		$codeErr = "input your promo code please";
	 }else {
		$code = test_input($_POST["code"]);
	 }
    }
    

    
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
    echo "your Order Done";}
 



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
    <link rel="stylesheet" type="text/css" media="screen" href="css/custom.css" />
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
    <link href="admin/fontawesome-pro/css/all.min.css" rel="stylesheet">
    <script src="admin/fontawesome-pro/js/all.min.js"></script>
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header header-2 mb--20 d-none d-lg-block">
            <div class="header-middle pt--10 pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="index.html" class="site-brand">
                                <img src="image/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <div class="header-search-block">
                                <input type="text" placeholder="Search entire store here">
                                <button>Search</button>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        <?php  if(!isset($_SESSION['id'])) { ?>
                                        <a href="login.php" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="login-register.php">Register</a>
                                        <?php } ?>
                                    </div>
                                    <?php  if(isset($_SESSION['id'])) { ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                <?php echo count($_SESSION['cart']) ;
                                
                                                ?>
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                <?php
                                            if(empty($prodctCard)){
                                                
                                            }else {
                                                foreach ($prodctCard as $key => $singleProCard) {
                                                
                                                    for($i=0;$i<sizeof($singleProCard);$i++){
                                                    // print_r( $singleProCard[0]['id_product']);
                                                   
                                                        
                                                  $idP=$singleProCard[0]['id_product'];
                                                  
                                                    $q="select * from cat_discount_pro where id_pro =$idP ";
                                                    $rs=mysqli_query($conn,$q);
                                                    $rowQ=mysqli_fetch_assoc($rs);
                                                    if(isset( $rowQ['id_dis'])){
                                                    $total+=$singleProCard[1]* ($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
                                                    }else{
                                                        $total+=  $singleProCard[1]*$singleProCard[0]['price_prod'];
                                                    }
                                                
                                                }
                                            }
                                            }
                                            

                                                 
                                               
                                                echo $total;  ?> JOD
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            <?php
                                                if(empty($prodctCard)){
                                                
                                                }else {
                                                foreach ($prodctCard as $key => $singleProCard) {
                                                
                                                    for($i=0;$i<sizeof($singleProCard);$i++){
                                                        $idP= $singleProCard[0]['id_product'] ;
                                                    $q="select * from cat_discount_pro where id_pro = $idP";
                                                    $rs=mysqli_query($conn,$q);
                                                    $rowQ=mysqli_fetch_assoc($rs);
                                                    if(isset( $rowQ['id_dis'])){
                                                $total+= $singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100);
                                                    }else{
                                                        $total+= $singleProCard[0]['price_prod'];  
                                                    }
                                                # code...
                                            ?>
                                            <div class=" single-cart-block ">
                                                <div class="cart-product">
                                                    <a href="product-details.html" class="image">
                                                        <?php $img = $singleProCard[0]['id_product'];
                                                        $queryGall="select * from gallery where pro_id=$img";
                                                        $resGall=mysqli_query($conn,$queryGall);
                                                        $rowGall=mysqli_fetch_assoc($resGall)  ?>
                                                        <img src="admin/<?php echo $rowGall['image']?>" alt="">
                                                    </a>
                                                    <div class="content">
                                                        <h3 class="title"><a
                                                                href="product-details.html"><?php echo $singleProCard[0]['prod_name']?></a>
                                                        </h3>
                                                        <p class="price"><span class="qty">

                                                                <?php
                                                      echo $singleProCard[1] ."x";

                                                    ?>



                                                            </span>
                                                            <?php
                                                          $idP= $singleProCard[0]['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $idP";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                            <span
                                                                class="price"><?php echo $singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100) ?>
                                                                JOD</span>
                                                            <del
                                                                class="price-old"><?php echo $singleProCard[0]['price_prod']  ?>JOD</del>


                                                            <?php


                                                }else {
                                                    ?>

                                                            <span
                                                                class="price"><?php echo $singleProCard[0]['price_prod']  ?>JOD</span>

                                                            <?php }


                                                ?>
                                                            <!-- discount -->

                                                            <span class="price-discount">
                                                                <?php $idPro= $singleProCard[0]['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $idPro";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?>

                                                            </span>





                                                        </p>
                                                        <a href="deleteprocard.php?idProd=<?php echo $singleProCard[0]['id_product']  ?>"
                                                            class="cross-btn"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } }}?>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="cart.php" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a>
                                                    <!-- <a href="checkout.html" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>
                                <!-- @include('menu.htm') -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger text-white"><span
                                            class="mr-3"><i class="fa fa-bars"></i></span>Browse
                                        sections</a>
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
                        <div class="col-lg-3">
                            <div class="header-phone ">
                                <div class="icon">
                                    <a href="chat\index.php"> <i class="fal fa-comments-alt text-white"></i></a>
                                </div>
                                <div class="text mt-3">
                                    <p>Free Support</p>
                                    <p class="font-weight-bold number text-white">Send Massage</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="main-navigation flex-lg-right">
                                <ul class="main-menu menu-right main-menu--white li-last-0 ">
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
                                    <!-- Pages -->
                                    <li class="menu-item">
                                        <a href="my-account.php">Account </a>

                                    </li>
                                    <!-- Blog -->

                                    <li class="menu-item">
                                        <a href="contact.html">Contact</a>
                                    </li>
                                    <?php if(isset($_SESSION['id'])) { ?>
                                    <li class="menu-item">
                                        <a href="logout_customer.php"><i class="fal fa-sign-out"></i></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
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
                                    <a href="javascript:void(0)" class="category-trigger"><span class="mr-3"><i
                                                class="fa fa-bars"></i></span>Browse
                                        sections</a>
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
                                        <?php } ?>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-3 col-5  order-md-3 text-right">
                            <div class="mobile-header-btns header-top-widget">
                                <ul class="header-links">
                                    <li class="sin-link">
                                        <a href="cart.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
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
                                        <?php 
                                     $queryReadSect="SELECT * FROM category";
                                     $resultReadSec=mysqli_query($conn,$queryReadSect);
                                    while($rowReadSec=mysqli_fetch_assoc($resultReadSec))
                                    {  
                                    
                                    ?>
                                        <li class="menu-item-has-children">
                                            <a
                                                href="categorey.php?id=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?></a>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                </li>
                                <!-- Pages -->
                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

                                </li>
                                <!-- Blog -->

                                <li class="menu-item">
                                    <a href="contact.html">Contact</a>
                                </li>
                                <?php if(isset($_SESSION['id'])) { ?>
                                <li class="menu-item">
                                    <a href="logout_customer.php"><i class="fal fa-sign-out"></i></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <nav class="off-canvas-nav">
                        <ul class="mobile-menu menu-block-2">

                            <li class="menu-item-has-children">
                                <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="">My Account</a></li>
                                    <li><a href="">Order History</a></li>
                                    <li><a href="">Transactions</a></li>
                                    <li><a href="">Downloads</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(+962) 788320226</a>
                            <a href="" class="sin-contact"><i
                                    class="fas fa-envelope"></i>alaaomaralshobaki@gmail.com</a>
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
                        <a href="index.php" class="site-brand">
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

                                    </ul>
                                </li>
                                <!-- Pages -->
                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

                                </li>
                                <!-- Blog -->

                                <li class="menu-item">
                                    <a href="contact.html">Contact</a>
                                </li>
                                <?php if(isset($_SESSION['id'])) { ?>
                                <li class="menu-item">
                                    <a href="logout_customer.php"><i class="fal fa-sign-out"></i></a>
                                </li>
                                <?php } ?>
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
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Form s-->
                        <div class="checkout-form">
                            <div class="row row-40">
                                <div class="col-12">
                                    <h1 class="quick-title">Checkout</h1>
                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Returning customer? <a href="login.php"
                                                class="slide-trigger" data-target="#quick-login">Click
                                                here to login</a></p>
                                    </div>

                                    <!-- Slide Down Trigger  -->
                                    <div class="checkout-quick-box">
                                        <p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:"
                                                class="slide-trigger" data-target="#quick-cupon">
                                                Click here to enter your code</a></p>
                                    </div>
                                    <!-- Slide Down Blox ==> Cupon Box -->
                                    <div class="checkout-slidedown-box" id="quick-cupon">
                                        <form action="" method="POST">
                                            <div class="checkout_coupon">
                                                <input type="text" name="coupon_code" class="input-text"
                                                    id="coupon_code" value="" placeholder="Promo code">
                                                <span class="error">* <?php echo $codeErr;?></span>

                                                <input type="submit" class="btn btn-outlined " name="apply_coupon"
                                                    value="Apply code">
                                            </div>
                                        </form>
                                    </div>
                                </div>




                                <?php 
								
								$customerQuerey="SELECT * FROM customer_table WHERE id_customer=$id_customer";
								$resultCus=mysqli_query($conn,$customerQuerey);
								$rowCus=mysqli_fetch_assoc($resultCus);
								
								
								?>
                                <div class="col-lg-7 mb--20">
                                    <!-- ******************************************* form for order*********************** -->
                                    <form action="" method="POST">
                                        <!-- Billing Address -->
                                        <div id="billing-form" class="mb-40">
                                            <h4 class="checkout-title">Billing Address</h4>
                                            <div class="row">
                                                <div class="col-md-12 col-12 mb--20">
                                                    <label>First Name*</label>
                                                    <input type="text" name="name"
                                                        value="<?php echo $rowCus['full_name_customer']  ?>"
                                                        placeholder="First Name">
                                                </div>

                                                <div class="col-md-6 col-12 mb--20">
                                                    <label>Email Address*</label>
                                                    <input type="email" name="email"
                                                        value="<?php echo $rowCus['email_customer']  ?>"
                                                        placeholder="Email Address">
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label>Phone no*</label>
                                                    <input type="text" placeholder="Phone number" name="phone"
                                                        value="<?php echo $rowCus['phone_customer']  ?>">
                                                </div>

                                                <div class="col-md-6 col-12 mb--20">
                                                    <label>City*</label>
                                                    <input type="text" name="city"
                                                        value="<?php echo $rowCus['city_customer']  ?>"
                                                        placeholder="Town/City">
                                                </div>
                                                <div class="col-md-6 col-12 mb--20">
                                                    <label>Street*</label>
                                                    <input type="text" placeholder="State" name="street"
                                                        value="<?php echo $rowCus['street_customer']  ?>">
                                                </div>
                                                <input type="hidden" placeholder="Phone number" name="pass"
                                                    value="<?php echo $rowCus['password_customer']  ?>">
                                                <!-- <div class="col-12 mb--20 ">
                                                <div class="block-border check-bx-wrapper">

                                                    <div class="check-box">
                                                        <input type="checkbox" id="shiping_address" data-shipping>
                                                        <label for="shiping_address">Ship to Different Address</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                        <!-- Shipping Address -->
                                        <!-- <div id="shipping-form" class="mb--40">
                                        <h4 class="checkout-title">Shipping Address</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>First Name*</label>
                                                <input type="text" placeholder="First Name">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Last Name*</label>
                                                <input type="text" placeholder="Last Name">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Email Address*</label>
                                                <input type="email" placeholder="Email Address">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Phone no*</label>
                                                <input type="text" placeholder="Phone number">
                                            </div>
                                            <div class="col-12 mb--20">
                                                <label>Company Name</label>
                                                <input type="text" placeholder="Company Name">
                                            </div>
                                            <div class="col-12 mb--20">
                                                <label>Address*</label>
                                                <input type="text" placeholder="Address line 1">
                                                <input type="text" placeholder="Address line 2">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Country*</label>
                                                <select class="nice-select">
                                                    <option>Bangladesh</option>
                                                    <option>China</option>
                                                    <option>country</option>
                                                    <option>India</option>
                                                    <option>Japan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Town/City*</label>
                                                <input type="text" placeholder="Town/City">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>State*</label>
                                                <input type="text" placeholder="State">
                                            </div>
                                            <div class="col-md-6 col-12 mb--20">
                                                <label>Zip Code*</label>
                                                <input type="text" placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div> -->
                                        <div class="order-note-block mt--30">
                                            <label for="order-note">Order notes</label>
                                            <textarea id="order-note" cols="30" rows="10" class="order-note"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="row">
                                        <!-- Cart Total -->
                                        <div class="col-12">
                                            <div class="checkout-cart-total">
                                                <h2 class="checkout-title">YOUR ORDER</h2>
                                                <h4>Product <span>Total</span></h4>
                                                <ul>

                                                    <?php     
                                                    if(empty($prodctCard)){
                                                            
                                                    }else {
                                                        foreach ($prodctCard as $key => $singleProCard) {
                                                        
												for($i=0;$i<sizeof($singleProCard);$i++){
													$img=$singleProCard[0]['id_product'];
												$q="select * from cat_discount_pro where id_pro = $img";
												$rs=mysqli_query($conn,$q);
												$rowQ=mysqli_fetch_assoc($rs);
												if(isset( $rowQ['id_dis'])){
													$total+= ($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
												}else{
													$total+=  $singleProCard[0]['price_prod'];
												}
												
												?>

                                                    <li><span class="left"><?php echo $singleProCard[0]['prod_name']  ?>
                                                            X
                                                            <?php echo $singleProCard[1];
                                                            echo"<input type='hidden' name='quantity' value='$singleProCard[1]'>";
                                                            ?></span>

                                                        <span name="sub" class="right"> <?php   if(isset( $rowQ['id_dis'])){
													 echo $singleProCard[1]*($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
												   } else {
													 echo $singleProCard[1]*($singleProCard[0]['price_prod']);
													
												   }  ?></span></li>

                                                    <?php }}} ?>


                                                    <!-- <li><span class="left">Auctor gravida pellentesque X 02 </span><span
                                                            class="right">$50.00</span></li>
                                                    <li><span class="left">Condimentum posuere consectetur X 01</span>
                                                        <span class="right">$29.00</span></li>
                                                    <li><span class="left">Habitasse dictumst elementum X 01</span>
                                                        <span class="right">$10.00</span></li> -->
                                                </ul>
                                                <p>Sub Total <span>
                                                        <?php
                                                    if(isset($discountPromr)){

                                                            echo $discountPromr;
                                                    }else{

                                                        $total=0;


                                                if(empty($prodctCard)){
                                                                
                                                }else {
                                                    foreach ($prodctCard as $key => $singleProCard) {
                                                    
                                                        for($i=0;$i<sizeof($singleProCard);$i++){
										// print_r( $singleProCard[0]['id_product']);
									   
											
									  $idP=$singleProCard[0]['id_product'];
									  
										$q="select * from cat_discount_pro where id_pro =$idP ";
										$rs=mysqli_query($conn,$q);
										$rowQ=mysqli_fetch_assoc($rs);
										if(isset( $rowQ['id_dis'])){
										$total+=$singleProCard[1]* ($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
                                        echo "<input type='hidden' name='sub' value='$total'>";
                                       }else{
											$total+=  $singleProCard[1]*$singleProCard[0]['price_prod'];
                                            echo "<input type='hidden' name='sub' value='$total'>";
                                        }
                                                
                                                }
                                            }
                                            }
                                            echo $total;		 
                                                }
                                                
                                                
                                                
                                                ?> JOD


                                                    </span></p>
                                                <p>Delivery Cost <span>05.00 JOD</span></p>
                                                <h4>Grand Total <label><?php
if(isset($_POST['apply_coupon'])) {
							
    $CODE=$_POST['coupon_code'];
    $CUS=$id_customer;

    
    
    $queryChec="SELECT * FROM customer_table
                 WHERE status_promo = 0
                 AND promo_code='$CODE'
                 AND id_customer=$CUS";
                
    $resChec=mysqli_query($conn,$queryChec);
    
    $rowChec=mysqli_fetch_assoc($resChec);
    $promo = isset($rowChec['promo_code']);

    if($CODE == $promo ){
        $total=0;


        if(empty($prodctCard)){
                        
        }else {
            foreach ($prodctCard as $key => $singleProCard) {
            
                for($i=0;$i<sizeof($singleProCard);$i++){
                // print_r( $singleProCard[0]['id_product']);
               
                    
              $idP=$singleProCard[0]['id_product'];
              
                $q="select * from cat_discount_pro where id_pro =$idP ";
                $rs=mysqli_query($conn,$q);
                $rowQ=mysqli_fetch_assoc($rs);
                if(isset( $rowQ['id_dis'])){
                $total+=$singleProCard[1]* ($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
                }else{
                    $total+=  $singleProCard[1]*$singleProCard[0]['price_prod'];
                }
            
            }
        }
    }
        

             
           
            
              $discountPromr= $total-($total*30/100) ;
             
  







											if(isset($discountPromr)){
                                              
                                            echo $GranTot= $discountPromr+5;
                                            echo "<input type='hidden' value='$GranTot' name='Grand'>";
                                            
                                        }else{
                                            echo "<div class='alert alert-success' role='alert'>
                                            <h4 class='alert-heading'> <i class='fal fa-exclamation-triangle'></i> Massage Error</h4>
                                            <p>promo code is not match or you are used.</p>
                                            
                                          </div>";
                                        }
                                        
                                    
                                    
                                        
                                    
                                    
                                        }
                                        
                                        
                                        }else{
                                                echo $granTotal= $total+5;
                                                echo "<input type='hidden' value='$granTotal' name='Grand'>";
                                               
											}
											
											
											?> JOD</label></h4>
                                                <div class="method-notice mt--25">
                                                    <article>
                                                        <h3 class="d-none sr-only">blog-article</h3>
                                                        Please contact us if you
                                                        require
                                                        assistance
                                                        or wish to make alternate arrangements.
                                                    </article>
                                                </div>
                                                <div class="term-block">
                                                    <input type="checkbox" id="accept_terms2">
                                                    <label for="accept_terms2">I’ve read and accept the terms &
                                                        conditions</label>
                                                </div>
                                                <button name="placeOrder" type="submit" class="place-order w-100">Place
                                                    order</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- *************************************************end form order*************************************** -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php
							
                            
                            ////////////order//////////
                            if(isset($_POST['placeOrder'])){ 
                                $name = @$_POST['name'];
                                $email= @$_POST['email'];
                                $phone= @$_POST['phone'];
                                $pass = @$_POST['pass'];
                                $city = @$_POST['city'];
                                $street = @$_POST['street'];
                              
                                $Grand = @$_POST['Grand'];
                                $quantity =@$_POST['quantity'];
                                $sub=   @$_POST['sub'];

                               $queryOrder="UPDATE customer_table SET 
                                                                   
                                                                   full_name_customer ='$name',
                                                                   phone_customer  = $phone,
                                                                   email_customer = '$email',
                                                                   street_customer = '$street',
                                                                   city_customer  = '$city',
                                                                   password_customer = '$pass'
                                            WHERE id_customer=$id_customer
                                                                 ";
                               if($resOrder=mysqli_query($conn,$queryOrder)){
                                   
                                  $queryInsert="INSERT INTO order_table (customer_id,order_status, `order_date`, `total`)
                                                                 VALUES ($id_customer,'0',Now(),$Grand)";
                                  if($resInsert=mysqli_query($conn,$queryInsert)) {
                                  $quLas="SELECT MAX(id_order) FROM order_table";
                                  $res=mysqli_query($conn,$quLas);
                                  $rowLasInsert = mysqli_fetch_assoc($res);
                                      $order=$rowLasInsert['MAX(id_order)'];
                                      $item="INSERT INTO `order_items`(order_id,product_id,quantity,list_price)
                                             VALUES                   ((SELECT id_order FROM order_table WHERE order_table.id_order = $order),(SELECT id_product FROM product WHERE product.id_product =$img),$quantity,$sub)";
                                             if($resItem =mysqli_query($conn,$item)){
                                                 $querSelect="SELECT product_qty FROM product WHERE id_product=$img";
                                                 $resSelect=mysqli_query($conn,$querSelect);
                                                if($row=mysqli_fetch_assoc($resSelect)){
                                                 $post_quan=$row['product_qty']-$quantity;
                                                 
                                                 $queryQuant="UPDATE product SET
                                                                                   product_qty=$queryQuant
                                                                                    WHERE id_product = $img";
                                                 if($resultProduct=mysqli_query($conn,$queryProduct)){



                                              sendmail($email , "Welcome 
                                              We are glad your visit to Bustok.
                                              Your request has been confirmed , your id order : $order");
                                             
                                             unset($_SESSION['cart']);
                                                direct('index.php');
                                             
                                      
                                  }}}}
                                   


                               }else{
                                  echo "<div class='alert alert-success' role='alert'>
                                  <h4 class='alert-heading'> <i class='fal fa-exclamation-triangle'></i> Massage Error</h4>
                                  <p>error.</p>
                                  
                                </div>";

                               }
                              








                               }



							?>
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
                <!-- <div class="single-slide">
                    <img src="image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-2.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-3.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-4.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-5.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-6.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-1.jpg" alt="">
                </div>
                <div class="single-slide">
                    <img src="image/others/brand-2.jpg" alt="">
                </div> -->
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