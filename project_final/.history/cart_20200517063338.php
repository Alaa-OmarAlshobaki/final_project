<?php
include("admin/include/function.php") ;
 include("admin/include/connection.php") ;
session_start();
$customer=$_SESSION['id'];

isset($_GET['id']);
if(isset($_POST['addToCart'])){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
        $_SESSION['cart'][0]['productid']=$_GET['id'];
        $_SESSION['cart'][0]['quantity']=$_POST['quantity'];
        echo 'Product successfully added';
    }
    else {
        /*if exist change quantity*/
                if(isexist($_GET['id'],$_POST['quantity'])){
                    echo 'Quantity updated successfully';
                }
        /*else add new product in cart*/
                else{
                    $m=$_SESSION['cart'];
                    $max=count($m);
                    $_SESSION['cart'][$max]['productid']=$_GET['id'];
                    $_SESSION['cart'][$max]['quantity']=$_POST['quantity'];
                    echo 'Product successfully added';
                }
            }
        
        
   
  
    // $_SESSION['prod_card'][]=$_GET['id'];
    // $quantity =$_POST['quantity'];
    
   
   
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
                                                <?php echo count($_SESSION['cart'])  ?>
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
                                            

                                                 
                                               
                                                echo $total;  ?>


                                                JOD
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
                                                        <a href="deleteprocard.php?idpro=<?php echo $singleProCard[0]['id_product']  ?>"
                                                            class="cross-btn"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } }}?>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <!-- <a href="cart.html" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a> -->
                                                    <a href="checkout.php" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
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
                            <nav class="category-nav white-nav  ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><span class="mr-3"><i
                                                class="fa fa-bars"></i></span>Browse
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

                                        <?php  } ?>
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
                                <ul class="main-menu menu-right main-menu--white li-last-0">
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
                                <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="cart.html">USD $</a></li>
                                    <li> <a href="checkout.html">EUR €</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li>Eng</li>
                                    <li>Ban</li>
                                </ul>
                            </li>
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
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(12345) 78790220</a>
                            <a href="" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
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
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <!-- Cart Page Start -->
        <main class="cart-page-main-block inner-page-sec-padding-bottom">
            <div class="cart_area cart-area-padding  ">
                <div class="container">
                    <div class="page-section-title">
                        <h1>Shopping Cart</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="#" method="POST" class="">
                                <!-- Cart Table -->
                                <div class="cart-table table-responsive mb--40">
                                    <table class="table">
                                        <!-- Head Row -->
                                        <thead>
                                            <tr>
                                                <th class="pro-remove"></th>
                                                <th class="pro-thumbnail">Image</th>
                                                <th class="pro-title">Product</th>
                                                <th class="pro-price">Price</th>
                                                <th class="pro-quantity">Quantity</th>
                                                <th class="pro-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- Product Row -->

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

                                            <tr>
                                                <td class="pro-remove"><a
                                                        href="deleteprocard.php?idpro=<?php echo $singleProCard[0]['id_product']  ?>"><i
                                                            class="far fa-trash-alt"></i></a>
                                                </td>
                                                <?php 
												$prod=$singleProCard[0]['id_product'];
												 $queryImg="SELECT * FROM gallery
																   WHERE pro_id=$prod";
												$reImg=mysqli_query($conn,$queryImg);
												$rowImg=mysqli_fetch_assoc($reImg) ?>
                                                <td class="pro-thumbnail"><img
                                                        src="admin/<?php echo $rowImg['image']  ?>" alt="Product"></td>
                                                <td class="pro-title"><?php echo $singleProCard[0]['prod_name'] ?></td>
                                                <td class="pro-price">
                                                    <?php
												   $q="select * from cat_discount_pro where id_pro = $img";
												   $rs=mysqli_query($conn,$q);
												   $rowQ=mysqli_fetch_assoc($rs);
												   if(isset( $rowQ['id_dis'])){
													 echo ($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
												   } else {
													 echo $singleProCard[0]['price_prod'];
													
												   }
													
													
													?>
                                                </td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty">
                                                        <div class="count-input-block">
                                                            <input type="number" class="form-control text-center"
                                                                value="<?php echo $singleProCard[1] ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal"><span>
                                                        <?php   if(isset( $rowQ['id_dis'])){
													 echo $singleProCard[1]*($singleProCard[0]['price_prod']-($singleProCard[0]['price_prod']*$rowQ['id_dis']/100));
												   } else {
													 echo $singleProCard[1]*($singleProCard[0]['price_prod']);
													
												   }  ?>
                                                    </span></td>
                                            </tr>
                                            <?php } }}?>

                                            <!-- Discount Row  -->
                                            <tr>
                                                <td colspan="6" class="actions">
                                                    <div class="coupon-block">
                                                        <div class="coupon-text">
                                                            <label for="coupon_code">Promo Code:</label>
                                                            <input type="text" name="coupon_code" class="input-text"
                                                                id="coupon_code" value="" placeholder="Promo code">
                                                            <span class="error">* <?php echo $codeErr;?></span>
                                                        </div>
                                                        <div class="coupon-btn">
                                                            <input type="submit" class="btn btn-outlined"
                                                                name="apply_coupon" value="Apply code">

                                                        </div>
                                                    </div>
                                                    <!-- <div class="update-block text-right">
                                                        <input type="submit" class="btn btn-outlined" name="update_cart"
                                                            value="Update cart">
                                                        <input type="hidden" id="_wpnonce" name="_wpnonce"
                                                            value="05741b501f"><input type="hidden"
                                                            name="_wp_http_referer" value="/petmark/cart/">
                                                    </div> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                            <?php
							if(isset($_POST['apply_coupon'])) {
							
							$CODE=$_POST['coupon_code'];
							$CUS=$customer;
						
							
							
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
							
							}else{
								echo "<div class='alert alert-success' role='alert'>
								<h4 class='alert-heading'> <i class='fal fa-exclamation-triangle'></i> Massage Error</h4>
								<p>promo code is not match or you are used.</p>
								
							  </div>";
							}
							


							


							}
							


							?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-section-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                            <!-- slide Block 5 / Normal Slider -->
                            <div class="cart-block-title">
                                <h2>YOU MAY BE INTERESTED IN…</h2>
                            </div>
                            <div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2
									  }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
			]'>
                                <?php 
								$select="SELECT * FROM gallery
										 INNER JOIN product
										 ON gallery.pro_id=product.id_product";
								$result=mysqli_query($conn,$select);
								while($row=mysqli_fetch_assoc($result)){
								
								?>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <span class="author">
                                                <?php echo $row['prod_name'] ?>
                                            </span>

                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="admin/<?php echo $row['image'] ?>" alt="">
                                                <div class="hover-contents">
                                                    <a href="product-details.php?id=<?php echo $row['id_product']  ?>"
                                                        class="hover-image">
                                                        <!-- <img src="image/products/product-1.jpg" alt=""> -->
                                                    </a>
                                                    <div class="hover-btns">

                                                        <a href="product-details.php?id=<?php echo $row['id_product']  ?>"
                                                            data-toggle="modal" data-target="#quickModal"
                                                            class="single-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <?php $is= $row['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $is";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                <span
                                                    class="price"><?php echo $row['price_prod']-($row['price_prod']*$rowQ['id_dis']/100)  ?>
                                                    JOD</span>
                                                <del class="price-old"><?php echo $row['price_prod']  ?>JOD</del>


                                                <?php


                                                }else {
                                                    ?>

                                                <span class="price"><?php echo $row['price_prod']  ?>JOD</span>

                                                <?php }


                                                ?>

                                                <span class="price-discount"> <?php 
                                                                $i= $row['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $i";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- Cart Summary -->
                        <div class="col-lg-6 col-12 d-flex">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4><span>Cart Summary</span></h4>
                                    <p>Sub Total <span class="text-primary"><?php
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
										}else{
											$total+=  $singleProCard[1]*$singleProCard[0]['price_prod'];
										}
									
									}
								}
								}
								echo $total;		 
									 }
									 
									 
									 
									 ?> JOD</span></p>
                                    <p>Delivery Cost <span class="text-primary">05.00 JOD</span></p>
                                    <h2>Grand Total <span class="text-primary"><?php
											if(isset($discountPromr)){
											echo $GranTot= $discountPromr+5;
											}else{
												echo $granTotal= $total+5;
											}
											
											JOD
											?></span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <a href="checkout.html" class="checkout-btn c-btn btn--primary">Checkout</a>
                                    <button class="update-btn c-btn btn-outlined">Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Cart Page End -->
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