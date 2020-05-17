<?php include("admin/include/connection.php"); 
session_start();

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
</head>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block">
            <?php include("layout/header.php") ?>
            <div class="header-bottom pb--10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <nav class="category-nav   ">
                                <div>
                                    <a href="javascript:void(0)" class="category-trigger"><span class="mr-3"><i
                                                class="fa fa-bars"></i></span>Browse
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
                            <form method="POST">
                                <div class="header-search-block">
                                    <input id="nameCat" type="text" placeholder="Search entire store here">
                                    <button type="submit" id="searchCat">Search</button>
                                </div>
                            </form>
                        </div>

                        </script>
                        <div class="col-lg-4">
                            <div class="main-navigation flex-lg-right">
                                <div class="cart-widget">
                                    <div class="login-block">
                                        <?php  if(!isset($_SESSION['id'])) { ?>
                                        <a href="login.php" class="font-weight-bold">Login</a> <br>
                                        <span>or</span><a href="login-register.php">Register</a>
                                        <?php } ?>
                                    </div>
                                    <!-- /////////////////                //////////////////////                   ///////////////////////////////////////// -->
                                    <?php  if(isset($_SESSION['id'])) { ?>
                                    <div class="cart-block">
                                        <div class="cart-total">
                                            <span class="text-number">
                                                1
                                            </span>
                                            <span class="text-item">
                                                Shopping Cart
                                            </span>
                                            <span class="price">
                                                £0.00
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div class="cart-dropdown-block">
                                            <div class=" single-cart-block ">
                                                <div class="cart-product">
                                                    <a href="product-details.php" class="image">
                                                        <img src="image/products/cart-product-1.jpg" alt="">
                                                    </a>
                                                    <div class="content">
                                                        <h3 class="title"><a href="product-details.php">Kodak PIXPRO
                                                                Astro Zoom AZ421 16 MP</a>
                                                        </h3>
                                                        <p class="price"><span class="qty">1 ×</span> £87.34</p>
                                                        <button class="cross-btn"><i class="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
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
                                    <?php  } ?>
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

                                        </li>
                                        <?php } ?>

                                    </ul>
                                </li>

                                <li class="menu-item">
                                    <a href="my-account.php">Account </a>

                                </li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

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
        <section class="hero-area hero-slider-1">
            <div class="sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "fade": true,
                            "autoplaySpeed": 3000,
                            "speed": 3000,
                            "slidesToShow": 1,
                            "dots":true
                            }'>
                <?php
                 $counter=0;
                 $querySlider="SELECT * FROM slider_table WHERE status=1" ;
                            $resSlider=mysqli_query($conn,$querySlider);
                            while($rowSlider=mysqli_fetch_assoc($resSlider)){
                                if ($counter == 0)
                                {
                             ?>
                <div class="single-slide bg-shade-whisper  ">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-right">
                                <img src="admin/<?php echo $rowSlider['img'] ?>" alt="">
                            </div>
                            <div class="row no-gutters ">
                                <div class="col-xl-6 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-left-side">
                                        <h1>Pustok.
                                        </h1>
                                        <h2><?php echo $rowSlider['slider_descr']  ?></h2>
                                        <a href="shop-grid.html" class="btn btn-outlined--primary">
                                            Order Now!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="single-slide bg-ghost-white">
                    <div class="container">
                        <div class="home-content text-center text-sm-left position-relative">
                            <div class="hero-partial-image image-left">
                                <img src="admin/<?php echo $rowSlider['img'] ?>" alt="">
                            </div>
                            <div class="row align-items-center justify-content-start justify-content-md-end">
                                <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                    <div class="home-content-inner content-right-side">
                                        <h1>Pustok.</h1>
                                        <h2><?php echo $rowSlider['slider_descr']  ?></h2>
                                        <a href="#dis" class="btn btn-outlined--primary">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                     }
                     $counter++ ;}

                ?>
            </div>
        </section>
        <!--=================================
        Home Features Section
        ===================================== -->
        <section class="mb--30">
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
        Promotion Section One
        ===================================== -->
        <section class="section-margin">
            <h2 class="sr-only">Promotion Section</h2>
            <div class="container">
                <div class="row space-db--30">
                    <div class="col-lg-6 col-md-6 mb--30">
                        <a href="" class="promo-image promo-overlay">
                            <img src="image/bg-images/promo-banner-with-text.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 mb--30">
                        <a href="" class="promo-image promo-overlay">
                            <img src="image/bg-images/promo-banner-with-text-2.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Slider Tab
        ===================================== -->
        <section class="section-padding">
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab"
                                aria-controls="shop" aria-selected="true">
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
                            <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab"
                                aria-controls="woman" aria-selected="false">
                                Most view products
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <h3 class="mb-5"> Featured Products</h3>
                        <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":2,
                            "dots":true
                        }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>
                                <?php 
                                    $queryMax ="select * from cat_discount_pro  
                                    inner join product on cat_discount_pro.id_pro = product.id_product 
                                    inner join category on product.id_cat = category.id
                                    inner join gallery on gallery.pro_id = product.id_product 
                                    order by id_dis desc limit 40";
                                    $resMax=mysqli_query($conn,$queryMax);
                                    while($rowMax=mysqli_fetch_assoc($resMax))
                                    {
                                        ?>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="categorey.php?id=<?php echo $rowMax['id'] ?>" class="author">
                                                <?php echo $rowMax['category_name']   ?>
                                            </a>
                                            <h3><a style="max-height: 20px;"
                                                    href="product-details.php?id=<?php echo $rowMax['id_product'] ?>"><?php echo $rowMax['prod_name']   ?></a>
                                            </h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="admin/<?php echo $rowMax['image']   ?>" alt="">
                                                <div class="hover-contents">
                                                    <a href="product-details.php" class="hover-image">
                                                        <!-- <img src="admin/<?php //echo $rowMax['image']   ?>" alt=""> -->
                                                    </a>
                                                    <div class="hover-btns text-center  single-btn">


                                                        <div class="single-btn">
                                                            <i onclick="editModal('<?php echo $rowMax['id_product'] ?>')"
                                                                class="fas fa-eye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <span
                                                    class="price"><?php echo $rowMax['price_prod'] *50/100  ?>JOD</span>
                                                <del class="price-old"><?php echo $rowMax['price_prod']   ?>JOD</del>
                                                <span class="price-discount"> <?php echo $rowMax['id_dis']   ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- ///////////// arrived//////////////////////////////////////////////////////// -->
                        <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                            <h3 class="mb-5 mt-5"> New Arrivals</h3>
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                <?php 
                                    $queryLast="select * from gallery 
                                    INNER JOIN product ON gallery.pro_id = product.id_product 
                                    order by id_product desc limit 20";
                                    $resLast=mysqli_query($conn,$queryLast);
                                    while($rowLast=mysqli_fetch_assoc($resLast))
                                    {
                                    ?>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?php echo $rowLast['prod_name'] ?>
                                            </a>
                                            <h3><a style="max-height:20px" href="product-details.php">
                                                    <?php echo $rowLast['prod_desc'] ?></a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="admin/<?php echo $rowLast['image'] ?>" alt="">
                                                <div class="hover-contents">
                                                    <a href="product-details.php" class="hover-image">
                                                        <img src="admin/<?php echo $rowLast['image'] ?>" alt="">
                                                    </a>
                                                    <div class="hover-btns">

                                                        <div class="single-btn">
                                                            <i onclick="editModal('<?php echo $rowLast['id_product'] ?>')"
                                                                class="fas fa-eye"></i>
                                                        </div>
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
                                                <span class="price"><?php echo $rowLast['price_prod']*50/100  ?>
                                                    JOD</span>
                                                <del class="price-old"><?php echo $rowLast['price_prod']  ?>JOD</del>


                                                <?php


                                                }else {
                                                    ?>

                                                <span class="price"><?php echo $rowLast['price_prod']  ?>JOD</span>

                                                <?php }


                                                ?>

                                                <span class="price-discount">
                                                    <?php $id= $rowLast['id_product'] ;
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
                                <?php  } ?>

                            </div>
                        </div>
                        <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                            <h3 class="mb-5 mt-5"> Most view products</h3>
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":2,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                <?php 
                                    $queryMax ="select * from order_items
                                     INNER join product on order_items.product_id=product.id_product
                                     INNER JOIN gallery ON gallery.pro_id = product.id_product 
                                     order by quantity desc limit 20";
                                    $resMax=mysqli_query($conn,$queryMax);
                                    while($rowMax=mysqli_fetch_assoc($resMax))
                                    {
                                        ?>
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="" class="author">
                                                <?php echo $rowMax['prod_name']  ?>
                                            </a>
                                            <h3><a style="max-height:20px" href="product-details.php">
                                                    <?php echo $rowMax['prod_desc']  ?></a></h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="admin/<?php echo $rowMax['image'] ?>" alt="">
                                                <div class="hover-contents">
                                                    <a href="product-details.php" class="hover-image">
                                                        <!-- <img src="admin/<?php //echo $rowMax['image'] ?>" alt=""> -->
                                                    </a>
                                                    <div class="hover-btns">

                                                        <div class="single-btn">
                                                            <i onclick="editModal('<?php echo $rowMax['id_product'] ?>')"
                                                                class="fas fa-eye"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                <?php $id= $rowMax['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                <span class="price"><?php echo $rowMax['price_prod']*50/100  ?>
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
                                <?php  } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Deal of the day 
        ===================================== -->
        <section class="section-margin">
            <div class="container-fluid">
                <div class="promo-section-heading">
                    <h2> Deal of the day up to 50% off Special offer</h2>
                </div>
                <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 6,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":490, "settings": {"slidesToShow": 1} }
            ]'>
                    <?php 
            $querydiscount="select * from cat_discount_pro  
            inner join product on cat_discount_pro.id_pro = product.id_product 
            inner join discount on cat_discount_pro.id_dis = discount.discount_value 
            inner join gallery on gallery.pro_id = product.id_product 
            where  id_dis=50
            order by end_disc desc";
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
                                <h3><a style="max-height: 60px;"
                                        href="
                                        product-details.php?id=<?php echo $rowdiscount['id_product'] ?>"><?php echo $rowdiscount['prod_desc'] ?>
                                    </a>
                                </h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="admin/<?php echo $rowdiscount['image'] ?>" alt="">
                                    <div class="hover-contents">
                                        <a href="product-details.php" class="hover-image">
                                            <img src="admin/<?php echo $rowdiscount['image'] ?>" alt="">
                                        </a>
                                        <div class="hover-btns">


                                            <div class="single-btn">
                                                <i onclick="editModal('<?php echo $rowdiscount['id_product'] ?>')"
                                                    class="fas fa-eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <span class="price"><?php echo $rowdiscount['price_prod'] *50/100 ?> JOD</span>
                                    <del class="price-old"><?php echo $rowdiscount['price_prod'] ?> JOD</del>
                                    <span class="price-discount"><?php echo $rowdiscount['id_dis'] ?>%</span>
                                </div>
                                <div class="count-down-block">
                                    <div class="product-countdown"
                                        data-countdown="<?php $date=$rowdiscount['end_disc'] ; echo date("Y-m-d H:00:00",strtotime($date)); ?>">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        <!--=================================
        Best Seller Product
        ===================================== -->
        <section class="section-margin bg-image section-padding-top section-padding"
            data-bg="image/bg-images/best-seller-bg.jpg">
            <div class="container">
                <div class="section-title section-title--bordered mb-0">
                    <h2>Best All books by author name</h2>
                </div>
                <div class="best-seller-block">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="author-image">
                                <img src="image/others/best-seller-author.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="sb-slick-slider product-slider product-list-slider multiple-row slider-border-multiple-row"
                                data-slick-setting='{
                                    "autoplay": false,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow":2,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                    {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":992, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                ]'>
                                <?php
                                $queryAuth=" select * from gallery
                                             inner join product
                                             where gallery.pro_id = product.id_product
                                             ORDER BY id_product DESC
                                  ";
                                $resAuth=mysqli_query($conn,$queryAuth);
                                while($rowAuth=mysqli_fetch_assoc($resAuth))
                                {
                                   
                                ?>
                                <div class="single-slide">
                                    <div class="product-card card-style-list">
                                        <div class="card-image">
                                            <img src="admin/<?php echo $rowAuth['image'] ?>" alt="">
                                        </div>
                                        <div class="product-card--body">
                                            <div class="product-header">
                                                <a href="product-details.php?id=<?php echo $rowAuth['id_product'] ?>"
                                                    class="author">
                                                    <?php echo $rowAuth['author_name'] ?>

                                                </a>
                                                <h3><a
                                                        href="product-details.php?id=<?php echo $rowAuth['id_product'] ?>">
                                                        <?php echo $rowAuth['prod_name'] ?>
                                                    </a></h3>
                                            </div>
                                            <div class="price-block">
                                                <?php $id= $rowAuth['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
                                                $rs=mysqli_query($conn,$q);
                                                $rowQ=mysqli_fetch_assoc($rs);
                                                if(isset( $rowQ['id_dis'])){
                                                  ?>
                                                <span class="price"><?php echo $rowAuth['price_prod']*50/100  ?>
                                                    JOD</span>
                                                <del class="price-old"><?php echo $rowAuth['price_prod']  ?>JOD</del>


                                                <?php


                                                }else {
                                                    ?>

                                                <span class="price"><?php echo $rowAuth['price_prod']  ?>JOD</span>

                                                <?php }


                                                ?>
                                                <span class="price-discount"> <?php $id= $rowAuth['id_product'] ;
                                                $q="select * from cat_discount_pro where id_pro = $id";
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
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        CHILDREN’S BOOKS 
        ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>SECTION OF BOOKS</h2>
                </div>
                <div class="product-list-slider slider-two-column product-slider multiple-row sb-slick-slider slider-border-multiple-row"
                    data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":3,
                                            "rows":2,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                    <?php
                                        $cat="select * from category";
                                        $catRes=mysqli_query($conn,$cat);
                                        while($catRow=mysqli_fetch_assoc($catRes))
                                        {


                                         ?>
                    <div class="single-slide">
                        <div class="product-card card-style-list">
                            <div class="card-image">
                                <img src="admin/uploads/<?php echo $catRow['category_img']  ?>" alt="">
                            </div>
                            <div class="product-card--body">
                                <div class="product-header">
                                    <a href="categorey.php?id=<?php echo $catRow['id']  ?>" class="author">
                                        section
                                    </a>
                                    <h3><a
                                            href="categorey.php?id=<?php echo $catRow['id']  ?>"><?php echo $catRow['category_name']  ?></a>
                                    </h3>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </section>
        <!--=================================
        Promotion Section Two
        ===================================== -->
        <div class="section-margin">
            <div class="container">
                <div class="row space-db--30">
                    <div class="col-lg-8 mb--30">
                        <div class="promo-wrapper promo-type-one">
                            <a href="#" class="promo-image  promo-overlay bg-image"
                                data-bg="image/bg-images/promo-banner-mid.jpg">
                                <!-- <img src="image/bg-images/promo-banner-mid.jpg" alt=""> -->
                            </a>
                            <div class="promo-text">
                                <div class="promo-text-inner">
                                    <h2>Buy 3. Get Free 1.</h2>
                                    <h3>wear the old coat and by the new book</h3>
                                    <!-- <a href="#" class="btn btn-outlined--red-faded">See More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb--30">
                        <div class="promo-wrapper promo-type-two ">
                            <a href="#" class="promo-image promo-overlay bg-image"
                                data-bg="image/bg-images/promo-banner-small.jpg">
                                <!-- <img src="image/bg-images/promo-banner-small.jpg" alt=""> -->
                            </a>
                            <?php $queryLastProd="select * from product" ;
                            $resultL=mysqli_query($conn,$queryLastProd) ;
                            $rowL=mysqli_fetch_assoc($resultL)  ?>

                            <div class="promo-text">
                                <div class="promo-text-inner">
                                    <span class="d-block price"><?php echo $rowL['price_prod'] ?> JOD</span>
                                    <h2><?php echo $rowL['prod_name'] ?> <br>
                                        <!-- <?php //echo $rowL['prod_desc'] ?> </h2> -->
                                        <a href="cart.php?id=<?php echo $rowL['id_product'] ?> "
                                            class="btn btn-outlined--primary">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================================
        ARTS & PHOTOGRAPHY BOOKS
        ===================================== -->
        <section class="section-margin" id="dis">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <div class="promo-section-heading h3 text-white">
                        Deal of the week up to 50% off Special offer
                    </div>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 5,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1500, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
                    <?php 
            $queryWdiscount="select * from cat_discount_pro  
            inner join product on cat_discount_pro.id_pro = product.id_product 
             inner join discount on cat_discount_pro.id_dis = discount.discount_value 
            inner join gallery on gallery.pro_id = product.id_product 
            where  id_dis=50
           ";
            $resWdiscount=mysqli_query($conn,$queryWdiscount);
            while($rowWdiscount=mysqli_fetch_assoc($resWdiscount)){
              ?>
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <a href="product-details.php?id=<?php echo $rowWdiscount['id_product'] ?>"
                                    class="author">
                                    <?php echo $rowWdiscount['prod_name']  ?>
                                </a>
                                <h3><a style="max-height: 60px;"
                                        href="product-details.php?id=<?php echo $rowWdiscount['id_product'] ?>"><?php echo $rowWdiscount['prod_desc']  ?>
                                    </a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="admin/<?php echo $rowWdiscount['image']  ?>" alt="">
                                    <div class="hover-contents">
                                        <a href="product-details.php?id=<?php echo $rowWdiscount['id_product'] ?>"
                                            class="hover-image">
                                            <img src="admin/<?php echo $rowWdiscount['image']  ?>" alt="">
                                        </a>
                                        <div class="hover-btns">


                                            <a href="product-details.php?id=<?php echo $rowWdiscount['id_product'] ?>"
                                                class="single-btn">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-block">
                                    <span class="price"><?php echo $rowWdiscount['price_prod']*50/100 ?>JOD</span>
                                    <del class="price-old"><?php echo $rowWdiscount['price_prod']  ?>JOD</del>
                                    <span class="price-discount"><?php echo $rowWdiscount['id_dis']  ?>%</span>
                                </div>
                                <div class="count-down-block">
                                    <div class="product-countdown"
                                        data-countdown="<?php $date=$rowWdiscount['end_disc'] ; echo date("Y-m-d H:00:00",strtotime($date)); ?>">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>

                </div>
            </div>
        </section>
        <!--=================================
            Promotion Section Three
        ===================================== -->
        <section class="section-margin">
            <div class="promo-wrapper promo-type-three">
                <a href="#" class="promo-image promo-overlay bg-image" data-bg="image/bg-images/promo-banner-full.jpg">
                </a>
                <div class="promo-text w-100 ml-0">
                    <div class="container">
                        <div class="row w-100">
                            <div class="col-lg-7">
                                <h2>I Love This Idea!</h2>
                                <h3>Today a reader, Tomorrow a leader</h3>
                                <a href="#" class="btn btn--yellow">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Blog Slider
        ===================================== -->
        <!--=================================
        Home Blog
        ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title">
                    <h2>Sections Of Books and Description</h2>
                </div>
                <div class="blog-slider sb-slick-slider" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                    <?php
               $catDisc="select * from category";
               $catResDisc=mysqli_query($conn,$catDisc);
               while($catRowDisc=mysqli_fetch_assoc($catResDisc))
               {

            ?>
                    <div class="single-slide">
                        <div class="blog-card">
                            <div class="image">
                                <img src="admin/uploads/<?php echo $catRowDisc['category_img'] ?>" alt="">
                            </div>
                            <div class="content">
                                <div class="content-header">

                                    <h3 class="title"><a
                                            href="categorey.php?id=<?php echo $catRowDisc['id'] ?>"><?php echo $catRowDisc['category_name'] ?></a>
                                    </h3>
                                </div>

                                <article class="blog-paragraph">
                                    <h2 class="sr-only"><?php echo $catRowDisc['category_name'] ?></h2>
                                    <p><?php echo $catRowDisc['category_dec'] ?></p>
                                </article>
                                <a href="categorey.php?id=<?php echo $catRowDisc['id'] ?>" class="card-link">Read More
                                    <i class="fas fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                    <!-- <div class="single-slide">
                        <div class="blog-card">
                            <div class="image">
                                <img src="image/others/blog-grid-2.jpg" alt="">
                            </div>
                            <div class="content">
                                <div class="content-header">
                                    <div class="date-badge">
                                        <span class="date">
                                            19
                                        </span>
                                        <span class="month">
                                            Jan
                                        </span>
                                    </div>
                                    <h3 class="title"><a href="blog-details.html">Why You Never See BLOG TITLE That </a>
                                    </h3>
                                </div>
                                <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                                <article class="blog-paragraph">
                                    <h2 class="sr-only">blog-paragraph</h2>
                                    <p>Virtual reality and 3-D technology are already well-established in the
                                        entertainment...</p>
                                </article>
                                <a href="blog-details.html" class="card-link">Read More <i
                                        class="fas fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="blog-card">
                            <div class="image">
                                <img src="image/others/blog-grid-3.jpg" alt="">
                            </div>
                            <div class="content">
                                <div class="content-header">
                                    <div class="date-badge">
                                        <span class="date">
                                            31
                                        </span>
                                        <span class="month">
                                            Aug
                                        </span>
                                    </div>
                                    <h3 class="title"><a href="blog-details.html">What Everyone Must Know About </a>
                                    </h3>
                                </div>
                                <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="#">Hastech</a></p>
                                <article class="blog-paragraph">
                                    <h2 class="sr-only">blog-paragraph</h2>
                                    <p>Virtual reality and 3-D technology are already well-established in the
                                        entertainment...</p>
                                </article>
                                <a href="blog-details.html" class="card-link">Read More <i
                                        class="fas fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!--=================================
        Footer
        ===================================== -->
        <!-- Modal -->
        <div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog"
            aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="product-details-modal">
                        <div class="row">
                            <div class="col-lg-5">
                                <!-- Product Details Slider Big Image-->
                                <div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-1.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-2.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-3.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-4.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-5.jpg" alt="">
                                    </div>
                                </div>
                                <!-- Product Details Slider Nav -->
                                <div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two"
                                    data-slick-setting='{
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
                                    <div class="single-slide">
                                        <img src="image/products/product-details-1.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-2.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-3.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-4.jpg" alt="">
                                    </div>
                                    <div class="single-slide">
                                        <img src="image/products/product-details-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 mt--30 mt-lg--30">
                                <div class="product-details-info pl-lg--30 ">
                                    <p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
                                    <h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
                                    <ul class="list-unstyled">
                                        <li>Ex Tax: <span class="list-value"> £60.24</span></li>
                                        <li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
                                        <li>Product Code: <span class="list-value"> model1</span></li>
                                        <li>Reward Points: <span class="list-value"> 200</span></li>
                                        <li>Availability: <span class="list-value"> In Stock</span></li>
                                    </ul>
                                    <div class="price-block">
                                        <span class="price-new">£73.79</span>
                                        <del class="price-old">£91.86</del>
                                    </div>
                                    <div class="rating-widget">
                                        <div class="rating-block">
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star star_on"></span>
                                            <span class="fas fa-star "></span>
                                        </div>
                                        <div class="review-widget">
                                            <a href="">(1 Reviews)</a> <span>|</span>
                                            <a href="">Write a review</a>
                                        </div>
                                    </div>
                                    <article class="product-details-article">
                                        <h4 class="sr-only">Product Summery</h4>
                                        <p>Long printed dress with thin adjustable straps. V-neckline and wiring under
                                            the Dust with ruffles
                                            at the bottom
                                            of the
                                            dress.</p>
                                    </article>
                                    <div class="add-to-cart-row">
                                        <div class="count-input-block">
                                            <span class="widget-label">Qty</span>
                                            <input type="number" class="form-control text-center" value="1">
                                        </div>
                                        <div class="add-cart-btn">
                                            <a href="" class="btn btn-outlined--primary"><span
                                                    class="plus-icon">+</span>Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="compare-wishlist-row">
                                        <a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
                                        <a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="widget-social-share">
                            <span class="widget-label">Share:</span>
                            <div class="modal-social-share">
                                <a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <!-- <div class="single-slide">
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
                            <!-- <p><span class="label">Address:</span><span class="text">Example Street 98, HH2 BacHa, New
                                    York,
                                    USA</span></p> -->
                            <p><span class="label">Phone:</span><span class="text">+962788320226</span></p>
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
    <script>
    function editModal(id) {


        $('#quickModal').modal()
        $('#cat_id').val(id)



    }
    </script>


</body>

</html>