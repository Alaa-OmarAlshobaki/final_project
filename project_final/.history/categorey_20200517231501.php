<?php include("admin/include/connection.php") ;
session_start();
$id=$_GET['idProd'];
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


    

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pustok - Book Store</title>
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
        <div class="site-header header-4 mb--20 d-none d-lg-block">
            <div class="header-top header-top--style-2">

            </div>
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
                                                <?php echo count($_SESSION['cart']) ;?>
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
                                                    <a href="cart.html" class="btn">View Cart <i
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
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav  primary-nav show">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger">
                                        <span class="mr-3"> <i class="fa fa-bars"></i></span>Browse
                                        Books</a>
                                    <ul class="category-menu">
                                        <?php
                        //   $productID=$_GET['idProd'];
                          $queryProd ="SELECT * FROM product
                                         WHERE  product.id_cat={$_GET['idProd']}";
                                         $resultProd=mysqli_query($conn,$queryProd);
                                         while($rowProd =mysqli_fetch_assoc($resultProd)){ 
                                          
                                        ?>
                                        <li class="cat-item ">
                                            <a href="product-details.php?idProd=<?php echo $rowProd['id_product'] ?>"><?php echo $rowProd['prod_name'] ?>
                                            </a>

                                        </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </nav>
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
                                <ul class="main-menu menu-right li-last-0">
                                    <li class="menu-item ">
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
                                                        href="categorey.php?idProd=<?php echo $rowReadSec['id'] ?>"><?php echo $rowReadSec['category_name'] ?>
                                                    </a></h3>

                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
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
                                    <a href="javascript:void(0)" class="category-trigger"> <span class="mr-3"><i
                                                class="fa fa-bars"></i></span>Browse
                                        Books</a>
                                    <ul class="category-menu">
                                        <?php
                          
                                        $query ="SELECT * FROM product
                                         WHERE  product.id_cat={$id}";
                                         $result=mysqli_query($conn,$query);
                                         while($row =mysqli_fetch_assoc($result)){ 
                                          
                                        ?>
                                        <li class="cat-item ">
                                            <a href="product-details.php?idProd=<?php echo $row['id_product'] ?>"><?php echo $row['prod_name'] ?>
                                            </a>

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
                                            $querySect="SELECT * FROM category";
                                            $resultSec=mysqli_query($conn,$querySect);
                                           while($rowSec=mysqli_fetch_assoc($resultSec))
                                           {


                                            ?>

                                        <li class="menu-item-has-children">
                                            <a
                                                href="categorey.php?idProd=<?php echo $rowSec['id'] ?>"><?php echo $rowSec['category_name'] ?></a>

                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

                                </li>
                                <!-- Blog -->

                                <li class="menu-item">
                                    <a href="contact.php">Contact</a>
                                </li>


                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="off-canvas-bottom">
                        <div class="contact-list mb--10">
                            <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>(+962) 7885398099</a>
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
                                            $queryReadSectMob="SELECT * FROM category";
                                            $resultReadSecMob=mysqli_query($conn,$queryReadSectMob);
                                           while($rowReadSecMob=mysqli_fetch_assoc($resultReadSecMob))
                                           {


                                            ?>
                                        <li class="cus-col-25">
                                            <h3 class="menu-title"><a
                                                    href="categorey.php?idProd=<?php echo $rowReadSecMob['id'] ?>"><?php echo $rowReadSecMob['category_name'] ?></a>
                                            </h3>

                                        </li>
                                        <?php } ?>

                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

                                </li>
                                <!-- Blog -->

                                <li class="menu-item">
                                    <a href="contact.html">Contact</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
        Hero Area
    ===================================== -->
        <section class="hero-area hero-slider-4 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 offset-lg-3">
                        <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                    }'>
                            <div class="single-slide bg-image bg-overlay--white"
                                data-bg="image/bg-images/home-4-slider-1.jpg">
                                <div class="home-content text-left pl--30">
                                    <div class="row">
                                        <div class="col-lg-5">

                                            <h1>Pustok.<h1>
                                                    <h2> Deal of the day up to 50% off Special offer</h2>

                                                    <a href="#section" class="btn btn-outlined--pink">
                                                        Shop Now
                                                    </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-slide bg-image bg-overlay--white"
                                data-bg="image/bg-images/home-2-slider-1.jpg">
                                <div class="home-content text-left pl--30">
                                    <div class="row ">
                                        <div class="col-lg-8">
                                            <h1 class="">Pustok.</h1>
                                            <h3>Buy 3. Get Free 1.
                                            </h3>
                                            <a href="#section" class="btn btn--yellow">
                                                Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Features Section
    ===================================== -->
        <section class="mb--30" id="section">
            <h2 class="sr-only">Feature Section</h2>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5>Free Shipping Item</h5>
                                <p> Orders over $500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5>Money Back Guarantee</h5>
                                <p>100% money back</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Cash On Delivery</h5>
                                <p>Lorem ipsum dolor amet</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5>Help & Support</h5>
                                <p>Call us : + 0123.4567.89</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Category Gallery
    ===================================== -->
        <!-- <section class="section-margin">
            <h2 class="sr-only">Category Gallery Section</h2>
            <div class="container">
                <div class="category-gallery-block">
                    <a href="#" class="single-block hr-large">
                        <img src="image/others/cat-gal-large.png" alt="">
                    </a>
                    <div class="single-block inner-block-wrapper">
                        <a href="#" class="single-image mid-image">
                            <img src="image/others/cat-gal-mid.png" alt="">
                        </a>
                        <a href="#" class="single-image small-image">
                            <img src="image/others/cat-gal-small.png" alt="">
                        </a>
                        <a href="#" class="single-image small-image">
                            <img src="image/others/cat-gal-small-2.jpg" alt="">
                        </a>
                        <a href="#" class="single-image mid-image">
                            <img src="image/others/cat-gal-mid-2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section> -->
        <!--=================================
        Home Two Column Section
    ===================================== -->
        <section class="section-margin">
            <h1 class="sr-only">Promotion Section</h1>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="home-left-side text-center text-lg-left">
                            <div class="single-block">
                                <h3 class="home-sidebar-title">
                                    BEST SELLERS
                                </h3>
                                <div class="product-slider product-list-slider multiple-row sb-slick-slider home-4-left-sidebar"
                                    data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":1,
                                            "rows":4,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2, "rows":2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2, "rows":2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                                    <?php  
                                    $saler=$_GET['idProd'] ;
                                            $queryMax ="select * from order_items
                                            INNER join product on order_items.product_id=product.id_product
                                            INNER JOIN gallery ON gallery.pro_id =product.id_product
                                        
                                            where product.id_cat=$saler
                                            order by quantity desc limit 20";
                                            
                                           $resMax=mysqli_query($conn,$queryMax);
                                           while($rowMax=mysqli_fetch_assoc($resMax))
                                           {

                                        ?>
                                    <div class="single-slide">
                                        <div class="product-card card-style-list">
                                            <div class="card-image">
                                                <img src="admin/<?php echo $rowMax['image']  ?>" alt="">
                                            </div>
                                            <div class="product-card--body">
                                                <div class="product-header">
                                                    <a href="product-details.php?idProd=<?php echo $rowMax['id_product'] ?>"
                                                        class="author">
                                                        <?php echo $rowMax['prod_name']  ?>
                                                    </a>

                                                </div>
                                                <div class=" price-block">
                                                    <?php $id= $rowMax['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                    <span
                                                        class="price"><?php echo $rowMax['price_prod']-($rowMax['price_prod']*$rowQ['id_dis']/100)  ?>
                                                        JOD</span>
                                                    <del class="price-old"><?php echo $rowMax['price_prod']  ?>JOD</del>


                                                    <?php


                                                }else {
                                                    ?>

                                                    <span class="price"><?php echo $rowMax['price_prod']  ?>JOD</span>

                                                    <?php }


                                                ?>
                                                    <span class="price-discount">
                                                        <?php $id= $rowMax['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <div class="single-block text-center">
                                <a href="" class="promo-image home-sidebar-promo promo-overlay">
                                    <img src="image/others/home-side-promo.jpg" alt="">
                                </a>
                            </div>
                            <div class="single-block text-center">
                                <h3 class="home-sidebar-title style-2">
                                    Special offer
                                </h3>
                                <div class="product-slider countdown-single with-countdown sb-slick-slider product-border-reset"
                                    data-slick-setting='{
                                                "autoplay": true,
                                                "autoplaySpeed": 8000,
                                                "slidesToShow": 1,
                                                "dots":true
                                            }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                                    <?php 
                                    $offer =$_GET['idProd'];
            $querydiscount="select * from cat_discount_pro  
            inner join product on cat_discount_pro.id_pro = product.id_product 
               inner join discount on cat_discount_pro.id_dis = discount.discount_value 
            inner join gallery on gallery.pro_id = product.id_product 
            where cat_discount_pro.id_cat = $offer
         
            ";
            $resdiscount=mysqli_query($conn,$querydiscount);
            while($rowdiscount=mysqli_fetch_assoc($resdiscount)){
              ?>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="product-details.php?id=<?php echo $rowdiscount['id_product'] ?>"
                                                    class="author">
                                                    <?php echo $rowdiscount['prod_name'] ?>
                                                </a>

                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="admin/<?php echo $rowdiscount['image'] ?>" alt="">
                                                    <div class="hover-contents">
                                                        <a href="product-details.html" class="hover-image">
                                                            <!-- <img src="admin/<?php// echo $rowdiscount['image'] ?>" alt=""> -->
                                                        </a>
                                                        <div class="hover-btns">

                                                            <a href="product-details.php?idProd=<?php echo $rowdiscount['id_product'] ?>"
                                                                class="single-btn">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">

                                                    <?php $id= $rowdiscount['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                    <span
                                                        class="price"><?php echo $rowdiscount['price_prod']-($rowdiscount['price_prod']*$rowQ['id_dis']/100)  ?>
                                                        JOD</span>
                                                    <del
                                                        class="price-old"><?php echo $rowdiscount['price_prod']  ?>JOD</del>


                                                    <?php


                                                }else {
                                                    ?>

                                                    <span
                                                        class="price"><?php echo $rowdiscount['price_prod']  ?>JOD</span>

                                                    <?php }


                                                ?>
                                                    <span class="price-discount">
                                                        <?php $id= $rowdiscount['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?>

                                                    </span>
                                                </div>
                                                <div class="count-down-block">
                                                    <div class="product-countdown"
                                                        data-countdown=<?php $date=$rowdiscount['end_disc'] ; echo date("Y-m-d H:00:00",strtotime($date)); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="single-block">
                                <h3 class="home-sidebar-title">
                                    CLIENT TESTIMONIALS
                                </h3>
                                <div class="sb-slick-slider testimonial-slider slider-one-column" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow":1,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                                    <?php  
                                    $discr = $_GET['idProd'];
                                    $querDiscr="select * from gallery
                                    inner join product
                                    on gallery.pro_id = product.id_product
                                    where product.id_cat=$discr";
                                    $resDiscr=mysqli_query($conn,$querDiscr);
                                    while($rowDiscr=mysqli_fetch_assoc($resDiscr)) {  ?>
                                    <div class="single-slide">
                                        <div class="testimonial-card">
                                            <div class="testimonial-image">
                                                <img src="admin/<?php echo $rowDiscr['image'] ?>" alt="">
                                            </div>
                                            <div class="testimonial-body mt-5 pt-5">
                                                <article>
                                                    <h2 class="sr-only mt-5 pt-5"><?php echo $rowDiscr['prod_name'] ?>
                                                    </h2>
                                                    <p><?php echo $rowDiscr['prod_desc'] ?></p>

                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="home-right-side">
                            <div class="single-block">
                                <div class="sb-custom-tab text-lg-left text-center">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop"
                                                role="tab" aria-controls="shop" aria-selected="true">
                                                Featured Products
                                            </a>
                                            <span class="arrow-icon"></span>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab"
                                                aria-controls="men" aria-selected="true">
                                                New Arrivals
                                            </a>
                                            <span class="arrow-icon"></span>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman"
                                                role="tab" aria-controls="woman" aria-selected="false">
                                                Most view products
                                            </a>
                                            <span class="arrow-icon"></span>
                                        </li>
                                    </ul>
                                    <div class="tab-content space-db--30" id="myTabContent">
                                        <div class="tab-pane show active" id="shop" role="tabpanel"
                                            aria-labelledby="shop-tab">
                                            <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                                                data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 3,
                        "rows":2,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>



                                                <?php  
                              $id_D=$_GET['idProd'];
                       $queryDiscount="select * from cat_discount_pro  
                       inner join product on cat_discount_pro.id_pro = product.id_product 
                       INNER join gallery on gallery.pro_id=product.id_product
                     where cat_discount_pro.id_cat = $id_D
                       order by id_dis desc limit 40
                      
                                     ";
                                     $resDiscount=mysqli_query($conn,$queryDiscount);
                                    while($rowDiscount=mysqli_fetch_assoc($resDiscount)) {
                       
                       ?>

                                                <div class="single-slide">
                                                    <div class="product-card">
                                                        <div class="product-header">
                                                            <a href="product-details.php?idProd=<?php echo $rowDiscount['id_product'] ?>"
                                                                class="author">
                                                                <?php echo $rowDiscount['prod_name']  ?>
                                                            </a>

                                                        </div>
                                                        <div class="product-card--body">
                                                            <div class="card-image">
                                                                <img src="admin/<?php echo  $rowDiscount['image']  ?>"
                                                                    alt="">
                                                                <div class="hover-contents">
                                                                    <a href="product-details.html" class="hover-image">
                                                                        <img src="admin/<?php $rowDiscount['image']  ?>"
                                                                            alt="">
                                                                    </a>
                                                                    <div class="hover-btns">

                                                                        <a href="product-details.php?idProd=<?php echo $rowDiscount['id_product'] ?>"
                                                                            class="single-btn">
                                                                            <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-block">
                                                                <?php $is= $rowDiscount['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $is";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                                <span
                                                                    class="price"><?php echo $rowDiscount['price_prod']-($rowDiscount['price_prod']*$rowQ['id_dis']/100)  ?>
                                                                    JOD</span>
                                                                <del
                                                                    class="price-old"><?php echo $rowDiscount['price_prod']  ?>JOD</del>


                                                                <?php


                                                }else {
                                                    ?>

                                                                <span
                                                                    class="price"><?php echo $rowDiscount['price_prod']  ?>JOD</span>

                                                                <?php }


                                                ?>

                                                                <span class="price-discount"> <?php 
                                                                $i= $rowDiscount['id_product'] ;
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
                                        <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                                            <h3 class="m-5 text-center">New Arrivals</h3>
                                            <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                                                data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                    }' data-slick-responsive='[
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>

                                                <?php 
                                                $arr=$_GET['idProd'];
                                    $queryLast="select * from product
                                    INNER join gallery on gallery.pro_id=product.id_product
                                  where product.id_cat = $arr
                                    order by id_product desc limit 40";
                                    $resLast=mysqli_query($conn,$queryLast);
                                    while($rowLast=mysqli_fetch_assoc($resLast))
                                    {
                                    ?>
                                                <div class="single-slide">
                                                    <div class="product-card">
                                                        <div class="product-header">
                                                            <a href="product-details.php?idProd=<?php echo $rowLast['id_product']  ?>"
                                                                class="author">
                                                                <?php echo $rowLast['prod_name'] ?>
                                                            </a>

                                                        </div>
                                                        <div class="product-card--body">
                                                            <div class="card-image">
                                                                <img src="admin/<?php echo $rowLast['image'] ?>" alt="">
                                                                <div class="hover-contents">
                                                                    <a href="product-details.html" class="hover-image">
                                                                        <img src="admin/<?php echo $rowLast['image'] ?>"
                                                                            alt="">
                                                                    </a>
                                                                    <div class="hover-btns">

                                                                        <a href="product-details.php?idProd=<?php echo $rowLast['id_product'] ?>"
                                                                            class="single-btn">
                                                                            <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-block">
                                                                <?php $id= $rowLast['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                                <span
                                                                    class="price"><?php echo $rowLast['price_prod']-($rowLast['price_prod']*$rowQ['id_dis']/100)  ?>
                                                                    JOD</span>
                                                                <del
                                                                    class="price-old"><?php echo $rowLast['price_prod']  ?>JOD</del>


                                                                <?php


                                                }else {
                                                    ?>

                                                                <span class="price"> <?php $id= $rowLast['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                    echo $rowQ['id_dis'] . "%";
                                                }else {
                                                    echo "no Discount";
                                                }
                                                
                                                
                                                ?></span>

                                                                <?php }


                                                ?>
                                                                <span class="price-discount"><?php $i= $rowLast['id_product'] ;
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

                                                <?php  } ?>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                                            <h3 class="m-5 text-center"> Most view products</h3>
                                            <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                                                data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                                <?php
                                                $view = $_GET['idProd'];
                                                $querView="select * from order_items
                                                INNER join product on order_items.product_id=product.id_product
                                                INNER JOIN gallery ON gallery.pro_id =product.id_product
                                            
                                                where product.id_cat=$view
                                                order by quantity desc limit 20";
                                                $resView=mysqli_query($conn,$querView);
                                                while($rowView=mysqli_fetch_assoc($resView))
                                                {
                                                ?>
                                                <div class="single-slide">
                                                    <div class="product-card">
                                                        <div class="product-header">
                                                            <a href="product-details.php?idProd=<?php echo $rowView['id_product']  ?>"
                                                                class="author">
                                                                <?php echo $rowView['prod_name'] ?>
                                                            </a>

                                                        </div>
                                                        <div class="product-card--body">
                                                            <div class="card-image">
                                                                <img src="admin/<?php echo $rowView['image'] ?>" alt="">
                                                                <div class="hover-contents">
                                                                    <a href="product-details.html" class="hover-image">
                                                                        <img src="admin/<?php echo $rowView['image'] ?>"
                                                                            alt="">
                                                                    </a>
                                                                    <div class="hover-btns">

                                                                        <a href="product-details.php?idProd=<?php echo $rowView['id_product'] ?>"
                                                                            data-toggle="modal"
                                                                            data-target="#quickModal"
                                                                            class="single-btn">
                                                                            <i class="fas fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-block">
                                                                <?php $id= $rowView['id_product'] ;
                                                            $q="select * from cat_discount_pro where id_pro = $id";
                                                            $rs=mysqli_query($conn,$q);
                                                            $rowQ=mysqli_fetch_assoc($rs);
                                                            if(isset( $rowQ['id_dis'])){
                                                              ?>
                                                                <span
                                                                    class="price"><?php echo $rowView['price_prod']-($rowView['price_prod']*$rowQ['id_dis']/100)  ?>
                                                                    JOD</span>
                                                                <del
                                                                    class="price-old"><?php echo $rowView['price_prod']  ?>JOD</del>


                                                                <?php
            
            
                                                            }else {
                                                                ?>

                                                                <span class="price"> <?php $id= $rowView['id_product'] ;
                                                            $q="select * from cat_discount_pro where id_pro = $id";
                                                            $rs=mysqli_query($conn,$q);
                                                            $rowQ=mysqli_fetch_assoc($rs);
                                                            if(isset( $rowQ['id_dis'])){
                                                                echo $rowQ['id_dis'] . "%";
                                                            }else {
                                                                echo "no Discount";
                                                            }
                                                            
                                                            
                                                            ?></span>

                                                                <?php }
            
            
                                                            ?>
                                                                <span class="price-discount"><?php $i= $rowView['id_product'] ;
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

                                                <?php  } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-block">
                                <div class="row space-db--30">
                                    <div class="col-lg-8 mb--30">
                                        <a href="" class="promo-image promo-overlay">
                                            <img src="image/bg-images/promo-banner-with-text-big.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="col-lg-4 mb--30">
                                        <a href="" class="promo-image promo-overlay">
                                            <img src="image/bg-images/promo-banner-with-text-2--small.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-block">
                                <div class="home-right-block bg-white">
                                    <div class="sb-custom-tab text-lg-left text-center">
                                        <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">


                                            <li class="nav-item">
                                                <a class="nav-link active" id="shop-tab2" data-toggle="tab" href="#shop"
                                                    role="tab" aria-controls="shop2" aria-selected="true">
                                                    All books
                                                </a>
                                            </li>


                                        </ul>
                                        <div class="tab-content" id="myTabContent2">
                                            <div class="tab-pane show active" id="shop2" role="tabpanel"
                                                aria-labelledby="shop-tab2">
                                                <div class="product-slider product-list-slider multiple-row slider-border-multiple-row  sb-slick-slider"
                                                    data-slick-setting='{
                                                        "autoplay": true,
                                                        "autoplaySpeed": 8000,
                                                        "slidesToShow": 2,
                                                        "rows":4,
                                                        "dots":true
                                                    }' data-slick-responsive='[
                                                        {"breakpoint":992, "settings": {"slidesToShow": 2,"rows": 3} },
                    
                                                        {"breakpoint":768, "settings": {"slidesToShow": 1} }
                                                    ]'>
                                                    <?php 
                                                    $all=$_GET['idProd'];
                                                    $selectAll="select * from gallery
                                                                inner join product 
                                                                on gallery.pro_id = product.id_product
                                                                where id_cat=$all";
                                                    $res=mysqli_query($conn,$selectAll);
                                                    while($row=mysqli_fetch_assoc($res))
                                                    {
                                                    ?>
                                                    <div class="single-slide">
                                                        <div class="product-card card-style-list">
                                                            <div class="card-image">
                                                                <img src="admin/<?php echo $row['image'] ?>" alt="">
                                                            </div>
                                                            <div class="product-card--body">
                                                                <div class="product-header">
                                                                    <a href="product-details.php?idProd=<?php echo $row['id_product'] ?>"
                                                                        class="author">
                                                                        <?php echo $row['prod_name'] ?>
                                                                    </a>

                                                                </div>
                                                                <div class="price-block">
                                                                    <?php $id= $row['id_product'] ;
                                                            $q="select * from cat_discount_pro where id_pro = $id";
                                                            $rs=mysqli_query($conn,$q);
                                                            $rowQ=mysqli_fetch_assoc($rs);
                                                            if(isset( $rowQ['id_dis'])){
                                                              ?>
                                                                    <span
                                                                        class="price"><?php echo $row['price_prod']-($row['price_prod']*$rowQ['id_dis']/100)  ?>
                                                                        JOD</span>
                                                                    <del
                                                                        class="price-old"><?php echo $row['price_prod']  ?>JOD</del>


                                                                    <?php
            
            
                                                            }else {
                                                                ?>

                                                                    <span class="price"> <?php $idAll= $row['id_product'] ;
                                                            $q="select * from cat_discount_pro where id_pro = $idAll";
                                                            $rs=mysqli_query($conn,$q);
                                                            $rowQ=mysqli_fetch_assoc($rs);
                                                            if(isset( $rowQ['id_dis'])){
                                                                echo $rowQ['id_dis'] . "%";
                                                            }else {
                                                                echo "no Discount";
                                                            }
                                                            
                                                            
                                                            ?></span>

                                                                    <?php }
            
            
                                                            ?>
                                                                    <span class="price-discount"><?php $i= $row['id_product'] ;
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
                                                    <?php 
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
    Footer
===================================== -->
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
                            <p><span class="label">Address:</span><span class="text">Al Arab Street 7b, Shafa Bdran,
                                    Amman,
                                </span></p>
                            <p><span class="label">Phone:</span><span class="text">+962 788 320226</span></p>
                            <p><span class="label">Email:</span><span class="text">alaaomaralshobaki@gmail.com</span>
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
                    vel
                    magna volutpat, posuere eros</p>
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