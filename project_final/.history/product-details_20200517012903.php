<?php
include("admin/include/function.php") ;
 include("admin/include/connection.php") ;
session_start();

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
// foreach ($_SESSION['cart'] as $prod_id) {
//    $query="SELECT * FROM product
         
//            WHERE id_product= $prod_id";
//    $result=mysqli_query($conn,$query);
//    while($row=mysqli_fetch_assoc($result)){
      
//        $prodctCard[]=$row;
      
//    }
// }

$total=0;
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
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
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
                                            //  foreach ($prodctCard as $row) {
                                            //     print_r($row);
                                            //     die();
                                            // }
                                                  foreach ($prodctCard as $key => $singleProCard) {

                                                    foreach ($singleProCard as $key2 => $ProCard) {
                                                      
                                                    $idP =$ProCard['id_product'];
                                             

                                                 
                                                    $q="select * from cat_discount_pro where id_pro = $idP";
                                                    $rs=mysqli_query($conn,$q);
                                                    $rowQ=mysqli_fetch_assoc($rs);
                                                    if(isset( $rowQ['id_dis'])){
                                                    $total+= $ProCard['price_prod']-($ProCard['price_prod']*$rowQ['id_dis']/100);
                                                    }else{
                                                        $total+= $ProCard['price_prod'];
                                                    }
                                                
                                                }
                                            }
                                               
                                                echo $total;  ?> JOD
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            <?php
                                                
                                                foreach ($prodctCard as $key => $singleProCard) {
                                                    $q="select * from cat_discount_pro where id_pro = $idP";
                                                    $rs=mysqli_query($conn,$q);
                                                    $rowQ=mysqli_fetch_assoc($rs);
                                                    if(isset( $rowQ['id_dis'])){
                                                $total+= $singleProCard['price_prod']-($singleProCard['price_prod']*$rowQ['id_dis']/100);
                                                    }else{
                                                        $total+= $singleProCard['price_prod'];  
                                                    }
                                                # code...
                                            ?>
                                            <div class=" single-cart-block ">
                                                <div class="cart-product">
                                                    <a href="product-details.html" class="image">
                                                        <?php $img = $singleProCard['id_product'];
                                                        $queryGall="select * from gallery where pro_id=$img";
                                                        $resGall=mysqli_query($conn,$queryGall);
                                                        $rowGall=mysqli_fetch_assoc($resGall)  ?>
                                                        <img src="admin/<?php echo $rowGall['image']?>" alt="">
                                                    </a>
                                                    <div class="content">
                                                        <h3 class="title"><a
                                                                href="product-details.html"><?php echo $singleProCard['prod_name']?></a>
                                                        </h3>
                                                        <p class="price"><span class="qty">

                                                                <?php
                                                      echo $quantity ."x";

                                                    ?>



                                                            </span>
                                                            <?php
                                                          $idP= $singleProCard['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $idP";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                            <span
                                                                class="price"><?php echo $singleProCard['price_prod']-($singleProCard['price_prod']*$rowQ['id_dis']/100) ?>
                                                                JOD</span>
                                                            <del
                                                                class="price-old"><?php echo $singleProCard['price_prod']  ?>JOD</del>


                                                            <?php


                                                }else {
                                                    ?>

                                                            <span
                                                                class="price"><?php echo $singleProCard['price_prod']  ?>JOD</span>

                                                            <?php }


                                                ?>
                                                            <!-- discount -->

                                                            <span class="price-discount">
                                                                <?php $idPro= $singleProCard['id_product'] ;
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
                                                        <a href="deleteprocard.php?idpro=<?php echo $singleProCard['id_product']  ?>"
                                                            class="cross-btn"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class=" single-cart-block ">
                                                <div class="btn-block">
                                                    <a href="cart.php" class="btn">View Cart <i
                                                            class="fas fa-chevron-right"></i></a>
                                                    <a href="checkout.html" class="btn btn--primary">Check Out <i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
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
                                <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li> <a href="cart.php">USD $</a></li>
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
                            <li class="breadcrumb-item active">Book Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-lg-5 mb--30">
                        <!-- Product Details Slider Big Image-->
                        <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'> <?php 
                                $img=$_GET['id'];
                                $queryImg="SELECT * FROM gallery
                                INNER JOIN product 
                                ON gallery.pro_id=product.id_product
                                WHERE product.id_product=$img";
                                $reImg=mysqli_query($conn,$queryImg);
                               while($rowImg=mysqli_fetch_assoc($reImg)){
                          ?>
                            <div class="single-slide">
                                <img src="admin/<?php echo $rowImg['image']  ?>" alt="">
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Product Details Slider Nav -->
                        <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
                            <?php 
                                $imgSli=$_GET['id'];
                                $queryImgSli="SELECT * FROM gallery
                                INNER JOIN product 
                                ON gallery.pro_id=product.id_product
                                WHERE product.id_product=$imgSli";
                                $reImgSli=mysqli_query($conn,$queryImgSli);
                               while($rowImgSli=mysqli_fetch_assoc($reImgSli)){
                          ?>
                            <div class="single-slide">
                                <img src="admin/<?php echo $rowImgSli['image'] ?>" alt="">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php 
                    $return=$_GET['id'];
                      $queryReturn="SELECT * FROM product
                                   INNER JOIN category
                                   ON product.id_cat=category.id
                                    WHERE id_product=$return";
                     $resReturn=mysqli_query($conn,$queryReturn);
                     $rowReturn=mysqli_fetch_assoc($resReturn);
                      ?>
                    <div class="col-lg-7">
                        <div class="product-details-info pl-lg--30 ">
                            <p class="tag-block">Section: <?php echo $rowReturn['category_name']  ?></p>
                            <h3 class="product-title"><?php echo $rowReturn['prod_name']   ?></h3>
                            <ul class="list-unstyled">

                                <li>Author Name: <a href="#" class="list-value font-weight-bold">
                                        <?php echo $rowReturn['author_name']   ?></a></li>
                                <li>Book Code: <span class="list-value"> #<?php echo $rowReturn['id_product'] ?></span>
                                </li>
                                <?php 
                  
                      $queryQ="SELECT quantity FROM order_items
                                 
                                    WHERE product_id=$return";
                     $resQ=mysqli_query($conn,$queryQ);
                     $rowQ=mysqli_fetch_assoc($resQ);
                      ?>
                                <li>The number of books sold: <span class="list-value">
                                        <?php
                                        if(isset($rowQ['quantity'])){
                                        
                                        echo $rowQ['quantity'];
                                        }else{
                                            echo "There are no books sold";
                                        }
                                        ?></span></li>
                                <li>Availability: <span class="list-value"> In Stock</span></li>
                                <li>Book price:
                            </ul>
                            <div class=" price-block">
                                <?php 
                                                $q="select * from cat_discount_pro where id_pro = $return";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                <span
                                    class="price"><?php echo $rowReturn['price_prod']-($rowReturn['price_prod']*$rowQ['id_dis']/100)  ?>
                                    JOD</span>
                                <del class="price-old"><?php echo $rowReturn['price_prod']  ?>JOD</del>


                                <?php


                                                }else {
                                                    ?>

                                <span class="price"><?php echo $rowReturn['price_prod']  ?>JOD</span>

                                <?php }


                                                ?>
                                <span class="price-discount">
                                    <?php 
                                                $q="select * from cat_discount_pro where id_pro = $return";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?>
                                </span>
                                </li>
                                <form method="POST" action="">
                                    <div class="add-to-cart-row mt-5 pt-5">
                                        <div class="count-input-block">
                                            <span class="widget-label">Qty</span>
                                            <input type="number" name="quantity" class="form-control text-center"
                                                value="1">
                                        </div>
                                        <div class="add-cart-btn">
                                            <button name="addToCart" class="btn btn-outlined--primary"><span
                                                    class="plus-icon">+</span>Add
                                                to
                                                Cart</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="sb-custom-tab review-tab section-padding">
                        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab"
                                    aria-controls="tab-1" aria-selected="true">
                                    DESCRIPTION
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab"
                                    aria-controls="tab-2" aria-selected="true">
                                    REVIEWS (1)
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content space-db--20" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                <article class="review-article">
                                    <h1 class="sr-only"><?php echo $rowReturn['prod_name']  ?></h1>
                                    <p><?php echo $rowReturn['prod_desc']  ?></p>
                                </article>
                            </div>
                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                <div class="review-wrapper">
                                    <h2 class="title-lg mb--20">REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                                    <?php $queryComment ="SELECT * FROM comment_table
                                     where id_product=$return";
                                     $reComment=mysqli_query($conn,$queryComment);
                                     while($rowComment=mysqli_fetch_assoc($reComment)){

                                      ?>
                                    <div class="review-comment mb--20">
                                        <div class="avatar">
                                            <img src="image/icon/author-logo.png" alt="">
                                        </div>
                                        <div class="text">

                                            <h6 class="author font-weight-bold"><?php echo $rowComment['name'] ?> <span
                                                    class="font-weight-400"><?php echo $rowComment['date'] ?></span>
                                            </h6>
                                            <p><?php echo $rowComment['comment']  ?></p>
                                        </div>
                                    </div>

                                    <?php } ?>
                                    <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                                    <div class="rating-row pt-2">

                                        <form method="POST" action="" class="mt--15 site-form ">
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="message">Comment</label>
                                                        <textarea name="message" id="message" cols="30" rows="10"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="name">Name *</label>
                                                        <input type="text" name="name" id="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="email">Email *</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">

                                                        <input type="hidden" name="date"
                                                            value="<?php echo date("Y-m-d") ?>" id="website"
                                                            class="form-control">
                                                        <input type="hidden" name="id_pro"
                                                            value="<?php echo $rowReturn['id_product'] ?>">

                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="submit-btn">
                                                        <button name="submit_comment" type="submit"
                                                            class="btn btn-black">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php   
                    if(isset($_POST['submit_comment'])){
                    $name   =     @$_POST['name'];
                    $email  =     @$_POST['email'];
                    $date   =     @$_POST['date'];
                    $comment=     @$_POST['message'];
                    $id_pro=      @$_POST['id_pro'];

                    $queryInsert="INSERT INTO comment_table (name,email,comment,id_product,date)
                                  VALUES ('$name','$email','$comment',$id_pro,NOW())";
                               if($reInsert=mysqli_query($conn,$queryInsert))
                                 { 
                                     direct("product-details.php?id=".$rowReturn['id_product']);
                                    }else{
                                        echo "error";
                                        die();
                                      
                                    }




                    }



                    ?>
                    <!-- <div class="tab-product-details">
  <div class="brand">
    <img src="image/others/review-tab-product-details.jpg" alt="">
  </div>
  <h5 class="meta">Reference <span class="small-text">demo_5</span></h5>
  <h5 class="meta">In stock <span class="small-text">297 Items</span></h5>
  <section class="product-features">
    <h3 class="title">Data sheet</h3>
    <dl class="data-sheet">
      <dt class="name">Compositions</dt>
      <dd class="value">Viscose</dd>
      <dt class="name">Styles</dt>
      <dd class="value">Casual</dd>
      <dt class="name">Properties</dt>
      <dd class="value">Maxi Dress</dd>
    </dl>
  </section>
</div> -->
                </div>
                <!--=================================
    RELATED PRODUCTS BOOKS
===================================== -->
                <section class="">
                    <div class="container">
                        <div class="section-title section-title--bordered">
                            <h2>RELATED PRODUCTS</h2>
                        </div>
                        <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Lpple
                                        </a>
                                        <h3><a href="product-details.html">Revolutionize Your BOOK With</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image/products/product-10.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="image/products/product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.php" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Jpple
                                        </a>
                                        <h3><a href="product-details.html">Turn Your BOOK Into High Machine</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image/products/product-2.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="image/products/product-1.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.php" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Wpple
                                        </a>
                                        <h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image/products/product-3.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="image/products/product-2.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.php" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Epple
                                        </a>
                                        <h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
                                        </h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image/products/product-5.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="image/products/product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.php" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide">
                                <div class="product-card">
                                    <div class="product-header">
                                        <a href="" class="author">
                                            Hpple
                                        </a>
                                        <h3><a href="product-details.html">a Half Very Simple Things You To</a></h3>
                                    </div>
                                    <div class="product-card--body">
                                        <div class="card-image">
                                            <img src="image/products/product-6.jpg" alt="">
                                            <div class="hover-contents">
                                                <a href="product-details.html" class="hover-image">
                                                    <img src="image/products/product-4.jpg" alt="">
                                                </a>
                                                <div class="hover-btns">
                                                    <a href="cart.php" class="single-btn">
                                                        <i class="fas fa-shopping-basket"></i>
                                                    </a>
                                                    <a href="wishlist.html" class="single-btn">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                    <a href="compare.html" class="single-btn">
                                                        <i class="fas fa-random"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#quickModal"
                                                        class="single-btn">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£51.20</span>
                                            <del class="price-old">£51.20</del>
                                            <span class="price-discount">20%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Modal -->

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
                                        <p><span class="label">Address:</span><span class="text">Example Street 98, HH2
                                                BacHa, New
                                                York, USA</span></p>
                                        <p><span class="label">Phone:</span><span class="text">+18088 234 5678</span>
                                        </p>
                                        <p><span class="label">Email:</span><span class="text">suport@hastech.com</span>
                                        </p>
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
                                        <input type="email" class="form-control"
                                            placeholder="Enter Your Email Address Here...">
                                        <button class="btn btn--primary w-100">Subscribe</button>
                                    </form>
                                </div>
                                <div class="social-block">
                                    <h3 class="title">STAY CONNECTED</h3>
                                    <ul class="social-list list-inline">
                                        <li class="single-social facebook"><a href=""><i
                                                    class="ion ion-social-facebook"></i></a>
                                        </li>
                                        <li class="single-social twitter"><a href=""><i
                                                    class="ion ion-social-twitter"></i></a></li>
                                        <li class="single-social google"><a href=""><i
                                                    class="ion ion-social-googleplus-outline"></i></a></li>
                                        <li class="single-social youtube"><a href=""><i
                                                    class="ion ion-social-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom">
                        <div class="container">
                            <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum
                                tempor. Etiam
                                vel magna volutpat, posuere eros</p>
                            <a href="#" class="payment-block">
                                <img src="image/icon/payment.png" alt="">
                            </a>
                            <p class="copyright-text">Copyright © 2019 <a href="#" class="author">Pustok</a>. All Right
                                Reserved.
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